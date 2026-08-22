/* ==========================================================================
   New Me Admin — Client-side form validation (no build step, vanilla JS).

   This is a UX layer only. The backend Form Requests remain the source of
   truth. Any <form data-validate> is validated before submit, and clear,
   localized messages are rendered inside the field's .field__error element.

   Supported rules (via standard attributes / data-*):
     required, type="email", type="number", minlength, maxlength,
     pattern, data-rule="email|numeric", data-match="otherFieldName",
     data-message-required="...", data-message-pattern="..."
   ========================================================================== */
(function () {
    "use strict";

    var locale = document.documentElement.getAttribute("lang") || "en";

    var messages = {
        en: {
            required: "This field is required.",
            email: "Please enter a valid email address.",
            numeric: "Please enter a valid number.",
            min: "Must be at least {min} characters.",
            max: "Must not exceed {max} characters.",
            match: "The values do not match.",
            pattern: "The value is not in the correct format.",
        },
        ar: {
            required: "هذا الحقل مطلوب.",
            email: "من فضلك أدخل بريدًا إلكترونيًا صحيحًا.",
            numeric: "من فضلك أدخل رقمًا صحيحًا.",
            min: "يجب ألا يقل عن {min} أحرف.",
            max: "يجب ألا يزيد عن {max} حرفًا.",
            match: "القيم غير متطابقة.",
            pattern: "القيمة ليست بالتنسيق الصحيح.",
        },
    };

    function t(key, params) {
        var pack = messages[locale] || messages.en;
        var msg = pack[key] || messages.en[key] || key;
        if (params) {
            Object.keys(params).forEach(function (k) {
                msg = msg.replace("{" + k + "}", params[k]);
            });
        }
        return msg;
    }

    function wrapperOf(input) {
        return input.closest(".field, .f") || input.parentElement;
    }

    function showError(input, message) {
        input.classList.add("is-invalid");
        input.setAttribute("aria-invalid", "true");
        var wrap = wrapperOf(input);
        var el = wrap.querySelector(".field__error[data-client-error]");
        if (!el) {
            el = document.createElement("span");
            el.className = "field__error";
            el.setAttribute("data-client-error", "");
            wrap.appendChild(el);
        }
        el.textContent = message;
    }

    function clearError(input) {
        input.classList.remove("is-invalid");
        input.removeAttribute("aria-invalid");
        var wrap = wrapperOf(input);
        var el = wrap.querySelector(".field__error[data-client-error]");
        if (el) {
            el.parentNode.removeChild(el);
        }
    }

    function validateInput(input) {
        var value = (input.value || "").trim();
        var rule = input.getAttribute("data-rule");

        if (input.hasAttribute("required") && value === "") {
            showError(input, input.getAttribute("data-message-required") || t("required"));
            return false;
        }

        // Optional field left empty is valid.
        if (value === "") {
            clearError(input);
            return true;
        }

        if (input.type === "email" || rule === "email") {
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                showError(input, t("email"));
                return false;
            }
        }

        if (input.type === "number" || rule === "numeric") {
            if (isNaN(Number(value))) {
                showError(input, t("numeric"));
                return false;
            }
        }

        var min = input.getAttribute("minlength");
        if (min && value.length < parseInt(min, 10)) {
            showError(input, t("min", { min: min }));
            return false;
        }

        var max = input.getAttribute("maxlength");
        if (max && value.length > parseInt(max, 10)) {
            showError(input, t("max", { max: max }));
            return false;
        }

        var matchName = input.getAttribute("data-match");
        if (matchName && input.form) {
            var other = input.form.querySelector('[name="' + matchName + '"]');
            if (other && other.value !== input.value) {
                showError(input, t("match"));
                return false;
            }
        }

        if (input.hasAttribute("pattern")) {
            var re = new RegExp("^(?:" + input.getAttribute("pattern") + ")$");
            if (!re.test(value)) {
                showError(input, input.getAttribute("data-message-pattern") || t("pattern"));
                return false;
            }
        }

        clearError(input);
        return true;
    }

    function isValidatable(el) {
        return (
            (el.tagName === "INPUT" || el.tagName === "SELECT" || el.tagName === "TEXTAREA") &&
            !el.disabled &&
            el.type !== "hidden" &&
            el.type !== "submit" &&
            el.type !== "button"
        );
    }

    // Groups requiring at least one checked box, marked with
    // <div data-require-one="fieldName[]" data-message="...">.
    function showGroupError(group, message) {
        var el = group.querySelector(".field__error[data-client-error]");
        if (!el) {
            el = document.createElement("span");
            el.className = "field__error";
            el.setAttribute("data-client-error", "");
            group.appendChild(el);
        }
        el.textContent = message;
    }

    function clearGroupError(group) {
        var el = group.querySelector(".field__error[data-client-error]");
        if (el) {
            el.parentNode.removeChild(el);
        }
    }

    function validateGroup(group) {
        var name = group.getAttribute("data-require-one");
        var boxes = group.querySelectorAll('input[type="checkbox"][name="' + name + '"]');
        var anyChecked = Array.prototype.some.call(boxes, function (b) {
            return b.checked;
        });
        if (!anyChecked) {
            showGroupError(group, group.getAttribute("data-message") || t("required"));
            return false;
        }
        clearGroupError(group);
        return true;
    }

    function validateForm(form) {
        var ok = true;
        var fields = form.querySelectorAll("input, select, textarea");
        Array.prototype.forEach.call(fields, function (field) {
            if (isValidatable(field) && !validateInput(field)) {
                ok = false;
            }
        });
        var groups = form.querySelectorAll("[data-require-one]");
        Array.prototype.forEach.call(groups, function (group) {
            if (!validateGroup(group)) {
                ok = false;
            }
        });
        return ok;
    }

    document.addEventListener(
        "submit",
        function (e) {
            var form = e.target;
            if (!(form instanceof HTMLFormElement) || !form.hasAttribute("data-validate")) {
                return;
            }
            if (!validateForm(form)) {
                e.preventDefault();
                var firstInvalid = form.querySelector(".is-invalid");
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        },
        true
    );

    // Validate a field when the user leaves it.
    document.addEventListener(
        "blur",
        function (e) {
            var input = e.target;
            if (input && input.form && input.form.hasAttribute("data-validate") && isValidatable(input)) {
                validateInput(input);
            }
        },
        true
    );

    // Re-check a field that is already showing an error, as the user types.
    document.addEventListener(
        "input",
        function (e) {
            var input = e.target;
            if (
                input &&
                input.form &&
                input.form.hasAttribute("data-validate") &&
                isValidatable(input) &&
                input.classList.contains("is-invalid")
            ) {
                validateInput(input);
            }
        },
        true
    );

    // Re-check a required checkbox group when a box is toggled.
    document.addEventListener(
        "change",
        function (e) {
            var input = e.target;
            if (!input || input.type !== "checkbox" || !input.form || !input.form.hasAttribute("data-validate")) {
                return;
            }
            var group = input.closest("[data-require-one]");
            if (group && group.querySelector(".field__error[data-client-error]")) {
                validateGroup(group);
            }
        },
        true
    );
})();
