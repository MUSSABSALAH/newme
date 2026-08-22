<?php declare(strict_types = 1);

// osfsl-D:/newme/newme/vendor/composer/../mpdf/qrcode/src/Output/Svg.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Mpdf\QrCode\Output\Svg
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-bf0162799be35a94628de4cfad1e2c4e7da9fcb9d433df2a33567de80fa71589-8.4.24-6.70.0.3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Mpdf\\QrCode\\Output\\Svg',
        'filename' => 'D:/newme/newme/vendor/composer/../mpdf/qrcode/src/Output/Svg.php',
      ),
    ),
    'namespace' => 'Mpdf\\QrCode\\Output',
    'name' => 'Mpdf\\QrCode\\Output\\Svg',
    'shortName' => 'Svg',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 8,
    'endLine' => 162,
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
          'size' => 
          array (
            'name' => 'size',
            'default' => 
            array (
              'code' => '100',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 40,
                'startFilePos' => 520,
                'endTokenPos' => 40,
                'endFilePos' => 522,
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
            'endColumn' => 51,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'background' => 
          array (
            'name' => 'background',
            'default' => 
            array (
              'code' => '\'white\'',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 47,
                'startFilePos' => 539,
                'endTokenPos' => 47,
                'endFilePos' => 545,
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
            'startColumn' => 54,
            'endColumn' => 74,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'color' => 
          array (
            'name' => 'color',
            'default' => 
            array (
              'code' => '\'black\'',
              'attributes' => 
              array (
                'startLine' => 19,
                'endLine' => 19,
                'startTokenPos' => 54,
                'startFilePos' => 557,
                'endTokenPos' => 54,
                'endFilePos' => 563,
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
            'startColumn' => 77,
            'endColumn' => 92,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param QrCode $qrCode	 QR code instance
 * @param int	$size	   The width / height of the resulting SVG
 * @param string $background The background color, e. g. "white", "rgb(0,0,0)" or "cmyk(0,0,0,0)"
 * @param string $color	  The foreground and border color, e. g. "black", "rgb(255,255,255)" or "cmyk(0,0,0,100)"
 *
 * @return string Binary image data
 */',
        'startLine' => 19,
        'endLine' => 140,
        'startColumn' => 2,
        'endColumn' => 2,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Mpdf\\QrCode\\Output',
        'declaringClassName' => 'Mpdf\\QrCode\\Output\\Svg',
        'implementingClassName' => 'Mpdf\\QrCode\\Output\\Svg',
        'currentClassName' => 'Mpdf\\QrCode\\Output\\Svg',
        'aliasName' => NULL,
      ),
      'addChild' => 
      array (
        'name' => 'addChild',
        'parameters' => 
        array (
          'svg' => 
          array (
            'name' => 'svg',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'SimpleXMLElement',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 152,
            'endLine' => 152,
            'startColumn' => 27,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'name' => 
          array (
            'name' => 'name',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 152,
            'endLine' => 152,
            'startColumn' => 50,
            'endColumn' => 54,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'attributes' => 
          array (
            'name' => 'attributes',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 152,
                'endLine' => 152,
                'startTokenPos' => 922,
                'startFilePos' => 3512,
                'endTokenPos' => 923,
                'endFilePos' => 3513,
              ),
            ),
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
            'startLine' => 152,
            'endLine' => 152,
            'startColumn' => 57,
            'endColumn' => 78,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Adds a child with the given attributes
 *
 * @param SimpleXMLElement $svg
 * @param string		   $name
 * @param array			$attributes
 *
 * @return SimpleXMLElement
 */',
        'startLine' => 152,
        'endLine' => 161,
        'startColumn' => 2,
        'endColumn' => 2,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Mpdf\\QrCode\\Output',
        'declaringClassName' => 'Mpdf\\QrCode\\Output\\Svg',
        'implementingClassName' => 'Mpdf\\QrCode\\Output\\Svg',
        'currentClassName' => 'Mpdf\\QrCode\\Output\\Svg',
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