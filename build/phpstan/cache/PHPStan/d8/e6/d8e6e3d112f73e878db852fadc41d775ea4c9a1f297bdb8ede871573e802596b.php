<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Plans\Models\PlanPricingRule.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Plans\Models\PlanPricingRule
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-b10ee0d950f8e45ec57bf8482bb8844fac158628ee57f06fb60931e9661fdf4a',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'filename' => 'D:/newme/newme/app/Modules/Plans/Models/PlanPricingRule.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Plans\\Models',
    'name' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
    'shortName' => 'PlanPricingRule',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A single pricing entry: the package price for a (meal-types x duration)
 * combination, with an optional duration discount.
 *
 * @property int $id
 * @property int $plan_version_id
 * @property array<int, string> $meal_types
 * @property string $meal_types_key
 * @property DurationUnit $duration_unit
 * @property int $duration_length
 * @property int $price
 * @property string $discount_percent
 * @property bool $is_active
 * @property int $sort_order
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 30,
    'endLine' => 115,
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
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'plan_version_id\', \'meal_types\', \'meal_types_key\', \'duration_unit\', \'duration_length\', \'price\', \'discount_percent\', \'is_active\', \'sort_order\']',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 48,
            'startTokenPos' => 77,
            'startFilePos' => 1021,
            'endTokenPos' => 106,
            'endFilePos' => 1242,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 48,
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
            'name' => 'Database\\Factories\\PlanPricingRuleFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 50,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
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
        'startLine' => 58,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'aliasName' => NULL,
      ),
      'version' => 
      array (
        'name' => 'version',
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
 * @return BelongsTo<PlanVersion, $this>
 */',
        'startLine' => 74,
        'endLine' => 77,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'aliasName' => NULL,
      ),
      'mealTypes' => 
      array (
        'name' => 'mealTypes',
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
 * The meal types included in this pricing option, as enum cases.
 *
 * @return list<MealType>
 */',
        'startLine' => 84,
        'endLine' => 96,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'aliasName' => NULL,
      ),
      'priceMoney' => 
      array (
        'name' => 'priceMoney',
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
        'startLine' => 98,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'aliasName' => NULL,
      ),
      'discountBasisPoints' => 
      array (
        'name' => 'discountBasisPoints',
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
 * Discount expressed in basis points (10000 = 100%).
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
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'aliasName' => NULL,
      ),
      'totalDays' => 
      array (
        'name' => 'totalDays',
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
        'startLine' => 111,
        'endLine' => 114,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
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