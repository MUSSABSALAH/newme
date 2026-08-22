<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Identity\Support\CustomerAuthChannels.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Identity\Support\CustomerAuthChannels
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-bd42b066c114409d4e83d731de9e622fccbc2add0dae0d70fe5c1fb1808cb478',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'filename' => 'D:/newme/newme/app/Modules/Identity/Support/CustomerAuthChannels.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Identity\\Support',
    'name' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
    'shortName' => 'CustomerAuthChannels',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Which customer identifiers the store currently asks for.
 *
 * Driven by the authentication OTP toggles in settings: an identifier is
 * collected only when its channel can actually deliver a code. When both
 * toggles are off the store falls back to email + password, the way it
 * worked before OTP existed.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 17,
    'endLine' => 81,
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
      'settings' => 
      array (
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'name' => 'settings',
        'modifiers' => 132,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Settings\\Services\\SettingsService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 33,
        'endColumn' => 74,
        'isPromoted' => true,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'settings' => 
          array (
            'name' => 'settings',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Settings\\Services\\SettingsService',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => true,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 33,
            'endColumn' => 74,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 5,
        'endColumn' => 78,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'sms' => 
      array (
        'name' => 'sms',
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
        'startLine' => 21,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'email' => 
      array (
        'name' => 'email',
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
        'startLine' => 26,
        'endLine' => 29,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'otpEnabled' => 
      array (
        'name' => 'otpEnabled',
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
        'startLine' => 31,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'asksEmail' => 
      array (
        'name' => 'asksEmail',
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
 * Email is collected when it can receive an OTP, or when password login
 * still needs it as the account identifier.
 */',
        'startLine' => 40,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'asksPhoneOnRegister' => 
      array (
        'name' => 'asksPhoneOnRegister',
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
 * Phone is collected when SMS OTP is on, and also on classic registration
 * (password mode still asks for a mobile number).
 */',
        'startLine' => 49,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'asksPhoneOnLogin' => 
      array (
        'name' => 'asksPhoneOnLogin',
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
        'startLine' => 54,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'asksPassword' => 
      array (
        'name' => 'asksPassword',
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
        'startLine' => 59,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'requiresEmailOnProfile' => 
      array (
        'name' => 'requiresEmailOnProfile',
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
 * Profile always offers email; it is required only when it is a sign-in
 * identifier (email OTP or the password-login fallback).
 */',
        'startLine' => 68,
        'endLine' => 71,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'aliasName' => NULL,
      ),
      'requiresPhoneOnProfile' => 
      array (
        'name' => 'requiresPhoneOnProfile',
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
 * Profile always offers a mobile number; it is required only when SMS OTP
 * is how the customer signs in.
 */',
        'startLine' => 77,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Identity\\Support',
        'declaringClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'implementingClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
        'currentClassName' => 'App\\Modules\\Identity\\Support\\CustomerAuthChannels',
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