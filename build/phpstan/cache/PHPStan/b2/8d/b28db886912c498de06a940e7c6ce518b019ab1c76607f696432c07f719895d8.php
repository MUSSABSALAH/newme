<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Contracts\HostedPaymentGateway.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Contracts\HostedPaymentGateway
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-153f548a09acc9eb2dae5ad09a529d0a91638eec736973646311f871c40e676c',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Contracts/HostedPaymentGateway.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Contracts',
    'name' => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
    'shortName' => 'HostedPaymentGateway',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A gateway that sends the customer to a hosted payment page and then back.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 13,
    'endLine' => 19,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'startLine' => 18,
            'endLine' => 18,
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
        'docComment' => '/**
 * Read the browser return after the customer leaves the hosted page.
 */',
        'startLine' => 18,
        'endLine' => 18,
        'startColumn' => 5,
        'endColumn' => 67,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Contracts',
        'declaringClassName' => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Contracts\\HostedPaymentGateway',
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