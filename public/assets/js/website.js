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
})();
