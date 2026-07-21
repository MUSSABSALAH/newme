<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Identity\Models\UserInvitation.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Identity\Models\UserInvitation
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-745b2f02cc59af4311bc8381e7dfcce4c7750a8740b5abdf54b653b78ebfdd04',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'filename' => 'C:/newme/app/Modules/Identity/Models/UserInvitation.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Identity\\Models',
    'name' => 'App\\Modules\\Identity\\Models\\UserInvitation',
    'shortName' => 'UserInvitation',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $user_id
 * @property string $token_hash
 * @property int|null $invited_by
 * @property Carbon $expires_at
 * @property Carbon|null $accepted_at
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 20,
    'endLine' => 74,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
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
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'user_id\', \'token_hash\', \'invited_by\', \'expires_at\', \'accepted_at\']',
          'attributes' => 
          array (
            'startLine' => 25,
            'endLine' => 31,
            'startTokenPos' => 55,
            'startFilePos' => 515,
            'endTokenPos' => 72,
            'endFilePos' => 629,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 25,
        'endLine' => 31,
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
        'startLine' => 36,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
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
        'startLine' => 47,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'aliasName' => NULL,
      ),
      'inviter' => 
      array (
        'name' => 'inviter',
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
        'startLine' => 55,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'aliasName' => NULL,
      ),
      'isExpired' => 
      array (
        'name' => 'isExpired',
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
        'startLine' => 60,
        'endLine' => 63,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'aliasName' => NULL,
      ),
      'isAccepted' => 
      array (
        'name' => 'isAccepted',
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
        'startLine' => 65,
        'endLine' => 68,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'aliasName' => NULL,
      ),
      'isPending' => 
      array (
        'name' => 'isPending',
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
        'startLine' => 70,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\UserInvitation',
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