<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Subscriptions\Models\Subscription.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Subscriptions\Models\Subscription
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-9e3621965d4780586fd1be1a34949644ff21ef95950f87144a6ca06840661591',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
        'filename' => 'D:/newme/newme/app/Modules/Subscriptions/Models/Subscription.php',
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
 * @property Carbon|null $handled_at
 * @property string $mode
 * @property array<int, string> $meal_types
 * @property string $duration_unit
 * @property int $duration_length
 * @property int $total_days
 * @property array<int, int>|null $selected_days
 * @property list<array{date: string, meals: array<string, string|null>}>|null $meal_schedule
 * @property list<array{date: string, meals: array<string, string|null>}>|null $paused_schedule
 * @property Carbon|null $start_date
 * @property Carbon|null $health_birth_date
 * @property string|null $health_allergies
 * @property string|null $health_medications
 * @property Carbon|null $pause_started_on
 * @property Carbon|null $paused_at
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
    'startLine' => 66,
    'endLine' => 364,
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
          'code' => '[\'public_id\', \'user_id\', \'address_id\', \'shipping_address\', \'plan_id\', \'plan_name\', \'status\', \'handling_status\', \'handled_by\', \'handled_at\', \'mode\', \'meal_types\', \'duration_unit\', \'duration_length\', \'total_days\', \'selected_days\', \'meal_schedule\', \'paused_schedule\', \'start_date\', \'health_birth_date\', \'health_allergies\', \'health_medications\', \'pause_started_on\', \'paused_at\', \'currency\', \'coupon_id\', \'coupon_code\', \'subtotal_minor\', \'discount_minor\', \'coupon_discount_minor\', \'delivery_fee_minor\', \'tax_minor\', \'total_minor\', \'per_day_minor\', \'payment_method\', \'payment_status\']',
          'attributes' => 
          array (
            'startLine' => 74,
            'endLine' => 111,
            'startTokenPos' => 140,
            'startFilePos' => 2558,
            'endTokenPos' => 250,
            'endFilePos' => 3430,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 74,
        'endLine' => 111,
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
        'startLine' => 113,
        'endLine' => 120,
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
        'startLine' => 122,
        'endLine' => 125,
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
        'startLine' => 130,
        'endLine' => 157,
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
        'startLine' => 159,
        'endLine' => 162,
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
        'startLine' => 167,
        'endLine' => 170,
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
        'startLine' => 177,
        'endLine' => 180,
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
        'startLine' => 185,
        'endLine' => 188,
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
        'startLine' => 201,
        'endLine' => 204,
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
        'startLine' => 209,
        'endLine' => 212,
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
        'startLine' => 214,
        'endLine' => 217,
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
        'startLine' => 219,
        'endLine' => 222,
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
        'startLine' => 224,
        'endLine' => 227,
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
        'startLine' => 229,
        'endLine' => 232,
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
        'startLine' => 234,
        'endLine' => 237,
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
        'startLine' => 242,
        'endLine' => 245,
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
      'hasMealSchedule' => 
      array (
        'name' => 'hasMealSchedule',
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
        'startLine' => 247,
        'endLine' => 250,
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
      'isPaused' => 
      array (
        'name' => 'isPaused',
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
        'startLine' => 252,
        'endLine' => 255,
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
      'allowsPause' => 
      array (
        'name' => 'allowsPause',
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
 * Whether this subscription\'s plan permits temporary pause.
 *
 * Subscriptions without a linked plan keep the historical default (allowed).
 */',
        'startLine' => 262,
        'endLine' => 271,
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
      'frozenDaysCount' => 
      array (
        'name' => 'frozenDaysCount',
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
 * Number of delivery days currently frozen by a pause.
 */',
        'startLine' => 276,
        'endLine' => 279,
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
      'scheduleDaysWithPauseState' => 
      array (
        'name' => 'scheduleDaysWithPauseState',
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
 * Active + frozen days for admin/customer display (paused days flagged).
 *
 * When paused, never fall back to a full skeleton — that would reintroduce
 * the frozen days as "active" and show duplicates.
 *
 * @return list<array{date: string, weekday: string, label: string, paused: bool, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}>
 */',
        'startLine' => 289,
        'endLine' => 324,
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
      'endDate' => 
      array (
        'name' => 'endDate',
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
                  'name' => 'Illuminate\\Support\\Carbon',
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
        'docComment' => '/**
 * Last scheduled delivery date (active days only).
 */',
        'startLine' => 329,
        'endLine' => 344,
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
      'mealScheduleDays' => 
      array (
        'name' => 'mealScheduleDays',
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
 * Calendar-ready dish picks for the admin view and PDF.
 *
 * Falls back to a skeleton from start date / weekdays / meal types when the
 * wizard did not persist per-day dish names.
 *
 * @return list<array{date: string, weekday: string, label: string, meals: list<array{type: string, label: string, dish: string, is_chef: bool}>}>
 */',
        'startLine' => 354,
        'endLine' => 363,
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