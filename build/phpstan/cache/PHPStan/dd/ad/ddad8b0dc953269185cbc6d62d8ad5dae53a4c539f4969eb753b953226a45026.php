<?php declare(strict_types = 1);

// osfsl-C:/newme/tests/Concerns/PlacesCheckout.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Tests\Concerns\PlacesCheckout
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-40acc1973f5b2142fbc32a92a6d2b7e0dd4fe4d9657021b8984279e8b088f7c2-8.2.12-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Tests\\Concerns\\PlacesCheckout',
        'filename' => 'C:/newme/tests/Concerns/PlacesCheckout.php',
      ),
    ),
    'namespace' => 'Tests\\Concerns',
    'name' => 'Tests\\Concerns\\PlacesCheckout',
    'shortName' => 'PlacesCheckout',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Helpers for driving the checkout the way a customer does: park what is being
 * bought, then post the address, the payment method and the card.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 16,
    'endLine' => 65,
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
      'APPROVED_CARD' => 
      array (
        'declaringClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'implementingClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'name' => 'APPROVED_CARD',
        'modifiers' => 2,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'4242424242424242\'',
          'attributes' => 
          array (
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 53,
            'startFilePos' => 483,
            'endTokenPos' => 53,
            'endFilePos' => 500,
          ),
        ),
        'docComment' => '/**
 * A card the simulated gateway approves.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 55,
      ),
      'DECLINED_CARD' => 
      array (
        'declaringClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'implementingClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'name' => 'DECLINED_CARD',
        'modifiers' => 2,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'4000000000000002\'',
          'attributes' => 
          array (
            'startLine' => 26,
            'endLine' => 26,
            'startTokenPos' => 66,
            'startFilePos' => 602,
            'endTokenPos' => 66,
            'endFilePos' => 619,
          ),
        ),
        'docComment' => '/**
 * A card the simulated gateway declines.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 26,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 55,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'addressFor' => 
      array (
        'name' => 'addressFor',
        'parameters' => 
        array (
          'user' => 
          array (
            'name' => 'user',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\User',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 28,
            'endLine' => 28,
            'startColumn' => 35,
            'endColumn' => 44,
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
            'name' => 'App\\Modules\\Addresses\\Models\\Address',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 28,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Tests\\Concerns',
        'declaringClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'implementingClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'currentClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'aliasName' => NULL,
      ),
      'placeOrderPayload' => 
      array (
        'name' => 'placeOrderPayload',
        'parameters' => 
        array (
          'address' => 
          array (
            'name' => 'address',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Addresses\\Models\\Address',
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
            'startColumn' => 42,
            'endColumn' => 57,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'overrides' => 
          array (
            'name' => 'overrides',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 39,
                'endLine' => 39,
                'startTokenPos' => 135,
                'startFilePos' => 974,
                'endTokenPos' => 136,
                'endFilePos' => 975,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
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
            'startColumn' => 60,
            'endColumn' => 80,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<string, mixed>  $overrides
 * @return array<string, mixed>
 */',
        'startLine' => 39,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Tests\\Concerns',
        'declaringClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'implementingClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'currentClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'aliasName' => NULL,
      ),
      'placeOrder' => 
      array (
        'name' => 'placeOrder',
        'parameters' => 
        array (
          'user' => 
          array (
            'name' => 'user',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\User',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 35,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'address' => 
          array (
            'name' => 'address',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 56,
                'endLine' => 56,
                'startTokenPos' => 257,
                'startFilePos' => 1556,
                'endTokenPos' => 257,
                'endFilePos' => 1559,
              ),
            ),
            'type' => 
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
                      'name' => 'App\\Modules\\Addresses\\Models\\Address',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 47,
            'endColumn' => 70,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'overrides' => 
          array (
            'name' => 'overrides',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 56,
                'endLine' => 56,
                'startTokenPos' => 266,
                'startFilePos' => 1581,
                'endTokenPos' => 267,
                'endFilePos' => 1582,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 73,
            'endColumn' => 93,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Testing\\TestResponse',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  array<string, mixed>  $overrides
 */',
        'startLine' => 56,
        'endLine' => 64,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Tests\\Concerns',
        'declaringClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'implementingClassName' => 'Tests\\Concerns\\PlacesCheckout',
        'currentClassName' => 'Tests\\Concerns\\PlacesCheckout',
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