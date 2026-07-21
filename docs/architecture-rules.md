# Architecture Rules

These rules are mandatory for every module and use case in this project. They
encode the centralized Service Layer + Modular Monolith architecture approved for
the New Me Admin & Operations Platform.

1. Do not place business logic in Web Controllers, API Controllers, Blade,
   Livewire, Inertia pages, Form Requests, API Resources, Jobs, or Listeners.

2. Every use case must have one central application service shared by Web and API.

3. Controllers may only receive validated input, authorize, map to a DTO,
   call one application service, and return an HTTP response.

4. Application services must not depend on HTTP Request, JsonResponse,
   RedirectResponse, View, session, or route helpers.

5. Pricing, tax, discounts, stock changes, state transitions, scheduling,
   refunds, and payment processing must exist only in services/rules.

6. Database transactions belong inside the service responsible for the use case.

7. Use explicit enums and transition validation. Never update a status directly
   from a generic CRUD controller.

8. Payment, SMS, WhatsApp, email, delivery, and storage providers must use contracts.

9. Webhooks must be signature-verified and idempotent.

10. Events and queued listeners are for side effects and must not duplicate
    the core business decision.

11. Jobs call services instead of reimplementing business logic.

12. API Resources format output only.

13. Form Requests perform input validation, not transactional business validation.

14. Never trust totals, prices, discounts, tax, eligibility, stock, or status
    values sent by the frontend.

15. Every critical use case requires success, authorization, validation,
    business-rule rejection, and concurrency tests where relevant.

16. Do not create a repository for every model. Use repositories selectively.

17. Split large services by use case. Do not create god services.

18. All financial amounts use integer minor units and one Money utility.

19. Every sensitive state-changing endpoint creates an audit entry.

20. Before coding a module, read the BRD and identify rules, entities, states,
    permissions, events, and acceptance criteria.

## Foundation-specific conventions (Phase 0)

- Shared Money and rounding utilities live in `app/Support/Money`. There is no
  separate Pricing module; order pricing belongs to Orders, plan/subscription
  pricing belongs to Plans.
- Money is an immutable value object stored in integer minor units. Floating
  point is prohibited in Money arithmetic.
- DTOs extend `App\Support\Dto\Data`, are immutable, and never depend on HTTP.
- Business errors extend `App\Support\Exceptions\DomainException` and declare a
  stable `ApiErrorCode` and HTTP status.
- All API responses use the standard envelope built by
  `App\Support\Http\Responses\ApiResponse` and carry a `request_id`.
- API exceptions are mapped to the error envelope centrally in `bootstrap/app.php`.

## Localization & translation

The project uses two complementary translation systems. Each has a single,
non-overlapping responsibility. **Do not store the same content in both.**

1. **Laravel Localization** (built in, no package) — for *static application
   text*: UI labels, buttons, validation messages, system messages, errors, and
   notifications.
    - Translation files live under `lang/ar/` and `lang/en/`.
    - Access via `__('...')` / `trans('...')`; never hardcode user-facing text.

2. **spatie/laravel-translatable** — for *dynamic database content*: products,
   categories, plans, meals, articles, banners, and CMS pages.
    - Translatable attributes are stored as JSON columns on the model.
    - Models use the `Spatie\Translatable\HasTranslations` trait and declare
      `$translatable`.

Rule: Laravel Localization is for static application text; spatie/laravel-translatable
is for translatable Eloquent model attributes stored in the database. Static
strings never go into the database, and dynamic model content never goes into
`lang/` files.

## Validation (two layers, always with clear messages)

Every input is validated on **two** layers, and both must always produce clear,
human-readable, localized (ar/en) error messages.

1. **Frontend (JavaScript)** — immediate UX feedback before submit.
    - Implemented with `public/js/validation.js` (vanilla JS, no build step).
    - Enable per form by adding `data-validate` to the `<form>`.
    - Rules are declared with standard attributes (`required`, `type="email"`,
      `minlength`, `maxlength`, `pattern`) or `data-*` (`data-rule`,
      `data-match`, `data-message-required`, `data-message-pattern`).
    - Errors render inside the field's `.field__error` element and mark the input
      with `.is-invalid`.

2. **Backend (Form Requests)** — the source of truth and a hard security
   boundary. Frontend validation is never trusted.
    - All request validation lives in a `FormRequest` (`rules()`), never in
      controllers or services.
    - Provide clear messages via `messages()` and readable field names via
      `attributes()` whenever the framework defaults are not obvious.
    - Server messages come from `lang/{ar,en}/validation.php`; failed API
      validation is returned through the standard error envelope
      (`VALIDATION_FAILED`, HTTP 422) with per-field `details`.

Rule: Frontend validation improves UX only; the backend Form Request always
re-validates. Both layers must return specific, explanatory messages — never a
generic "invalid input".

## Confirmation dialogs

Never use the browser's native `confirm()`/`alert()`. All confirmations use
**SweetAlert2** through the shared, declarative handler in `public/js/confirm.js`.

- Opt in by adding `data-confirm` to the `<form>` (or element) that triggers the
  action, plus the localized `data-confirm-title`, `data-confirm-text`,
  `data-confirm-button`, and `data-confirm-cancel` attributes.
- `data-confirm-type` sets the visual state: `warning` (default), `info`,
  `success`, or `danger`.
- **Destructive actions (delete/remove) MUST use `data-confirm-type="danger"`.**
- All dialog text is localized (ar/en) via `lang/*`; the JS never hardcodes copy.
- If SweetAlert2 fails to load, the handler falls back to native `confirm()` so a
  destructive action is never performed without acknowledgement.
