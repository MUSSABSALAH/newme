<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Payments\Models\Payment.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Payments\Models\Payment
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-3b2ea0293884d02fb28aecba99d7ad4ef44bb37f9e5a0654ce7c1a15486a448f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Payments\\Models\\Payment',
        'filename' => 'D:/newme/newme/app/Modules/Payments/Models/Payment.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Payments\\Models',
    'name' => 'App\\Modules\\Payments\\Models\\Payment',
    'shortName' => 'Payment',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * One charge attempt against an order or a subscription.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property string $payable_type
 * @property int $payable_id
 * @property PaymentMethod $method
 * @property PaymentStatus $status
 * @property string $currency
 * @property int $amount_minor
 * @property string $gateway
 * @property string|null $gateway_reference
 * @property string|null $card_brand
 * @property string|null $card_last4
 * @property PaymentDecline|null $decline_reason
 * @property \\Illuminate\\Support\\Carbon|null $paid_at
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 36,
    'endLine' => 118,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
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
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'user_id\', \'payable_type\', \'payable_id\', \'method\', \'status\', \'currency\', \'amount_minor\', \'gateway\', \'gateway_reference\', \'card_brand\', \'card_last4\', \'decline_reason\', \'paid_at\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 56,
            'startTokenPos' => 80,
            'startFilePos' => 1125,
            'endTokenPos' => 124,
            'endFilePos' => 1434,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 56,
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
        'startLine' => 58,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
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
        'startLine' => 70,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
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
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'aliasName' => NULL,
      ),
      'user' => 
      array (
        'name' => 'user',
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
        'startLine' => 89,
        'endLine' => 92,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'aliasName' => NULL,
      ),
      'payable' => 
      array (
        'name' => 'payable',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return MorphTo<Model, $this>
 */',
        'startLine' => 97,
        'endLine' => 100,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'aliasName' => NULL,
      ),
      'amountDisplay' => 
      array (
        'name' => 'amountDisplay',
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
        'startLine' => 102,
        'endLine' => 105,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'aliasName' => NULL,
      ),
      'cardLabel' => 
      array (
        'name' => 'cardLabel',
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'docComment' => '/**
 * A masked card label such as "visa •••• 4242".
 */',
        'startLine' => 110,
        'endLine' => 117,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Payments\\Models',
        'declaringClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'implementingClassName' => 'App\\Modules\\Payments\\Models\\Payment',
        'currentClassName' => 'App\\Modules\\Payments\\Models\\Payment',
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