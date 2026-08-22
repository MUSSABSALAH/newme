<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Gateways\PayTabs\PayTabsIpnHandler.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Gateways\PayTabs\PayTabsIpnHandler
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-b4c211e1d213893b7d0a3ac16a87ff43377964e587543de31592dc29dca5955e',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Gateways/PayTabs/PayTabsIpnHandler.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
    'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
    'shortName' => 'PayTabsIpnHandler',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Applies a verified PayTabs IPN to the matching payment.
 *
 * Signature checks happen in the official SDK before this class runs.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 40,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'completions' => 
      array (
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'name' => 'completions',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Payments\\Services\\CompletePaymentService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 22,
        'endLine' => 22,
        'startColumn' => 9,
        'endColumn' => 60,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'completions' => 
          array (
            'name' => 'completions',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Payments\\Services\\CompletePaymentService',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 22,
            'endLine' => 22,
            'startColumn' => 9,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 21,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'aliasName' => NULL,
      ),
      'handleIpn' => 
      array (
        'name' => 'handleIpn',
        'parameters' => 
        array (
          'transactionResult' => 
          array (
            'name' => 'transactionResult',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Response\\Responses\\Webhook\\AbstractTransactionResult',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 26,
            'endLine' => 26,
            'startColumn' => 9,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'mappedPayload' => 
          array (
            'name' => 'mappedPayload',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Callbacks\\Ipn',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 27,
            'endLine' => 27,
            'startColumn' => 9,
            'endColumn' => 26,
            'parameterIndex' => 1,
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
        'startLine' => 25,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsIpnHandler',
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