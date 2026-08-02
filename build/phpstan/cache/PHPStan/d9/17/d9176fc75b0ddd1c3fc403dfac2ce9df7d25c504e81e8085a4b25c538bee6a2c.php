<?php declare(strict_types = 1);

// ftm-C:\newme\app\Http\Controllers\Web\CheckoutController.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.2',
   'data' => 
  array (
    0 => 
    array (
      '4f1964ecee6cb929a294321e772ae251' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      'a275b779127b22fed1df73c7bf6c25d8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      'f44ee1d063858b8b75cb07ebc6f7639a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'startSubscription',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      '41a0870d1b5879852266e199c0809877' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'destroySubscription',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      'f877ab12e8ea6097d7df512fa6c7840b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'show',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      '709a370410ca2730e66ac83646920223' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'storeAddress',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      'deb4b02c83dac74fb6c51f6a16855c82' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'store',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      '7373dfac7b10fa615e7b500815b9239d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Http\\Controllers\\Web',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
          'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
          'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
          'user' => 'App\\Models\\User',
          'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
          'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
          'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
          'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
          'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
          'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
          'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'view' => 'Illuminate\\Contracts\\View\\View',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
        ),
         'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
         'functionName' => 'methods',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Http\\Controllers\\Web',
           'uses' => 
          array (
            'controller' => 'App\\Http\\Controllers\\Controller',
            'subscriberequest' => 'App\\Http\\Requests\\Web\\Account\\SubscribeRequest',
            'addressrequest' => 'App\\Http\\Requests\\Web\\Checkout\\AddressRequest',
            'placeorderrequest' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
            'user' => 'App\\Models\\User',
            'addressdata' => 'App\\Modules\\Addresses\\DTOs\\AddressData',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'addressservice' => 'App\\Modules\\Addresses\\Services\\AddressService',
            'subscriptiondraft' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
            'nothingtocheckoutexception' => 'App\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException',
            'checkoutdraftservice' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
            'checkoutservice' => 'App\\Modules\\Checkout\\Services\\CheckoutService',
            'emptycartexception' => 'App\\Modules\\Orders\\Exceptions\\EmptyCartException',
            'carddetails' => 'App\\Modules\\Payments\\DTOs\\CardDetails',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentdeclinedexception' => 'App\\Modules\\Payments\\Exceptions\\PaymentDeclinedException',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'view' => 'Illuminate\\Contracts\\View\\View',
            'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
            'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
            'auth' => 'Illuminate\\Support\\Facades\\Auth',
          ),
           'className' => 'App\\Http\\Controllers\\Web\\CheckoutController',
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
      'C:\\newme\\app\\Http\\Controllers\\Web\\CheckoutController.php' => '9271f886c3f51d43f9454bb4cbbc87245f14625348391cd7d662f5f82f2bcba4',
    ),
  ),
));