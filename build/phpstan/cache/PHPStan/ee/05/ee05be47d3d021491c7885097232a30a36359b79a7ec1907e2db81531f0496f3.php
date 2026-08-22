<?php declare(strict_types = 1);

// osfsl-D:/newme/newme/vendor/composer/../paytabs/laravel-sdk/src/Contracts/IpnHandlerInterface.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Paytabs\Laravel\Contracts\IpnHandlerInterface
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6341f7a954a5e1c3a14e23b514e8fd188060ae1d2bd0c95ba33549808ae060aa-8.4.24-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
        'filename' => 'D:/newme/newme/vendor/composer/../paytabs/laravel-sdk/src/Contracts/IpnHandlerInterface.php',
      ),
    ),
    'namespace' => 'Paytabs\\Laravel\\Contracts',
    'name' => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
    'shortName' => 'IpnHandlerInterface',
    'isInterface' => true,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 10,
    'endLine' => 22,
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
      'handleIpn' => 
      array (
        'name' => 'handleIpn',
        'parameters' => 
        array (
          'transactionResult' => 
          array (
            'name' => 'transactionResult',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Response\\Responses\\Webhook\\AbstractTransactionResult',
                'isIdentifier' => false,
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
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'mappedPayload' => 
          array (
            'name' => 'mappedPayload',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Callbacks\\Ipn',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 20,
            'endLine' => 20,
            'startColumn' => 9,
            'endColumn' => 26,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Handle the IPN payload after it has been verified.
 *
 * @param  AbstractTransactionResult  $transactionResult  The transaction result from PayTabs.
 * @param  Ipn  $mappedPayload  The mapped IPN payload from PayTabs.
 */',
        'startLine' => 18,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 12,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Paytabs\\Laravel\\Contracts',
        'declaringClassName' => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
        'implementingClassName' => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
        'currentClassName' => 'Paytabs\\Laravel\\Contracts\\IpnHandlerInterface',
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