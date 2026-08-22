<?php declare(strict_types = 1);

// ftm-D:\newme\newme\app\Http\Controllers\Web\CheckoutController.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.3',
   'data' => 
  array (
    0 => 
    array (
      'c36e8cf7925ab8006987a76a86240c59' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '0b1e98d7e984a992c4d1926181f8552e' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '118161bcaa2ed4c9a5ef30d18b50cad2' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '943ef3afd58fa6447d34ffa0202f5e2e' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '121dea054cd61e28aec8c0608594bd3f' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '46a0293178cd1e6a966faec747377806' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      '0201289fb17795a25e3194c44cdb7891' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      'e9d7e4ef33c01e16ba02adc3053669ba' => 
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
          'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'paymentgateway' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
      'D:\\newme\\newme\\app\\Http\\Controllers\\Web\\CheckoutController.php' => 'fbce809722414d0004be3c9245764f15dec9f8565acdf8f74818cdecf27ce9db',
    ),
  ),
));