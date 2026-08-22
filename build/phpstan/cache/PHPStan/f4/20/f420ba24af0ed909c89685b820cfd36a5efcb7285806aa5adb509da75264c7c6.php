<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Cms\Seeders\CmsContentSeeder.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Cms\Seeders\CmsContentSeeder
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-abcc0d40b49c0c655c21f5e19bfa10a64e4627d596d70b42248e4fc268801556',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'filename' => 'D:/newme/newme/app/Modules/Cms/Seeders/CmsContentSeeder.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Cms\\Seeders',
    'name' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
    'shortName' => 'CmsContentSeeder',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Seeds website articles & recipes from the previous static lang content.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 16,
    'endLine' => 389,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Seeder',
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
      'run' => 
      array (
        'name' => 'run',
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
        'startLine' => 18,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Cms\\Seeders',
        'declaringClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'implementingClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'currentClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'aliasName' => NULL,
      ),
      'copyImage' => 
      array (
        'name' => 'copyImage',
        'parameters' => 
        array (
          'filename' => 
          array (
            'name' => 'filename',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 97,
            'endLine' => 97,
            'startColumn' => 32,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'folder' => 
          array (
            'name' => 'folder',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 97,
            'endLine' => 97,
            'startColumn' => 50,
            'endColumn' => 63,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Copy a static CMS image from public/assets/images into the public
 * storage disk (and the committed public/storage mirror) so website and
 * admin share the same path.
 */',
        'startLine' => 97,
        'endLine' => 112,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Cms\\Seeders',
        'declaringClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'implementingClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'currentClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'aliasName' => NULL,
      ),
      'articles' => 
      array (
        'name' => 'articles',
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
 * @return list<array<string, mixed>>
 */',
        'startLine' => 117,
        'endLine' => 220,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Cms\\Seeders',
        'declaringClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'implementingClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'currentClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'aliasName' => NULL,
      ),
      'recipes' => 
      array (
        'name' => 'recipes',
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
 * @return list<array<string, mixed>>
 */',
        'startLine' => 225,
        'endLine' => 388,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Cms\\Seeders',
        'declaringClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'implementingClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
        'currentClassName' => 'App\\Modules\\Cms\\Seeders\\CmsContentSeeder',
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