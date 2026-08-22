<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Invoices\Services\InvoiceNumberGenerator.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Invoices\Services\InvoiceNumberGenerator
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-65f59ec2d68c7d53d033157d58d21db87f2648e634f8e2771538d53aa817c705',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'filename' => 'D:/newme/newme/app/Modules/Invoices/Services/InvoiceNumberGenerator.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Invoices\\Services',
    'name' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
    'shortName' => 'InvoiceNumberGenerator',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Hands out gap-free invoice numbers of the form INV-2026-000001.
 *
 * The sequence restarts each calendar year. Callers must run this inside the
 * transaction that inserts the invoice: the row lock taken here only holds for
 * the length of that transaction, and the unique index on `number` is the
 * backstop if two writers still manage to collide.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 40,
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
      'PREFIX' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'name' => 'PREFIX',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'INV\'',
          'attributes' => 
          array (
            'startLine' => 20,
            'endLine' => 20,
            'startTokenPos' => 43,
            'startFilePos' => 572,
            'endTokenPos' => 43,
            'endFilePos' => 576,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 20,
        'endLine' => 20,
        'startColumn' => 5,
        'endColumn' => 33,
      ),
      'SEQUENCE_LENGTH' => 
      array (
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'name' => 'SEQUENCE_LENGTH',
        'modifiers' => 4,
        'type' => NULL,
        'value' => 
        array (
          'code' => '6',
          'attributes' => 
          array (
            'startLine' => 22,
            'endLine' => 22,
            'startTokenPos' => 54,
            'startFilePos' => 616,
            'endTokenPos' => 54,
            'endFilePos' => 616,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 22,
        'endLine' => 22,
        'startColumn' => 5,
        'endColumn' => 38,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'next' => 
      array (
        'name' => 'next',
        'parameters' => 
        array (
          'issuedAt' => 
          array (
            'name' => 'issuedAt',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Carbon\\CarbonInterface',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 24,
            'endLine' => 24,
            'startColumn' => 26,
            'endColumn' => 50,
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
        'startLine' => 24,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Invoices\\Services',
        'declaringClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'implementingClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
        'currentClassName' => 'App\\Modules\\Invoices\\Services\\InvoiceNumberGenerator',
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