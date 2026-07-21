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
        if (e.target.closest(".sidebar__item")) {
            closeSidebar();
        }
    });
})();
