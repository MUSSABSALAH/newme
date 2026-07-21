/**
 * Reusable confirmation dialogs (SweetAlert2).
 *
 * General rule: never rely on the browser's default confirm(). Any action that
 * needs confirmation should opt in declaratively:
 *
 *   <form method="POST" action="..."
 *         data-confirm
 *         data-confirm-type="danger"            (danger | warning | info | success; default: warning)
 *         data-confirm-title="..."
 *         data-confirm-text="..."
 *         data-confirm-button="..."
 *         data-confirm-cancel="...">
 *
 * Destructive actions (delete) MUST use data-confirm-type="danger".
 */
(function () {
    var TYPE_COLORS = {
        danger: '#e5564a',
        warning: '#e6a100',
        info: '#4b93d1',
        success: '#34b37a',
    };

    function optionsFor(el) {
        var type = el.getAttribute('data-confirm-type') || 'warning';
        var icon = type === 'danger' ? 'warning' : type;

        return {
            title: el.getAttribute('data-confirm-title') || 'Are you sure?',
            text: el.getAttribute('data-confirm-text') || '',
            icon: icon,
            showCancelButton: true,
            confirmButtonText: el.getAttribute('data-confirm-button') || 'OK',
            cancelButtonText: el.getAttribute('data-confirm-cancel') || 'Cancel',
            confirmButtonColor: TYPE_COLORS[type] || TYPE_COLORS.warning,
            cancelButtonColor: '#8a857d',
            reverseButtons: true,
            focusCancel: type === 'danger',
        };
    }

    document.addEventListener('submit', function (event) {
        var form = event.target;

        if (!(form instanceof HTMLFormElement) || !form.hasAttribute('data-confirm')) {
            return;
        }

        if (form.dataset.confirmed === 'true') {
            return;
        }

        event.preventDefault();

        var options = optionsFor(form);

        function proceed() {
            form.dataset.confirmed = 'true';
            form.submit();
        }

        if (typeof window.Swal === 'undefined') {
            if (window.confirm(options.title)) {
                proceed();
            }

            return;
        }

        window.Swal.fire(options).then(function (result) {
            if (result.isConfirmed) {
                proceed();
            }
        });
    });
}());
