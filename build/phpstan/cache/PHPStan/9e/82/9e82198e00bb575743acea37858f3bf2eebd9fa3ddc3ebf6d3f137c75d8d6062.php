<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Gateways\SimulatedGateway.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Gateways\SimulatedGateway
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-6f5199e7e8f5110a8b716907e4dd18d5c3328d032066e0435138efe91e128c8f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Gateways/SimulatedGateway.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Gateways',
    'name' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
    'shortName' => 'SimulatedGateway',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Stand-in provider used until a real gateway is wired up.
 *
 * Outcomes are deterministic so demos and tests behave the same way. Card
 * numbers whose last four digits match a configured pattern are declined:
 *
 *   0002 → card declined      0069 → expired card
 *   0119 → insufficient funds 0127 → invalid card
 *
 * Anything else that passes the Luhn check and is not past its expiry is
 * approved.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 26,
    'endLine' => 98,
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
      'DECLINE_SUFFIXES' => 
      array (
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'name' => 'DECLINE_SUFFIXES',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '[\'0002\' => \\App\\Modules\\Payments\\Enums\\PaymentDecline::CardDeclined, \'0069\' => \\App\\Modules\\Payments\\Enums\\PaymentDecline::ExpiredCard, \'0119\' => \\App\\Modules\\Payments\\Enums\\PaymentDecline::InsufficientFunds, \'0127\' => \\App\\Modules\\Payments\\Enums\\PaymentDecline::InvalidCard]',
          'attributes' => 
          array (
            'startLine' => 31,
            'endLine' => 36,
            'startTokenPos' => 69,
            'startFilePos' => 910,
            'endTokenPos' => 107,
            'endFilePos' => 1111,
          ),
        ),
        'docComment' => '/**
 * @var array<string, PaymentDecline>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 36,
        'startColumn' => 5,
        'endColumn' => 6,
      ),
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
        'startLine' => 38,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
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
        'startLine' => 43,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
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
            'startLine' => 48,
            'endLine' => 48,
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
        'startLine' => 48,
        'endLine' => 77,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Gateways',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'aliasName' => NULL,
      ),
      'passesLuhn' => 
      array (
        'name' => 'passesLuhn',
        'parameters' => 
        array (
          'number' => 
          array (
            'name' => 'number',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 79,
            'endLine' => 79,
            'startColumn' => 33,
            'endColumn' => 46,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 79,
        'endLine' => 97,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Payments\\Gateways',
        'declaringClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'implementingClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
        'currentClassName' => 'App\\Modules\\Payments\\Gateways\\SimulatedGateway',
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