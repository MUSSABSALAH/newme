<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Identity\Support\MeasurementTrend.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Identity\Support\MeasurementTrend
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-78ecaaa2e6ebacbdd9d3cd857023601d0316b80bb1ef3fe488fccc29a0a441a1',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
        'filename' => 'D:/newme/newme/app/Modules/Identity/Support/MeasurementTrend.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Identity\\Support',
    'name' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
    'shortName' => 'MeasurementTrend',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Turns a measurement history into a plottable weight series.
 *
 * Weight is the one number every reading carries, so it is the only line drawn;
 * the rest of the tape stays in the history list. A series with a single point
 * is dropped because one dot draws no trend.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 41,
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
      'MIN_POINTS' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
        'name' => 'MIN_POINTS',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '2',
          'attributes' => 
          array (
            'startLine' => 20,
            'endLine' => 20,
            'startTokenPos' => 48,
            'startFilePos' => 533,
            'endTokenPos' => 48,
            'endFilePos' => 533,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 20,
        'endLine' => 20,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'weight' => 
      array (
        'name' => 'weight',
        'parameters' => 
        array (
          'measurements' => 
          array (
            'name' => 'measurements',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Collection',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 28,
            'endLine' => 28,
            'startColumn' => 35,
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
 * Oldest reading first.
 *
 * @param  Collection<int, BodyMeasurement>  $measurements
 * @return list<array{date: Carbon, value: float}>
 */',
        'startLine' => 28,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\MeasurementTrend',
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