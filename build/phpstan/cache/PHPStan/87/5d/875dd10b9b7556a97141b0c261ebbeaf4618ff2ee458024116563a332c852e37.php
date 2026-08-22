<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Delivery\Models\SubscriptionDelivery.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Delivery\Models\SubscriptionDelivery
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-a0e0aba7df0722e9660272aadd7d9db5e1d7503b98833f3ff7f3a05493533228',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'filename' => 'D:/newme/newme/app/Modules/Delivery/Models/SubscriptionDelivery.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Delivery\\Models',
    'name' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
    'shortName' => 'SubscriptionDelivery',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * What happened to one subscription delivery day.
 *
 * The schedule itself lives on the subscription; this record only exists once
 * someone from the shipping team has acted on a day, which keeps the table as
 * small as the work actually done.
 *
 * @property int $id
 * @property string $public_id
 * @property int $subscription_id
 * @property Carbon $delivery_date
 * @property DeliveryStatus $status
 * @property Carbon|null $dispatched_at
 * @property Carbon|null $delivered_at
 * @property string|null $failure_reason
 * @property int|null $handled_by
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 35,
    'endLine' => 110,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'subscription_id\', \'delivery_date\', \'status\', \'dispatched_at\', \'delivered_at\', \'failure_reason\', \'handled_by\']',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 52,
            'startTokenPos' => 92,
            'startFilePos' => 1275,
            'endTokenPos' => 118,
            'endFilePos' => 1478,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      'booted' => 
      array (
        'name' => 'booted',
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
        'startLine' => 54,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'aliasName' => NULL,
      ),
      'newFactory' => 
      array (
        'name' => 'newFactory',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Database\\Factories\\SubscriptionDeliveryFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 63,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'aliasName' => NULL,
      ),
      'casts' => 
      array (
        'name' => 'casts',
        'parameters' => 
        array (
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
 * @return array<string, string>
 */',
        'startLine' => 71,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'aliasName' => NULL,
      ),
      'getRouteKeyName' => 
      array (
        'name' => 'getRouteKeyName',
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
        'startLine' => 81,
        'endLine' => 84,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'aliasName' => NULL,
      ),
      'setDeliveryDateAttribute' => 
      array (
        'name' => 'setDeliveryDateAttribute',
        'parameters' => 
        array (
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
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
                      'name' => 'DateTimeInterface',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'string',
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
            'startLine' => 90,
            'endLine' => 90,
            'startColumn' => 46,
            'endColumn' => 76,
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
        'docComment' => '/**
 * Keep the column date-only: a stored midnight would break plain date
 * lookups and the one-record-per-day index.
 */',
        'startLine' => 90,
        'endLine' => 93,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
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
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return BelongsTo<Subscription, $this>
 */',
        'startLine' => 98,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'aliasName' => NULL,
      ),
      'handler' => 
      array (
        'name' => 'handler',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return BelongsTo<User, $this>
 */',
        'startLine' => 106,
        'endLine' => 109,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\Models',
        'declaringClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'implementingClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
        'currentClassName' => 'App\\Modules\\Delivery\\Models\\SubscriptionDelivery',
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