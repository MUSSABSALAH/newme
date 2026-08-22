<?php declare(strict_types = 1);

// ftm-D:\newme\newme\app\Modules\Subscriptions\Services\SubscriptionService.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.3',
   'data' => 
  array (
    0 => 
    array (
      'd6826635aa4f766544612699f8fda46c' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      'b3cd801a74e0cbb65e306c3e71e6a892' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => '__construct',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      '2ce73a6acd868bfc3c77b5cf764521c2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => 'createFromQuote',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      'c2e6965d9766ae635c5748d0dc6c7007' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => 'updateHandling',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      '276099ce31b293b26c92e9d161ace801' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => 'settle',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      'b9619ae1f12cbc06f336c5206d52de72' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => 'pause',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      '4ebd8469faeb7ea198f66956a62db16d' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Services',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
          'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
          'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
          'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'validationexception' => 'Illuminate\\Validation\\ValidationException',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
         'functionName' => 'resume',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Services',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
            'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
            'healthprofile' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'coupon' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'couponredemptionservice' => 'App\\Modules\\Promotions\\Services\\CouponRedemptionService',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'subscriptionpauserules' => 'App\\Modules\\Subscriptions\\Support\\SubscriptionPauseRules',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'db' => 'Illuminate\\Support\\Facades\\DB',
            'validationexception' => 'Illuminate\\Validation\\ValidationException',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Services\\SubscriptionService',
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
      'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Services\\SubscriptionService.php' => '40855336588798eddb44003dd33f37e9e724039a23045a125330f0a399dac7ca',
    ),
  ),
));