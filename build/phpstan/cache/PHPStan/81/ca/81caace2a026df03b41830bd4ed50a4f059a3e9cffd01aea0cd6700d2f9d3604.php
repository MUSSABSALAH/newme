<?php declare(strict_types = 1);

// osfsl-D:/newme/newme/vendor/composer/../mpdf/qrcode/src/Output/Png.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Mpdf\QrCode\Output\Png
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-c3cd445908bc53c1df622244f5c77eea8745ded62b69594fccf146182a9fd430-8.4.24-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Mpdf\\QrCode\\Output\\Png',
        'filename' => 'D:/newme/newme/vendor/composer/../mpdf/qrcode/src/Output/Png.php',
      ),
    ),
    'namespace' => 'Mpdf\\QrCode\\Output',
    'name' => 'Mpdf\\QrCode\\Output\\Png',
    'shortName' => 'Png',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 7,
    'endLine' => 68,
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
      'output' => 
      array (
        'name' => 'output',
        'parameters' => 
        array (
          'qrCode' => 
          array (
            'name' => 'qrCode',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Mpdf\\QrCode\\QrCode',
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
            'startColumn' => 25,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'w' => 
          array (
            'name' => 'w',
            'default' => 
            array (
              'code' => '100',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 35,
                'startFilePos' => 457,
                'endTokenPos' => 35,
                'endFilePos' => 459,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 41,
            'endColumn' => 48,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'background' => 
          array (
            'name' => 'background',
            'default' => 
            array (
              'code' => '[255, 255, 255]',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 42,
                'startFilePos' => 476,
                'endTokenPos' => 50,
                'endFilePos' => 490,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 51,
            'endColumn' => 79,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'color' => 
          array (
            'name' => 'color',
            'default' => 
            array (
              'code' => '[0, 0, 0]',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 57,
                'startFilePos' => 502,
                'endTokenPos' => 65,
                'endFilePos' => 510,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 82,
            'endColumn' => 99,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'compression' => 
          array (
            'name' => 'compression',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 72,
                'startFilePos' => 528,
                'endTokenPos' => 72,
                'endFilePos' => 528,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 19,
            'endLine' => 19,
            'startColumn' => 102,
            'endColumn' => 117,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param \\Mpdf\\QrCode\\QrCode $qrCode QR code instance
 * @param int $w QR code width in pixels
 * @param int[] $background RGB background color
 * @param int[] $color RGB foreground and border color
 * @param int $compression Level (0 - no compression, 9 - greatest compression)
 *
 * @return string Binary image data
 */',
        'startLine' => 19,
        'endLine' => 66,
        'startColumn' => 2,
        'endColumn' => 2,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Mpdf\\QrCode\\Output',
        'declaringClassName' => 'Mpdf\\QrCode\\Output\\Png',
        'implementingClassName' => 'Mpdf\\QrCode\\Output\\Png',
        'currentClassName' => 'Mpdf\\QrCode\\Output\\Png',
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