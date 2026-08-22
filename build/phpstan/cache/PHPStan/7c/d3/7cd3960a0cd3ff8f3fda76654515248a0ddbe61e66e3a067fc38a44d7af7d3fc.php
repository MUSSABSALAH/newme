<?php declare(strict_types = 1);

// osfsl-D:/newme/newme/vendor/composer/../paytabs/php-sdk/src/Request/Requests/PaymentRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Paytabs\Sdk\Request\Requests\PaymentRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-edfbd0007040518af15e871f8eb994c039d7c25308cfdf382666988aa70798a7-8.4.24-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'filename' => 'D:/newme/newme/vendor/composer/../paytabs/php-sdk/src/Request/Requests/PaymentRequest.php',
      ),
    ),
    'namespace' => 'Paytabs\\Sdk\\Request\\Requests',
    'name' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
    'shortName' => 'PaymentRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 13,
    'endLine' => 29,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Paytabs\\Sdk\\Request\\PaytabsRequest',
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
      'path' => 
      array (
        'declaringClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'implementingClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'name' => 'path',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '\'payment/request\'',
          'attributes' => 
          array (
            'startLine' => 15,
            'endLine' => 15,
            'startTokenPos' => 62,
            'startFilePos' => 418,
            'endTokenPos' => 62,
            'endFilePos' => 434,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 15,
        'endLine' => 15,
        'startColumn' => 5,
        'endColumn' => 47,
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
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'holder' => 
          array (
            'name' => 'holder',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Request\\Payload\\Payloads\\PaymentRequest',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 18,
            'endLine' => 18,
            'startColumn' => 9,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'profile' => 
          array (
            'name' => 'profile',
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
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 9,
            'endColumn' => 25,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 17,
        'endLine' => 22,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Sdk\\Request\\Requests',
        'declaringClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'implementingClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'currentClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'aliasName' => NULL,
      ),
      'getResponseClass' => 
      array (
        'name' => 'getResponseClass',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Paytabs\\Sdk\\Response\\Payload\\PayloadInterface',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/** @return Completed */',
        'startLine' => 25,
        'endLine' => 28,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Sdk\\Request\\Requests',
        'declaringClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'implementingClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
        'currentClassName' => 'Paytabs\\Sdk\\Request\\Requests\\PaymentRequest',
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