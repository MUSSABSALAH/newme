<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Subscriptions\Services\MealScheduleService.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Subscriptions\Services\MealScheduleService
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-cbae84547f4f836dec6b8f79c273327c2232ea0af8c2618b5575f0025ad78f10',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Subscriptions\\Services\\MealScheduleService',
        'filename' => 'D:/newme/newme/app/Modules/Subscriptions/Services/MealScheduleService.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Subscriptions\\Services',
    'name' => 'App\\Modules\\Subscriptions\\Services\\MealScheduleService',
    'shortName' => 'MealScheduleService',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Updates a subscription\'s per-day dish picks, honouring the meal-change cutoff.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 14,
    'endLine' => 78,
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
    ),
    'immediateMethods' => 
    array (
      'update' => 
      array (
        'name' => 'update',
        'parameters' => 
        array (
          'subscription' => 
          array (
            'name' => 'subscription',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 28,
            'endColumn' => 53,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'submitted' => 
          array (
            'name' => 'submitted',
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
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 56,
            'endColumn' => 71,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  list<array{date?: mixed, meals?: mixed}>  $submitted
 */',
        'startLine' => 19,
        'endLine' => 77,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Subscriptions\\Services',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Services\\MealScheduleService',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Services\\MealScheduleService',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Services\\MealScheduleService',
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