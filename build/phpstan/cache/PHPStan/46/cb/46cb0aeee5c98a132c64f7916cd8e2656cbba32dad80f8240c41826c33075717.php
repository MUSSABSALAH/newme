<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Notifications\Services\AdminNotifier.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Notifications\Services\AdminNotifier
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-2a9d7a2bad08be69fdb6c7928c4e8e2631c7d2cb3a806290dfc467eb13ef41b8',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'filename' => 'D:/newme/newme/app/Modules/Notifications/Services/AdminNotifier.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Notifications\\Services',
    'name' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
    'shortName' => 'AdminNotifier',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Fans store activity out to the staff who are allowed to act on it.
 *
 * Recipients are derived from permissions rather than roles, so granting a new
 * role "orders.view" is enough to start receiving order notifications.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 26,
    'endLine' => 72,
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
      'orderPlaced' => 
      array (
        'name' => 'orderPlaced',
        'parameters' => 
        array (
          'order' => 
          array (
            'name' => 'order',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Orders\\Models\\Order',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 28,
            'endLine' => 28,
            'startColumn' => 33,
            'endColumn' => 44,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 28,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Notifications\\Services',
        'declaringClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'implementingClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'currentClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'aliasName' => NULL,
      ),
      'subscriptionStarted' => 
      array (
        'name' => 'subscriptionStarted',
        'parameters' => 
        array (
          'subscription' => 
          array (
            'name' => 'subscription',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 37,
            'endLine' => 37,
            'startColumn' => 41,
            'endColumn' => 66,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 37,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Notifications\\Services',
        'declaringClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'implementingClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'currentClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'aliasName' => NULL,
      ),
      'consultationBooked' => 
      array (
        'name' => 'consultationBooked',
        'parameters' => 
        array (
          'consultation' => 
          array (
            'name' => 'consultation',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Consultations\\Models\\Consultation',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 46,
            'endLine' => 46,
            'startColumn' => 40,
            'endColumn' => 65,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 46,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Notifications\\Services',
        'declaringClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'implementingClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'currentClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'aliasName' => NULL,
      ),
      'recipients' => 
      array (
        'name' => 'recipients',
        'parameters' => 
        array (
          'permission' => 
          array (
            'name' => 'permission',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Modules\\Identity\\Enums\\PermissionName',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 60,
            'endLine' => 60,
            'startColumn' => 33,
            'endColumn' => 58,
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
            'name' => 'Illuminate\\Database\\Eloquent\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Active staff holding the given permission, directly or through a role.
 *
 * @return Collection<int, User>
 */',
        'startLine' => 60,
        'endLine' => 71,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Notifications\\Services',
        'declaringClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'implementingClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
        'currentClassName' => 'App\\Modules\\Notifications\\Services\\AdminNotifier',
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