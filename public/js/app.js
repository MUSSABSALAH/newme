/* ==========================================================================
   New Me Admin — small UI behaviors (no build step, vanilla JS).
   Currently: accessible dropdown menus (notifications, language, account).
   ========================================================================== */
(function () {
    "use strict";

    function closeAll(except) {
        document.querySelectorAll("[data-dropdown]").forEach(function (dropdown) {
            if (dropdown === except) {
                return;
            }
            var menu = dropdown.querySelector("[data-dropdown-menu]");
            var toggle = dropdown.querySelector("[data-dropdown-toggle]");
            if (menu) {
                menu.hidden = true;
            }
            if (toggle) {
                toggle.setAttribute("aria-expanded", "false");
            }
        });
    }

    document.addEventListener("click", function (e) {
        var toggle = e.target.closest("[data-dropdown-toggle]");

        if (toggle) {
            var dropdown = toggle.closest("[data-dropdown]");
            var menu = dropdown.querySelector("[data-dropdown-menu]");
            var willOpen = menu.hidden;
            closeAll(dropdown);
            menu.hidden = !willOpen;
            toggle.setAttribute("aria-expanded", willOpen ? "true" : "false");
            e.stopPropagation();
            return;
        }

        // Click outside any open menu closes them (but not clicks inside a menu).
        if (!e.target.closest("[data-dropdown-menu]")) {
            closeAll(null);
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeAll(null);
            closeSidebar();
        }
    });

    /* ---------- Off-canvas sidebar (mobile) ---------- */
    function shell() {
        return document.querySelector("[data-app-shell]");
    }

    function closeSidebar() {
        var el = shell();
        if (el) {
            el.classList.remove("is-sidebar-open");
        }
        closeNavFlyouts();
    }

    document.addEventListener("click", function (e) {
        if (e.target.closest("[data-sidebar-toggle]")) {
            var el = shell();
            if (el) {
                el.classList.toggle("is-sidebar-open");
            }
            e.stopPropagation();
            return;
        }

        if (e.target.closest("[data-sidebar-close]")) {
            closeSidebar();
            return;
        }

        // Tapping a sidebar link closes the drawer as the page navigates.
        // Group triggers only open a flyout, so they must keep it open.
        if (e.target.closest("a.sidebar__item, .sidebar__sublink")) {
            closeSidebar();
        }
    });

    /* ---------- Sidebar nav flyouts (nested groups) ---------- */
    var closeNavFlyouts = function () {};

    (function initSidebarFlyouts() {
        var gap = 10;
        var edge = 12;

        function flyoutOf(trigger) {
            var group = trigger.closest("[data-nav-group]");

            return group ? group.querySelector("[data-nav-flyout]") : null;
        }

        function isRtl() {
            return document.documentElement.getAttribute("dir") === "rtl";
        }

        function close(except) {
            document.querySelectorAll("[data-nav-trigger]").forEach(function (trigger) {
                if (trigger === except) {
                    return;
                }
                var flyout = flyoutOf(trigger);
                if (flyout) {
                    flyout.hidden = true;
                }
                trigger.setAttribute("aria-expanded", "false");
            });
        }

        closeNavFlyouts = function () {
            close(null);
        };

        function place(trigger, flyout) {
            var rect = trigger.getBoundingClientRect();
            var box = flyout.getBoundingClientRect();
            var rail = trigger.closest(".sidebar").getBoundingClientRect();

            var top = Math.min(
                Math.max(edge, rect.top - 6),
                Math.max(edge, window.innerHeight - box.height - edge)
            );

            flyout.style.top = top + "px";
            flyout.style.left = isRtl()
                ? Math.max(edge, rail.left - box.width - gap) + "px"
                : Math.min(window.innerWidth - box.width - edge, rail.right + gap) + "px";
        }

        function open(trigger) {
            var flyout = flyoutOf(trigger);
            if (!flyout) {
                return;
            }

            close(trigger);
            flyout.hidden = false;
            trigger.setAttribute("aria-expanded", "true");
            place(trigger, flyout);
        }

        document.addEventListener("click", function (e) {
            var trigger = e.target.closest("[data-nav-trigger]");

            if (trigger) {
                if (trigger.getAttribute("aria-expanded") === "true") {
                    close(null);
                } else {
                    open(trigger);
                }
                e.stopPropagation();

                return;
            }

            if (!e.target.closest("[data-nav-flyout]")) {
                close(null);
            }
        });

        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                close(null);
            }
        });

        // Reposition an open flyout while its trigger moves, and drop it when
        // the viewport changes size (the rail may switch to drawer mode).
        document.addEventListener("scroll", function () {
            document.querySelectorAll('[data-nav-trigger][aria-expanded="true"]').forEach(function (trigger) {
                var flyout = flyoutOf(trigger);
                if (flyout && !flyout.hidden) {
                    place(trigger, flyout);
                }
            });
        }, true);

        window.addEventListener("resize", function () {
            close(null);
        });
    })();

    /* ---------- Sidebar tooltips (fixed, so overflow doesn't clip) ---------- */
    (function initSidebarTooltips() {
        var tip = document.createElement("div");
        tip.className = "sidebar-tooltip";
        tip.setAttribute("role", "tooltip");
        tip.hidden = true;
        document.body.appendChild(tip);

        var gap = 12;
        var active = null;

        function isRtl() {
            return document.documentElement.getAttribute("dir") === "rtl";
        }

        function hide() {
            active = null;
            tip.classList.remove("is-visible");
            tip.hidden = true;
        }

        function place(el) {
            var label = el.getAttribute("data-tooltip");

            // An open flyout already names the group, and would sit underneath.
            if (!label || el.getAttribute("aria-expanded") === "true") {
                hide();
                return;
            }

            tip.textContent = label;
            tip.hidden = false;
            tip.classList.add("is-visible");

            var rect = el.getBoundingClientRect();
            var tipRect = tip.getBoundingClientRect();
            var top = rect.top + (rect.height - tipRect.height) / 2;

            tip.style.top = Math.max(8, top) + "px";

            if (isRtl()) {
                tip.style.left = Math.max(8, rect.left - tipRect.width - gap) + "px";
                tip.style.right = "auto";
            } else {
                tip.style.left = Math.min(
                    window.innerWidth - tipRect.width - 8,
                    rect.right + gap
                ) + "px";
                tip.style.right = "auto";
            }
        }

        document.addEventListener("mouseover", function (e) {
            var item = e.target.closest(".sidebar__item[data-tooltip]");
            if (!item) {
                return;
            }
            active = item;
            place(item);
        });

        document.addEventListener("mouseout", function (e) {
            var item = e.target.closest(".sidebar__item[data-tooltip]");
            if (!item) {
                return;
            }
            var next = e.relatedTarget && e.relatedTarget.closest
                ? e.relatedTarget.closest(".sidebar__item[data-tooltip]")
                : null;
            if (next === item) {
                return;
            }
            if (active === item) {
                hide();
            }
        });

        document.addEventListener("focusin", function (e) {
            var item = e.target.closest(".sidebar__item[data-tooltip]");
            if (item) {
                active = item;
                place(item);
            }
        });

        document.addEventListener("focusout", function (e) {
            var item = e.target.closest(".sidebar__item[data-tooltip]");
            if (item && active === item) {
                hide();
            }
        });

        document.addEventListener("scroll", function () {
            if (active) {
                place(active);
            }
        }, true);

        window.addEventListener("resize", hide);
    })();
})();
