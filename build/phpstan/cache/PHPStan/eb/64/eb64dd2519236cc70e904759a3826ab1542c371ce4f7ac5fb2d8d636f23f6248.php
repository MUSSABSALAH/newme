<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Identity\Models\BodyMeasurement.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Identity\Models\BodyMeasurement
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-fae18e81d5ad9504c5ede72ca2dd7ddbe337952a704a8490c413d1dd4c9bc7ea',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'filename' => 'D:/newme/newme/app/Modules/Identity/Models/BodyMeasurement.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Identity\\Models',
    'name' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
    'shortName' => 'BodyMeasurement',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * One dated reading of a customer\'s body: weight, height and tape measurements.
 *
 * Readings are never overwritten by later ones — the history is the point, so a
 * nutritionist can see where the customer started and how the numbers moved.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property Carbon $measured_on
 * @property float $weight_kg
 * @property float|null $height_cm
 * @property float|null $waist_cm
 * @property float|null $hip_cm
 * @property float|null $chest_cm
 * @property float|null $arm_cm
 * @property float|null $neck_cm
 * @property float|null $body_fat_percent
 * @property string|null $notes
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 36,
    'endLine' => 169,
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
      'TAPE_FIELDS' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'name' => 'TAPE_FIELDS',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '[\'waist_cm\', \'hip_cm\', \'chest_cm\', \'arm_cm\', \'neck_cm\']',
          'attributes' => 
          array (
            'startLine' => 42,
            'endLine' => 42,
            'startTokenPos' => 84,
            'startFilePos' => 1265,
            'endTokenPos' => 98,
            'endFilePos' => 1319,
          ),
        ),
        'docComment' => '/** Tape measurements shown as a group, in the order they are presented. */',
        'attributes' => 
        array (
        ),
        'startLine' => 42,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 87,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'user_id\', \'measured_on\', \'weight_kg\', \'height_cm\', \'waist_cm\', \'hip_cm\', \'chest_cm\', \'arm_cm\', \'neck_cm\', \'body_fat_percent\', \'notes\']',
          'attributes' => 
          array (
            'startLine' => 47,
            'endLine' => 60,
            'startTokenPos' => 109,
            'startFilePos' => 1390,
            'endTokenPos' => 147,
            'endFilePos' => 1641,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 47,
        'endLine' => 60,
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
      'booted' => 
      array (
        'name' => 'booted',
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
        'startLine' => 62,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
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
            'name' => 'Database\\Factories\\BodyMeasurementFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 71,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
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
        'startLine' => 79,
        'endLine' => 92,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'getRouteKeyName' => 
      array (
        'name' => 'getRouteKeyName',
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
        'startLine' => 94,
        'endLine' => 97,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'setMeasuredOnAttribute' => 
      array (
        'name' => 'setMeasuredOnAttribute',
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
                      'name' => 'DateTimeInterface',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'string',
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
            'startLine' => 103,
            'endLine' => 103,
            'startColumn' => 44,
            'endColumn' => 74,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Keep the column date-only. Laravel would otherwise store midnight with it,
 * which breaks plain date lookups and the one-reading-per-day index.
 */',
        'startLine' => 103,
        'endLine' => 106,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'user' => 
      array (
        'name' => 'user',
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
        'startLine' => 111,
        'endLine' => 114,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'bmi' => 
      array (
        'name' => 'bmi',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'float',
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
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 116,
        'endLine' => 125,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'bmiBand' => 
      array (
        'name' => 'bmiBand',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * The World Health Organization band the BMI falls in, as a translation key.
 */',
        'startLine' => 130,
        'endLine' => 141,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'hasTapeReadings' => 
      array (
        'name' => 'hasTapeReadings',
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
        'docComment' => '/**
 * Does this reading carry anything beyond the weight?
 */',
        'startLine' => 146,
        'endLine' => 155,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'aliasName' => NULL,
      ),
      'display' => 
      array (
        'name' => 'display',
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
                      'name' => 'float',
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
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 36,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Trailing zeros read as false precision on a bathroom scale, so 70.0 shows
 * as "70" while 70.5 keeps its half kilo.
 */',
        'startLine' => 161,
        'endLine' => 168,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\BodyMeasurement',
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