<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Consultations\Models\Consultation.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Consultations\Models\Consultation
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-9e31e8a4d0c11a640756ff475133c1265bea52d29d99d01bc0bf7afa50b5e133',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'filename' => 'D:/newme/newme/app/Modules/Consultations/Models/Consultation.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Consultations\\Models',
    'name' => 'App\\Modules\\Consultations\\Models\\Consultation',
    'shortName' => 'Consultation',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $public_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string|null $goal
 * @property Carbon $scheduled_on
 * @property string $starts_at
 * @property string $ends_at
 * @property ConsultationStatus $status
 * @property string|null $notes
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 27,
    'endLine' => 116,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      1 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'customer_name\', \'customer_email\', \'goal\', \'scheduled_on\', \'starts_at\', \'ends_at\', \'status\', \'notes\']',
          'attributes' => 
          array (
            'startLine' => 35,
            'endLine' => 45,
            'startTokenPos' => 80,
            'startFilePos' => 891,
            'endTokenPos' => 109,
            'endFilePos' => 1084,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 35,
        'endLine' => 45,
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
        'startLine' => 47,
        'endLine' => 54,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
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
            'name' => 'Database\\Factories\\ConsultationFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 56,
        'endLine' => 59,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
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
        'startLine' => 64,
        'endLine' => 70,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
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
        'startLine' => 72,
        'endLine' => 75,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'reference' => 
      array (
        'name' => 'reference',
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
        'startLine' => 77,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'startsAtDisplay' => 
      array (
        'name' => 'startsAtDisplay',
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
        'startLine' => 82,
        'endLine' => 85,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'endsAtDisplay' => 
      array (
        'name' => 'endsAtDisplay',
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
        'startLine' => 87,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'slotLabel' => 
      array (
        'name' => 'slotLabel',
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
        'startLine' => 92,
        'endLine' => 95,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'whenLabel' => 
      array (
        'name' => 'whenLabel',
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
        'startLine' => 97,
        'endLine' => 100,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'aliasName' => NULL,
      ),
      'normalizeTime' => 
      array (
        'name' => 'normalizeTime',
        'parameters' => 
        array (
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'mixed',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 102,
            'endLine' => 102,
            'startColumn' => 36,
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
        'docComment' => NULL,
        'startLine' => 102,
        'endLine' => 115,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Consultations\\Models',
        'declaringClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'implementingClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
        'currentClassName' => 'App\\Modules\\Consultations\\Models\\Consultation',
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