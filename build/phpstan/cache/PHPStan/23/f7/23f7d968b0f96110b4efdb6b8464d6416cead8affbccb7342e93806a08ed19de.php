<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Http\Controllers\Web\WebsiteController.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Http\Controllers\Web\WebsiteController
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-feb91c4f2c757ded9e1232e246b5d5eade7168837405f8f9399346985e7fc48f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'filename' => 'D:/newme/newme/app/Http/Controllers/Web/WebsiteController.php',
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
    'startLine' => 29,
    'endLine' => 641,
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
            'startLine' => 32,
            'endLine' => 43,
            'startTokenPos' => 140,
            'startFilePos' => 1094,
            'endTokenPos' => 212,
            'endFilePos' => 1410,
          ),
        ),
        'docComment' => '/** Plan-card icon per website slug (matches the wizard\'s inline SVG defs). */',
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 43,
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
        'startLine' => 46,
        'endLine' => 46,
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
        'startLine' => 47,
        'endLine' => 47,
        'startColumn' => 9,
        'endColumn' => 50,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'consultationSchedule' => 
      array (
        'declaringClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'implementingClassName' => 'App\\Http\\Controllers\\Web\\WebsiteController',
        'name' => 'consultationSchedule',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Settings\\Support\\ConsultationSchedule',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 48,
        'endLine' => 48,
        'startColumn' => 9,
        'endColumn' => 67,
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
            'startLine' => 46,
            'endLine' => 46,
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
            'startLine' => 47,
            'endLine' => 47,
            'startColumn' => 9,
            'endColumn' => 50,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'consultationSchedule' => 
          array (
            'name' => 'consultationSchedule',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Settings\\Support\\ConsultationSchedule',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 48,
            'endLine' => 48,
            'startColumn' => 9,
            'endColumn' => 67,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 45,
        'endLine' => 49,
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
        'startLine' => 51,
        'endLine' => 54,
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
        'startLine' => 56,
        'endLine' => 73,
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
        'startLine' => 75,
        'endLine' => 78,
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
        'startLine' => 80,
        'endLine' => 97,
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
        'startLine' => 99,
        'endLine' => 107,
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
        'startLine' => 109,
        'endLine' => 123,
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
        'startLine' => 125,
        'endLine' => 128,
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
            'startLine' => 130,
            'endLine' => 130,
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
        'startLine' => 130,
        'endLine' => 166,
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
        'startLine' => 168,
        'endLine' => 182,
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
      'bookedConsultationStarts' => 
      array (
        'name' => 'bookedConsultationStarts',
        'parameters' => 
        array (
          'daysAhead' => 
          array (
            'name' => 'daysAhead',
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
            'startLine' => 189,
            'endLine' => 189,
            'startColumn' => 47,
            'endColumn' => 60,
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
 * Occupied slot starts keyed by Y-m-d for the public booking UI.
 *
 * @return array<string, list<string>>
 */',
        'startLine' => 189,
        'endLine' => 213,
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
        'startLine' => 215,
        'endLine' => 218,
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
      'savedHealthProfile' => 
      array (
        'name' => 'savedHealthProfile',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Identity\\DTOs\\HealthProfile',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Health details the signed-in customer already shared, so the wizard can
 * offer them back instead of asking again.
 */',
        'startLine' => 224,
        'endLine' => 229,
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
        'startLine' => 236,
        'endLine' => 241,
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
            'startLine' => 248,
            'endLine' => 248,
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
        'startLine' => 248,
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
        'startLine' => 272,
        'endLine' => 291,
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
            'startLine' => 298,
            'endLine' => 298,
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
        'startLine' => 298,
        'endLine' => 320,
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
            'startLine' => 327,
            'endLine' => 327,
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
        'startLine' => 327,
        'endLine' => 353,
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
        'startLine' => 360,
        'endLine' => 369,
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
      'operationsConfig' => 
      array (
        'name' => 'operationsConfig',
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
 * Operations knobs the subscribe wizard must honour.
 *
 * @return array{min_start_days: int, min_start_date: string}
 */',
        'startLine' => 376,
        'endLine' => 382,
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
        'startLine' => 387,
        'endLine' => 396,
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
                'startLine' => 403,
                'endLine' => 403,
                'startTokenPos' => 2532,
                'startFilePos' => 12924,
                'endTokenPos' => 2532,
                'endFilePos' => 12924,
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
            'startLine' => 403,
            'endLine' => 403,
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
        'startLine' => 403,
        'endLine' => 446,
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
        'startLine' => 454,
        'endLine' => 518,
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
            'startLine' => 525,
            'endLine' => 525,
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
        'startLine' => 525,
        'endLine' => 557,
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
            'startLine' => 564,
            'endLine' => 564,
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
        'startLine' => 564,
        'endLine' => 587,
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
            'startLine' => 592,
            'endLine' => 592,
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
        'startLine' => 592,
        'endLine' => 603,
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
        'startLine' => 613,
        'endLine' => 640,
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