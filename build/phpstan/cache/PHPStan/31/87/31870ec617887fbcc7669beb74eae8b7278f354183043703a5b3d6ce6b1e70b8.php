<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Subscriptions\Models\Subscription.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Subscriptions\Models\Subscription
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-ad9d793109889757793832c6496129026edfec52de37f986f260836bd0a841ec',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'filename' => 'C:/newme/app/Modules/Subscriptions/Models/Subscription.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Subscriptions\\Models',
    'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
    'shortName' => 'Subscription',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property int|null $address_id
 * @property array<string, mixed>|null $shipping_address
 * @property int|null $plan_id
 * @property string $plan_name
 * @property SubscriptionStatus $status
 * @property HandlingStatus $handling_status
 * @property int|null $handled_by
 * @property \\Illuminate\\Support\\Carbon|null $handled_at
 * @property string $mode
 * @property array<int, string> $meal_types
 * @property string $duration_unit
 * @property int $duration_length
 * @property int $total_days
 * @property array<int, int>|null $selected_days
 * @property \\Illuminate\\Support\\Carbon|null $start_date
 * @property string $currency
 * @property int|null $coupon_id
 * @property string|null $coupon_code
 * @property int $subtotal_minor
 * @property int $discount_minor
 * @property int $coupon_discount_minor
 * @property int $delivery_fee_minor
 * @property int $tax_minor
 * @property int $total_minor
 * @property int $per_day_minor
 * @property PaymentMethod|null $payment_method
 * @property PaymentStatus $payment_status
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 57,
    'endLine' => 225,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'user_id\', \'address_id\', \'shipping_address\', \'plan_id\', \'plan_name\', \'status\', \'handling_status\', \'handled_by\', \'handled_at\', \'mode\', \'meal_types\', \'duration_unit\', \'duration_length\', \'total_days\', \'selected_days\', \'start_date\', \'currency\', \'coupon_id\', \'coupon_code\', \'subtotal_minor\', \'discount_minor\', \'coupon_discount_minor\', \'delivery_fee_minor\', \'tax_minor\', \'total_minor\', \'per_day_minor\', \'payment_method\', \'payment_status\']',
          'attributes' => 
          array (
            'startLine' => 65,
            'endLine' => 95,
            'startTokenPos' => 130,
            'startFilePos' => 2114,
            'endTokenPos' => 219,
            'endFilePos' => 2798,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 65,
        'endLine' => 95,
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
        'startLine' => 97,
        'endLine' => 104,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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
            'name' => 'Database\\Factories\\SubscriptionFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 106,
        'endLine' => 109,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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
        'startLine' => 114,
        'endLine' => 136,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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
        'startLine' => 138,
        'endLine' => 141,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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
        'startLine' => 146,
        'endLine' => 149,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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
 * The staff member who last moved the handling state along.
 *
 * @return BelongsTo<User, $this>
 */',
        'startLine' => 156,
        'endLine' => 159,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'plan' => 
      array (
        'name' => 'plan',
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
 * @return BelongsTo<Plan, $this>
 */',
        'startLine' => 164,
        'endLine' => 167,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'address' => 
      array (
        'name' => 'address',
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
 * @return BelongsTo<Address, $this>
 */',
        'startLine' => 172,
        'endLine' => 175,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'payments' => 
      array (
        'name' => 'payments',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return MorphMany<Payment, $this>
 */',
        'startLine' => 180,
        'endLine' => 183,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'reference' => 
      array (
        'name' => 'reference',
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
        'docComment' => '/**
 * Short human-facing code, e.g. "A1B2C3".
 */',
        'startLine' => 188,
        'endLine' => 191,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'deliveryAddress' => 
      array (
        'name' => 'deliveryAddress',
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
                  'name' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
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
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 193,
        'endLine' => 196,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'totalDisplay' => 
      array (
        'name' => 'totalDisplay',
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
        'startLine' => 198,
        'endLine' => 201,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'perDayDisplay' => 
      array (
        'name' => 'perDayDisplay',
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
        'startLine' => 203,
        'endLine' => 206,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'couponDiscountDisplay' => 
      array (
        'name' => 'couponDiscountDisplay',
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
        'startLine' => 208,
        'endLine' => 211,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'hasCouponDiscount' => 
      array (
        'name' => 'hasCouponDiscount',
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
        'startLine' => 213,
        'endLine' => 216,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'aliasName' => NULL,
      ),
      'needsHandling' => 
      array (
        'name' => 'needsHandling',
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
 * Whether the request still needs someone from the team to act on it.
 */',
        'startLine' => 221,
        'endLine' => 224,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Models',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
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