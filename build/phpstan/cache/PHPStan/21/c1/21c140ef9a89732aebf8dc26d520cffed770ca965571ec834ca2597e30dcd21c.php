<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Invoices\Models\Invoice.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Invoices\Models\Invoice
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-20aa152b5ba33f22c30fbe33241c9e1ed45e7e44e21b30dcd19a1b9b64182e0f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'filename' => 'C:/newme/app/Modules/Invoices/Models/Invoice.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Invoices\\Models',
    'name' => 'App\\Modules\\Invoices\\Models\\Invoice',
    'shortName' => 'Invoice',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * A tax invoice issued once a payment has been confirmed.
 *
 * Everything needed to reprint the document lives on the row itself, so a
 * reissued PDF is byte-for-byte the same however much the catalogue, the
 * customer record, or the company settings move on afterwards.
 *
 * @property int $id
 * @property string $public_id
 * @property string $number
 * @property int|null $user_id
 * @property string $invoiceable_type
 * @property int $invoiceable_id
 * @property int|null $payment_id
 * @property \\Illuminate\\Support\\Carbon $issued_at
 * @property string $currency
 * @property int $tax_rate_bps
 * @property int $lines_total_minor
 * @property int $discount_minor
 * @property int $net_minor
 * @property int $tax_minor
 * @property int $total_minor
 * @property array<string, mixed> $seller
 * @property array<string, mixed> $buyer
 * @property array<int, array<string, mixed>> $lines
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 47,
    'endLine' => 218,
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
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'public_id\', \'number\', \'user_id\', \'invoiceable_type\', \'invoiceable_id\', \'payment_id\', \'issued_at\', \'currency\', \'tax_rate_bps\', \'lines_total_minor\', \'discount_minor\', \'net_minor\', \'tax_minor\', \'total_minor\', \'seller\', \'buyer\', \'lines\']',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 73,
            'startTokenPos' => 107,
            'startFilePos' => 1674,
            'endTokenPos' => 160,
            'endFilePos' => 2051,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 55,
        'endLine' => 73,
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
        'startLine' => 75,
        'endLine' => 82,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
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
            'name' => 'Database\\Factories\\InvoiceFactory',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 84,
        'endLine' => 87,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
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
        'startLine' => 92,
        'endLine' => 106,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
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
        'startLine' => 108,
        'endLine' => 111,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
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
        'startLine' => 116,
        'endLine' => 119,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'payment' => 
      array (
        'name' => 'payment',
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
 * @return BelongsTo<Payment, $this>
 */',
        'startLine' => 124,
        'endLine' => 127,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'invoiceable' => 
      array (
        'name' => 'invoiceable',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return MorphTo<Model, $this>
 */',
        'startLine' => 132,
        'endLine' => 135,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'sellerParty' => 
      array (
        'name' => 'sellerParty',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Invoices\\DTOs\\InvoiceParty',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 137,
        'endLine' => 140,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'buyerParty' => 
      array (
        'name' => 'buyerParty',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Modules\\Invoices\\DTOs\\InvoiceParty',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 142,
        'endLine' => 145,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'invoiceLines' => 
      array (
        'name' => 'invoiceLines',
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
 * @return list<InvoiceLine>
 */',
        'startLine' => 150,
        'endLine' => 156,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'isForSubscription' => 
      array (
        'name' => 'isForSubscription',
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
        'startLine' => 158,
        'endLine' => 161,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'isForOrder' => 
      array (
        'name' => 'isForOrder',
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
        'startLine' => 163,
        'endLine' => 166,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'hasDiscount' => 
      array (
        'name' => 'hasDiscount',
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
        'startLine' => 168,
        'endLine' => 171,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'taxRateDisplay' => 
      array (
        'name' => 'taxRateDisplay',
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
 * The tax rate as a display string such as "15" or "15.5".
 */',
        'startLine' => 176,
        'endLine' => 179,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'total' => 
      array (
        'name' => 'total',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Support\\Money\\Money',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 181,
        'endLine' => 184,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'totalDisplay' => 
      array (
        'name' => 'totalDisplay',
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
        'startLine' => 186,
        'endLine' => 189,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'netDisplay' => 
      array (
        'name' => 'netDisplay',
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
        'startLine' => 191,
        'endLine' => 194,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'taxDisplay' => 
      array (
        'name' => 'taxDisplay',
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
        'startLine' => 196,
        'endLine' => 199,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'discountDisplay' => 
      array (
        'name' => 'discountDisplay',
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
        'startLine' => 201,
        'endLine' => 204,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'linesTotalDisplay' => 
      array (
        'name' => 'linesTotalDisplay',
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
        'startLine' => 206,
        'endLine' => 209,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'aliasName' => NULL,
      ),
      'fileName' => 
      array (
        'name' => 'fileName',
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
 * File name used for every download of this invoice.
 */',
        'startLine' => 214,
        'endLine' => 217,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Models',
        'declaringClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'implementingClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
        'currentClassName' => 'App\\Modules\\Invoices\\Models\\Invoice',
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