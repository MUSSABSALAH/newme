<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Promotions\Models\Coupon.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Promotions\Models\Coupon
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-3e6590f40b6c59c5ab9900cac7fa9122b08be50a2a5a885edd4929ffdd24704d',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'filename' => 'C:/newme/app/Modules/Promotions/Models/Coupon.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Promotions\\Models',
    'name' => 'App\\Modules\\Promotions\\Models\\Coupon',
    'shortName' => 'Coupon',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $public_id
 * @property string $code
 * @property array<string, string>|null $name
 * @property CouponType $type
 * @property CouponScope $scope
 * @property string|null $percent_off
 * @property int|null $amount_off_minor
 * @property int $min_subtotal_minor
 * @property int|null $max_discount_minor
 * @property int|null $max_redemptions
 * @property int|null $max_redemptions_per_user
 * @property int $redemptions_count
 * @property Carbon|null $starts_at
 * @property Carbon|null $expires_at
 * @property bool $is_active
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 37,
    'endLine' => 177,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      1 => 'Spatie\\Translatable\\HasTranslations',
      2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'code\', \'name\', \'type\', \'scope\', \'percent_off\', \'amount_off_minor\', \'min_subtotal_minor\', \'max_discount_minor\', \'max_redemptions\', \'max_redemptions_per_user\', \'redemptions_count\', \'starts_at\', \'expires_at\', \'is_active\']',
          'attributes' => 
          array (
            'startLine' => 45,
            'endLine' => 61,
            'startTokenPos' => 103,
            'startFilePos' => 1292,
            'endTokenPos' => 150,
            'endFilePos' => 1651,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 45,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'translatable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'name' => 'translatable',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '[\'name\']',
          'attributes' => 
          array (
            'startLine' => 66,
            'endLine' => 66,
            'startTokenPos' => 163,
            'startFilePos' => 1729,
            'endTokenPos' => 165,
            'endFilePos' => 1736,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 66,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 42,
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
        'startLine' => 68,
        'endLine' => 75,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
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
            'name' => 'Database\\Factories\\CouponFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 77,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
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
        'startLine' => 85,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
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
        'startLine' => 103,
        'endLine' => 106,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'redemptions' => 
      array (
        'name' => 'redemptions',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return HasMany<CouponRedemption, $this>
 */',
        'startLine' => 111,
        'endLine' => 114,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'normalizeCode' => 
      array (
        'name' => 'normalizeCode',
        'parameters' => 
        array (
          'code' => 
          array (
            'name' => 'code',
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
            'startLine' => 119,
            'endLine' => 119,
            'startColumn' => 42,
            'endColumn' => 53,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Codes are compared case-insensitively; storage is always upper case.
 */',
        'startLine' => 119,
        'endLine' => 122,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'label' => 
      array (
        'name' => 'label',
        'parameters' => 
        array (
          'locale' => 
          array (
            'name' => 'locale',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 124,
                'endLine' => 124,
                'startTokenPos' => 471,
                'startFilePos' => 3260,
                'endTokenPos' => 471,
                'endFilePos' => 3263,
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 124,
            'endLine' => 124,
            'startColumn' => 27,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
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
        'startLine' => 124,
        'endLine' => 141,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'percentBasisPoints' => 
      array (
        'name' => 'percentBasisPoints',
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
        'startLine' => 143,
        'endLine' => 146,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'amountOff' => 
      array (
        'name' => 'amountOff',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Support\\Money\\Money',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 148,
        'endLine' => 151,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'minSubtotal' => 
      array (
        'name' => 'minSubtotal',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Support\\Money\\Money',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 153,
        'endLine' => 156,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'maxDiscount' => 
      array (
        'name' => 'maxDiscount',
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
                  'name' => 'App\\Support\\Money\\Money',
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
        'startLine' => 158,
        'endLine' => 163,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'isExhausted' => 
      array (
        'name' => 'isExhausted',
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
        'startLine' => 165,
        'endLine' => 169,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'aliasName' => NULL,
      ),
      'valueDisplay' => 
      array (
        'name' => 'valueDisplay',
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
        'startLine' => 171,
        'endLine' => 176,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\Models',
        'declaringClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
        'currentClassName' => 'App\\Modules\\Promotions\\Models\\Coupon',
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