<?php declare(strict_types = 1);

// odsl-D:\newme\newme\app\Modules\Delivery\Services\DeliveryBoardService.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Modules\Delivery\Services\DeliveryBoardService
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.70.0.3-8.4.24-8147880e95b14d9c17f59df2b70c975a09befcddc0f815fd65ea95a1db85be9f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'filename' => 'D:/newme/newme/app/Modules/Delivery/Services/DeliveryBoardService.php',
      ),
    ),
    'namespace' => 'App\\Modules\\Delivery\\Services',
    'name' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
    'shortName' => 'DeliveryBoardService',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 32,
    'docComment' => '/**
 * Builds the day sheet the shipping team works from.
 *
 * Store orders and subscription days are gathered separately because they are
 * scheduled differently: an order sits in the queue from the moment it is
 * confirmed until someone hands it over, while a subscription day belongs to a
 * fixed date on the customer\'s calendar.
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 26,
    'endLine' => 128,
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
      'OPEN_ORDER_STATUSES' => 
      array (
        'declaringClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'implementingClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'name' => 'OPEN_ORDER_STATUSES',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '[\\App\\Modules\\Orders\\Enums\\OrderStatus::Confirmed, \\App\\Modules\\Orders\\Enums\\OrderStatus::Preparing, \\App\\Modules\\Orders\\Enums\\OrderStatus::OutForDelivery]',
          'attributes' => 
          array (
            'startLine' => 29,
            'endLine' => 33,
            'startTokenPos' => 85,
            'startFilePos' => 1002,
            'endTokenPos' => 102,
            'endFilePos' => 1109,
          ),
        ),
        'docComment' => '/** Order states that still owe the customer a hand-over. */',
        'attributes' => 
        array (
        ),
        'startLine' => 29,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 6,
      ),
    ),
    'immediateProperties' => 
    array (
    ),
    'immediateMethods' => 
    array (
      'forDate' => 
      array (
        'name' => 'forDate',
        'parameters' => 
        array (
          'date' => 
          array (
            'name' => 'date',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Carbon',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 35,
            'endLine' => 35,
            'startColumn' => 29,
            'endColumn' => 40,
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
            'name' => 'App\\Modules\\Delivery\\DTOs\\DeliveryBoard',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 35,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Modules\\Delivery\\Services',
        'declaringClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'implementingClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'currentClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'aliasName' => NULL,
      ),
      'stops' => 
      array (
        'name' => 'stops',
        'parameters' => 
        array (
          'date' => 
          array (
            'name' => 'date',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Carbon',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 55,
            'endLine' => 55,
            'startColumn' => 28,
            'endColumn' => 39,
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
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Subscription days scheduled on this date, paused days left out.
 *
 * The schedule lives as JSON on the subscription, so the day is matched in
 * PHP after a coarse SQL filter; only subscriptions that can still deliver
 * (active, or paused with days kept from before the pause) are considered.
 *
 * @return list<SubscriptionStop>
 */',
        'startLine' => 55,
        'endLine' => 97,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Delivery\\Services',
        'declaringClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'implementingClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'currentClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'aliasName' => NULL,
      ),
      'orders' => 
      array (
        'name' => 'orders',
        'parameters' => 
        array (
          'date' => 
          array (
            'name' => 'date',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Carbon',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 107,
            'endLine' => 107,
            'startColumn' => 29,
            'endColumn' => 40,
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
            'name' => 'Illuminate\\Support\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Orders to hand over on this date.
 *
 * Orders have no delivery date of their own: the open queue belongs to
 * today, and any other date shows what was actually handed over then.
 *
 * @return Collection<int, Order>
 */',
        'startLine' => 107,
        'endLine' => 127,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'App\\Modules\\Delivery\\Services',
        'declaringClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'implementingClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
        'currentClassName' => 'App\\Modules\\Delivery\\Services\\DeliveryBoardService',
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