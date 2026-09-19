/* ==========================================================================
   New Me — Public website shared behaviors.
   Safe to run alongside page-specific scripts (all handlers are idempotent).
   ========================================================================== */
(function () {
    "use strict";

    /* ---- fade in remote/AI images once loaded ---- */
    function markLoaded(img) { img.classList.add("loaded"); }
    document.querySelectorAll("img.aiimg").forEach(function (img) {
        img.loading = img.loading || "lazy";
        img.decoding = "async";
        if (img.complete && img.naturalWidth > 0) markLoaded(img);
        else img.addEventListener("load", function () { markLoaded(img); });
        img.addEventListener("error", function () { markLoaded(img); });
    });

    /* ---- reveal on scroll ---- */
    if ("IntersectionObserver" in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
            });
        }, { threshold: 0.14 });
        document.querySelectorAll(".rv").forEach(function (el) { io.observe(el); });
    } else {
        document.querySelectorAll(".rv").forEach(function (el) { el.classList.add("in"); });
    }

    /* ---- mobile menu ---- */
    var burger = document.getElementById("mBurger");
    var menu = document.getElementById("mmenu");
    if (burger && menu) {
        var open = function () { menu.classList.add("open"); document.body.classList.add("menu-open"); };
        var close = function () { menu.classList.remove("open"); document.body.classList.remove("menu-open"); };
        burger.addEventListener("click", open);
        var closeBtn = menu.querySelector(".mclose");
        if (closeBtn) closeBtn.addEventListener("click", close);
        menu.querySelectorAll("a").forEach(function (a) { a.addEventListener("click", close); });
    }

    /* ---- disable submit while the request is in flight ---- */
    document.addEventListener("submit", function (event) {
        var form = event.target;
        if (!(form instanceof HTMLFormElement) || event.defaultPrevented) {
            return;
        }

        var button = form.querySelector("[data-busy-label]");
        if (!(button instanceof HTMLButtonElement)) {
            return;
        }

        if (form.getAttribute("data-submitting") === "1") {
            event.preventDefault();
            return;
        }

        form.setAttribute("data-submitting", "1");

        window.setTimeout(function () {
            button.disabled = true;
            button.setAttribute("aria-busy", "true");

            var label = button.querySelector("[data-busy-text]");
            var busy = button.getAttribute("data-busy-label");
            if (busy) {
                if (label) {
                    label.textContent = busy;
                } else {
                    button.textContent = busy;
                }
            }

            var group = form.getAttribute("data-busy-group");
            if (!group) {
                return;
            }

            document.querySelectorAll('form[data-busy-group="' + group + '"] button[type="submit"]').forEach(function (other) {
                other.disabled = true;
            });
        }, 0);
    });

    /* ---- add-to-cart toast ---- */
    var toastTimer = 0;

    function toastHost() {
        var host = document.getElementById("nmToastHost");
        if (host) {
            return host;
        }
        host = document.createElement("div");
        host.id = "nmToastHost";
        host.className = "nm-toast-host";
        host.setAttribute("aria-live", "polite");
        host.setAttribute("aria-atomic", "true");
        document.body.appendChild(host);
        return host;
    }

    window.NMToast = {
        show: function (opts) {
            opts = opts || {};
            var host = toastHost();
            host.innerHTML = "";

            var el = document.createElement("div");
            el.className = "nm-toast";
            el.setAttribute("role", "status");

            var icon = document.createElement("span");
            icon.className = "nm-toast-icon";
            icon.setAttribute("aria-hidden", "true");
            icon.innerHTML = '<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="12" fill="currentColor"/><path d="M7.2 12.4 10.5 15.7 16.8 8.6" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>';

            var copy = document.createElement("div");
            copy.className = "nm-toast-copy";
            var title = document.createElement("strong");
            title.textContent = opts.message || "";
            copy.appendChild(title);
            if (opts.detail) {
                var detail = document.createElement("span");
                detail.textContent = opts.detail;
                copy.appendChild(detail);
            }

            el.appendChild(icon);
            el.appendChild(copy);

            if (opts.actionHref && opts.actionLabel) {
                var link = document.createElement("a");
                link.className = "nm-toast-link";
                link.href = opts.actionHref;
                link.textContent = opts.actionLabel;
                el.appendChild(link);
            }

            host.appendChild(el);
            window.requestAnimationFrame(function () {
                el.classList.add("is-in");
            });

            window.clearTimeout(toastTimer);
            toastTimer = window.setTimeout(function () {
                el.classList.remove("is-in");
                el.classList.add("is-out");
                window.setTimeout(function () {
                    if (el.parentNode) {
                        el.parentNode.removeChild(el);
                    }
                }, 320);
            }, opts.duration || 2800);
        }
    };

    window.nmStoreLine = {
        groupsFromDom: function () {
            var support = [];
            document.querySelectorAll("#tabs .tab[data-cat], #v30Tabs .tab[data-cat]").forEach(function (tab) {
                var slug = tab.getAttribute("data-cat");
                if (!slug || slug === "all" || slug === "bakery") {
                    return;
                }
                if (support.indexOf(slug) === -1) {
                    support.push(slug);
                }
            });
            return { bakery: ["bakery"], support: support };
        },
        allowed: function () {
            var line = new URLSearchParams(window.location.search).get("line");
            if (!line) {
                return null;
            }
            var groups = window.nmStoreLineGroups || this.groupsFromDom();
            return groups[line] || null;
        },
        requestedCat: function () {
            var cat = new URLSearchParams(window.location.search).get("cat");
            return cat && cat !== "all" ? cat : null;
        },
        selectRequestedTab: function () {
            var slug = this.requestedCat();
            if (!slug) {
                return null;
            }
            var tabs = document.querySelectorAll("#tabs .tab, #v30Tabs .tab");
            var found = false;
            tabs.forEach(function (tab) {
                if (tab.getAttribute("data-cat") === slug) {
                    found = true;
                }
            });
            if (!found) {
                return null;
            }
            tabs.forEach(function (tab) {
                tab.classList.toggle("on", tab.getAttribute("data-cat") === slug);
            });
            return slug;
        },
        match: function (slug, selected) {
            var allowed = this.allowed();
            selected = selected || "all";
            if (allowed) {
                if (selected === "all") {
                    return allowed.indexOf(slug) !== -1;
                }
                return selected === slug && allowed.indexOf(slug) !== -1;
            }
            return selected === "all" || selected === slug;
        },
        hideExtraTabs: function () {
            var allowed = this.allowed();
            if (!allowed) {
                return;
            }
            document.querySelectorAll("#tabs .tab, #v30Tabs .tab").forEach(function (tab) {
                var slug = tab.getAttribute("data-cat");
                if (slug && slug !== "all" && allowed.indexOf(slug) === -1) {
                    tab.hidden = true;
                }
            });
        },
        selectSingleTab: function () {
            var allowed = this.allowed();
            if (!allowed || allowed.length !== 1) {
                return;
            }
            document.querySelectorAll("#tabs .tab, #v30Tabs .tab").forEach(function (tab) {
                tab.classList.toggle("on", tab.getAttribute("data-cat") === allowed[0]);
            });
        },
        scrollCatalog: function () {
            var ids = ["shop", "store-catalog", "grid"];
            var i, el;
            for (i = 0; i < ids.length; i++) {
                el = document.getElementById(ids[i]);
                if (el && el.offsetParent !== null) {
                    el.scrollIntoView({ behavior: "smooth", block: "start" });
                    return;
                }
            }
        },
        apply: function (selected) {
            var self = this;
            var allowed = this.allowed();
            var requested = this.requestedCat();
            this.hideExtraTabs();
            this.selectSingleTab();
            var fromUrl = this.selectRequestedTab();
            if (fromUrl) {
                selected = fromUrl;
            } else if (!selected) {
                var on = document.querySelector("#tabs .tab.on, #v30Tabs .tab.on");
                selected = on ? on.getAttribute("data-cat") : "all";
            }
            document.querySelectorAll("#grid .card, #v30Rail .prod").forEach(function (el) {
                el.classList.toggle("hide", !self.match(el.getAttribute("data-cat"), selected));
            });
            var empty = document.getElementById("empty");
            if (empty) {
                var shown = document.querySelectorAll("#grid .card:not(.hide)").length;
                empty.style.display = shown ? "none" : "block";
            }
            if (allowed || requested || location.hash === "#shop" || location.hash === "#store-catalog") {
                window.setTimeout(function () { self.scrollCatalog(); }, 80);
            }
        }
    };

    window.nmStoreLine.apply();
})();
