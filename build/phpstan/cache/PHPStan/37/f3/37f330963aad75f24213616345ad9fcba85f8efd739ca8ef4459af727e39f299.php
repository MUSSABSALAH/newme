<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Checkout\Services\CheckoutDraftService.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Checkout\Services\CheckoutDraftService
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-23207e1c793c18995330666f3477a050d51246158cc1ef27cbd796754cb62efd',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'filename' => 'C:/newme/app/Modules/Checkout/Services/CheckoutDraftService.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Checkout\\Services',
    'name' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
    'shortName' => 'CheckoutDraftService',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Keeps the pending subscribe-wizard selection in the session.
 *
 * The store cart already survives a sign-in round trip this way; a subscription
 * draft gets the same treatment so a guest can be sent to the login page and
 * come back without losing their choices.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 17,
    'endLine' => 54,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
      'SESSION_KEY' => 
      array (
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'name' => 'SESSION_KEY',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'checkout_subscription_draft\'',
          'attributes' => 
          array (
            'startLine' => 19,
            'endLine' => 19,
            'startTokenPos' => 43,
            'startFilePos' => 516,
            'endTokenPos' => 43,
            'endFilePos' => 544,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 5,
        'endColumn' => 62,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'putSubscription' => 
      array (
        'name' => 'putSubscription',
        'parameters' => 
        array (
          'draft' => 
          array (
            'name' => 'draft',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 21,
            'endLine' => 21,
            'startColumn' => 37,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 21,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Checkout\\Services',
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'currentClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'aliasName' => NULL,
      ),
      'subscription' => 
      array (
        'name' => 'subscription',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
          'data' => 
          array (
            'types' => 
            array (
              0 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'App\\Modules\\Checkout\\DTOs\\SubscriptionDraft',
                  'isIdentifier' => false,
                ),
              ),
              1 => 
              array (
                'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                'data' => 
                array (
                  'name' => 'null',
                  'isIdentifier' => true,
                ),
              ),
            ),
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 26,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Checkout\\Services',
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'currentClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'aliasName' => NULL,
      ),
      'hasSubscription' => 
      array (
        'name' => 'hasSubscription',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 37,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Checkout\\Services',
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'currentClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'aliasName' => NULL,
      ),
      'forgetSubscription' => 
      array (
        'name' => 'forgetSubscription',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 42,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Checkout\\Services',
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'currentClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'aliasName' => NULL,
      ),
      'source' => 
      array (
        'name' => 'source',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Checkout\\Enums\\CheckoutSource',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * A parked subscription always wins: the customer left the wizard for it.
 */',
        'startLine' => 50,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Checkout\\Services',
        'declaringClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'implementingClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'currentClassName' => 'App\\Modules\\Checkout\\Services\\CheckoutDraftService',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));