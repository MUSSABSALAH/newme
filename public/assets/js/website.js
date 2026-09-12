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
})();
