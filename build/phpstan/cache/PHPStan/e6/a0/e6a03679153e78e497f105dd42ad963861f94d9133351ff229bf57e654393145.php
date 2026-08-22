<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Subscriptions\Support\MealCalendarPresenter.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Subscriptions\Support\MealCalendarPresenter
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-bb26628931c4372a94bbc76fc5a3452273e0b8a816ab8b38dd692b58d5a7653c',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Subscriptions\\Support\\MealCalendarPresenter',
        'filename' => 'D:/newme/newme/app/Modules/Subscriptions/Support/MealCalendarPresenter.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Subscriptions\\Support',
    'name' => 'App\\Modules\\Subscriptions\\Support\\MealCalendarPresenter',
    'shortName' => 'MealCalendarPresenter',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Builds month grids for the customer meal calendar UI.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 12,
    'endLine' => 91,
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
      'months' => 
      array (
        'name' => 'months',
        'parameters' => 
        array (
          'scheduleDays' => 
          array (
            'name' => 'scheduleDays',
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
            'startLine' => 18,
            'endLine' => 18,
            'startColumn' => 35,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  list<array{date: string, weekday: string, label: string, editable: bool, meals: list<array<string, mixed>>}>  $scheduleDays
 * @return list<array{key: string, label: string, weekdays: list<string>, weeks: list<list<array{day: int|null, delivery: array<string, mixed>|null}>>}>
 */',
        'startLine' => 18,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Modules\\Subscriptions\\Support',
        'declaringClassName' => 'App\\Modules\\Subscriptions\\Support\\MealCalendarPresenter',
        'implementingClassName' => 'App\\Modules\\Subscriptions\\Support\\MealCalendarPresenter',
        'currentClassName' => 'App\\Modules\\Subscriptions\\Support\\MealCalendarPresenter',
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