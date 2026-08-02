<?php declare(strict_types = 1);

// odsl-C:\newme\app\Http\Controllers\Web\WebsiteController.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Http\Controllers\Web\WebsiteController
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-d4d79b84939af7f4b3348cd55a8b0a5bb9861f0683fa0cc2b5f78fd6a6c93205',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'filename' => 'C:/newme/app/Http/Controllers/Web/WebsiteController.php',
      ),
    ),
    'namespace' => 'App\\Http\\Controllers\\Web',
    'name' => 'App\\Http\\Controllers\\Web\\WebsiteController',
    'shortName' => 'WebsiteController',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 20,
    'endLine' => 538,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'App\\Http\\Controllers\\Controller',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
      'PLAN_ICONS' => 
      array (
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'name' => 'PLAN_ICONS',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '[\'muscle\' => \'i-dumbbell\', \'loss\' => \'i-flame\', \'balance\' => \'i-target\', \'diabetic\' => \'i-drop\', \'feeding\' => \'i-heart\', \'gut\' => \'i-bowl\', \'lowcarb\' => \'i-wheat\', \'keto\' => \'i-bolt\', \'vegan\' => \'i-leaf\', \'carnivore\' => \'i-flame\']',
          'attributes' => 
          array (
            'startLine' => 23,
            'endLine' => 34,
            'startTokenPos' => 95,
            'startFilePos' => 696,
            'endTokenPos' => 167,
            'endFilePos' => 1012,
          ),
        ),
        'docComment' => '/** Plan-card icon per website slug (matches the wizard\'s inline SVG defs). */',
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 6,
      ),
    ),
    'immediateProperties' => 
    array (
      'pricing' => 
      array (
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'name' => 'pricing',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 9,
        'endColumn' => 52,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'settings' => 
      array (
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'name' => 'settings',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Settings\\Services\\SettingsService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
        'startColumn' => 9,
        'endColumn' => 50,
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
          'pricing' => 
          array (
            'name' => 'pricing',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 37,
            'endLine' => 37,
            'startColumn' => 9,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'settings' => 
          array (
            'name' => 'settings',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Settings\\Services\\SettingsService',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 38,
            'endLine' => 38,
            'startColumn' => 9,
            'endColumn' => 50,
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
        'startLine' => 36,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 8,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'home' => 
      array (
        'name' => 'home',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 41,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'main' => 
      array (
        'name' => 'main',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 46,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'store' => 
      array (
        'name' => 'store',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 53,
        'endLine' => 56,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'subscribe' => 
      array (
        'name' => 'subscribe',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 58,
        'endLine' => 71,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'menu' => 
      array (
        'name' => 'menu',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 73,
        'endLine' => 81,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'blog' => 
      array (
        'name' => 'blog',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
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
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'product' => 
      array (
        'name' => 'product',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
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
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'productShow' => 
      array (
        'name' => 'productShow',
        'parameters' => 
        array (
          'product' => 
          array (
            'name' => 'product',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Store\\Models\\Product',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 93,
            'endLine' => 93,
            'startColumn' => 33,
            'endColumn' => 48,
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
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 93,
        'endLine' => 129,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'consult' => 
      array (
        'name' => 'consult',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 131,
        'endLine' => 134,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'terms' => 
      array (
        'name' => 'terms',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 136,
        'endLine' => 139,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websitePlans' => 
      array (
        'name' => 'websitePlans',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Active, published plans shaped for the public website (wizard + menu).
 *
 * @return Collection<int, array<string, mixed>>
 */',
        'startLine' => 146,
        'endLine' => 151,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websitePlan' => 
      array (
        'name' => 'websitePlan',
        'parameters' => 
        array (
          'plan' => 
          array (
            'name' => 'plan',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Plans\\Models\\Plan',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 158,
            'endLine' => 158,
            'startColumn' => 34,
            'endColumn' => 43,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * A single plan shaped for the public website.
 *
 * @return array<string, mixed>
 */',
        'startLine' => 158,
        'endLine' => 173,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websitePlansData' => 
      array (
        'name' => 'websitePlansData',
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
 * Per-plan wizard data keyed by website slug: durations (from the published
 * pricing matrix, grouped by meal-type combination) and the selectable meal
 * catalog grouped by meal type. All money is in integer minor units.
 *
 * @return array<string, array<string, mixed>>
 */',
        'startLine' => 182,
        'endLine' => 201,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'pricingMatrix' => 
      array (
        'name' => 'pricingMatrix',
        'parameters' => 
        array (
          'version' => 
          array (
            'name' => 'version',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Plans\\Models\\PlanVersion',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 208,
            'endLine' => 208,
            'startColumn' => 36,
            'endColumn' => 55,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Duration options per meal-type combination for a published version.
 *
 * @return array<string, list<array{unit: string, length: int, total_days: int, price: int, discount: string, label: string}>>
 */',
        'startLine' => 208,
        'endLine' => 230,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'planMeals' => 
      array (
        'name' => 'planMeals',
        'parameters' => 
        array (
          'plan' => 
          array (
            'name' => 'plan',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Plans\\Models\\Plan',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 237,
            'endLine' => 237,
            'startColumn' => 32,
            'endColumn' => 41,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * A plan\'s selectable meals grouped by meal type.
 *
 * @return array<string, list<array{name: string, image_url: string|null, calories: int, protein: int, carbs: int, fat: int}>>
 */',
        'startLine' => 237,
        'endLine' => 263,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'financeConfig' => 
      array (
        'name' => 'financeConfig',
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
 * Finance settings the client needs to mirror server-side pricing.
 *
 * @return array{tax_rate: float, include_tax: bool, currency: string}
 */',
        'startLine' => 270,
        'endLine' => 279,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'activePublishedPlans' => 
      array (
        'name' => 'activePublishedPlans',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return Collection<int, Plan>
 */',
        'startLine' => 284,
        'endLine' => 293,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websiteShopPreview' => 
      array (
        'name' => 'websiteShopPreview',
        'parameters' => 
        array (
          'limit' => 
          array (
            'name' => 'limit',
            'default' => 
            array (
              'code' => '4',
              'attributes' => 
              array (
                'startLine' => 300,
                'endLine' => 300,
                'startTokenPos' => 1863,
                'startFilePos' => 9352,
                'endTokenPos' => 1863,
                'endFilePos' => 9352,
              ),
            ),
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
            'startLine' => 300,
            'endLine' => 300,
            'startColumn' => 41,
            'endColumn' => 54,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Featured (or latest) products for the home-page shop preview strip.
 *
 * @return list<array<string, mixed>>
 */',
        'startLine' => 300,
        'endLine' => 343,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websiteStore' => 
      array (
        'name' => 'websiteStore',
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
 * Store catalog shaped for the public store page: category tabs, the bakery
 * subcategory row, and every active product with its display fields.
 *
 * @return array{tabs: list<array<string, mixed>>, subs: list<array<string, string>>, products: list<array<string, mixed>>, total: int}
 */',
        'startLine' => 351,
        'endLine' => 415,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websiteStoreProduct' => 
      array (
        'name' => 'websiteStoreProduct',
        'parameters' => 
        array (
          'product' => 
          array (
            'name' => 'product',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Store\\Models\\Product',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 422,
            'endLine' => 422,
            'startColumn' => 42,
            'endColumn' => 57,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Shape a single product for the store grid (filter attributes + display).
 *
 * @return array<string, mixed>
 */',
        'startLine' => 422,
        'endLine' => 454,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websiteProductDetail' => 
      array (
        'name' => 'websiteProductDetail',
        'parameters' => 
        array (
          'product' => 
          array (
            'name' => 'product',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Store\\Models\\Product',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 461,
            'endLine' => 461,
            'startColumn' => 43,
            'endColumn' => 58,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * A single product shaped for the product-detail page.
 *
 * @return array<string, mixed>
 */',
        'startLine' => 461,
        'endLine' => 484,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'trimDecimal' => 
      array (
        'name' => 'trimDecimal',
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
            'startLine' => 489,
            'endLine' => 489,
            'startColumn' => 34,
            'endColumn' => 47,
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
 * Drop trailing zeros from a decimal string ("12.10" => "12.1", "4.00" => "4").
 */',
        'startLine' => 489,
        'endLine' => 500,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'aliasName' => NULL,
      ),
      'websiteMeals' => 
      array (
        'name' => 'websiteMeals',
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
 * Active meals grouped by type, shaped for the public menu grid.
 *
 * Each dish tuple is [name, description, calories, protein, carbs, fat, image_url]
 * to match the menu page\'s rendering contract.
 *
 * @return array<string, list<array{0: string, 1: string, 2: int, 3: int, 4: int, 5: int, 6: string|null}>>
 */',
        'startLine' => 510,
        'endLine' => 537,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Controllers\\Web',
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'currentClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
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