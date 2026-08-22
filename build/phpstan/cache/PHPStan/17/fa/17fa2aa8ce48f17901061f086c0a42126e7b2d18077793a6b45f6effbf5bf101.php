<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Identity\Models\CustomerOtp.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Identity\Models\CustomerOtp
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-47efe4c0894ce7c5d454dfcf52d334958a48535de56478035498bcc57774ce63',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'filename' => 'D:/newme/newme/app/Modules/Identity/Models/CustomerOtp.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Identity\\Models',
    'name' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
    'shortName' => 'CustomerOtp',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A one-time sign-in or registration code for a store customer.
 *
 * @property int $id
 * @property string $public_id
 * @property int $user_id
 * @property OtpPurpose $purpose
 * @property string $code_hash
 * @property int $attempts
 * @property bool $remember
 * @property Carbon $sent_at
 * @property Carbon $expires_at
 * @property Carbon|null $consumed_at
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 28,
    'endLine' => 107,
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
      'MAX_ATTEMPTS' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'name' => 'MAX_ATTEMPTS',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '5',
          'attributes' => 
          array (
            'startLine' => 30,
            'endLine' => 30,
            'startTokenPos' => 65,
            'startFilePos' => 729,
            'endTokenPos' => 65,
            'endFilePos' => 729,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 30,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 34,
      ),
      'TTL_MINUTES' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'name' => 'TTL_MINUTES',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '10',
          'attributes' => 
          array (
            'startLine' => 32,
            'endLine' => 32,
            'startTokenPos' => 76,
            'startFilePos' => 764,
            'endTokenPos' => 76,
            'endFilePos' => 765,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 34,
      ),
      'RESEND_SECONDS' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'name' => 'RESEND_SECONDS',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '60',
          'attributes' => 
          array (
            'startLine' => 34,
            'endLine' => 34,
            'startTokenPos' => 87,
            'startFilePos' => 803,
            'endTokenPos' => 87,
            'endFilePos' => 804,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 34,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 37,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'user_id\', \'purpose\', \'code_hash\', \'attempts\', \'remember\', \'sent_at\', \'expires_at\', \'consumed_at\']',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 49,
            'startTokenPos' => 98,
            'startFilePos' => 875,
            'endTokenPos' => 127,
            'endFilePos' => 1065,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 49,
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
        'startLine' => 51,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
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
        'startLine' => 63,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
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
        'startLine' => 75,
        'endLine' => 78,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
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
        'startLine' => 83,
        'endLine' => 86,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
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
        'startLine' => 88,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'aliasName' => NULL,
      ),
      'isConsumed' => 
      array (
        'name' => 'isConsumed',
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
        'startLine' => 93,
        'endLine' => 96,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'aliasName' => NULL,
      ),
      'isLocked' => 
      array (
        'name' => 'isLocked',
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
        'startLine' => 98,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Models',
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'aliasName' => NULL,
      ),
      'canResend' => 
      array (
        'name' => 'canResend',
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
        'declaringClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'implementingClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
        'currentClassName' => 'App\\Modules\\Identity\\Models\\CustomerOtp',
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