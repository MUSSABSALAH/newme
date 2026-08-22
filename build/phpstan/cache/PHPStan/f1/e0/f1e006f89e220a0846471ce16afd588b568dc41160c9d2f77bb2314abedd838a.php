<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Gateways\PayTabs\PayTabsGateway.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Gateways\PayTabs\PayTabsGateway
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-9a8167559fc523628028d7a30f608bcd3ee5b66c23319317d1ebfed378915ef7',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Gateways/PayTabs/PayTabsGateway.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
    'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
    'shortName' => 'PayTabsGateway',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * PayTabs hosted checkout: create a payment page, send the customer there, then
 * finish the charge from the browser return and the server-to-server IPN.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 43,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'client' => 
      array (
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'name' => 'client',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 9,
        'endColumn' => 46,
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
          'client' => 
          array (
            'name' => 'client',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 21,
            'endLine' => 21,
            'startColumn' => 9,
            'endColumn' => 46,
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
        'startLine' => 20,
        'endLine' => 22,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'aliasName' => NULL,
      ),
      'name' => 
      array (
        'name' => 'name',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 24,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'aliasName' => NULL,
      ),
      'usesHostedCheckout' => 
      array (
        'name' => 'usesHostedCheckout',
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
        'startLine' => 29,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'aliasName' => NULL,
      ),
      'charge' => 
      array (
        'name' => 'charge',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 34,
            'endLine' => 34,
            'startColumn' => 28,
            'endColumn' => 49,
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
            'name' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 34,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'aliasName' => NULL,
      ),
      'parseReturn' => 
      array (
        'name' => 'parseReturn',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Http\\Request',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 39,
            'endLine' => 39,
            'startColumn' => 33,
            'endColumn' => 48,
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
            'name' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 39,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsGateway',
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