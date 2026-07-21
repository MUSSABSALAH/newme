<?php declare(strict_types = 1);

// odsl-C:\newme\app\Support\Money\Rounding.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Support\Money\Rounding
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-8276a58f1bbf8ecb0381d317c9158e53042135f519c210d14a8264bdbc91c0d9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Support\\Money\\Rounding',
        'filename' => 'C:/newme/app/Support/Money/Rounding.php',
      ),
    ),
    'namespace' => 'App\\Support\\Money',
    'name' => 'App\\Support\\Money\\Rounding',
    'shortName' => 'Rounding',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Central, deterministic rounding for all money arithmetic.
 *
 * Uses integer-only math with half-up rounding on the magnitude, so results are
 * identical across web, API, and any recalculation. No floating point is used.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 15,
    'endLine' => 42,
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
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 17,
        'endLine' => 17,
        'startColumn' => 5,
        'endColumn' => 37,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Support\\Money',
        'declaringClassName' => 'App\\Support\\Money\\Rounding',
        'implementingClassName' => 'App\\Support\\Money\\Rounding',
        'currentClassName' => 'App\\Support\\Money\\Rounding',
        'aliasName' => NULL,
      ),
      'divide' => 
      array (
        'name' => 'divide',
        'parameters' => 
        array (
          'numerator' => 
          array (
            'name' => 'numerator',
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
            'startLine' => 22,
            'endLine' => 22,
            'startColumn' => 35,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'denominator' => 
          array (
            'name' => 'denominator',
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
            'startLine' => 22,
            'endLine' => 22,
            'startColumn' => 51,
            'endColumn' => 66,
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
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Divide two integers, rounding half away from zero (half-up on magnitude).
 */',
        'startLine' => 22,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => true,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Support\\Money',
        'declaringClassName' => 'App\\Support\\Money\\Rounding',
        'implementingClassName' => 'App\\Support\\Money\\Rounding',
        'currentClassName' => 'App\\Support\\Money\\Rounding',
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