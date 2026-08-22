<?php declare(strict_types = 1);

// osfsl-D:/newme/newme/vendor/composer/../paytabs/laravel-sdk/src/Paytabs.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Paytabs\Laravel\Paytabs
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-3581a75f5896a39e6641bcae5dc6c2c3ed9bf39b812345ac61cd9ffe0e3067f5-8.4.24-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Paytabs\\Laravel\\Paytabs',
        'filename' => 'D:/newme/newme/vendor/composer/../paytabs/laravel-sdk/src/Paytabs.php',
      ),
    ),
    'namespace' => 'Paytabs\\Laravel',
    'name' => 'Paytabs\\Laravel\\Paytabs',
    'shortName' => 'Paytabs',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 202,
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
      'VERSION' => 
      array (
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'name' => 'VERSION',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'3.0.0\'',
          'attributes' => 
          array (
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 88,
            'startFilePos' => 587,
            'endTokenPos' => 88,
            'endFilePos' => 593,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
    ),
    'immediateProperties' => 
    array (
      'instance' => 
      array (
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'name' => 'instance',
        'modifiers' => 4,
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
                  'name' => 'Paytabs\\Sdk\\Paytabs',
                  'isIdentifier' => false,
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
        'default' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 23,
            'endLine' => 23,
            'startTokenPos' => 100,
            'startFilePos' => 633,
            'endTokenPos' => 100,
            'endFilePos' => 636,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 41,
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
      'getInstance' => 
      array (
        'name' => 'getInstance',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Paytabs',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the PayTabs SDK instance using default configuration.
 *
 * @return PaytabsSdk The SDK instance
 *
 * @throws InvalidConfigurationException If required configuration is missing
 */',
        'startLine' => 32,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'usingDefaults' => 
      array (
        'name' => 'usingDefaults',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Paytabs',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Reset to use default configuration and return instance.
 *
 * @return PaytabsSdk The SDK instance with default config
 */',
        'startLine' => 52,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'usingCredentials' => 
      array (
        'name' => 'usingCredentials',
        'parameters' => 
        array (
          'profileId' => 
          array (
            'name' => 'profileId',
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
            'startLine' => 68,
            'endLine' => 68,
            'startColumn' => 9,
            'endColumn' => 22,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'serverKey' => 
          array (
            'name' => 'serverKey',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 69,
            'endLine' => 69,
            'startColumn' => 9,
            'endColumn' => 25,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'endpoint' => 
          array (
            'name' => 'endpoint',
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
                      'name' => 'Paytabs\\Sdk\\Profile\\AbstractEndpoint',
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
            'startLine' => 70,
            'endLine' => 70,
            'startColumn' => 9,
            'endColumn' => 41,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Paytabs',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create SDK instance with specific credentials.
 *
 * @param  int  $profileId  The PayTabs profile ID
 * @param  string  $serverKey  The PayTabs server key
 * @param  AbstractEndpoint|string  $endpoint  The endpoint region or code
 * @return PaytabsSdk The SDK instance
 */',
        'startLine' => 67,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'usingProfile' => 
      array (
        'name' => 'usingProfile',
        'parameters' => 
        array (
          'profile' => 
          array (
            'name' => 'profile',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Profile\\Profile',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 87,
            'endLine' => 87,
            'startColumn' => 34,
            'endColumn' => 49,
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
            'name' => 'Paytabs\\Sdk\\Paytabs',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create SDK instance with a specific profile.
 *
 * @param  Profile  $profile  The PayTabs profile
 * @return PaytabsSdk The SDK instance
 */',
        'startLine' => 87,
        'endLine' => 92,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'getProfile' => 
      array (
        'name' => 'getProfile',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Profile\\Profile',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the current profile from the SDK instance.
 *
 * @return Profile The current profile
 */',
        'startLine' => 99,
        'endLine' => 102,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'getResultProcessor' => 
      array (
        'name' => 'getResultProcessor',
        'parameters' => 
        array (
          'profile' => 
          array (
            'name' => 'profile',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 110,
                'endLine' => 110,
                'startTokenPos' => 391,
                'startFilePos' => 3071,
                'endTokenPos' => 391,
                'endFilePos' => 3074,
              ),
            ),
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
                      'name' => 'Paytabs\\Sdk\\Profile\\Profile',
                      'isIdentifier' => false,
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
            'startLine' => 110,
            'endLine' => 110,
            'startColumn' => 40,
            'endColumn' => 63,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Laravel\\Services\\PaytabsResultProcessor',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the result processor for handling PayTabs callbacks.
 *
 * @param  Profile|null  $profile  Optional profile for validation
 * @return PaytabsResultProcessor The result processor instance
 */',
        'startLine' => 110,
        'endLine' => 116,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'submitRequest' => 
      array (
        'name' => 'submitRequest',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Request\\AbstractRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 124,
            'endLine' => 124,
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
            'name' => 'Paytabs\\Sdk\\Response\\ResponseDirectInterface',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Submit a payment request to PayTabs.
 *
 * @param  AbstractRequest  $request  The payment request
 * @return ResponseDirectInterface The response from PayTabs
 */',
        'startLine' => 124,
        'endLine' => 129,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'setRequest' => 
      array (
        'name' => 'setRequest',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Request\\AbstractRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 137,
            'endLine' => 137,
            'startColumn' => 33,
            'endColumn' => 56,
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
            'name' => 'Paytabs\\Sdk\\Paytabs',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the request on the SDK instance with plugin info.
 *
 * @param  AbstractRequest  $request  The payment request
 * @return PaytabsSdk The SDK instance
 */',
        'startLine' => 137,
        'endLine' => 142,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'submit' => 
      array (
        'name' => 'submit',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Response\\ResponseDirectInterface',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Submit the request to PayTabs.
 *
 * @return ResponseDirectInterface The response from PayTabs
 */',
        'startLine' => 149,
        'endLine' => 152,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'prepareRequest' => 
      array (
        'name' => 'prepareRequest',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Request\\AbstractRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 165,
            'endLine' => 165,
            'startColumn' => 37,
            'endColumn' => 60,
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
 * Prepare the request by adding plugin information if enabled.
 *
 * @param  AbstractRequest  $request  The payment request to prepare
 */',
        'startLine' => 165,
        'endLine' => 177,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
        'aliasName' => NULL,
      ),
      'validateConfig' => 
      array (
        'name' => 'validateConfig',
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
        'docComment' => '/**
 * Validate that required configuration values are set.
 *
 * @throws \\RuntimeException If required configuration is missing
 */',
        'startLine' => 184,
        'endLine' => 201,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Paytabs\\Laravel',
        'declaringClassName' => 'Paytabs\\Laravel\\Paytabs',
        'implementingClassName' => 'Paytabs\\Laravel\\Paytabs',
        'currentClassName' => 'Paytabs\\Laravel\\Paytabs',
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