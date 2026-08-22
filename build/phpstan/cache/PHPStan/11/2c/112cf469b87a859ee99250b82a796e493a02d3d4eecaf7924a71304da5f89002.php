<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Invoices\Services\InvoicePdfRenderer.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Invoices\Services\InvoicePdfRenderer
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-54078ac803f02f4f631a2a9bd20ad1d670856615cea094f64fd6cec903a9cd2a',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'filename' => 'D:/newme/newme/app/Modules/Invoices/Services/InvoicePdfRenderer.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Invoices\\Services',
    'name' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
    'shortName' => 'InvoicePdfRenderer',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Renders an invoice to PDF bytes.
 *
 * mPDF is used because it shapes and joins Arabic text out of the box; the
 * document is laid out right-to-left whenever the active locale is Arabic. The
 * QR code is produced as an inline SVG so no image extension is required.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 95,
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
      'QR_SIZE_PX' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'name' => 'QR_SIZE_PX',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '320',
          'attributes' => 
          array (
            'startLine' => 25,
            'endLine' => 25,
            'startTokenPos' => 73,
            'startFilePos' => 671,
            'endTokenPos' => 73,
            'endFilePos' => 673,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 25,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'render' => 
      array (
        'name' => 'render',
        'parameters' => 
        array (
          'invoice' => 
          array (
            'name' => 'invoice',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Invoices\\Models\\Invoice',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 27,
            'endLine' => 27,
            'startColumn' => 28,
            'endColumn' => 43,
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
        'docComment' => NULL,
        'startLine' => 27,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Services',
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'currentClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'aliasName' => NULL,
      ),
      'qrCode' => 
      array (
        'name' => 'qrCode',
        'parameters' => 
        array (
          'invoice' => 
          array (
            'name' => 'invoice',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Invoices\\Models\\Invoice',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 64,
            'endLine' => 64,
            'startColumn' => 29,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * The ZATCA payload as an inline SVG data URI, or null when the company has
 * no VAT number on file and the code would carry nothing meaningful.
 */',
        'startLine' => 64,
        'endLine' => 83,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Invoices\\Services',
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'currentClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'aliasName' => NULL,
      ),
      'tempDir' => 
      array (
        'name' => 'tempDir',
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
        'startLine' => 85,
        'endLine' => 94,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Invoices\\Services',
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'currentClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
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