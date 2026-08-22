<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Contracts\PaymentGateway.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Contracts\PaymentGateway
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-aee7ac0c61ea91f3dc6ef1dda59e782cc759d84d1c0def8516532d13310e8d6f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Contracts/PaymentGateway.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Contracts',
    'name' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
    'shortName' => 'PaymentGateway',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * The seam a real payment provider plugs into.
 *
 * Implementations answer with a {@see ChargeResult} instead of throwing, so the
 * caller treats a decline as a normal outcome rather than an error.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 16,
    'endLine' => 26,
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
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
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
        'startLine' => 18,
        'endLine' => 18,
        'startColumn' => 5,
        'endColumn' => 35,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Contracts',
        'declaringClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
        'docComment' => '/**
 * Hosted providers send the customer off-site instead of taking a card here.
 */',
        'startLine' => 23,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 47,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Contracts',
        'declaringClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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
            'startLine' => 25,
            'endLine' => 25,
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
        'startLine' => 25,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 65,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Contracts',
        'declaringClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Contracts\\PaymentGateway',
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