<?php declare(strict_types = 1);

// odsl-C:\newme\app\Modules\Audit\Models\AuditLog.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Audit\Models\AuditLog
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.2.12-a45837dc72b59e761a256b6d74ab07b5d43adcd56bf10be91dd7010e41cb2c15',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'filename' => 'C:/newme/app/Modules/Audit/Models/AuditLog.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Audit\\Models',
    'name' => 'App\\Modules\\Audit\\Models\\AuditLog',
    'shortName' => 'AuditLog',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property int|null $actor_id
 * @property string $action
 * @property string|null $auditable_type
 * @property int|null $auditable_id
 * @property array<string, mixed>|null $old_values
 * @property array<string, mixed>|null $new_values
 * @property string|null $request_id
 * @property Carbon|null $created_at
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 24,
    'endLine' => 70,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
      'UPDATED_AT' => 
      array (
        'declaringClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'implementingClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'name' => 'UPDATED_AT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 26,
            'endLine' => 26,
            'startTokenPos' => 60,
            'startFilePos' => 657,
            'endTokenPos' => 60,
            'endFilePos' => 660,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 26,
        'endLine' => 26,
        'startColumn' => 5,
        'endColumn' => 35,
      ),
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'implementingClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'actor_id\', \'action\', \'auditable_type\', \'auditable_id\', \'old_values\', \'new_values\', \'request_id\']',
          'attributes' => 
          array (
            'startLine' => 31,
            'endLine' => 39,
            'startTokenPos' => 71,
            'startFilePos' => 731,
            'endTokenPos' => 94,
            'endFilePos' => 891,
          ),
        ),
        'docComment' => '/**
 * @var list<string>
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 31,
        'endLine' => 39,
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
        'startLine' => 44,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Modules\\Audit\\Models',
        'declaringClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'implementingClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'currentClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'aliasName' => NULL,
      ),
      'actor' => 
      array (
        'name' => 'actor',
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
        'startLine' => 56,
        'endLine' => 59,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Audit\\Models',
        'declaringClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'implementingClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'currentClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'aliasName' => NULL,
      ),
      'actionLabel' => 
      array (
        'name' => 'actionLabel',
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
 * Human-readable, localized label for the action.
 */',
        'startLine' => 64,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Audit\\Models',
        'declaringClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'implementingClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
        'currentClassName' => 'App\\Modules\\Audit\\Models\\AuditLog',
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