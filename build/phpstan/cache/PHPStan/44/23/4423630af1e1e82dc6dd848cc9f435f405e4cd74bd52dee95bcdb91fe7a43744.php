<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Plans\Models\PlanVersion.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Plans\Models\PlanVersion
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-f27388294aeca047b8e698f06bccd5184807929d7732567c4e8646d64cd9df4d',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'filename' => 'C:/newme/app/Modules/Plans/Models/PlanVersion.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Plans\\Models',
    'name' => 'App\\Modules\\Plans\\Models\\PlanVersion',
    'shortName' => 'PlanVersion',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $plan_id
 * @property int $version_number
 * @property PlanVersionStatus $status
 * @property Carbon|null $published_at
 * @property int|null $created_by
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 24,
    'endLine' => 92,
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
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'plan_id\', \'version_number\', \'status\', \'published_at\', \'created_by\']',
          'attributes' => 
          array (
            'startLine' => 32,
            'endLine' => 38,
            'startTokenPos' => 82,
            'startFilePos' => 783,
            'endTokenPos' => 99,
            'endFilePos' => 898,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 38,
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
            'name' => 'Database\\Factories\\PlanVersionFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 40,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
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
        'startLine' => 48,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
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
        'startLine' => 60,
        'endLine' => 63,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'aliasName' => NULL,
      ),
      'creator' => 
      array (
        'name' => 'creator',
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
        'startLine' => 68,
        'endLine' => 71,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'aliasName' => NULL,
      ),
      'pricingRules' => 
      array (
        'name' => 'pricingRules',
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
 * @return HasMany<PlanPricingRule, $this>
 */',
        'startLine' => 76,
        'endLine' => 81,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'aliasName' => NULL,
      ),
      'isDraft' => 
      array (
        'name' => 'isDraft',
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
        'startLine' => 83,
        'endLine' => 86,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'aliasName' => NULL,
      ),
      'isPublished' => 
      array (
        'name' => 'isPublished',
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
        'startLine' => 88,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Models',
        'declaringClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'implementingClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
        'currentClassName' => 'App\\Modules\\Plans\\Models\\PlanVersion',
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