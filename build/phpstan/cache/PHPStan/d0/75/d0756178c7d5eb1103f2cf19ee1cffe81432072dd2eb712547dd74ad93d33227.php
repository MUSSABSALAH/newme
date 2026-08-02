<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Promotions\DTOs\AppliedCoupon.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Promotions\DTOs\AppliedCoupon
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-86df1fdc06d90497c66d74626a69aed82d36cae897f78f62e77b844fca776830',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'filename' => 'C:/newme/app/Modules/Promotions/DTOs/AppliedCoupon.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Promotions\\DTOs',
    'name' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
    'shortName' => 'AppliedCoupon',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 65568,
    'docComment' => '/**
 * A validated coupon together with the discount it produces for one basket.
 *
 * The discount is always recomputed by the server; it is never accepted from a
 * client and never cached across requests.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 16,
    'endLine' => 27,
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
      'coupon' => 
      array (
        'declaringClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'name' => 'coupon',
        'modifiers' => 2049,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Promotions\\Models\\Coupon',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 9,
        'endColumn' => 29,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'discount' => 
      array (
        'declaringClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'name' => 'discount',
        'modifiers' => 2049,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Support\\Money\\Money',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 20,
        'endLine' => 20,
        'startColumn' => 9,
        'endColumn' => 30,
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
          'coupon' => 
          array (
            'name' => 'coupon',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Promotions\\Models\\Coupon',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 9,
            'endColumn' => 29,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'discount' => 
          array (
            'name' => 'discount',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Support\\Money\\Money',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 20,
            'endLine' => 20,
            'startColumn' => 9,
            'endColumn' => 30,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 18,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\DTOs',
        'declaringClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'currentClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'aliasName' => NULL,
      ),
      'code' => 
      array (
        'name' => 'code',
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
        'startLine' => 23,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Promotions\\DTOs',
        'declaringClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'implementingClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
        'currentClassName' => 'App\\Modules\\Promotions\\DTOs\\AppliedCoupon',
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