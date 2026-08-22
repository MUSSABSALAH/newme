<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Http\Requests\Web\Checkout\PlaceOrderRequest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Http\Requests\Web\Checkout\PlaceOrderRequest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-5c7a33cc18bc06b9b47cf866d4ba0a6db4b7422b81c4be2af11856818fcbfa69',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'filename' => 'D:/newme/newme/app/Http/Requests/Web/Checkout/PlaceOrderRequest.php',
      ),
    ),
    'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
    'name' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
    'shortName' => 'PlaceOrderRequest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * The final PLACE ORDER submission: which address, which payment method and,
 * for card methods, the card itself.
 *
 * Card details are validated for shape only. Whether the card is accepted is
 * the gateway\'s answer, so an expired date is not rejected here — it comes back
 * as a decline, exactly as a real provider would report it.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 20,
    'endLine' => 115,
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
        'startLine' => 22,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'prepareForValidation' => 
      array (
        'name' => 'prepareForValidation',
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
        'startLine' => 27,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
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
        'startLine' => 39,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'attributes' => 
      array (
        'name' => 'attributes',
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
        'startLine' => 62,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'messages' => 
      array (
        'name' => 'messages',
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
        'startLine' => 78,
        'endLine' => 83,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'paymentMethod' => 
      array (
        'name' => 'paymentMethod',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 85,
        'endLine' => 88,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'card' => 
      array (
        'name' => 'card',
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
        'startLine' => 93,
        'endLine' => 102,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'aliasName' => NULL,
      ),
      'cardRule' => 
      array (
        'name' => 'cardRule',
        'parameters' => 
        array (
          'cardMethods' => 
          array (
            'name' => 'cardMethods',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 107,
            'endLine' => 107,
            'startColumn' => 31,
            'endColumn' => 48,
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
        'docComment' => '/**
 * @param  list<string>  $cardMethods
 */',
        'startLine' => 107,
        'endLine' => 114,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Http\\Requests\\Web\\Checkout',
        'declaringClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'implementingClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
        'currentClassName' => 'App\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest',
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