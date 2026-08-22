<?php declare(strict_types = 1);

// osfsl-D:\newme\newme\app\Modules\Invoices\Services\InvoicePdfRenderer.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Invoices\Services\InvoicePdfRenderer
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-438439a0c6805bbda6a4d9c211c67be12100a87732d8c248e3c7ac4ef851cfbe-8.4.24-6.70.0.3',
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
 * Renders an invoice to PDF bytes on the New Me letterhead.
 *
 * The branded template is a full-page watermark. The ZATCA Phase-1 QR (TLV
 * seller / VAT / timestamp / totals) is drawn over the printed code on the
 * letterhead so a reader app can verify the tax invoice.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 149,
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
          'code' => '360',
          'attributes' => 
          array (
            'startLine' => 25,
            'endLine' => 25,
            'startTokenPos' => 73,
            'startFilePos' => 675,
            'endTokenPos' => 73,
            'endFilePos' => 677,
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
      'LETTERHEAD' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'name' => 'LETTERHEAD',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'images/invoices/letterhead.jpg\'',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 84,
            'startFilePos' => 712,
            'endTokenPos' => 84,
            'endFilePos' => 743,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 64,
      ),
      'QR_X_MM' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'name' => 'QR_X_MM',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '147.8',
          'attributes' => 
          array (
            'startLine' => 33,
            'endLine' => 33,
            'startTokenPos' => 97,
            'startFilePos' => 942,
            'endTokenPos' => 97,
            'endFilePos' => 946,
          ),
        ),
        'docComment' => '/**
 * Position of the letterhead QR box, in millimetres from the page origin.
 * Measured on the 728×1024 letterhead stretched to A4 (210×297).
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 33,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 34,
      ),
      'QR_Y_MM' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'name' => 'QR_Y_MM',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '259.5',
          'attributes' => 
          array (
            'startLine' => 35,
            'endLine' => 35,
            'startTokenPos' => 108,
            'startFilePos' => 978,
            'endTokenPos' => 108,
            'endFilePos' => 982,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 35,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 34,
      ),
      'QR_SIZE_MM' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoicePdfRenderer',
        'name' => 'QR_SIZE_MM',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '23.5',
          'attributes' => 
          array (
            'startLine' => 37,
            'endLine' => 37,
            'startTokenPos' => 119,
            'startFilePos' => 1017,
            'endTokenPos' => 119,
            'endFilePos' => 1020,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 36,
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
            'startLine' => 39,
            'endLine' => 39,
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
        'startLine' => 39,
        'endLine' => 86,
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
      'stampQr' => 
      array (
        'name' => 'stampQr',
        'parameters' => 
        array (
          'pdf' => 
          array (
            'name' => 'pdf',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Mpdf\\Mpdf',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 88,
            'endLine' => 88,
            'startColumn' => 30,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'qrPath' => 
          array (
            'name' => 'qrPath',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 88,
            'endLine' => 88,
            'startColumn' => 41,
            'endColumn' => 55,
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
        'docComment' => NULL,
        'startLine' => 88,
        'endLine' => 110,
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
      'writeQrPng' => 
      array (
        'name' => 'writeQrPng',
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
            'startLine' => 116,
            'endLine' => 116,
            'startColumn' => 33,
            'endColumn' => 48,
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
 * Write the ZATCA payload as a PNG. Null when the seller has no VAT number,
 * because a Phase-1 code without it is not a valid tax invoice QR.
 */',
        'startLine' => 116,
        'endLine' => 137,
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
        'startLine' => 139,
        'endLine' => 148,
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