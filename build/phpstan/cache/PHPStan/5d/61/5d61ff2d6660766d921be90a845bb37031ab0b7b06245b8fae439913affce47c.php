<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Promotions\Models\CouponRedemption.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Promotions\Models\CouponRedemption
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-5cbc26be5a791a54599458b2a441d7150ed1311c2ab935fe1f3ec5574dc159fa',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'filename' => 'D:/newme/newme/app/Modules/Promotions/Models/CouponRedemption.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Promotions\\Models',
    'name' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
    'shortName' => 'CouponRedemption',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A single use of a coupon, tied to the order or subscription it discounted.
 *
 * @property int $id
 * @property int $coupon_id
 * @property int $user_id
 * @property string $redeemable_type
 * @property int $redeemable_id
 * @property int $discount_minor
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 74,
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
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'coupon_id\', \'user_id\', \'redeemable_type\', \'redeemable_id\', \'discount_minor\']',
          'attributes' => 
          array (
            'startLine' => 28,
            'endLine' => 34,
            'startTokenPos' => 60,
            'startFilePos' => 644,
            'endTokenPos' => 77,
            'endFilePos' => 768,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 28,
        'endLine' => 34,
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
        'startLine' => 39,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'aliasName' => NULL,
      ),
      'coupon' => 
      array (
        'name' => 'coupon',
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
 * @return BelongsTo<Coupon, $this>
 */',
        'startLine' => 49,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
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
        'startLine' => 57,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'aliasName' => NULL,
      ),
      'redeemable' => 
      array (
        'name' => 'redeemable',
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
        'startLine' => 65,
        'endLine' => 68,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'aliasName' => NULL,
      ),
      'discountDisplay' => 
      array (
        'name' => 'discountDisplay',
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
        'startLine' => 70,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\CouponRedemption',
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