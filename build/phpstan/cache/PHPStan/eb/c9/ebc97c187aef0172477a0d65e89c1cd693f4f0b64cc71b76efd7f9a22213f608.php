<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Http\Requests\Web\Admin\Deliveries\RecordStopRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Http\Requests\Web\Admin\Deliveries\RecordStopRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-5af6ad528e6c4598ba753733ab910c8b8f264a59227282c0c58ab28a9aad4b6b',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'filename' => 'D:/newme/newme/app/Http/Requests/Web/Admin/Deliveries/RecordStopRequest.php',
      ),
    ),
    'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
    'name' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
    'shortName' => 'RecordStopRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Records the outcome of one subscription delivery day.
 *
 * Pending is not accepted: it is the state a day is in before anyone touches
 * it, not something the team reports.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 97,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Foundation\\Http\\FormRequest',
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
      'authorize' => 
      array (
        'name' => 'authorize',
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
        'startLine' => 24,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'aliasName' => NULL,
      ),
      'rules' => 
      array (
        'name' => 'rules',
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
 * @return array<string, mixed>
 */',
        'startLine' => 32,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'aliasName' => NULL,
      ),
      'withValidator' => 
      array (
        'name' => 'withValidator',
        'parameters' => 
        array (
          'validator' => 
          array (
            'name' => 'validator',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Validation\\Validator',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 45,
            'endLine' => 45,
            'startColumn' => 35,
            'endColumn' => 54,
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
        'docComment' => NULL,
        'startLine' => 45,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'aliasName' => NULL,
      ),
      'deliveryDate' => 
      array (
        'name' => 'deliveryDate',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Carbon',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 81,
        'endLine' => 84,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'aliasName' => NULL,
      ),
      'status' => 
      array (
        'name' => 'status',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Delivery\\Enums\\DeliveryStatus',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 86,
        'endLine' => 89,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'aliasName' => NULL,
      ),
      'reason' => 
      array (
        'name' => 'reason',
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
        'docComment' => NULL,
        'startLine' => 91,
        'endLine' => 96,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Admin\\Deliveries\\RecordStopRequest',
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