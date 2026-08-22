<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Gateways\PayTabs\PayTabsSdkClient.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Gateways\PayTabs\PayTabsSdkClient
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-472bd8f0152fedb9072687f95ee602409f651388aaaa3aac8a6656564e181b43',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Gateways/PayTabs/PayTabsSdkClient.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
    'name' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
    'shortName' => 'PayTabsSdkClient',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Talks to PayTabs through the official Laravel SDK.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 35,
    'endLine' => 129,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'createHostedPage' => 
      array (
        'name' => 'createHostedPage',
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
            'startLine' => 37,
            'endLine' => 37,
            'startColumn' => 38,
            'endColumn' => 59,
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
        'startLine' => 37,
        'endLine' => 108,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'aliasName' => NULL,
      ),
      'parseBrowserReturn' => 
      array (
        'name' => 'parseBrowserReturn',
        'parameters' => 
        array (
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
        'startLine' => 110,
        'endLine' => 119,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => true,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'aliasName' => NULL,
      ),
      'paymentMethod' => 
      array (
        'name' => 'paymentMethod',
        'parameters' => 
        array (
          'method' => 
          array (
            'name' => 'method',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 121,
            'endLine' => 121,
            'startColumn' => 36,
            'endColumn' => 56,
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
            'name' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 121,
        'endLine' => 128,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
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