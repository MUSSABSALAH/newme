<?php declare(strict_types = 1);

// ftm-C:\newme\app\Modules\Checkout\Services\CheckoutService.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.2',
   'data' => 
  array (
    0 => 
    array (
      '7eb74fcb47130025a329185a2c55174e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'aaf28bdba08a536f2e1523c0f4b828c3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '420fb039f6189e3e16d1e914f1b3072c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'source',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b1c6731a64de996820dcb16b1a372614' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'summary',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'caaa212904d46088f836089d2d9767e2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'place',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '67c92f9969f80c826f597fac14d36c6f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'placeOrder',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '88021e0993e1908cfbe882ef5bc54ad9' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'placeSubscription',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c6fb3d26c4b5c335436bb367a4481061' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'cartSummary',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3f816751d8c7719ed9dc4f2b6261fc9a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'subscriptionSummary',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8ac334f706c1d860c8ac82af62df80ad' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'plan',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '57ae7270016e75854aca213cc7576566' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'quote',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6c3981e25fd80c6820de054f64decf95' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Checkout\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
          'money' => 'App\\Support\\Money\\Money',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'db' => 'Illuminate\\Support\\Facades\\DB',
        ),
         'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
         'functionName' => 'confirmationRoute',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Checkout\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'checkoutsummary' => 'App\\Modules\\Checkout\\DTOs\\CheckoutSummary',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'checkoutsource' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'adminnotifier' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
            'order' => 'App\\Modules\\Orders\\Models\\Order',
            'orderservice' => 'App\\Modules\\Orders\\Services\\OrderService',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'paymentservice' => 'App\\Modules\\Payments\\Services\\PaymentService',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'cartservice' => 'App\\Modules\\Store\\Services\\CartService',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'subscriptionservice' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
            'money' => 'App\\Support\\Money\\Money',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'db' => 'Illuminate\\Support\\Facades\\DB',
          ),
           'className' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
    ),
    1 => 
    array (
      'C:\\newme\\app\\Modules\\Checkout\\Services\\CheckoutService.php' => '7b9979766c3e94e80f10c5d6e84f88638d7a58ad5326792bdf92449616fe59d9',
    ),
  ),
));