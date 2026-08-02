<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Addresses\Models\Address.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Addresses\Models\Address
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-df7cc7bad1cf3f1d42522e3275e3416d8a009fef7f7d13de01e721f94f6bad5e',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Addresses\\Models\\Address',
        'filename' => 'C:/newme/app/Modules/Addresses/Models/Address.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Addresses\\Models',
    'name' => 'App\\Modules\\Addresses\\Models\\Address',
    'shortName' => 'Address',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A customer delivery address.
 *
 * Orders and subscriptions keep their own snapshot of the address used, so
 * editing or deleting an address never rewrites delivery history.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property string $label
 * @property string $recipient_name
 * @property string $phone
 * @property string $city
 * @property string $district
 * @property string $street
 * @property string|null $details
 * @property bool $is_default
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 33,
    'endLine' => 120,
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
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'user_id\', \'label\', \'recipient_name\', \'phone\', \'city\', \'district\', \'street\', \'details\', \'is_default\']',
          'attributes' => 
          array (
            'startLine' => 41,
            'endLine' => 52,
            'startTokenPos' => 80,
            'startFilePos' => 1037,
            'endTokenPos' => 112,
            'endFilePos' => 1238,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 52,
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
        'startLine' => 54,
        'endLine' => 61,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
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
            'name' => 'Database\\Factories\\AddressFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 63,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
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
        'startLine' => 71,
        'endLine' => 76,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
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
        'startLine' => 78,
        'endLine' => 81,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
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
        'startLine' => 86,
        'endLine' => 89,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'aliasName' => NULL,
      ),
      'summary' => 
      array (
        'name' => 'summary',
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
        'docComment' => '/**
 * One line suitable for a summary row.
 */',
        'startLine' => 94,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'aliasName' => NULL,
      ),
      'snapshot' => 
      array (
        'name' => 'snapshot',
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
 * The frozen copy stored on an order or subscription.
 *
 * @return array<string, string|null>
 */',
        'startLine' => 108,
        'endLine' => 119,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Addresses\\Models',
        'declaringClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'implementingClassName' => 'App\\Modules\\Addresses\\Models\\Address',
        'currentClassName' => 'App\\Modules\\Addresses\\Models\\Address',
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