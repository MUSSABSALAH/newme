<?php declare(strict_types = 1);

// odsl-C:\newme\app\Support\Http\Responses\MoneyPresenter.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Support\Http\Responses\MoneyPresenter
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-d012162113990a400aa49175af1c8a8f5bebacf232be346ed1ea2321eaf829c6',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
        'filename' => 'C:/newme/app/Support/Http/Responses/MoneyPresenter.php',
      ),
    ),
    'namespace' => 'App\\Support\\Http\\Responses',
    'name' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
    'shortName' => 'MoneyPresenter',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Renders a {@see Money} value object for API output without losing precision.
 *
 * Both the integer minor amount (authoritative) and a formatted decimal string
 * (display only) are returned, alongside the currency code.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 15,
    'endLine' => 28,
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
      'toArray' => 
      array (
        'name' => 'toArray',
        'parameters' => 
        array (
          'money' => 
          array (
            'name' => 'money',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Support\\Money\\Money',
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array{minor: int, amount: string, currency: string}
 */',
        'startLine' => 20,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'App\\Support\\Http\\Responses',
        'declaringClassName' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
        'implementingClassName' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
        'currentClassName' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
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