/* ==========================================================================
   New Me Admin — Plans pricing matrix editor (vanilla JS, no build step).

   Adds/removes pricing rows in the draft version editor. Each new row gets a
   unique index so Laravel receives a clean `rules[<i>][...]` array. The server
   Form Request remains the source of truth for validation.
   ========================================================================== */
(function () {
    "use strict";

    var table = document.querySelector("[data-pricing-table]");
    if (!table) {
        return;
    }

    var body = table.querySelector("[data-pricing-body]");
    var template = document.querySelector("[data-pricing-template]");
    var addButton = document.querySelector("[data-pricing-add]");

    if (!body || !template || !addButton) {
        return;
    }

    // Start the counter past any server-rendered rows to avoid name clashes.
    var counter = body.querySelectorAll("[data-pricing-row]").length;
    var emptyRow = body.querySelector("[data-pricing-empty]");

    function refreshIcons() {
        if (window.lucide && typeof window.lucide.createIcons === "function") {
            window.lucide.createIcons();
        }
    }

    function toggleEmpty() {
        if (!emptyRow) {
            return;
        }
        var hasRows = body.querySelectorAll("[data-pricing-row]").length > 0;
        emptyRow.hidden = hasRows;
    }

    function addRow() {
        var markup = template.innerHTML.replace(/__INDEX__/g, String(counter));
        counter += 1;

        var wrapper = document.createElement("tbody");
        wrapper.innerHTML = markup.trim();

        var row = wrapper.querySelector("[data-pricing-row]");
        if (row) {
            if (emptyRow) {
                body.insertBefore(row, emptyRow);
            } else {
                body.appendChild(row);
            }
            refreshIcons();
            toggleEmpty();
        }
    }

    addButton.addEventListener("click", addRow);

    body.addEventListener("click", function (e) {
        var trigger = e.target.closest ? e.target.closest("[data-pricing-remove]") : null;
        if (!trigger) {
            return;
        }
        var row = trigger.closest("[data-pricing-row]");
        if (row) {
            row.parentNode.removeChild(row);
            toggleEmpty();
        }
    });

    toggleEmpty();
})();

/* ==========================================================================
   Cover image live preview.
   ========================================================================== */
(function () {
    "use strict";

    var input = document.querySelector("[data-image-input]");
    var preview = document.querySelector("[data-image-preview]");
    if (!input || !preview) {
        return;
    }

    input.addEventListener("change", function () {
        var file = input.files && input.files[0];
        if (!file) {
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.add("is-visible");
        };
        reader.readAsDataURL(file);
    });
})();

/* ==========================================================================
   Meal picker — per-group "select all" toggle and live selected counter.
   ========================================================================== */
(function () {
    "use strict";

    var groups = document.querySelectorAll("[data-meal-group]");
    if (!groups.length) {
        return;
    }

    groups.forEach(function (group) {
        var boxes = group.querySelectorAll('input[name="meals[]"]');
        var selectAll = group.querySelector("[data-meal-select-all]");
        var count = group.querySelector("[data-meal-count]");
        var total = boxes.length;

        function selected() {
            var n = 0;
            boxes.forEach(function (box) {
                if (box.checked) {
                    n += 1;
                }
            });
            return n;
        }

        function sync() {
            var n = selected();
            if (count) {
                count.textContent = n + "/" + total;
            }
            if (selectAll) {
                selectAll.checked = n === total && total > 0;
                selectAll.indeterminate = n > 0 && n < total;
            }
        }

        if (selectAll) {
            selectAll.addEventListener("change", function () {
                boxes.forEach(function (box) {
                    box.checked = selectAll.checked;
                });
                sync();
            });
        }

        boxes.forEach(function (box) {
            box.addEventListener("change", sync);
        });

        sync();
    });
})();

/* ==========================================================================
   Plan detail tabs (Pricing / Meals). Purely client-side; the active tab is
   also reflected in the URL so links (and post-save redirects) can deep-link.
   ========================================================================== */
(function () {
    "use strict";

    var nav = document.querySelector("[data-tabs]");
    if (!nav) {
        return;
    }

    var tabs = nav.querySelectorAll("[data-tab-target]");
    var panels = document.querySelectorAll("[data-tab-panel]");

    function activate(target) {
        tabs.forEach(function (tab) {
            tab.classList.toggle("is-active", tab.getAttribute("data-tab-target") === target);
        });
        panels.forEach(function (panel) {
            panel.classList.toggle("is-active", panel.getAttribute("data-tab-panel") === target);
        });

        if (window.history && window.history.replaceState) {
            var url = new URL(window.location.href);
            url.searchParams.set("tab", target);
            window.history.replaceState({}, "", url.toString());
        }
    }

    tabs.forEach(function (tab) {
        tab.addEventListener("click", function () {
            activate(tab.getAttribute("data-tab-target"));
        });
    });
})();
