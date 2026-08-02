<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Orders\Models\OrderItem.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Orders\Models\OrderItem
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-3869b5e870ce16e9d7d0f43de5218edcb2b1e22af624d61f8fcceb091e34586b',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'filename' => 'C:/newme/app/Modules/Orders/Models/OrderItem.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Orders\\Models',
    'name' => 'App\\Modules\\Orders\\Models\\OrderItem',
    'shortName' => 'OrderItem',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int $order_id
 * @property int|null $product_id
 * @property string $name
 * @property int $unit_price_minor
 * @property int $quantity
 * @property int $line_total_minor
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 82,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'order_id\', \'product_id\', \'name\', \'unit_price_minor\', \'quantity\', \'line_total_minor\']',
          'attributes' => 
          array (
            'startLine' => 31,
            'endLine' => 38,
            'startTokenPos' => 72,
            'startFilePos' => 707,
            'endTokenPos' => 92,
            'endFilePos' => 847,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 38,
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
            'name' => 'Database\\Factories\\OrderItemFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 40,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
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
        'startLine' => 48,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'aliasName' => NULL,
      ),
      'order' => 
      array (
        'name' => 'order',
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
 * @return BelongsTo<Order, $this>
 */',
        'startLine' => 60,
        'endLine' => 63,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'aliasName' => NULL,
      ),
      'product' => 
      array (
        'name' => 'product',
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
 * @return BelongsTo<Product, $this>
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
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'aliasName' => NULL,
      ),
      'unitPriceDisplay' => 
      array (
        'name' => 'unitPriceDisplay',
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
        'startLine' => 73,
        'endLine' => 76,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'aliasName' => NULL,
      ),
      'lineTotalDisplay' => 
      array (
        'name' => 'lineTotalDisplay',
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
        'namespace' => 'App\\Modules\\Orders\\Models',
        'declaringClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'implementingClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
        'currentClassName' => 'App\\Modules\\Orders\\Models\\OrderItem',
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