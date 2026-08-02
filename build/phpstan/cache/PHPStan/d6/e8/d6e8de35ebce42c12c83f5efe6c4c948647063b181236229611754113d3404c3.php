<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Plans\Seeders\PlanSeeder.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Plans\Seeders\PlanSeeder
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-810d2f3f0a400059dc62e1a41c18f5f0d51243a22bf96cda571a331943cba0fe',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'filename' => 'C:/newme/app/Modules/Plans/Seeders/PlanSeeder.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Plans\\Seeders',
    'name' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
    'shortName' => 'PlanSeeder',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Seeds the 10 dietary programs from the public subscribe wizard
 * (`lang/{ar,en}/website.php` → `subscribe.plans`) with pricing aligned to
 * the website calculator (12 SAR / meal, weekly / monthly / quarterly).
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 21,
    'endLine' => 229,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Seeder',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
      'BasePerMealMinor' => 
      array (
        'declaringClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'implementingClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'name' => 'BasePerMealMinor',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '1200',
          'attributes' => 
          array (
            'startLine' => 24,
            'endLine' => 24,
            'startTokenPos' => 79,
            'startFilePos' => 773,
            'endTokenPos' => 79,
            'endFilePos' => 776,
          ),
        ),
        'docComment' => '/** Website BASE price per dish in minor units (12.00 SAR). */',
        'attributes' => 
        array (
        ),
        'startLine' => 24,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
      'DeliveryDaysPerWeek' => 
      array (
        'declaringClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'implementingClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'name' => 'DeliveryDaysPerWeek',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '5',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 92,
            'startFilePos' => 895,
            'endTokenPos' => 92,
            'endFilePos' => 895,
          ),
        ),
        'docComment' => '/** Assumed delivery days/week baked into the seeded base price. */',
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'run' => 
      array (
        'name' => 'run',
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
        'startLine' => 29,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Plans\\Seeders',
        'declaringClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'implementingClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'currentClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'aliasName' => NULL,
      ),
      'plans' => 
      array (
        'name' => 'plans',
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
 * @return list<array{goal: PlanGoal, name: array<string, string>, description: array<string, string>, image: string}>
 */',
        'startLine' => 49,
        'endLine' => 143,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Plans\\Seeders',
        'declaringClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'implementingClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'currentClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'aliasName' => NULL,
      ),
      'seedPlan' => 
      array (
        'name' => 'seedPlan',
        'parameters' => 
        array (
          'goal' => 
          array (
            'name' => 'goal',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 149,
            'endLine' => 149,
            'startColumn' => 31,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'name' => 
          array (
            'name' => 'name',
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
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 149,
            'endLine' => 149,
            'startColumn' => 47,
            'endColumn' => 57,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'description' => 
          array (
            'name' => 'description',
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
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 149,
            'endLine' => 149,
            'startColumn' => 60,
            'endColumn' => 77,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
          'imagePath' => 
          array (
            'name' => 'imagePath',
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
            'startLine' => 149,
            'endLine' => 149,
            'startColumn' => 80,
            'endColumn' => 96,
            'parameterIndex' => 3,
            'isOptional' => false,
          ),
          'sortOrder' => 
          array (
            'name' => 'sortOrder',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'int',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 149,
            'endLine' => 149,
            'startColumn' => 99,
            'endColumn' => 112,
            'parameterIndex' => 4,
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
 * @param  array<string, string>  $name
 * @param  array<string, string>  $description
 */',
        'startLine' => 149,
        'endLine' => 228,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Plans\\Seeders',
        'declaringClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'implementingClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
        'currentClassName' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
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