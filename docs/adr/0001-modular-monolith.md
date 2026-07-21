# ADR 0001: Modular Monolith with a Centralized Service Layer

- Status: Accepted
- Date: 2026-07-16

## Context

The New Me Admin & Operations Platform must serve both a Web admin panel and a
versioned API from a single, shared body of business logic. The BRD mandates that
business rules (pricing, inventory, subscriptions, payments, scheduling, state
transitions) are never duplicated across delivery mechanisms, and explicitly rules
out microservices for the first release.

## Decision

We build a **Modular Monolith** in Laravel 12 with a **centralized application
Service Layer**:

- Business logic lives in application/domain services grouped by module under
  `app/Modules/*` (introduced as modules are implemented).
- Web controllers and API controllers are thin and call the same services.
- Controllers only validate (via Form Requests), authorize (via Policies/Gates),
  map validated input to typed DTOs, invoke one service, and return a response.
- Multi-table operations run inside database transactions within services.
- External providers (payments, SMS, WhatsApp, delivery, storage) sit behind
  contracts, introduced only when a real boundary exists.
- Cross-cutting concerns (money, API envelope, request id, localization,
  exception mapping) live under `app/Support` and framework configuration.

We explicitly avoid, in Phase 0: a shared Pricing module, an Audit module or
skeleton, `config/modules.php`, a generic ModuleServiceProvider, Result wrapper
classes, Money Eloquent casts, authentication, roles/permissions, repositories,
provider contracts, generic state-machine abstractions, and any business module.

## Consequences

- One source of truth for each use case keeps Web, API, and future clients
  consistent.
- The codebase stays deployable as a single unit while preserving clear module
  boundaries that could later be extracted if ever justified.
- Discipline is required to keep controllers thin and logic inside services; the
  rules in `docs/architecture-rules.md` are enforced in review and by static
  analysis.
- Shared primitives (Money, DTO base, API response, exception base) are created
  once in Foundation and reused everywhere, preventing divergence.
