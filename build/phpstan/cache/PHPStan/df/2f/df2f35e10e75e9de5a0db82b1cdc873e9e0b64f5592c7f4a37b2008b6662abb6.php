<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Delivery\DTOs\DeliveryBoard.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Delivery\DTOs\DeliveryBoard
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-b3e31c149bf955068b8172230decde1488badd4b84da338ba54a4721a432e371',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'filename' => 'D:/newme/newme/app/Modules/Delivery/DTOs/DeliveryBoard.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Delivery\\DTOs',
    'name' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
    'shortName' => 'DeliveryBoard',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Everything the shipping team has to hand over on one day.
 *
 * Two sources feed the same board: store orders, which carry their own
 * fulfillment status, and subscription delivery days, which are schedule
 * entries with a delivery record attached once they are worked on.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 78,
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
      'date' => 
      array (
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'name' => 'date',
        'modifiers' => 2177,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Carbon',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 26,
        'endLine' => 26,
        'startColumn' => 9,
        'endColumn' => 36,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'stops' => 
      array (
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'name' => 'stops',
        'modifiers' => 2177,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 9,
        'endColumn' => 36,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'orders' => 
      array (
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'name' => 'orders',
        'modifiers' => 2177,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 28,
        'endLine' => 28,
        'startColumn' => 9,
        'endColumn' => 42,
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
          'date' => 
          array (
            'name' => 'date',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Carbon',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 26,
            'endLine' => 26,
            'startColumn' => 9,
            'endColumn' => 36,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'stops' => 
          array (
            'name' => 'stops',
            'default' => NULL,
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
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 27,
            'endLine' => 27,
            'startColumn' => 9,
            'endColumn' => 36,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'orders' => 
          array (
            'name' => 'orders',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Collection',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 28,
            'endLine' => 28,
            'startColumn' => 9,
            'endColumn' => 42,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  list<SubscriptionStop>  $stops
 * @param  Collection<int, Order>  $orders
 */',
        'startLine' => 25,
        'endLine' => 29,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'isEmpty' => 
      array (
        'name' => 'isEmpty',
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
        'startLine' => 31,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'total' => 
      array (
        'name' => 'total',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 36,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'remaining' => 
      array (
        'name' => 'remaining',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Still to be handed over — the number the officer works down to zero.
 */',
        'startLine' => 44,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'done' => 
      array (
        'name' => 'done',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 49,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'stopsRemaining' => 
      array (
        'name' => 'stopsRemaining',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 54,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'ordersRemaining' => 
      array (
        'name' => 'ordersRemaining',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 62,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'aliasName' => NULL,
      ),
      'ordersOnTheRoad' => 
      array (
        'name' => 'ordersOnTheRoad',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Orders already on the road, worth calling out separately from the queue.
 */',
        'startLine' => 72,
        'endLine' => 77,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\DTOs',
        'declaringClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'implementingClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
        'currentClassName' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
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