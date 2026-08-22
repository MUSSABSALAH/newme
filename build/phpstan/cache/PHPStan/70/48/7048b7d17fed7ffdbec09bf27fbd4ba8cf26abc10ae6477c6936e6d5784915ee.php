<?php declare(strict_types = 1);

// ftm-D:\newme\newme\app\Modules\Subscriptions\Models\Subscription.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.3',
   'data' => 
  array (
    0 => 
    array (
      'f33871e210f9e22c1a256b873af5a8df' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'd1f62dcac286ed386e83e081caa225bc' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
         'uses' => 
        array (
          'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
          'TFactory' => 
          array (
            0 => '@template',
            1 => 
            \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
               'name' => 'TFactory',
               'bound' => 
              \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                 'name' => '\\Illuminate\\Database\\Eloquent\\Factories\\Factory',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
               'default' => NULL,
               'lowerBound' => NULL,
               'description' => '',
               'attributes' => 
              array (
                'startLine' => 2,
                'endLine' => 2,
              ),
            )),
          ),
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'cc8f2a08d9a93219ce55d1cecff7db10' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
         'uses' => 
        array (
          'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'factory',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
           'uses' => 
          array (
            'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TFactory' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TFactory',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Factories\\Factory',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '32e962f535f2011c382dddd058e980d5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
         'uses' => 
        array (
          'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'newFactory',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
           'uses' => 
          array (
            'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TFactory' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TFactory',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Factories\\Factory',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '4cb2c5ad5a204f80f0270253eb8c2ef2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
         'uses' => 
        array (
          'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'getUseFactoryAttribute',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent\\Factories',
           'uses' => 
          array (
            'usefactory' => 'Illuminate\\Database\\Eloquent\\Attributes\\UseFactory',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
            'TFactory' => 
            array (
              0 => '@template',
              1 => 
              \PHPStan\PhpDocParser\Ast\PhpDoc\TemplateTagValueNode::__set_state(array(
                 'name' => 'TFactory',
                 'bound' => 
                \PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode::__set_state(array(
                   'name' => '\\Illuminate\\Database\\Eloquent\\Factories\\Factory',
                   'attributes' => 
                  array (
                    'startLine' => 2,
                    'endLine' => 2,
                  ),
                )),
                 'default' => NULL,
                 'lowerBound' => NULL,
                 'description' => '',
                 'attributes' => 
                array (
                  'startLine' => 2,
                  'endLine' => 2,
                ),
              )),
            ),
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '0e77a3fef63a4c5d612f7487bbf25281' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => NULL,
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => NULL,
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '83af320d654ff500d834a09abe405750' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'bootSoftDeletes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '4b82fa4bc1a615e8b63e5540eed584c1' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'initializeSoftDeletes',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '8a573a16a06c833715f46415e18c439b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'forceDelete',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '41fe49e2ebc8f8e23d5343b3da332d86' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'forceDeleteQuietly',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'c83d257f415e6a48abc4420b853f96f4' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'forceDestroy',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'cc16b4d89b0efae5cd46fd1e0d0cdbe7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'performDeleteOnModel',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'ccea3bfcefb52667b7716f2473ccd16e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'runSoftDelete',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'a529904307bfd6f537e5401679cda48b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'restore',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'e85e02eff853aeea01c88323bbae00c5' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'restoreQuietly',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'e84ce10845ac6f3abd7ca6c687fcd673' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'trashed',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '7d7cd8eaad7774dde5df463d4a9b2a38' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'softDeleted',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '80c1462ef189548c3da10542b3689aca' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'restoring',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '8a4ae5f77daeaab2e12208a9ec77fc9b' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'restored',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '059a1b43487e0e11550109e663823045' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'forceDeleting',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '763d071188dddc1c9164f114b072b790' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'forceDeleted',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '2489bad962bb712ff1f81b48a914b2e6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'isForceDeleting',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '13a93b31fad9606ef75ecefcdc2ccb03' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'getDeletedAtColumn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      '781165e40f85033fd667a0cb1fd1edeb' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'Illuminate\\Database\\Eloquent',
         'uses' => 
        array (
          'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
          'basecollection' => 'Illuminate\\Support\\Collection',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'getQualifiedDeletedAtColumn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'Illuminate\\Database\\Eloquent',
           'uses' => 
          array (
            'eloquentcollection' => 'Illuminate\\Database\\Eloquent\\Collection',
            'basecollection' => 'Illuminate\\Support\\Collection',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
         'traitData' => 
        array (
          0 => 'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php',
          1 => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          3 => NULL,
          4 => '/** @use HasFactory<SubscriptionFactory> */',
        ),
      )),
      'a9a7a2f3c38068b654ca77b4c25b6e16' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'booted',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b733058a572f0f8324e00e131e79a1b0' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'newFactory',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c9faa01cdb23dff56536ed056537092e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'casts',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'b9a2b6f5c1d7cce2b26730108ff435e3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'getRouteKeyName',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '3cedc022c2051631c0adcf7ca6c7e243' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'user',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '59dc427d802311a11095b545ecd360f7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'handler',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ed609ef4a42b7618e46ed74aacddb6a2' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'plan',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6c8a87026fbd21df071651bac13d85d7' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'address',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'fbce8d86e8016892a71401f2076ce42e' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'payments',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f6c26b5860395644c697d0bdebf5207a' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'reference',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'ef690a33328ed8ae2be7808f90630056' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'deliveryAddress',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '634ab04bd81cc4e3de651edb37594837' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'totalDisplay',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '9ceddb2b1499d6e7de81733d8cc0be7f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'perDayDisplay',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f5bec6eefced718e7c515c9ae3f7ed53' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'couponDiscountDisplay',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'da4adab76347cf7a2edd7db4025bbbff' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'hasCouponDiscount',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '37c541682c05526c4c2e6d34bca02afa' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'needsHandling',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '72864057004aba7d89ac1f1dd581bde3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'hasMealSchedule',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'f3baf3252b5f6864e3ecc87ee2c892ba' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'isPaused',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'eb76396aad90480214d4b87f163c1039' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'allowsPause',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '8b11c3fc9bd8db6b92986f7a12b28823' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'frozenDaysCount',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '2d176db81428745aabc1f98abba6c4f6' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'scheduleDaysWithPauseState',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      '6143bcfbd412b45f68a2d7cd4e0bc74f' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'endDate',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
      'c288fdfe43383a3245f6292fd88f6b59' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Subscriptions\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
          'address' => 'App\\Modules\\Addresses\\Models\\Address',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
          'payment' => 'App\\Modules\\Payments\\Models\\Payment',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
          'money' => 'App\\Support\\Money\\Money',
          'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
         'functionName' => 'mealScheduleDays',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Subscriptions\\Models',
           'uses' => 
          array (
            'user' => 'App\\Models\\User',
            'addresssnapshot' => 'App\\Modules\\Addresses\\DTOs\\AddressSnapshot',
            'address' => 'App\\Modules\\Addresses\\Models\\Address',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'paymentstatus' => 'App\\Modules\\Payments\\Enums\\PaymentStatus',
            'payment' => 'App\\Modules\\Payments\\Models\\Payment',
            'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
            'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
            'mealschedule' => 'App\\Modules\\Subscriptions\\Support\\MealSchedule',
            'money' => 'App\\Support\\Money\\Money',
            'subscriptionfactory' => 'Database\\Factories\\SubscriptionFactory',
            'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
            'model' => 'Illuminate\\Database\\Eloquent\\Model',
            'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'morphmany' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
            'carbon' => 'Illuminate\\Support\\Carbon',
            'str' => 'Illuminate\\Support\\Str',
          ),
           'className' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
           'functionName' => NULL,
           'templatePhpDocNodes' => 
          array (
          ),
           'parent' => NULL,
           'typeAliasesMap' => 
          array (
          ),
           'bypassTypeAliases' => false,
           'constUses' => 
          array (
          ),
           'typeAliasClassName' => NULL,
           'traitData' => NULL,
        )),
         'typeAliasesMap' => 
        array (
        ),
         'bypassTypeAliases' => false,
         'constUses' => 
        array (
        ),
         'typeAliasClassName' => NULL,
         'traitData' => NULL,
      )),
    ),
    1 => 
    array (
      'D:\\newme\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php' => '9e3621965d4780586fd1be1a34949644ff21ef95950f87144a6ca06840661591',
      'D:\\newme\\newme\\vendor\\composer\\..\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Factories\\HasFactory.php' => 'b6cb2b164e90168e80963a5549541f5f3188a3ec8cfd368bf3611bd94fbd46a7',
      'D:\\newme\\newme\\vendor\\composer\\..\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\SoftDeletes.php' => 'da1b0c13d78ba2f62e97e5627c3149f4e81b9cf9b6092d4ca7f02ca5e5bbcfec',
    ),
  ),
));