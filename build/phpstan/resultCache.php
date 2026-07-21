<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1784192936,
	'meta' => array (
  'cacheVersion' => 'v13-packageDependencies',
  'phpstanVersion' => '2.2.5',
  'fnsr' => false,
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80212,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule: {phpstan.rules.rule: %noUnnecessaryEnumerableToArrayCalls%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\NoMissingTranslationsRule: {phpstan.rules.rule: %checkMissingTranslations%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}, Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule: {phpstan.rules.rule: %checkModelMethodVisibility%}, Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %generalizeEnvReturnType%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension: {phpstan.broker.dynamicMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension: {phpstan.broker.dynamicStaticMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\Rules\\ConfigCollectionRule: {phpstan.rules.rule: %checkConfigTypes%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional], earlyTerminatingFunctionCalls: [abort, dd], mixinExcludeClasses: [Eloquent], bootstrapFiles: [bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: true, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], noUnnecessaryEnumerableToArrayCalls: false, squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, configDirectories: [], viewDirectories: [], translationDirectories: [], checkModelProperties: false, checkUnusedViews: false, checkMissingTranslations: false, checkModelAppends: true, checkModelMethodVisibility: false, generalizeEnvReturnType: false, checkConfigTypes: false, checkAuthCallsWhenInRequestScope: false, parseModelCastsMethod: false, enableMigrationCache: false, level: 6, paths: [C:\\newme\\app, C:\\newme\\bootstrap\\app.php, C:\\newme\\routes], tmpDir: C:\\newme\\build\\phpstan}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: {{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ContractsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\FacadesMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ManagersMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\AuthsMethodsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule, arguments: {configDirectories: %configDirectories%}}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppFacadeEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\CollectionOf\\CollectionOfTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @migrationsParser, reflectionProvider: @reflectionProvider}}, iamcalSqlParser: {class: Larastan\\Larastan\\SQL\\IamcalSqlParser, autowired: false}, sqlParserFactory: {class: Larastan\\Larastan\\SQL\\SqlParserFactory, arguments: {iamcalSqlParser: @iamcalSqlParser}}, sqlParser: {type: Larastan\\Larastan\\SQL\\SqlParser, factory: [@sqlParserFactory, create]}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper, arguments: {parser: @currentPhpVersionSimpleDirectParser, parseModelCastsMethod: %parseModelCastsMethod%}}, {class: Larastan\\Larastan\\Properties\\MigrationCache, arguments: {cacheDirectory: %tmpDir%, enabled: %enableMigrationCache%}}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\MySqlDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\Support\\ViewParser, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Rules\\NoMissingTranslationsRule, arguments: {translationDirectories: %translationDirectories%}}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationTranslatorCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFacadeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationViewCollector}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\LangGetReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension}, {class: Larastan\\Larastan\\Support\\ConfigParser, arguments: {parser: @currentPhpVersionSimpleDirectParser, configPaths: %configDirectories%, treatPhpDocTypesAsCertain: %treatPhpDocTypesAsCertain%}}, {class: Larastan\\Larastan\\Internal\\ConfigHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\FormRequestSafeDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentCollectionMapDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\ConfigCollectionRule}, {class: Illuminate\\Filesystem\\Filesystem, autowired: self}, migrationsParser: {class: PHPStan\\Parser\\CachedParser, arguments: {originalParser: @currentPhpVersionSimpleDirectParser, cachedNodesByStringCountMax: %cache.nodesByStringCountMax%}, autowired: false}}}',
  'analysedPaths' => 
  array (
    0 => 'C:\\newme\\app',
    1 => 'C:\\newme\\bootstrap\\app.php',
    2 => 'C:\\newme\\routes',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    'C:/newme/composer.lock' => 'd6662b6d13f541d588dccbe941791e698e1a27c390b32f048a87ef17a746244b',
  ),
  'composerInstalled' => 
  array (
    'C:/newme/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'brick/math' => 
        array (
          'pretty_version' => '0.14.8',
          'version' => '0.14.8.0',
          'reference' => '63422359a44b7f06cae63c3b429b59e8efcc0629',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'd61a8a9604ec1f8c3d150d09db6ce98b32675013',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '38aaa6c3fd4c157ffe2a4d10aa8b9b16ba8de379',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.14.2',
          'version' => '7.14.2.0',
          'reference' => 'fa88c57803501ad0770f5cddb1e60525d49da9a1',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.5.1',
          'version' => '2.5.1.0',
          'reference' => '9ad1e4fc607446a055b95870c7f668e93b5cff29',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.12.5',
          'version' => '2.12.5.0',
          'reference' => '9365d578a9fd1552ad6ca9c3cb530708526feb09',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.9',
          'version' => '1.0.9.0',
          'reference' => 'd7580af6d3f8384325d9cd3e99b21c3ed1848176',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'iamcal/sql-parser' => 
        array (
          'pretty_version' => 'v0.7',
          'version' => '0.7.0.0',
          'reference' => '610392f38de49a44dab08dc1659960a29874c4b8',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../iamcal/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/reflection' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.64.0',
          ),
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v3.10.0',
          'version' => '3.10.0.0',
          'reference' => '2970f83398154178a739609c244577267c7ee8eb',
          'type' => 'phpstan-extension',
          'install_path' => 'C:\\newme\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.64.0',
          'version' => '12.64.0.0',
          'reference' => '727a8ea2949c23ca8b5316b86a00984b6017b7a0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.7',
          'version' => '1.2.7.0',
          'reference' => '2f7d27dada8effc48b8c424445a69cca7007daaa',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.29.3',
          'version' => '1.29.3.0',
          'reference' => 'da1d1111a6aa2e082d2a388b194afe1ba0a05d14',
          'type' => 'project',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.21',
          'version' => '0.3.21.0',
          'reference' => '7753c65c281c2550c7c183f14e18062073b7d821',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.63.0',
          'version' => '1.63.0.0',
          'reference' => '51bbce3f803c1d386cabbb44e618c955a12ff5fc',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/sanctum' => 
        array (
          'pretty_version' => 'v4.3.2',
          'version' => '4.3.2.0',
          'reference' => '2a9bccc18e9907808e0018dd15fa643937886b1e',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/sanctum',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.13',
          'version' => '2.0.13.0',
          'reference' => 'b566ee0dd251f3c4078bed003a7ce015f5ea6dce',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.11.1',
          'version' => '2.11.1.0',
          'reference' => 'c9f80cc835649b5c1842898fb043f8cc098dd741',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.8.3',
          'version' => '2.8.3.0',
          'reference' => '1902f60f984235023acbe03db6ad614a37b3c3e7',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.35.2',
          'version' => '3.35.2.0',
          'reference' => 'b277b5dc3d56650b68904117124e79c851e12376',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.31.0',
          'version' => '3.31.0.0',
          'reference' => '2f669db18a4c20c755c2bb7d3a7b0b2340488079',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.17.0',
          'version' => '1.17.0.0',
          'reference' => 'f5f47eff7c48ed1003069a2ca67f316fb4021c76',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '08cf38e3924d4f56238125547b5720496fac8fd4',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.8.1',
          'version' => '7.8.1.0',
          'reference' => '85d5c77c5d6d3af6c54db4a78246364908f3c928',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.10.0',
          'version' => '3.10.0.0',
          'reference' => 'b321dd6749f0bf7189444158a3ce785cc16d69b0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.13.1',
          'version' => '3.13.1.0',
          'reference' => '2937ad3d1d2c506fd2bc97d571438a95641f44e2',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.5',
          'version' => '1.3.5.0',
          'reference' => 'f0ab1a3cda782dbc5da270d28545236aa80c4002',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.4',
          'version' => '4.1.4.0',
          'reference' => '7da6c396d7ebe142bc857c20479d5e70a5e1aac7',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.8.0',
          'version' => '5.8.0.0',
          'reference' => '044a6a392ff8ad0d61f14370a5fbbd0a0107152f',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.9.5',
          'version' => '8.9.5.0',
          'reference' => 'fb53eacd509a1d303858e2d20cfebf2d630254ec',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '712a31b768f5daea284c2169a7d227031001b9a8',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.2.5',
          'version' => '2.2.5.0',
          'reference' => '909c1e5fef7989ac0d0c1c5c42e32a5c4f6198a0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.12',
          'version' => '11.0.12.0',
          'reference' => '2c1ed04922802c15e1de5d7447b4856de949cf56',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.1',
          'version' => '5.1.1.0',
          'reference' => '2f3a64888c814fc235386b7387dd5b5ed92ad903',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.56',
          'version' => '11.5.56.0',
          'reference' => '5f83edffa6967c3db468d48a695ec7bcb02e9256',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.24',
          'version' => '0.12.24.0',
          'reference' => 'ca0fdcf8a7617afa3adfdf1b5fef573dffb69ca1',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.3',
          'version' => '4.9.3.0',
          'reference' => '1df15849d00943a67d677dc9cfd80795f038c9f8',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.9.3',
          ),
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.3',
          'version' => '6.3.3.0',
          'reference' => '2c95e1e86cb8dd41beb8d502057d1081ccc8eca9',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/laravel-package-tools' => 
        array (
          'pretty_version' => '1.93.1',
          'version' => '1.93.1.0',
          'reference' => 'd5552849801f2642aea710557463234b59ef65eb',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../spatie/laravel-package-tools',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/laravel-permission' => 
        array (
          'pretty_version' => '6.25.0',
          'version' => '6.25.0.0',
          'reference' => 'd7d4cb0d58616722f1afc90e0484e4825155b9b3',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../spatie/laravel-permission',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/laravel-translatable' => 
        array (
          'pretty_version' => '6.11.4',
          'version' => '6.11.4.0',
          'reference' => '032d85b28de315310dab2048b857016f1194f68b',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../spatie/laravel-translatable',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v7.4.8',
          'version' => '7.4.8.0',
          'reference' => '674fa3b98e21531dd040e613479f5f6fa8f32111',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '92f58bc4bf97a92ed1b9f367f0cd44f20bde0e87',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => 'b75663ed96cf4756e28e3105476f220f92886cc4',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'f3202fa1b5097b0af062dc978b32ecf63404e31d',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '4e1a093b481f323e6e326451f9760c3868430673',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '51fe3d170227be8d1772214b82ae506e15ed78ff',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c7de7a00ffb67842132da02ea92988a39ccd9f4e',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '13b38720174286f55d1761152b575a8d1436fc25',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '06db5ae1552177bf8572f8908839f12e3c06aed3',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'e99af79b1e776646eda0e1c23b7b45c184ff99be',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'f88ce03ae73e3edb5c176ce1f337709996e88495',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => 'a845722765c4f6b2ce88beaf4f4479975b186770',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '141046a8f9477948ff284fa65be2095baafb94f2',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'e9247d281d694a5120554d9afaf54e070e88a603',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'dc21118016c039a66235cf93d96b435ffb282412',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.38.0',
          'version' => '1.38.0.0',
          'reference' => '2d446c214bdbe5b71bde5011b060a05fece3ae6b',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => 'd3d318bad5e7a1bfbd026009c8bfb8d8f99ae6b6',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => 'dfb55726c3a76ea3b6459fcfda1ec2d80a682411',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.38.2',
          'version' => '1.38.2.0',
          'reference' => '796a26abb75ce49f3a84433cd81bf1009d73d5f8',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'f4e1dfaee5b74aba5964fe1fd4dfc7ba5e3085fa',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.38.1',
          'version' => '1.38.1.0',
          'reference' => 'ba2ba04f3352cfa2dcbbcb90aee13ed967f505b1',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.37.0',
          'version' => '1.37.0.0',
          'reference' => '26dfec253c4cf3e51b541b52ddf7e42cb0908e94',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => 'f5804be144caceb570f6747519999636b664f24c',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => '3a162171bb008e5e0f15dce6581373a4c0e8390d',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'c0a284bab1ed8aa0417e3d69250ab437739563a0',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v7.4.13',
          'version' => '7.4.13.0',
          'reference' => '961683010db3b27ec6ebcd7308e6e1ee8fa7ffde',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'a1af4dacb24eb7ef4f1ca71b94da8ddbce572281',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.7.1',
          'version' => '3.7.1.0',
          'reference' => 'ccb206b98faccc511ebae8e5fad50f2dc0b30621',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.4.9',
          'version' => '7.4.9.0',
          'reference' => '2676b524340abcfe4d6151ec698463cebafee439',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => '9a3a56a4a1e65a5cb4f8d13801fe8ab0a170e358',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.4.14',
          'version' => '7.4.14.0',
          'reference' => 'f8f328665ace2370d1e10645b807ba1646dc7dcc',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.3.1',
          'version' => '1.3.1.0',
          'reference' => 'b7489ce515e168639d17feec34b8847c326b0b3c',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'f0292ccf0ec75843d65027214426b6b163b48b41',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.4',
          'version' => '5.6.4.0',
          'reference' => '416df702837983f8d5ff48c9c3fee4f5f57b980b',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '8e1051fe39379367aecf014f41744ce7539a856f',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'C:\\newme\\vendor\\larastan\\larastan\\bootstrap.php' => '5a3eacbf63b3e41659adfee92facededf8e020a932800f93c9a8b0e67f235805',
    'phar://C:\\newme\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute85.php' => 'cb8b31e82c61ce197871c9e8a6f122256751f2ab606dd2be90846d4fa5f8933e',
    'phar://C:\\newme\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => 'c0068e383717870a304781d462f7e2afe1c6f24e9133851852a2aca96b4fa26f',
    'phar://C:\\newme\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => '65fe0a8bc6fe285d8ddc8798ab5b9299920af70db5ad74596bc08df823e7c5d9',
    'phar://C:\\newme\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1e2fe940e4ba4e00d9ee6adb2af3ee1bf333e6f8afe61c61deb038886d293427',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'bcmath',
    7 => 'bz2',
    8 => 'calendar',
    9 => 'ctype',
    10 => 'curl',
    11 => 'date',
    12 => 'dom',
    13 => 'exif',
    14 => 'fileinfo',
    15 => 'filter',
    16 => 'ftp',
    17 => 'gd',
    18 => 'gettext',
    19 => 'hash',
    20 => 'iconv',
    21 => 'json',
    22 => 'libxml',
    23 => 'mbstring',
    24 => 'mysqli',
    25 => 'mysqlnd',
    26 => 'openssl',
    27 => 'pcre',
    28 => 'pdo_mysql',
    29 => 'pdo_sqlite',
    30 => 'random',
    31 => 'readline',
    32 => 'session',
    33 => 'standard',
    34 => 'tokenizer',
    35 => 'xml',
    36 => 'xmlreader',
    37 => 'xmlwriter',
    38 => 'zip',
    39 => 'zlib',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '6',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Api\\V1\\Auth\\LoginController',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.logged_out',
        1 => 25,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'messages.health.unavailable',
        1 => 28,
      ),
      1 => 
      array (
        0 => 'messages.health.ok',
        1 => 38,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Api\\V1\\HealthController',
        1 => '__invoke',
        2 => 'App\\Http\\Controllers\\Api\\V1\\HealthController',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\http\\controllers\\api\\v1\\healthcontroller' . "\0" . 'databaseisreachable',
          1 => 'm' . "\0" . 'app\\support\\http\\responses\\apiresponse' . "\0" . 'error',
          2 => 'f' . "\0" . '__',
          3 => 'm' . "\0" . 'app\\support\\http\\responses\\apiresponse' . "\0" . 'success',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Api\\V1\\PlanQuoteController',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Foundation\\Auth\\Access\\AuthorizesRequests',
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.audit.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 17,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.passwords.sent',
        1 => 27,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.auth.forgot-password',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.auth.login',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController',
        1 => 'create',
        2 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.passwords.reset',
        1 => 51,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.auth.reset-password',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.dashboard',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\DashboardController',
        1 => 'index',
        2 => 'App\\Http\\Controllers\\Web\\Admin\\DashboardController',
        3 => 
        array (
          0 => 'f' . "\0" . 'view',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'invitations.messages.sent',
        1 => 47,
      ),
      1 => 
      array (
        0 => 'invitations.messages.resent',
        1 => 65,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.users.create',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\InvitationController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 25,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 35,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\InvitationService',
        ),
        1 => 'invite',
        2 => 40,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 52,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\InvitationService',
        ),
        1 => 'resend',
        2 => 58,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'meals.messages.created',
        1 => 54,
      ),
      1 => 
      array (
        0 => 'meals.messages.updated',
        1 => 75,
      ),
      2 => 
      array (
        0 => 'meals.messages.archived',
        1 => 86,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.meals.index',
      1 => 'admin.meals.create',
      2 => 'admin.meals.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\MealController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 23,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 38,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 48,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Services\\MealService',
        ),
        1 => 'create',
        2 => 50,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 59,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 69,
      ),
      6 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Services\\MealService',
        ),
        1 => 'update',
        2 => 71,
      ),
      7 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 80,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.messages.created',
        1 => 71,
      ),
      1 => 
      array (
        0 => 'plans.messages.updated',
        1 => 127,
      ),
      2 => 
      array (
        0 => 'plans.messages.archived',
        1 => 138,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.plans.index',
      1 => 'admin.plans.create',
      2 => 'admin.plans.show',
      3 => 'admin.plans.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\PlanController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 31,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 46,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 63,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 76,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 99,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 119,
      ),
      6 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Services\\PlanService',
        ),
        1 => 'update',
        2 => 121,
      ),
      7 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 132,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.meals.saved',
        1 => 25,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\PlanMealController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 19,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.messages.pricing_saved',
        1 => 30,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\PlanPricingController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 20,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.messages.version_created',
        1 => 26,
      ),
      1 => 
      array (
        0 => 'plans.messages.published',
        1 => 41,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\PlanVersionController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 20,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Services\\PlanService',
        ),
        1 => 'createDraftVersion',
        2 => 22,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 31,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Services\\PlanService',
        ),
        1 => 'publish',
        2 => 34,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'roles.messages.created',
        1 => 55,
      ),
      1 => 
      array (
        0 => 'roles.messages.updated',
        1 => 79,
      ),
      2 => 
      array (
        0 => 'roles.messages.deleted',
        1 => 94,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.roles.index',
      1 => 'admin.roles.create',
      2 => 'admin.roles.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\RoleController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 24,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 39,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 49,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\RoleService',
        ),
        1 => 'create',
        2 => 51,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 60,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 73,
      ),
      6 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\RoleService',
        ),
        1 => 'update',
        2 => 75,
      ),
      7 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 84,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'settings.messages.saved',
        1 => 37,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.settings.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\SettingController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 21,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 31,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.messages.updated',
        1 => 59,
      ),
      1 => 
      array (
        0 => 'users.messages.activated',
        1 => 70,
      ),
      2 => 
      array (
        0 => 'users.messages.deactivated',
        1 => 85,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.users.index',
      1 => 'admin.users.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\UserController',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 24,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 38,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 49,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\UserService',
        ),
        1 => 'update',
        2 => 52,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 64,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\UserService',
        ),
        1 => 'activate',
        2 => 66,
      ),
      6 => 
      array (
        0 => 
        array (
          0 => 'App\\Http\\Controllers\\Controller',
        ),
        1 => 'authorize',
        2 => 75,
      ),
      7 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Services\\UserService',
        ),
        1 => 'deactivate',
        2 => 78,
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'invitations.messages.accepted',
        1 => 46,
      ),
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'auth.accept-invitation',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\InvitationController',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\plans\\enums\\mealtype' . "\0" . 'values',
          2 => 'm' . "\0" . 'app\\modules\\plans\\enums\\durationunit' . "\0" . 'values',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'messages.fields.email',
        1 => 32,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'messages.fields.email',
        1 => 34,
      ),
      1 => 
      array (
        0 => 'messages.fields.password',
        1 => 35,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'meals.fields.meal_type',
        1 => 44,
      ),
      1 => 
      array (
        0 => 'meals.fields.name_ar',
        1 => 45,
      ),
      2 => 
      array (
        0 => 'meals.fields.name_en',
        1 => 46,
      ),
      3 => 
      array (
        0 => 'meals.fields.calories',
        1 => 47,
      ),
      4 => 
      array (
        0 => 'meals.fields.protein_g',
        1 => 48,
      ),
      5 => 
      array (
        0 => 'meals.fields.carbs_g',
        1 => 49,
      ),
      6 => 
      array (
        0 => 'meals.fields.fat_g',
        1 => 50,
      ),
      7 => 
      array (
        0 => 'meals.fields.sort_order',
        1 => 51,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\plans\\enums\\mealtype' . "\0" . 'values',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.fields.goal',
        1 => 65,
      ),
      1 => 
      array (
        0 => 'plans.fields.name_ar',
        1 => 66,
      ),
      2 => 
      array (
        0 => 'plans.fields.name_en',
        1 => 67,
      ),
      3 => 
      array (
        0 => 'plans.fields.description_ar',
        1 => 68,
      ),
      4 => 
      array (
        0 => 'plans.fields.description_en',
        1 => 69,
      ),
      5 => 
      array (
        0 => 'plans.fields.features_ar',
        1 => 70,
      ),
      6 => 
      array (
        0 => 'plans.fields.features_en',
        1 => 71,
      ),
      7 => 
      array (
        0 => 'plans.fields.min_delivery_days_per_week',
        1 => 72,
      ),
      8 => 
      array (
        0 => 'plans.fields.delivery_fee',
        1 => 73,
      ),
      9 => 
      array (
        0 => 'plans.fields.sort_order',
        1 => 74,
      ),
      10 => 
      array (
        0 => 'plans.pricing.meal_types',
        1 => 75,
      ),
      11 => 
      array (
        0 => 'plans.pricing.duration_unit',
        1 => 76,
      ),
      12 => 
      array (
        0 => 'plans.pricing.duration_length',
        1 => 77,
      ),
      13 => 
      array (
        0 => 'plans.pricing.price',
        1 => 78,
      ),
      14 => 
      array (
        0 => 'plans.pricing.discount',
        1 => 79,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\plans\\enums\\plangoal' . "\0" . 'values',
          2 => 'm' . "\0" . 'app\\modules\\plans\\enums\\mealtype' . "\0" . 'values',
          3 => 'm' . "\0" . 'app\\modules\\plans\\enums\\durationunit' . "\0" . 'values',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        1 => 'mealIds',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\foundation\\http\\formrequest' . "\0" . 'validated',
          1 => 'f' . "\0" . 'array_map',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.pricing.meal_types',
        1 => 42,
      ),
      1 => 
      array (
        0 => 'plans.pricing.duration_unit',
        1 => 43,
      ),
      2 => 
      array (
        0 => 'plans.pricing.duration_length',
        1 => 44,
      ),
      3 => 
      array (
        0 => 'plans.pricing.price',
        1 => 45,
      ),
      4 => 
      array (
        0 => 'plans.pricing.discount',
        1 => 46,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\plans\\enums\\mealtype' . "\0" . 'values',
          2 => 'm' . "\0" . 'app\\modules\\plans\\enums\\durationunit' . "\0" . 'values',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        1 => 'pricingRules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\foundation\\http\\formrequest' . "\0" . 'validated',
          1 => 'm' . "\0" . 'app\\modules\\plans\\dtos\\pricingruledata' . "\0" . 'fromarray',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'roles.name_ar',
        1 => 38,
      ),
      1 => 
      array (
        0 => 'roles.name_en',
        1 => 39,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\identity\\enums\\permissionname' . "\0" . 'values',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'roles.name_ar',
        1 => 38,
      ),
      1 => 
      array (
        0 => 'roles.name_en',
        1 => 39,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'in',
          1 => 'm' . "\0" . 'app\\modules\\identity\\enums\\permissionname' . "\0" . 'values',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
          1 => 'f' . "\0" . '__',
          2 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingdefinition' . "\0" . 'labelkey',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        1 => 'settings',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\foundation\\http\\formrequest' . "\0" . 'validated',
          1 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
          2 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingdefinition' . "\0" . 'fieldname',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.errors.roles_required',
        1 => 36,
      ),
      1 => 
      array (
        0 => 'users.errors.roles_required',
        1 => 37,
      ),
      2 => 
      array (
        0 => 'users.fields.name',
        1 => 47,
      ),
      3 => 
      array (
        0 => 'users.fields.email',
        1 => 48,
      ),
      4 => 
      array (
        0 => 'users.fields.roles',
        1 => 49,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'unique',
          1 => 'm' . "\0" . 'illuminate\\validation\\rule' . "\0" . 'exists',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.errors.roles_required',
        1 => 43,
      ),
      1 => 
      array (
        0 => 'users.errors.roles_required',
        1 => 44,
      ),
      2 => 
      array (
        0 => 'users.fields.name',
        1 => 54,
      ),
      3 => 
      array (
        0 => 'users.fields.email',
        1 => 55,
      ),
      4 => 
      array (
        0 => 'users.fields.password',
        1 => 56,
      ),
      5 => 
      array (
        0 => 'users.fields.status',
        1 => 57,
      ),
      6 => 
      array (
        0 => 'users.fields.roles',
        1 => 58,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.fields.password',
        1 => 32,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        1 => 'attributes',
        2 => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Resources\\V1\\PlanQuoteResource',
        1 => 'toArray',
        2 => 'App\\Http\\Resources\\V1\\PlanQuoteResource',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\http\\responses\\moneypresenter' . "\0" . 'toarray',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Models\\User.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'casts',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isActive',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'isInvited',
        2 => 'App\\Models\\User',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Laravel\\Sanctum\\HasApiTokens',
        1 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        2 => 'Spatie\\Permission\\Traits\\HasRoles',
        3 => 'Illuminate\\Notifications\\Notifiable',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Enums\\AuditAction.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Audit\\Enums\\AuditAction',
        1 => 'values',
        2 => 'App\\Modules\\Audit\\Enums\\AuditAction',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Audit\\Enums\\AuditAction',
        1 => 'label',
        2 => 'App\\Modules\\Audit\\Enums\\AuditAction',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Audit\\Models\\AuditLog',
        1 => 'casts',
        2 => 'App\\Modules\\Audit\\Models\\AuditLog',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 38,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\DTOs\\AuthResult',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\DTOs\\InvitationData',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\DTOs\\LoginData',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\DTOs\\RoleData',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\DTOs\\UserData',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\PermissionName.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Enums\\PermissionName',
        1 => 'values',
        2 => 'App\\Modules\\Identity\\Enums\\PermissionName',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Enums\\PermissionName',
        1 => 'grouped',
        2 => 'App\\Modules\\Identity\\Enums\\PermissionName',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\RoleName.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Enums\\RoleName',
        1 => 'values',
        2 => 'App\\Modules\\Identity\\Enums\\RoleName',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.errors.self_deactivate',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.inactive',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.failed',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'invitations.errors.already_accepted',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'invitations.errors.invalid',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'users.errors.last_super_admin',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\LastSuperAdminException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.passwords.invalid',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'roles.errors.in_use',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\RoleInUseException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'roles.errors.system_role',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Exceptions\\SystemRoleException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Models\\Role',
        1 => 'isSystem',
        2 => 'App\\Modules\\Identity\\Models\\Role',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\identity\\enums\\rolename' . "\0" . 'values',
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Spatie\\Translatable\\HasTranslations',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Models\\UserInvitation',
        1 => 'casts',
        2 => 'App\\Modules\\Identity\\Models\\UserInvitation',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Models\\UserInvitation',
        1 => 'isAccepted',
        2 => 'App\\Modules\\Identity\\Models\\UserInvitation',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\PasswordResetNotification.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'auth.passwords.mail.subject',
        1 => 33,
      ),
      1 => 
      array (
        0 => 'auth.passwords.mail.greeting',
        1 => 34,
      ),
      2 => 
      array (
        0 => 'auth.passwords.mail.intro',
        1 => 35,
      ),
      3 => 
      array (
        0 => 'auth.passwords.mail.action',
        1 => 36,
      ),
      4 => 
      array (
        0 => 'auth.passwords.mail.expiry',
        1 => 37,
      ),
      5 => 
      array (
        0 => 'auth.passwords.mail.ignore',
        1 => 38,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
        1 => 'via',
        2 => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
        1 => 'toMail',
        2 => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
        3 => 
        array (
          0 => 'f' . "\0" . 'config',
          1 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'subject',
          2 => 'f' . "\0" . '__',
          3 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'greeting',
          4 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'line',
          5 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'action',
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\UserInvitationNotification.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'invitations.mail.subject',
        1 => 33,
      ),
      1 => 
      array (
        0 => 'invitations.mail.greeting',
        1 => 34,
      ),
      2 => 
      array (
        0 => 'invitations.mail.intro',
        1 => 35,
      ),
      3 => 
      array (
        0 => 'invitations.mail.action',
        1 => 39,
      ),
      4 => 
      array (
        0 => 'invitations.mail.expiry',
        1 => 40,
      ),
      5 => 
      array (
        0 => 'invitations.mail.ignore',
        1 => 41,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
        1 => 'via',
        2 => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
        1 => 'toMail',
        2 => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
        3 => 
        array (
          0 => 'f' . "\0" . 'config',
          1 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'subject',
          2 => 'f' . "\0" . '__',
          3 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'greeting',
          4 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'line',
          5 => 'm' . "\0" . 'illuminate\\notifications\\messages\\simplemessage' . "\0" . 'action',
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Spatie\\Permission\\Models\\Permission',
        1 => 'findOrCreate',
        2 => 21,
      ),
      1 => 
      array (
        0 => 'Spatie\\Permission\\Models\\Role',
        1 => 'findOrCreate',
        2 => 25,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\InvitationService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\InvitationService',
        1 => 'hash',
        2 => 'App\\Modules\\Identity\\Services\\InvitationService',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 36,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Models\\User',
        ),
        1 => 'syncRoles',
        2 => 38,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 42,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 68,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 116,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 131,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        1 => 'resetUrl',
        2 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        3 => 
        array (
          0 => 'f' . "\0" . 'route',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        1 => 'table',
        2 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        3 => 
        array (
          0 => 'f' . "\0" . 'config',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        1 => 'expireMinutes',
        2 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        3 => 
        array (
          0 => 'f' . "\0" . 'config',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        1 => 'throttleSeconds',
        2 => 'App\\Modules\\Identity\\Services\\PasswordResetService',
        3 => 
        array (
          0 => 'f' . "\0" . 'config',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 84,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\RoleService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\RoleService',
        1 => 'isSystemRole',
        2 => 'App\\Modules\\Identity\\Services\\RoleService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\identity\\enums\\rolename' . "\0" . 'values',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\RoleService',
        1 => 'isSuperAdmin',
        2 => 'App\\Modules\\Identity\\Services\\RoleService',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\RoleService',
        1 => 'baseName',
        2 => 'App\\Modules\\Identity\\Services\\RoleService',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Identity\\Models\\Role',
        ),
        1 => 'setTranslations',
        2 => 31,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 32,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 36,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 70,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 103,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 95,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Identity\\Services\\UserService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 45,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 61,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 83,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\MealData',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\MealData',
        1 => 'nullableInt',
        2 => 'App\\Modules\\Plans\\DTOs\\MealData',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        1 => 'localeStrings',
        2 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_filter',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        1 => 'localeLists',
        2 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_filter',
          1 => 'f' . "\0" . 'array_map',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        1 => 'nullableString',
        2 => 'App\\Modules\\Plans\\DTOs\\PlanData',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
        1 => 'mealTypesKey',
        2 => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
        1 => 'mealTypesKey',
        2 => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
        1 => 'toAttributes',
        2 => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\plans\\dtos\\pricingruledata' . "\0" . 'mealtypeskey',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\DurationUnit.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        1 => 'values',
        2 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        1 => 'days',
        2 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        1 => 'toDays',
        2 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\plans\\enums\\durationunit' . "\0" . 'days',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        1 => 'label',
        2 => 'App\\Modules\\Plans\\Enums\\DurationUnit',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\MealType.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\MealType',
        1 => 'values',
        2 => 'App\\Modules\\Plans\\Enums\\MealType',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\MealType',
        1 => 'key',
        2 => 'App\\Modules\\Plans\\Enums\\MealType',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_filter',
          1 => 'm' . "\0" . 'app\\modules\\plans\\enums\\mealtype' . "\0" . 'values',
          2 => 'f' . "\0" . 'usort',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\MealType',
        1 => 'label',
        2 => 'App\\Modules\\Plans\\Enums\\MealType',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'usort',
        1 => 40,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanGoal.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\PlanGoal',
        1 => 'values',
        2 => 'App\\Modules\\Plans\\Enums\\PlanGoal',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\PlanGoal',
        1 => 'label',
        2 => 'App\\Modules\\Plans\\Enums\\PlanGoal',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanVersionStatus.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        1 => 'values',
        2 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        1 => 'label',
        2 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        1 => 'badgeVariant',
        2 => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.errors.invalid_days',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.errors.not_available',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.errors.rule_not_found',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector' => 
    array (
      0 => 
      array (
        0 => 'plans.errors.published_immutable',
        1 => 14,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
        1 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'm' . "\0" . 'app\\support\\exceptions\\domainexception' . "\0" . '__construct',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => '__construct',
        2 => 16,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\Meal',
        1 => 'newFactory',
        2 => 'App\\Modules\\Plans\\Models\\Meal',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\database\\eloquent\\factories\\factory' . "\0" . 'new',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\Meal',
        1 => 'casts',
        2 => 'App\\Modules\\Plans\\Models\\Meal',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Translatable\\HasTranslations',
        2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\Plan',
        1 => 'newFactory',
        2 => 'App\\Modules\\Plans\\Models\\Plan',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\database\\eloquent\\factories\\factory' . "\0" . 'new',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\Plan',
        1 => 'casts',
        2 => 'App\\Modules\\Plans\\Models\\Plan',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\Plan',
        1 => 'getRouteKeyName',
        2 => 'App\\Modules\\Plans\\Models\\Plan',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Translatable\\HasTranslations',
        2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'newFactory',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\database\\eloquent\\factories\\factory' . "\0" . 'new',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'casts',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'mealTypes',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'priceMoney',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'fromminor',
        ),
      ),
      4 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'discountBasisPoints',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
        ),
      ),
      5 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        1 => 'totalDays',
        2 => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\plans\\enums\\durationunit' . "\0" . 'todays',
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        1 => 'newFactory',
        2 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\database\\eloquent\\factories\\factory' . "\0" . 'new',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        1 => 'casts',
        2 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        1 => 'isDraft',
        2 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        3 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        1 => 'isPublished',
        2 => 'App\\Modules\\Plans\\Models\\PlanVersion',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Seeders\\MealSeeder',
        1 => 'meals',
        2 => 'App\\Modules\\Plans\\Seeders\\MealSeeder',
        3 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Models\\Meal',
        ),
        1 => 'setTranslations',
        2 => 22,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 29,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Models\\Plan',
        ),
        1 => 'setTranslations',
        2 => 45,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Models\\Plan',
        ),
        1 => 'setTranslations',
        2 => 46,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Plans\\Models\\Plan',
        ),
        1 => 'setTranslations',
        2 => 47,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 55,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Services\\MealService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 23,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 25,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 39,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 52,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 68,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 47,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 63,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Services\\PlanPricingService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Services\\PlanPricingService',
        1 => 'taxRate',
        2 => 'App\\Modules\\Plans\\Services\\PlanPricingService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\services\\settingsservice' . "\0" . 'get',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Plans\\Services\\PlanService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'sort',
        1 => 220,
      ),
      1 => 
      array (
        0 => 'sort',
        1 => 240,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 28,
      ),
      1 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 36,
      ),
      2 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 50,
      ),
      3 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 66,
      ),
      4 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 158,
      ),
      5 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 190,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 61,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 147,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingGroup.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Enums\\SettingGroup',
        1 => 'values',
        2 => 'App\\Modules\\Settings\\Enums\\SettingGroup',
        3 => 
        array (
          0 => 'f' . "\0" . 'array_map',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Settings\\Enums\\SettingGroup',
        1 => 'label',
        2 => 'App\\Modules\\Settings\\Enums\\SettingGroup',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingType.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Enums\\SettingType',
        1 => 'cast',
        2 => 'App\\Modules\\Settings\\Enums\\SettingType',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Models\\Setting.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Models\\Setting',
        1 => 'casts',
        2 => 'App\\Modules\\Settings\\Models\\Setting',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Services\\SettingsService',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Services\\SettingsService',
        1 => 'all',
        2 => 'App\\Modules\\Settings\\Services\\SettingsService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\services\\settingsservice' . "\0" . 'storedvalues',
          1 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
          2 => 'm' . "\0" . 'app\\modules\\settings\\enums\\settingtype' . "\0" . 'cast',
          3 => 'm' . "\0" . 'app\\modules\\settings\\enums\\settingtype' . "\0" . 'serialize',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Settings\\Services\\SettingsService',
        1 => 'get',
        2 => 'App\\Modules\\Settings\\Services\\SettingsService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\services\\settingsservice' . "\0" . 'all',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Settings\\Services\\SettingsService',
        1 => 'group',
        2 => 'App\\Modules\\Settings\\Services\\SettingsService',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\services\\settingsservice' . "\0" . 'all',
          1 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
        ),
      ),
      3 => 
      array (
        0 => 'App\\Modules\\Settings\\Services\\SettingsService',
        1 => 'storedValues',
        2 => 'App\\Modules\\Settings\\Services\\SettingsService',
        3 => 
        array (
          0 => 'm' . "\0" . 'illuminate\\cache\\repository' . "\0" . 'rememberforever',
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'App\\Modules\\Audit\\Services\\AuditService',
        ),
        1 => 'log',
        2 => 164,
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Connection',
        1 => 'transaction',
        2 => 82,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Cache\\Repository',
        1 => 'forget',
        2 => 104,
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        1 => 'labelKey',
        2 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        1 => 'hintKey',
        2 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        1 => 'fieldName',
        2 => 'App\\Modules\\Settings\\Support\\SettingDefinition',
        3 => 
        array (
          0 => 'f' . "\0" . 'str_replace',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        1 => 'find',
        2 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        1 => 'grouped',
        2 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingsregistry' . "\0" . 'all',
        ),
      ),
      2 => 
      array (
        0 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        1 => 'definitions',
        2 => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\modules\\settings\\support\\settingdefinition' . "\0" . '__construct',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 37,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 38,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 39,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 40,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 41,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Gate',
        1 => 'policy',
        2 => 42,
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Dto\\Data.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Dto\\Data',
        1 => 'toArray',
        2 => 'App\\Support\\Dto\\Data',
        3 => 
        array (
          0 => 'f' . "\0" . 'get_object_vars',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Exceptions\\DomainException.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => 'errorCode',
        2 => 'App\\Support\\Exceptions\\DomainException',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => 'httpStatus',
        2 => 'App\\Support\\Exceptions\\DomainException',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Support\\Exceptions\\DomainException',
        1 => 'details',
        2 => 'App\\Support\\Exceptions\\DomainException',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Http\\Responses\\MoneyPresenter',
        1 => 'toArray',
        2 => 'App\\Support\\Http\\Responses\\MoneyPresenter',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'tominor',
          1 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'format',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Currency.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Money\\Currency',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Money\\Currency',
        1 => 'equals',
        2 => 'App\\Support\\Money\\Currency',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Money.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 
        array (
        ),
      ),
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'percentage',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'multiply',
        ),
      ),
      1 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'isZero',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
        ),
      ),
      2 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'isNegative',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
        ),
      ),
      3 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'equals',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\currency' . "\0" . 'equals',
        ),
      ),
      4 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'greaterThan',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'assertsamecurrency',
        ),
      ),
      5 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'lessThan',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
          0 => 'm' . "\0" . 'app\\support\\money\\money' . "\0" . 'assertsamecurrency',
        ),
      ),
      6 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'toMinor',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
        ),
      ),
      7 => 
      array (
        0 => 'App\\Support\\Money\\Money',
        1 => 'format',
        2 => 'App\\Support\\Money\\Money',
        3 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Rounding.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Money\\Rounding',
        1 => 
        array (
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Support\\Ui\\AuditActionPresenter',
        1 => 'variant',
        2 => 'App\\Support\\Ui\\AuditActionPresenter',
        3 => 
        array (
        ),
      ),
      1 => 
      array (
        0 => 'App\\Support\\Ui\\AuditActionPresenter',
        1 => 'targetLabel',
        2 => 'App\\Support\\Ui\\AuditActionPresenter',
        3 => 
        array (
          0 => 'f' . "\0" . '__',
          1 => 'f' . "\0" . 'class_basename',
        ),
      ),
    ),
  ),
  'C:\\newme\\bootstrap\\app.php' => 
  array (
    'PHPStan\\Rules\\Methods\\NamedArgumentParameterMethodCallsCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\ApplicationBuilder',
        1 => 'withRouting',
        2 => 'web',
        3 => 24,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\ApplicationBuilder',
        1 => 'withRouting',
        2 => 'api',
        3 => 25,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\ApplicationBuilder',
        1 => 'withRouting',
        2 => 'commands',
        3 => 26,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\ApplicationBuilder',
        1 => 'withRouting',
        2 => 'health',
        3 => 27,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\Middleware',
        1 => 'api',
        2 => 'prepend',
        3 => 30,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\Middleware',
        1 => 'web',
        2 => 'append',
        3 => 35,
      ),
      6 => 
      array (
        0 => 'Illuminate\\Foundation\\Configuration\\Middleware',
        1 => 'encryptCookies',
        2 => 'except',
        3 => 41,
      ),
    ),
  ),
  'C:\\newme\\routes\\web.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector' => 
    array (
      0 => 'admin.styleguide',
    ),
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'welcome',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'get',
        2 => 23,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 32,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'post',
        2 => 48,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 76,
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php' => 
  array (
    'fileHash' => '7d47c14bc3dfbd2dcaf5f6dd991e78d1eae5f2bc74d69581ac0771fc6057dc4b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php' => 
  array (
    'fileHash' => 'edc6b466131a3f7046c0ddd9d772619704da2b3963b9bc8dc415cac55554877e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php' => 
  array (
    'fileHash' => '212b6dc38fe903c85156c9799cb1078db129f6c30ed9715206154483a95864cf',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php' => 
  array (
    'fileHash' => '6fb4b95997743460808bd1f9eb56ef2b294fb6cce1dd7374b6e9ec2108313444',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php' => 
  array (
    'fileHash' => '22d71c6c5182355076cf039342efb7798fc70c40795b6d604c6f66337e1fe267',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php' => 
  array (
    'fileHash' => 'fbe1bbcbcf3c1c4ad618f36de5e75b9ff318e29da9266c6468702e0744ea410a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\api.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => 'd90b757ef4dfdb1146846db9d6d531024b5b2c0275f0832b9dbc5af1b4ae5091',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      6 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php',
      7 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php',
      8 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      9 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
      10 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php',
      11 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      12 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      13 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      14 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php',
      15 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      16 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      17 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      18 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
      19 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      20 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
      21 => 'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php',
      22 => 'C:\\newme\\routes\\api.php',
      23 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php' => 
  array (
    'fileHash' => '8cc8878d5706edec39d3a2b728127f2373934f4b7a9c3d5e0e8a80f71800f002',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php' => 
  array (
    'fileHash' => '835c3bb1a77b07079986a1154fa357f77e6d1e6e7a454779ecf4ef5ca1ba169d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php' => 
  array (
    'fileHash' => 'a0c8852b6cbec44d20c72b203e18603464360969184e6e8c442ff0bfa74590c2',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php' => 
  array (
    'fileHash' => 'ad8a4e57b4b074a4ff473087303b543474f3f3a7742fd4d6458b661e99c3a4d3',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    'fileHash' => '12794908ebcc9c7b610a3a02e8c3e2ffd5acffb9075796ec08570e02d08f2721',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php' => 
  array (
    'fileHash' => '4cd700fc08c3fafb40056657930a5521f966bab4e21272b45fe683b813b32c02',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php' => 
  array (
    'fileHash' => 'b3f333459c8b12eb3d0c3d47865588d0bdc159379abf4177bf0e209d0d089719',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php' => 
  array (
    'fileHash' => '725d11f869976aa4e71aee0d08a529dbebe29c2c1b0cb96689f26ab8d7a6501b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php' => 
  array (
    'fileHash' => '538377e91bf1c3918307f0dd2a0bc061f7e64a9bf660b20a6c8d9017296adabd',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php' => 
  array (
    'fileHash' => '23683fe16526b8b0279dbda217226b1a1d83930260f960a046f180a4e871525c',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php' => 
  array (
    'fileHash' => '7e4b85dbd53b5fd67e8cb8c42f3dc71c49bdaf3dd08542c508e5f1c8a0fc7d07',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php' => 
  array (
    'fileHash' => '3f150eaf69a072fca5c78fd7f383dec679eb9b1e2ff04433a9a9b966a0da420e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php' => 
  array (
    'fileHash' => '75cc42b3716eaafa496bf80c951e5c9c40d58707493fbff5eb1f6f7b01a92888',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php' => 
  array (
    'fileHash' => 'a3d582299ac03de96f4cb9712089190d55570b36441f8e44d5d0a249fa963b07',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php' => 
  array (
    'fileHash' => '78f7b291205a979fd520310df2ce85e9800b4626ed3710ea8702498cd9d302ae',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php' => 
  array (
    'fileHash' => 'c400c960eeed41d45fe141e60eab0e8b5fa0a4de4b9da32ff615a6d82c39bce7',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\routes\\web.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Middleware\\AssignRequestId.php' => 
  array (
    'fileHash' => '4d229c622f748a11274db65de67d248b6074be61548aa7d0f11aa5d354fbaa62',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetLocale.php' => 
  array (
    'fileHash' => '8392c3f3e1bbce55593940259eb95a3b2ea23b0936ff122a58012dae0612ae81',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetWebLocale.php' => 
  array (
    'fileHash' => '843d63c9ba18888818847d88a976208126f087ec003bb535cfc233a869bf16ba',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php',
      1 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest.php' => 
  array (
    'fileHash' => '005875fa96778a2bea5c455bcabc3dacf338938a09b211e26db4da06a9e0ed81',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php' => 
  array (
    'fileHash' => '6f99136a0f10064bdc3515544162c1255d44634d8f9a4944aa10abe125553403',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest.php' => 
  array (
    'fileHash' => 'b8bd3a0e2a18e12da654d8456ec7ac17c579ec1765bebb4dfbb63c54bdff513e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest.php' => 
  array (
    'fileHash' => '3b08abb92e0a6de7668074732f4f8902842e89f5f4fffdf071f1a2f2018d0ca2',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest.php' => 
  array (
    'fileHash' => '12698d7168b55e34dee5faeb55215ea0139ebc52730cf5736db6b414172aaaa8',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php' => 
  array (
    'fileHash' => 'e8df7c526f801436f1f59ccaf678f02df67cf811096e215704ecfd4fa3144e3d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest.php' => 
  array (
    'fileHash' => '585de23243ba9054676da9dbb323e631fed9f27ef88909e6ca312b22c83a0a4b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest.php' => 
  array (
    'fileHash' => 'b69ac0fc861aae1d5bd6f3eb316fba028c587c19f291e2bdced424812df22afa',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php' => 
  array (
    'fileHash' => '065e33385143337b53ee7b30eaabd6bfba481e60a1fedac822c00965f3bf1a42',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest.php' => 
  array (
    'fileHash' => '122848b3ffc3d9c84ab4de2b7a13b914ce5406cb5042dc03a394cd0c3735e79a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest.php' => 
  array (
    'fileHash' => '243186796fb6b3d28ff75e3e3e76ff03a8fae6d73462dae5324e3c977cc4d35a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest.php' => 
  array (
    'fileHash' => '6abba606cd023f49f71830580f0fd445d0ff9f7e70b638ed87f5f4c3a993a118',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php' => 
  array (
    'fileHash' => '53d29024a0e7f71d1d7d16ec77197322e1e2eee867cb7184c5f7e963503ef9d9',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php' => 
  array (
    'fileHash' => '47431664ad0e0edf4016d5f3ad00fab6cb25aef2dfdb3848b61f06c08870f585',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php' => 
  array (
    'fileHash' => 'd0fc4f91f5eabfa17c569aa471fad0f94eef932503e624a14d7e6368396613bf',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php' => 
  array (
    'fileHash' => '75810bdcb423ca85b6aeb4c0d59f3ed1dfa28794b75fedafa627a2349742045d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest.php' => 
  array (
    'fileHash' => 'bd944ea2f50f0f6a66e1ac746f4cbb2419cb3934e753935c4f06eb7280562968',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php' => 
  array (
    'fileHash' => 'd3076321d56cff71b86e9b848007f017ee84780e606bea2c20e439c6267c7b09',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest.php' => 
  array (
    'fileHash' => 'f55e5f412e611a0f422be4d9a4ef86ee708c9ec9e8cc07f4321d7990085efdc1',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php' => 
  array (
    'fileHash' => 'd4b0bd176ecb4294944f4bca536984859d7cf8af91f6710b690f06023975744e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php' => 
  array (
    'fileHash' => '1c23361b1469bd46a5e203632fb4955167b3b19d5bd2832e3014292110dc75a5',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php' => 
  array (
    'fileHash' => 'b08c8ab8f342f9fb49b2cf61121d196887be2b7a3ff2a4d3640943e88dd4a34c',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php' => 
  array (
    'fileHash' => 'c96599ac3595e69f1dc938c4d3665a4efcc2c9d1c6ffcf2887b8c675a30678fa',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php' => 
  array (
    'fileHash' => '9cd4ab2fb19afc5c6a54e5eb09723cb6d9f00c35dba8bb0ac3ffa58d09200eca',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php',
    ),
  ),
  'C:\\newme\\app\\Models\\User.php' => 
  array (
    'fileHash' => '5602cd5dce0d2d502e654c7202f2fd50719a856e55acc48bef37636512c5c255',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      6 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      7 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
      8 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php',
      9 => 'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php',
      10 => 'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php',
      11 => 'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php',
      12 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php',
      13 => 'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php',
      14 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php',
      15 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php',
      16 => 'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php',
      17 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
      18 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      19 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      20 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      21 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      22 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php',
      23 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php',
      24 => 'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php',
      25 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      26 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Enums\\AuditAction.php' => 
  array (
    'fileHash' => '10ce8284add0915834281413f9d7edc35f89f04d589fc0c222665ef8366f18d7',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php',
      1 => 'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      4 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      5 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      8 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php' => 
  array (
    'fileHash' => 'a45837dc72b59e761a256b6d74ab07b5d43adcd56bf10be91dd7010e41cb2c15',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php',
      1 => 'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      4 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      5 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      8 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
      9 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php' => 
  array (
    'fileHash' => 'f66b078eb481a62e6a51d7d4b189c26d6fb9952cc777d6a590396db31840daaa',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php' => 
  array (
    'fileHash' => '719797d1d2fe60b62a33893aede7e493447e36d047200294848eddc7521d8c62',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      4 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      5 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      6 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php' => 
  array (
    'fileHash' => '2facfd9177a58acad39a716f6497b3a1f3d06c9ba3a1324d0f03d0a0b801b6d6',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php' => 
  array (
    'fileHash' => '78a1b57328941b122b454895b81b7812656b471f64deb0b3cb3541bae19f1570',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php' => 
  array (
    'fileHash' => '359289901c644bfe3f81f1b7f1cf061574b327b71f5ec0aa6ae473eeac626eb9',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php' => 
  array (
    'fileHash' => '66f7c08282c7cf15a1eaaf6bcdbfd2b2fbd46c4b73f65f2a466394e1b336fe1a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php' => 
  array (
    'fileHash' => 'fadf59dba0e8045c3516b5d19483ee18e757448eca59200400328906077ff419',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\PermissionName.php' => 
  array (
    'fileHash' => 'c722622162be800db616b5eacf51dfbd08d005bc9d5d0504f849e221dec6ae76',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php',
      3 => 'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php',
      4 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php',
      5 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php',
      6 => 'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php',
      9 => 'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\RoleName.php' => 
  array (
    'fileHash' => 'f65ba6effcee36f01628dceb982b91a5b7fa858d22a231c7f9fc34512dd49d42',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      4 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\UserStatus.php' => 
  array (
    'fileHash' => '5a537ed435ee406da99b6ca1a9bdfaafb5acfdf2cb779b87a463f3ac1191f8ab',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      6 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      7 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
      8 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\StoreUserRequest.php',
      9 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php',
      10 => 'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php',
      11 => 'C:\\newme\\app\\Models\\User.php',
      12 => 'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php',
      13 => 'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php',
      14 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php',
      15 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php',
      16 => 'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php',
      17 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php',
      18 => 'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php',
      19 => 'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php',
      20 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
      21 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      22 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      23 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      24 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      25 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php',
      26 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php',
      27 => 'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php',
      28 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      29 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php' => 
  array (
    'fileHash' => '17632bb1aff7d129dea8521b6a137918b221822b926e53d93335c5d0fb11a5a6',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php' => 
  array (
    'fileHash' => '8a497b58798dee097f2b292df5ed0aee33587b4389aa63458530bc3627c0f0d0',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php' => 
  array (
    'fileHash' => '82129614d6ce8eb2124120792aa1a015b699ba109f50dda6ec260e25e15db1a3',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php' => 
  array (
    'fileHash' => '383672ab02789fffa776c3f3ed85c5300b1311ad56b5fad9cb0c06967f592d38',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php' => 
  array (
    'fileHash' => '85ac6a1bbe3e1d4e6298589817433dc60e807d0a5f59f48e83b51769bf6c5c9d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php' => 
  array (
    'fileHash' => '490130c2b31456b05176130dca899c060fb42ca8fd8fa1bfcf8595d0e3a48356',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php' => 
  array (
    'fileHash' => '0e518b8618d8e160c9775de168f5f7028b6eb45d7e04fc302b4c5f3a4e572461',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php' => 
  array (
    'fileHash' => 'b2ca09c2b4bdf2977aa909285a887190f4729eccfd7de101b2947b8df5950246',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php' => 
  array (
    'fileHash' => '3543043b371483f31aab0e8957200650601848859d81cedf5acc5182c92e53bc',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php' => 
  array (
    'fileHash' => '34ee0e14f65c55d92289ccb7dfb1f3d3ee2e9bde7a011427392476a5c42a3b0c',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      4 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      5 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php' => 
  array (
    'fileHash' => '745b2f02cc59af4311bc8381e7dfcce4c7750a8740b5abdf54b653b78ebfdd04',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
      2 => 'C:\\newme\\app\\Models\\User.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      4 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\PasswordResetNotification.php' => 
  array (
    'fileHash' => '97188bd96e848bd2b44cdd09cc34f893c218a58d91b7e18e807d34e9b15b00ae',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\UserInvitationNotification.php' => 
  array (
    'fileHash' => '48ab2488087f373d6d58a14106fc5e892cf53fe1cd04541c3cd1731cc3e62d2e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php' => 
  array (
    'fileHash' => 'ee6cda847fedf3f41d3444707181f2f1108d793d8da2090c369a850b6866d3f8',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php' => 
  array (
    'fileHash' => '7fd48f7b97f3067447b6375e4d1f8b66aeb488153a0a4da5ffafc55325f0114f',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    'fileHash' => 'ee97562fe98de302efe894ef00b19ff4d1165286a53bdfb4f13893098e2ee264',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php' => 
  array (
    'fileHash' => 'e149d06f974191a17bbd1327a69f3016314d892c6ef0c2642c05b7863253094f',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php' => 
  array (
    'fileHash' => 'ba85c783268d4e1082dd4d53d6083065d64689499b31644af9d9f954c97efb6d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php' => 
  array (
    'fileHash' => '67fce3243557ccdd2024a5b8bb41514755525a6fb1ad97f5dcb3d0ee7456c0cc',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php' => 
  array (
    'fileHash' => '7e5f4d1aaf9a7a3dc52529a7a62c970197f9ceeea74e743495679984a6184599',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php' => 
  array (
    'fileHash' => '02833e414eff3d8ddd6ae997abafe40856831140633b0f8066ed6730ded573d0',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php' => 
  array (
    'fileHash' => 'a3dd4ee448f46f450a66196cb24f4f793cafef9aade40aba70e0ac2052d065e0',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php' => 
  array (
    'fileHash' => '77192629c87496a5d949cfe3d4ac13baa99800d244ff72e875cf5314f848736f',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      1 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php' => 
  array (
    'fileHash' => '84b7a049146e5d28e3ba5ea476b211cbb9c24e6cf8945fd134e9c4a309adb772',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php' => 
  array (
    'fileHash' => '1cb9d64e9c3ccaff4772c1924ad295ff3c3088b0389ffb13bab03e05f8eb7b38',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      1 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php',
      2 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php' => 
  array (
    'fileHash' => '56002b93d5f49e756a6a5045449ca54b30da02c3dc8066b9afc557da80eb1b90',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      1 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php' => 
  array (
    'fileHash' => '406975c61915ea74970f05044bf3107a41458f6da556ac499fb27373be017ce9',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php',
      3 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php',
      4 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\DurationUnit.php' => 
  array (
    'fileHash' => '71aa22f28377679404733a4fad28634834d6404a9e60efbb2440ad4260a2e7b2',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php',
      3 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php',
      4 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php',
      5 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      12 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      13 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\MealType.php' => 
  array (
    'fileHash' => '473fac6449a650e844400b1c3ba287c9bb8508f6bb3fa9d73e94b770b65ff1e3',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      2 => 'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php',
      3 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php',
      4 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php',
      5 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php',
      6 => 'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php',
      7 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php',
      12 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php',
      13 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php',
      14 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php',
      15 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php',
      16 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      17 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      18 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      19 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanGoal.php' => 
  array (
    'fileHash' => '47defb22d85fede14d3767b17f1ee91bb15f26bfba80adcc7352a9b54f05b59f',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      6 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php',
      7 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      12 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php',
      13 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      14 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      15 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      16 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      17 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      18 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanVersionStatus.php' => 
  array (
    'fileHash' => '7cd0ce0172e4096f56d5e0c0b04c4bee3ecc9ffa212c612060088f3a2a534182',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      4 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      5 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php' => 
  array (
    'fileHash' => '9ff22e34ff919c0f13db9930d62adeaca628ecae73ff4cde390a0e674a2d0c0d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php' => 
  array (
    'fileHash' => '89cdafa8f91a7fdd6f7ac9fbfd2579b9a406c0c351a81e51a956e74277916034',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php' => 
  array (
    'fileHash' => 'c1d4f1ea63e4edcd010a77c91d8c4424e90706aafbd2ecb373fe1c9c501e120e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php' => 
  array (
    'fileHash' => '3031c9ab41f675f8eae1cf6eed667b9aab2bfd205579a443001be83308fce831',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php' => 
  array (
    'fileHash' => 'e7efd678fd47353578f42a2ff21015838aafe65a94055c10c74ddcd8a56fa9e3',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      2 => 'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php',
      3 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      4 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php',
      5 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      9 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      10 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php' => 
  array (
    'fileHash' => '692395034e37b989165a01a341d2c145ab1b48fd5b6420606ff23db80148a4cf',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      6 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      12 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      13 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      14 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
      15 => 'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php' => 
  array (
    'fileHash' => 'b10ee0d950f8e45ec57bf8482bb8844fac158628ee57f06fb60931e9661fdf4a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      2 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php',
      3 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      4 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      5 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php' => 
  array (
    'fileHash' => 'f27388294aeca047b8e698f06bccd5184807929d7732567c4e8646d64cd9df4d',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      4 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      5 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php',
      7 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php',
      8 => 'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php',
      9 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php' => 
  array (
    'fileHash' => 'dbd32928adaab680a6705a8c21cc86612fe4cc6ce0d580564095c9cbe6d5fd24',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php' => 
  array (
    'fileHash' => '41404c07dcb9f56ad41ed5652850fddc416986b924d6e30a1e448ee0a70a37ac',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php' => 
  array (
    'fileHash' => 'f8eeebf924e8acedcd9269ab9976b6049bf990d915153a2a46842d3fd23f4f8b',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php' => 
  array (
    'fileHash' => '6d563eafc28cca3515c7cdcb1214590879c4150a5fedc5ef770cdb44596b4672',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php' => 
  array (
    'fileHash' => '9d7e42b7fa9d65400b772ce4d38118ed24db912c297a7d038c7097724760f776',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php' => 
  array (
    'fileHash' => 'c840e771566e3d4551ba6fc86f34f2b9ae21b17e9fbb87250b3b03147f98338a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      1 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php' => 
  array (
    'fileHash' => 'c91ddc46e3961a85d33810aeb642d12ab198b05b1a6675cd5f5630998faedf5b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingGroup.php' => 
  array (
    'fileHash' => '6ea91ea29079f2c65685aeabfb7d29a7530132bfd3f60ae1b4ef70bc9399cfc7',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
      1 => 'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php',
      2 => 'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingType.php' => 
  array (
    'fileHash' => 'f885bf168292173b45d21cff4dc7249ca05e6474b70db06bbd1563c41707b835',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
      1 => 'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php',
      2 => 'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Models\\Setting.php' => 
  array (
    'fileHash' => '62817af9545a04e711f7e68f8383e64d919ebdcf986b2db6a873bae85959f585',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
      1 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
      2 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php' => 
  array (
    'fileHash' => '9f78a17c991a08d7c014234e6e3a4822f83d9260f868851be0cdb22ad200257b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php' => 
  array (
    'fileHash' => 'f36f0790ce2c8354d39916dfea7714c39eea96b135ec2fd9f55cef25763a42ec',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
      1 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php' => 
  array (
    'fileHash' => '6d6a629a3f9c2f3abaa78e228ec72e3e3d81dd8b3e07faeab32a399341cde9b3',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php',
      2 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
      3 => 'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php' => 
  array (
    'fileHash' => '3c5b4550bb8622dfd1b0017b3922aa2f8a2cd396d55eba10a8545550443849fa',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php',
      1 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php',
      2 => 'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php',
    ),
  ),
  'C:\\newme\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => '07382c229e8a8235410bf0d23b64a98e6c22ea7d71bcfea123d0c3b8175cf8b0',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Support\\Dto\\Data.php' => 
  array (
    'fileHash' => '7a04f15eba8e252d1ee1ca489d12daea91dcc7a11691db1b8504386830d3c99b',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php',
      6 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      7 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      8 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      9 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php',
      10 => 'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php',
      11 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php',
      12 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php',
      13 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php',
      14 => 'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php',
      15 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
      16 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      17 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      18 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      19 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php',
      20 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php',
      21 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php',
      22 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php',
      23 => 'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php',
      24 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      25 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Enums\\ApiErrorCode.php' => 
  array (
    'fileHash' => '715191174f42287e93076152913590de3233bdc9477589c1e74a99ac8ec1a2cf',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php',
      1 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php',
      2 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php',
      3 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php',
      4 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php',
      5 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php',
      6 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php',
      7 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php',
      8 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php',
      9 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php',
      10 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php',
      11 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php',
      12 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php',
      13 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php',
      14 => 'C:\\newme\\app\\Support\\Exceptions\\DomainException.php',
      15 => 'C:\\newme\\app\\Support\\Http\\Responses\\ApiResponse.php',
      16 => 'C:\\newme\\app\\Support\\Money\\Money.php',
      17 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Exceptions\\DomainException.php' => 
  array (
    'fileHash' => '9108a2748bca61a2041d351a555b3210592435ed696f219d572a921219138a4e',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php',
      6 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php',
      7 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php',
      8 => 'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php',
      9 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php',
      10 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php',
      11 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php',
      12 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php',
      13 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php',
      14 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php',
      15 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php',
      16 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php',
      17 => 'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php',
      18 => 'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php',
      19 => 'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php',
      20 => 'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php',
      21 => 'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php',
      22 => 'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php',
      23 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php',
      24 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php',
      25 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php',
      26 => 'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php',
      27 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      28 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php',
      29 => 'C:\\newme\\app\\Support\\Money\\Money.php',
      30 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\ApiResponse.php' => 
  array (
    'fileHash' => '96e94563c6c61e73d146c55cb6fccc0b8627d240fe9bc51880e2f138a3879777',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php',
      1 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php',
      2 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php',
      3 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php',
      4 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php',
      5 => 'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php',
      6 => 'C:\\newme\\app\\Http\\Middleware\\AssignRequestId.php',
      7 => 'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php',
      8 => 'C:\\newme\\bootstrap\\app.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php' => 
  array (
    'fileHash' => 'd012162113990a400aa49175af1c8a8f5bebacf232be346ed1ea2321eaf829c6',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php',
      1 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Currency.php' => 
  array (
    'fileHash' => 'd8e7457c940fbf567a88660fd786d8c12432d83f964cbcd910c739768f6d815a',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php',
      1 => 'C:\\newme\\app\\Support\\Money\\Money.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Money.php' => 
  array (
    'fileHash' => '87ad29df91b355cb67f6454eb49d6bbcf907a153fc6a481651c66f1f7cd48d15',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php',
      1 => 'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php',
      2 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php',
      3 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php',
      4 => 'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php',
      5 => 'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php',
      6 => 'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php',
      7 => 'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Money\\Rounding.php' => 
  array (
    'fileHash' => '8276a58f1bbf8ecb0381d317c9158e53042135f519c210d14a8264bdbc91c0d9',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Support\\Money\\Money.php',
    ),
  ),
  'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php' => 
  array (
    'fileHash' => '02151ac67d2b8fa8e5b29bab6e9164eb7fcb28d62773589c4718f0d2280d6619',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\bootstrap\\app.php' => 
  array (
    'fileHash' => '9041ecb3dd344c6422fadae17e5370c1b45885a926e6bacd9cfc537a2014559b',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\routes\\api.php' => 
  array (
    'fileHash' => '669e6bf1a7be5d0a6dd76ecf1f2c557ba5bc0304b64181ba0c92ac2e113d56cc',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\routes\\console.php' => 
  array (
    'fileHash' => 'e4b5f7e4cc006cddfd7b23756862e6909376851c2779c512689562e7509a6f8a',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\routes\\web.php' => 
  array (
    'fileHash' => '75228131d0620e438640ecc96edd7b3005c39b83eae4c1ad5853f9fe6c7b9eed',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'packageDependencies' => array (
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Http\\Middleware\\AssignRequestId.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'symfony/uid',
    3 => 'psr/log',
    4 => 'monolog/monolog',
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetLocale.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'symfony/http-kernel',
    3 => 'psr/container',
  ),
  'C:\\newme\\app\\Models\\User.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-permission',
    2 => 'spatie/laravel-translatable',
    3 => 'laravel/sanctum',
  ),
  'C:\\newme\\app\\Support\\Dto\\Data.php' => 
  array (
  ),
  'C:\\newme\\app\\Support\\Enums\\ApiErrorCode.php' => 
  array (
  ),
  'C:\\newme\\app\\Support\\Exceptions\\DomainException.php' => 
  array (
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\ApiResponse.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Support\\Money\\Currency.php' => 
  array (
  ),
  'C:\\newme\\app\\Support\\Money\\Money.php' => 
  array (
  ),
  'C:\\newme\\app\\Support\\Money\\Rounding.php' => 
  array (
  ),
  'C:\\newme\\bootstrap\\app.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-kernel',
    2 => 'psr/container',
    3 => 'symfony/http-foundation',
  ),
  'C:\\newme\\routes\\api.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\routes\\console.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/console',
  ),
  'C:\\newme\\routes\\web.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\PermissionName.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\RoleName.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\UserStatus.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetWebLocale.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'symfony/http-kernel',
    3 => 'psr/container',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-permission',
    2 => 'spatie/laravel-translatable',
    3 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php' => 
  array (
    0 => 'spatie/laravel-permission',
    1 => 'laravel/framework',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php' => 
  array (
    0 => 'spatie/laravel-permission',
    1 => 'laravel/framework',
    2 => 'spatie/laravel-translatable',
    3 => 'symfony/http-kernel',
    4 => 'psr/container',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'spatie/laravel-translatable',
    4 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\StoreUserRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'spatie/laravel-translatable',
    4 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\UserInvitationNotification.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Modules\\Audit\\Enums\\AuditAction.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'symfony/http-kernel',
    3 => 'psr/container',
  ),
  'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\PasswordResetNotification.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingGroup.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingType.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Settings\\Models\\Setting.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'psr/simple-cache',
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php' => 
  array (
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\DurationUnit.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanGoal.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanVersionStatus.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/uid',
    3 => 'symfony/http-kernel',
    4 => 'psr/container',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'laravel/sanctum',
    3 => 'spatie/laravel-permission',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/http-foundation',
    3 => 'nesbot/carbon',
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php' => 
  array (
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'symfony/http-foundation',
    2 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php' => 
  array (
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\MealType.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
    2 => 'symfony/uid',
    3 => 'symfony/http-kernel',
    4 => 'psr/container',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'laravel/sanctum',
    2 => 'spatie/laravel-permission',
    3 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'spatie/laravel-translatable',
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\Auth\\LoginController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'authService',
               'type' => 'App\\Modules\\Identity\\Services\\AuthService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'authService',
               'type' => 'App\\Modules\\Identity\\Services\\AuthService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\Auth\\MeController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\HealthController',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Liveness/readiness endpoint reporting application and database availability.
 *
 * The response never exposes credentials, hostnames, paths, environment values,
 * or driver details; only coarse "ok"/"unavailable" states are returned.
 */',
         'namespace' => 'App\\Http\\Controllers\\Api\\V1',
         'uses' => 
        array (
          'controller' => 'App\\Http\\Controllers\\Controller',
          'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
          'apiresponse' => 'App\\Support\\Http\\Responses\\ApiResponse',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'request' => 'Illuminate\\Http\\Request',
          'db' => 'Illuminate\\Support\\Facades\\DB',
          'throwable' => 'Throwable',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\PlanController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\V1\\PlanQuoteController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'pricing',
               'type' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Foundation\\Auth\\Access\\AuthorizesRequests',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\AuditController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'passwordResetService',
               'type' => 'App\\Modules\\Identity\\Services\\PasswordResetService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'authService',
               'type' => 'App\\Modules\\Identity\\Services\\AuthService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Controllers\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'loginrequest' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
              'logindata' => 'App\\Modules\\Identity\\DTOs\\LoginData',
              'inactiveuserexception' => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
              'invalidcredentialsexception' => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
              'authservice' => 'App\\Modules\\Identity\\Services\\AuthService',
              'view' => 'Illuminate\\Contracts\\View\\View',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'passwordResetService',
               'type' => 'App\\Modules\\Identity\\Services\\PasswordResetService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @throws ValidationException
     */',
             'namespace' => 'App\\Http\\Controllers\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'resetpasswordrequest' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
              'passwordresetinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException',
              'passwordresetservice' => 'App\\Modules\\Identity\\Services\\PasswordResetService',
              'view' => 'Illuminate\\Contracts\\View\\View',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'validationexception' => 'Illuminate\\Validation\\ValidationException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\DashboardController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\InvitationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'invitationService',
               'type' => 'App\\Modules\\Identity\\Services\\InvitationService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'resend',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'invitation',
               'type' => 'App\\Modules\\Identity\\Models\\UserInvitation',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\MealController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meals',
               'type' => 'App\\Modules\\Plans\\Services\\MealService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\PlanController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plans',
               'type' => 'App\\Modules\\Plans\\Services\\PlanService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meals',
               'type' => 'App\\Modules\\Plans\\Services\\MealService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\PlanMealController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meals',
               'type' => 'App\\Modules\\Plans\\Services\\MealService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\PlanPricingController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plans',
               'type' => 'App\\Modules\\Plans\\Services\\PlanService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\PlanVersionController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plans',
               'type' => 'App\\Modules\\Plans\\Services\\PlanService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'publish',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\RoleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'roleService',
               'type' => 'App\\Modules\\Identity\\Services\\RoleService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\SettingController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'settings',
               'type' => 'App\\Modules\\Settings\\Services\\SettingsService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\Admin\\UserController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'userService',
               'type' => 'App\\Modules\\Identity\\Services\\UserService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'activate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deactivate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\InvitationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'invitationService',
               'type' => 'App\\Modules\\Identity\\Services\\InvitationService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Contracts\\View\\View|Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\LocaleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__invoke',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'locale',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Middleware\\AssignRequestId.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\AssignRequestId',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Assigns a correlation request id to every request.
 *
 * An incoming X-Request-Id is accepted only when it is a valid ULID; anything
 * malformed, oversized, or unsafe is replaced with a freshly generated ULID.
 * The id is stored in request attributes, added to the logging context, and
 * echoed back in the X-Request-Id response header.
 */',
         'namespace' => 'App\\Http\\Middleware',
         'uses' => 
        array (
          'apiresponse' => 'App\\Support\\Http\\Responses\\ApiResponse',
          'closure' => 'Closure',
          'request' => 'Illuminate\\Http\\Request',
          'log' => 'Illuminate\\Support\\Facades\\Log',
          'str' => 'Illuminate\\Support\\Str',
          'response' => 'Symfony\\Component\\HttpFoundation\\Response',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetLocale.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\SetLocale',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Resolves the request locale from the Accept-Language header.
 *
 * Only the supported locales are honoured; anything else falls back to English.
 * Locale affects presentation only and never influences calculations.
 */',
         'namespace' => 'App\\Http\\Middleware',
         'uses' => 
        array (
          'closure' => 'Closure',
          'request' => 'Illuminate\\Http\\Request',
          'response' => 'Symfony\\Component\\HttpFoundation\\Response',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Middleware\\SetWebLocale.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Middleware\\SetWebLocale',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Resolves the locale for web requests.
 *
 * Priority: an explicit user choice persisted in a long-lived cookie (so it
 * survives logout/session invalidation), then the session, then the browser\'s
 * Accept-Language header, then the default. Locale affects presentation only.
 */',
         'namespace' => 'App\\Http\\Middleware',
         'uses' => 
        array (
          'closure' => 'Closure',
          'request' => 'Illuminate\\Http\\Request',
          'response' => 'Symfony\\Component\\HttpFoundation\\Response',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'SUPPORTED_LOCALES',
               'value' => '[\'en\', \'ar\']',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'COOKIE',
               'value' => '\'locale\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Symfony\\Component\\HttpFoundation\\Response',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'next',
               'type' => 'Closure',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, array<int, string>>
     */',
             'namespace' => 'App\\Http\\Requests\\Api\\V1\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Api\\V1\\Plans',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, array<int, string>>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, array<int, string>>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, array<int, string>>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Auth',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Meals',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Meals',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pricingRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The submitted pricing rows as DTOs.
     *
     * @return list<PricingRuleData>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealIds',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The selected meal ids for this plan.
     *
     * @return list<int>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealIds',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Selected meal ids.
     *
     * @return list<int>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pricingRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validated rows mapped to pricing DTOs.
     *
     * @return list<PricingRuleData>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Plans',
             'uses' => 
            array (
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Roles',
             'uses' => 
            array (
              'permissionname' => 'App\\Modules\\Identity\\Enums\\PermissionName',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Roles',
             'uses' => 
            array (
              'permissionname' => 'App\\Modules\\Identity\\Enums\\PermissionName',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Roles',
             'uses' => 
            array (
              'permissionname' => 'App\\Modules\\Identity\\Enums\\PermissionName',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Roles',
             'uses' => 
            array (
              'permissionname' => 'App\\Modules\\Identity\\Enums\\PermissionName',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Rules are derived from the settings registry, keyed by each setting\'s
     * HTML-safe field name (dots encoded as `__`).
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Settings',
             'uses' => 
            array (
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Settings',
             'uses' => 
            array (
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'settings',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validated values re-keyed back to real setting keys, limited to the
     * registry.
     *
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Settings',
             'uses' => 
            array (
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Admin\\Users',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
              'rule' => 'Illuminate\\Validation\\Rule',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Invitations',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Http\\Requests\\Web\\Invitations',
             'uses' => 
            array (
              'formrequest' => 'Illuminate\\Foundation\\Http\\FormRequest',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\V1\\MealResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin Meal
 */',
         'namespace' => 'App\\Http\\Resources\\V1',
         'uses' => 
        array (
          'meal' => 'App\\Modules\\Plans\\Models\\Meal',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources\\V1',
             'uses' => 
            array (
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\V1\\PlanQuoteResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin PlanQuote
 */',
         'namespace' => 'App\\Http\\Resources\\V1',
         'uses' => 
        array (
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'moneypresenter' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources\\V1',
             'uses' => 
            array (
              'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
              'moneypresenter' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\V1\\PlanResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin Plan
 */',
         'namespace' => 'App\\Http\\Resources\\V1',
         'uses' => 
        array (
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
          'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
          'moneypresenter' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
          'money' => 'App\\Support\\Money\\Money',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources\\V1',
             'uses' => 
            array (
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'planpricingservice' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
              'moneypresenter' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
              'money' => 'App\\Support\\Money\\Money',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\V1\\PlanVersionResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin PlanVersion
 */',
         'namespace' => 'App\\Http\\Resources\\V1',
         'uses' => 
        array (
          'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources\\V1',
             'uses' => 
            array (
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Resources\\V1\\UserResource',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @mixin User
 */',
         'namespace' => 'App\\Http\\Resources\\V1',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'request' => 'Illuminate\\Http\\Request',
          'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Http\\Resources\\V1',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'request' => 'Illuminate\\Http\\Request',
              'jsonresource' => 'Illuminate\\Http\\Resources\\Json\\JsonResource',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property UserStatus $status
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
          'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
          'userfactory' => 'Database\\Factories\\UserFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
          'notifiable' => 'Illuminate\\Notifications\\Notifiable',
          'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
          'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Laravel\\Sanctum\\HasApiTokens',
        1 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        2 => 'Spatie\\Permission\\Traits\\HasRoles',
        3 => 'Illuminate\\Notifications\\Notifiable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isInvited',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'invitations',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<UserInvitation, $this>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userfactory' => 'Database\\Factories\\UserFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
              'hasapitokens' => 'Laravel\\Sanctum\\HasApiTokens',
              'hasroles' => 'Spatie\\Permission\\Traits\\HasRoles',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pendingInvitation',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?App\\Modules\\Identity\\Models\\UserInvitation',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Enums\\AuditAction.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Audit\\Enums\\AuditAction',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'RoleCreated',
           'value' => '\'role.created\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'RoleUpdated',
           'value' => '\'role.updated\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'RoleDeleted',
           'value' => '\'role.deleted\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UserInvited',
           'value' => '\'user.invited\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UserUpdated',
           'value' => '\'user.updated\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UserActivated',
           'value' => '\'user.activated\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UserDeactivated',
           'value' => '\'user.deactivated\'',
           'phpDoc' => NULL,
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'InvitationResent',
           'value' => '\'invitation.resent\'',
           'phpDoc' => NULL,
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'InvitationAccepted',
           'value' => '\'invitation.accepted\'',
           'phpDoc' => NULL,
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PasswordReset',
           'value' => '\'user.password_reset\'',
           'phpDoc' => NULL,
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SettingsUpdated',
           'value' => '\'settings.updated\'',
           'phpDoc' => NULL,
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanCreated',
           'value' => '\'plan.created\'',
           'phpDoc' => NULL,
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanUpdated',
           'value' => '\'plan.updated\'',
           'phpDoc' => NULL,
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanArchived',
           'value' => '\'plan.archived\'',
           'phpDoc' => NULL,
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanVersionPublished',
           'value' => '\'plan_version.published\'',
           'phpDoc' => NULL,
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanPricingUpdated',
           'value' => '\'plan_pricing.updated\'',
           'phpDoc' => NULL,
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlanMealsUpdated',
           'value' => '\'plan_meals.updated\'',
           'phpDoc' => NULL,
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'MealCreated',
           'value' => '\'meal.created\'',
           'phpDoc' => NULL,
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'MealUpdated',
           'value' => '\'meal.updated\'',
           'phpDoc' => NULL,
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'MealArchived',
           'value' => '\'meal.archived\'',
           'phpDoc' => NULL,
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Audit\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Localized, human-readable label for this action.
     */',
             'namespace' => 'App\\Modules\\Audit\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Audit\\Models\\AuditLog',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
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
         'namespace' => 'App\\Modules\\Audit\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'lang' => 'Illuminate\\Support\\Facades\\Lang',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'UPDATED_AT',
               'value' => 'null',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Audit\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Audit\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'actor',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<User, $this>
     */',
             'namespace' => 'App\\Modules\\Audit\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'actionLabel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Human-readable, localized label for the action.
     */',
             'namespace' => 'App\\Modules\\Audit\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Audit\\Policies\\AuditLogPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Audit\\Services\\AuditService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'log',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Record an audited action.
     *
     * The actor and correlation request id are resolved from the current
     * context, so callers only describe *what* happened.
     *
     * @param  array<string, mixed>  $old
     * @param  array<string, mixed>  $new
     */',
             'namespace' => 'App\\Modules\\Audit\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditlog' => 'App\\Modules\\Audit\\Models\\AuditLog',
              'apiresponse' => 'App\\Support\\Http\\Responses\\ApiResponse',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Audit\\Models\\AuditLog',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'App\\Modules\\Audit\\Enums\\AuditAction',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'auditable',
               'type' => '?Illuminate\\Database\\Eloquent\\Model',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'old',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'new',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\DTOs\\AuthResult',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Result of a successful authentication: the user plus the issued plain-text token.
 */',
         'namespace' => 'App\\Modules\\Identity\\DTOs',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $roles
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'roles',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\DTOs\\LoginData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'password',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'deviceName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\DTOs\\RoleData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, string>  $displayName  Locale-keyed display names (e.g. [\'ar\' => \'...\', \'en\' => \'...\']).
     * @param  list<string>  $permissions
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'displayName',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'permissions',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\DTOs\\UserData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $roles
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'password',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => 'App\\Modules\\Identity\\Enums\\UserStatus',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'roles',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Identity\\DTOs',
             'uses' => 
            array (
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\PermissionName.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Enums\\PermissionName',
       'scalarType' => 'string',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Central permission catalog for the platform.
 *
 * Permissions are grouped by their module prefix (the part before the dot).
 * The Identity module owns the users/roles/audit permissions; the remaining
 * groups are declared up-front so administrators can configure roles for every
 * business module. Each permission is enforced by its module as it is built.
 */',
         'namespace' => 'App\\Modules\\Identity\\Enums',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UsersView',
           'value' => '\'users.view\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UsersCreate',
           'value' => '\'users.create\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UsersUpdate',
           'value' => '\'users.update\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UsersDeactivate',
           'value' => '\'users.deactivate\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UsersInvite',
           'value' => '\'users.invite\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'RolesView',
           'value' => '\'roles.view\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'RolesManage',
           'value' => '\'roles.manage\'',
           'phpDoc' => NULL,
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'AuditView',
           'value' => '\'audit.view\'',
           'phpDoc' => NULL,
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CatalogView',
           'value' => '\'catalog.view\'',
           'phpDoc' => NULL,
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CatalogCreate',
           'value' => '\'catalog.create\'',
           'phpDoc' => NULL,
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CatalogUpdate',
           'value' => '\'catalog.update\'',
           'phpDoc' => NULL,
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CatalogDelete',
           'value' => '\'catalog.delete\'',
           'phpDoc' => NULL,
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'InventoryView',
           'value' => '\'inventory.view\'',
           'phpDoc' => NULL,
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'InventoryAdjust',
           'value' => '\'inventory.adjust\'',
           'phpDoc' => NULL,
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CustomersView',
           'value' => '\'customers.view\'',
           'phpDoc' => NULL,
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CustomersCreate',
           'value' => '\'customers.create\'',
           'phpDoc' => NULL,
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CustomersUpdate',
           'value' => '\'customers.update\'',
           'phpDoc' => NULL,
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrdersView',
           'value' => '\'orders.view\'',
           'phpDoc' => NULL,
        )),
        18 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrdersCreate',
           'value' => '\'orders.create\'',
           'phpDoc' => NULL,
        )),
        19 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrdersUpdate',
           'value' => '\'orders.update\'',
           'phpDoc' => NULL,
        )),
        20 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrdersCancel',
           'value' => '\'orders.cancel\'',
           'phpDoc' => NULL,
        )),
        21 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrdersRefund',
           'value' => '\'orders.refund\'',
           'phpDoc' => NULL,
        )),
        22 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PaymentsView',
           'value' => '\'payments.view\'',
           'phpDoc' => NULL,
        )),
        23 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PaymentsRefund',
           'value' => '\'payments.refund\'',
           'phpDoc' => NULL,
        )),
        24 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlansView',
           'value' => '\'plans.view\'',
           'phpDoc' => NULL,
        )),
        25 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PlansManage',
           'value' => '\'plans.manage\'',
           'phpDoc' => NULL,
        )),
        26 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SubscriptionsView',
           'value' => '\'subscriptions.view\'',
           'phpDoc' => NULL,
        )),
        27 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SubscriptionsManage',
           'value' => '\'subscriptions.manage\'',
           'phpDoc' => NULL,
        )),
        28 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SubscriptionsPause',
           'value' => '\'subscriptions.pause\'',
           'phpDoc' => NULL,
        )),
        29 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SubscriptionsCancel',
           'value' => '\'subscriptions.cancel\'',
           'phpDoc' => NULL,
        )),
        30 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'AppointmentsView',
           'value' => '\'appointments.view\'',
           'phpDoc' => NULL,
        )),
        31 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'AppointmentsManage',
           'value' => '\'appointments.manage\'',
           'phpDoc' => NULL,
        )),
        32 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'DeliveryView',
           'value' => '\'delivery.view\'',
           'phpDoc' => NULL,
        )),
        33 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'DeliveryAssign',
           'value' => '\'delivery.assign\'',
           'phpDoc' => NULL,
        )),
        34 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CmsView',
           'value' => '\'cms.view\'',
           'phpDoc' => NULL,
        )),
        35 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CmsManage',
           'value' => '\'cms.manage\'',
           'phpDoc' => NULL,
        )),
        36 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'NotificationsSend',
           'value' => '\'notifications.send\'',
           'phpDoc' => NULL,
        )),
        37 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'NotificationsManage',
           'value' => '\'notifications.manage\'',
           'phpDoc' => NULL,
        )),
        38 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'ReportsView',
           'value' => '\'reports.view\'',
           'phpDoc' => NULL,
        )),
        39 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'ReportsExport',
           'value' => '\'reports.export\'',
           'phpDoc' => NULL,
        )),
        40 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SettingsManage',
           'value' => '\'settings.manage\'',
           'phpDoc' => NULL,
        )),
        41 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        42 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'grouped',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Permissions grouped by their module prefix (the part before the dot).
     *
     * @return array<string, list<string>>
     */',
             'namespace' => 'App\\Modules\\Identity\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\RoleName.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Enums\\RoleName',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SuperAdmin',
           'value' => '\'super_admin\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OperationsManager',
           'value' => '\'operations_manager\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'StoreManager',
           'value' => '\'store_manager\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'InventoryOfficer',
           'value' => '\'inventory_officer\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'OrderOfficer',
           'value' => '\'order_officer\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SubscriptionOfficer',
           'value' => '\'subscription_officer\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Nutritionist',
           'value' => '\'nutritionist\'',
           'phpDoc' => NULL,
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'KitchenStaff',
           'value' => '\'kitchen_staff\'',
           'phpDoc' => NULL,
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'DeliveryCoordinator',
           'value' => '\'delivery_coordinator\'',
           'phpDoc' => NULL,
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Driver',
           'value' => '\'driver\'',
           'phpDoc' => NULL,
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Accountant',
           'value' => '\'accountant\'',
           'phpDoc' => NULL,
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CustomerSupport',
           'value' => '\'customer_support\'',
           'phpDoc' => NULL,
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'AppointmentOfficer',
           'value' => '\'appointment_officer\'',
           'phpDoc' => NULL,
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'ContentEditor',
           'value' => '\'content_editor\'',
           'phpDoc' => NULL,
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'ReportViewer',
           'value' => '\'report_viewer\'',
           'phpDoc' => NULL,
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Enums\\UserStatus.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Enums\\UserStatus',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Active',
           'value' => '\'active\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Inactive',
           'value' => '\'inactive\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Invited',
           'value' => '\'invited\'',
           'phpDoc' => NULL,
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\LastSuperAdminException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\RoleInUseException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Exceptions\\SystemRoleException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Models\\Role',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property array<string, string> $display_name
 */',
         'namespace' => 'App\\Modules\\Identity\\Models',
         'uses' => 
        array (
          'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
          'lang' => 'Illuminate\\Support\\Facades\\Lang',
          'spatierole' => 'Spatie\\Permission\\Models\\Role',
          'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Spatie\\Permission\\Models\\Role',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Spatie\\Translatable\\HasTranslations',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'translatable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
              'spatierole' => 'Spatie\\Permission\\Models\\Role',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'array',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Human-readable, localized name for display in the UI.
     *
     * System roles (declared in the RoleName enum) are labelled from the
     * translation files; custom roles use their stored bilingual display name
     * and fall back to the machine identifier when a translation is missing.
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
              'spatierole' => 'Spatie\\Permission\\Models\\Role',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'locale',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isSystem',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * System roles are managed by the platform and cannot be renamed or deleted.
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'lang' => 'Illuminate\\Support\\Facades\\Lang',
              'spatierole' => 'Spatie\\Permission\\Models\\Role',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Models\\UserInvitation',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $user_id
 * @property string $token_hash
 * @property int|null $invited_by
 * @property Carbon $expires_at
 * @property Carbon|null $accepted_at
 */',
         'namespace' => 'App\\Modules\\Identity\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<User, $this>
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'inviter',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<User, $this>
     */',
             'namespace' => 'App\\Modules\\Identity\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isExpired',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isAccepted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isPending',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\PasswordResetNotification.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'resetUrl',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'expiresInMinutes',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Notifications',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'mailmessage' => 'Illuminate\\Notifications\\Messages\\MailMessage',
              'notification' => 'Illuminate\\Notifications\\Notification',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toMail',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Notifications\\Messages\\MailMessage',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Notifications\\UserInvitationNotification.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Notifications\\Notification',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Bus\\Queueable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'acceptUrl',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'inviterName',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'via',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Identity\\Notifications',
             'uses' => 
            array (
              'queueable' => 'Illuminate\\Bus\\Queueable',
              'mailmessage' => 'Illuminate\\Notifications\\Messages\\MailMessage',
              'notification' => 'Illuminate\\Notifications\\Notification',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toMail',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Notifications\\Messages\\MailMessage',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'notifiable',
               'type' => 'object',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Policies\\RolePolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'Spatie\\Permission\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'Spatie\\Permission\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'Spatie\\Permission\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Policies\\UserPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'target',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'target',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deactivate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'target',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'invite',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Seeders\\SuperAdminSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Services\\AuthService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'attempt',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Verify credentials and account status, returning the matching user.
     *
     * Shared by the token-based API login and the session-based web login so
     * both channels enforce identical business rules.
     *
     * @throws InvalidCredentialsException
     * @throws InactiveUserException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'authresult' => 'App\\Modules\\Identity\\DTOs\\AuthResult',
              'logindata' => 'App\\Modules\\Identity\\DTOs\\LoginData',
              'inactiveuserexception' => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
              'invalidcredentialsexception' => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\LoginData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'login',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Authenticate a user and issue a personal access token (API channel).
     *
     * @throws InvalidCredentialsException
     * @throws InactiveUserException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'authresult' => 'App\\Modules\\Identity\\DTOs\\AuthResult',
              'logindata' => 'App\\Modules\\Identity\\DTOs\\LoginData',
              'inactiveuserexception' => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
              'invalidcredentialsexception' => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\DTOs\\AuthResult',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\LoginData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Revoke the token currently used by the authenticated user.
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'authresult' => 'App\\Modules\\Identity\\DTOs\\AuthResult',
              'logindata' => 'App\\Modules\\Identity\\DTOs\\LoginData',
              'inactiveuserexception' => 'App\\Modules\\Identity\\Exceptions\\InactiveUserException',
              'invalidcredentialsexception' => 'App\\Modules\\Identity\\Exceptions\\InvalidCredentialsException',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Services\\InvitationService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'invite',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Create an invited (password-less) user and email them an acceptance link.
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'invitationdata' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'invitationalreadyacceptedexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
              'invitationinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userinvitationnotification' => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\Models\\UserInvitation',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'inviter',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'resend',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Regenerate the token/expiry for a pending invitation and resend the email.
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'invitationdata' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'invitationalreadyacceptedexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
              'invitationinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userinvitationnotification' => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\Models\\UserInvitation',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'invitation',
               'type' => 'App\\Modules\\Identity\\Models\\UserInvitation',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'inviter',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'resolve',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Resolve a plaintext token to a still-usable invitation.
     *
     * @throws InvitationInvalidException
     * @throws InvitationAlreadyAcceptedException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'invitationdata' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'invitationalreadyacceptedexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
              'invitationinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userinvitationnotification' => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\Models\\UserInvitation',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'accept',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Complete an invitation: set the password, activate the account.
     *
     * @throws InvitationInvalidException
     * @throws InvitationAlreadyAcceptedException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'invitationdata' => 'App\\Modules\\Identity\\DTOs\\InvitationData',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'invitationalreadyacceptedexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException',
              'invitationinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\InvitationInvalidException',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'userinvitationnotification' => 'App\\Modules\\Identity\\Notifications\\UserInvitationNotification',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'password',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Services\\PasswordResetService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'sendResetLink',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Issue a reset link for an eligible account.
     *
     * To avoid leaking which emails exist, callers always report the same
     * generic outcome; this method silently no-ops when the account is
     * missing, inactive, still awaiting an invitation, or recently throttled.
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'passwordresetinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException',
              'passwordresetnotification' => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reset',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Complete a reset: verify the token, set the new password.
     *
     * @throws PasswordResetInvalidException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'passwordresetinvalidexception' => 'App\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException',
              'passwordresetnotification' => 'App\\Modules\\Identity\\Notifications\\PasswordResetNotification',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'email',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'token',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'password',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Services\\RoleService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\Models\\Role',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\RoleData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The machine identifier is fixed after creation. The Super Admin role keeps
     * every permission; system role display names are managed by the platform and
     * are not editable, while their permissions may still be adjusted.
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'roledata' => 'App\\Modules\\Identity\\DTOs\\RoleData',
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'roleinuseexception' => 'App\\Modules\\Identity\\Exceptions\\RoleInUseException',
              'systemroleexception' => 'App\\Modules\\Identity\\Exceptions\\SystemRoleException',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
              'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Identity\\Models\\Role',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\RoleData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @throws SystemRoleException
     * @throws RoleInUseException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'roledata' => 'App\\Modules\\Identity\\DTOs\\RoleData',
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'roleinuseexception' => 'App\\Modules\\Identity\\Exceptions\\RoleInUseException',
              'systemroleexception' => 'App\\Modules\\Identity\\Exceptions\\SystemRoleException',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'db' => 'Illuminate\\Support\\Facades\\DB',
              'str' => 'Illuminate\\Support\\Str',
              'permissionregistrar' => 'Spatie\\Permission\\PermissionRegistrar',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isSystemRole',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isSuperAdmin',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'role',
               'type' => 'App\\Modules\\Identity\\Models\\Role',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Identity\\Services\\UserService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Identity\\DTOs\\UserData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'activate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deactivate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @throws CannotDeactivateSelfException
     * @throws LastSuperAdminException
     */',
             'namespace' => 'App\\Modules\\Identity\\Services',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'userdata' => 'App\\Modules\\Identity\\DTOs\\UserData',
              'rolename' => 'App\\Modules\\Identity\\Enums\\RoleName',
              'userstatus' => 'App\\Modules\\Identity\\Enums\\UserStatus',
              'cannotdeactivateselfexception' => 'App\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException',
              'lastsuperadminexception' => 'App\\Modules\\Identity\\Exceptions\\LastSuperAdminException',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\User',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'actingUserId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\DTOs\\MealData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, string>  $name  Locale-keyed meal names.
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'mealType',
               'type' => 'App\\Modules\\Plans\\Enums\\MealType',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'calories',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'proteinG',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'carbsG',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fatG',
               'type' => '?int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'imagePath',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isActive',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sortOrder',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\DTOs\\PlanData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, string>  $name  Locale-keyed display names.
     * @param  array<string, string>  $description  Locale-keyed descriptions.
     * @param  array<string, list<string>>  $features  Locale-keyed feature lists.
     * @param  int  $deliveryFee  Delivery fee in integer minor units.
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'data' => 'App\\Support\\Dto\\Data',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'goal',
               'type' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'name',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'description',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'features',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'imagePath',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'requiresDaySelection',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'minDeliveryDaysPerWeek',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'deliveryFee',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isActive',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            9 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sortOrder',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'data' => 'App\\Support\\Dto\\Data',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Immutable result of a pricing calculation.
 *
 * All monetary figures are {@see Money} value objects (integer minor units);
 * the server is the single source of truth for every line of the breakdown.
 */',
         'namespace' => 'App\\Modules\\Plans\\DTOs',
         'uses' => 
        array (
          'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
          'money' => 'App\\Support\\Money\\Money',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $mealTypes
     * @param  list<int>  $selectedDays
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'planId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'planPublicId',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'planVersionId',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'mealTypes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationUnit',
               'type' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationLength',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'totalDays',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            7 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subtotal',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            8 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'discountPercent',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            9 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'discount',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            10 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'afterDiscount',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            11 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'deliveryFee',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            12 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'taxRate',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            13 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'pricesIncludeTax',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            14 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'taxable',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            15 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tax',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            16 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'total',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            17 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'perDay',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            18 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'requiresDaySelection',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            19 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'minDeliveryDaysPerWeek',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            20 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'selectedDays',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $mealTypes  Chosen meal types (sorted, normalized).
     * @param  list<int>  $selectedDays  Chosen delivery weekdays (0=Sunday..6=Saturday).
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'mealTypes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationUnit',
               'type' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationLength',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'selectedDays',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealTypesKey',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Dto\\Data',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $mealTypes  Sorted, validated meal-type values.
     * @param  int  $price  Package price in integer minor units.
     * @param  string  $discountPercent  Discount as a decimal string (e.g. "10.00").
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'mealTypes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationUnit',
               'type' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'durationLength',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'price',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'discountPercent',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'isActive',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sortOrder',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealTypesKey',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toAttributes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Modules\\Plans\\DTOs',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'data' => 'App\\Support\\Dto\\Data',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\DurationUnit.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
       'scalarType' => 'string',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Time unit a plan duration option is expressed in.
 */',
         'namespace' => 'App\\Modules\\Plans\\Enums',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Day',
           'value' => '\'day\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Week',
           'value' => '\'week\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Month',
           'value' => '\'month\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'days',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Number of calendar days one unit represents.
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toDays',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Total calendar days for a given length of this unit.
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'length',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Localized, human-readable label for this unit.
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\MealType.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Enums\\MealType',
       'scalarType' => 'string',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * A meal slot within a plan (breakfast, lunch, dinner, snack).
 *
 * Meal types drive both the pricing matrix (each price applies to a chosen set
 * of meal types) and the plan\'s available-meals catalog.
 */',
         'namespace' => 'App\\Modules\\Plans\\Enums',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Breakfast',
           'value' => '\'breakfast\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Lunch',
           'value' => '\'lunch\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Dinner',
           'value' => '\'dinner\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Snack',
           'value' => '\'snack\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'key',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Normalize a set of meal-type values into a stable, sorted key.
     *
     * @param  list<string>  $values
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'values',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanGoal.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
       'scalarType' => 'string',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Dietary goal a plan is built around (mirrors the public plans catalog).
 */',
         'namespace' => 'App\\Modules\\Plans\\Enums',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'WeightLoss',
           'value' => '\'weight_loss\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'MuscleBuilding',
           'value' => '\'muscle_building\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Diabetic',
           'value' => '\'diabetic\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Breastfeeding',
           'value' => '\'breastfeeding\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Balanced',
           'value' => '\'balanced\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'DigestiveHealth',
           'value' => '\'digestive_health\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Carnivore',
           'value' => '\'carnivore\'',
           'phpDoc' => NULL,
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'LowCarb',
           'value' => '\'low_carb\'',
           'phpDoc' => NULL,
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Vegan',
           'value' => '\'vegan\'',
           'phpDoc' => NULL,
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Keto',
           'value' => '\'keto\'',
           'phpDoc' => NULL,
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Localized, human-readable label for this goal.
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanVersionStatus.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
       'scalarType' => 'string',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Lifecycle state of a plan pricing version.
 *
 * A draft is editable; publishing locks the version so existing subscriptions
 * always reference immutable pricing. Superseded versions are archived.
 */',
         'namespace' => 'App\\Modules\\Plans\\Enums',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Draft',
           'value' => '\'draft\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Published',
           'value' => '\'published\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Archived',
           'value' => '\'archived\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'badgeVariant',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'minRequired',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'App\\Support\\Exceptions\\DomainException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Models\\Meal',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $public_id
 * @property MealType $meal_type
 * @property array<string, string> $name
 * @property int|null $calories
 * @property int|null $protein_g
 * @property int|null $carbs_g
 * @property int|null $fat_g
 * @property string|null $image_path
 * @property bool $is_active
 * @property int $sort_order
 */',
         'namespace' => 'App\\Modules\\Plans\\Models',
         'uses' => 
        array (
          'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
          'mealfactory' => 'Database\\Factories\\MealFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'str' => 'Illuminate\\Support\\Str',
          'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Translatable\\HasTranslations',
        2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'mealfactory' => 'Database\\Factories\\MealFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'translatable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'mealfactory' => 'Database\\Factories\\MealFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'array',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'newFactory',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Database\\Factories\\MealFactory',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'mealfactory' => 'Database\\Factories\\MealFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'plans',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsToMany<Plan, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'mealfactory' => 'Database\\Factories\\MealFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'locale',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Models\\Plan',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $public_id
 * @property PlanGoal $goal
 * @property array<string, string> $name
 * @property array<string, string>|null $description
 * @property array<string, list<string>>|null $features
 * @property string|null $image_path
 * @property bool $requires_day_selection
 * @property int $min_delivery_days_per_week
 * @property int $delivery_fee
 * @property bool $is_active
 * @property int $sort_order
 */',
         'namespace' => 'App\\Modules\\Plans\\Models',
         'uses' => 
        array (
          'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
          'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
          'planfactory' => 'Database\\Factories\\PlanFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
          'str' => 'Illuminate\\Support\\Str',
          'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Spatie\\Translatable\\HasTranslations',
        2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'translatable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => 'array',
           'public' => true,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'newFactory',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Database\\Factories\\PlanFactory',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getRouteKeyName',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'versions',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<PlanVersion, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'meals',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Meals from the catalog made available to customers of this plan.
     *
     * @return BelongsToMany<Meal, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'publishedVersion',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The single published (customer-facing) version, if any.
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?App\\Modules\\Plans\\Models\\PlanVersion',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'draftVersion',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The version currently open for editing, if any.
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?App\\Modules\\Plans\\Models\\PlanVersion',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Localized display name, falling back across locales then the goal label.
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'plangoal' => 'App\\Modules\\Plans\\Enums\\PlanGoal',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planfactory' => 'Database\\Factories\\PlanFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongstomany' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'softdeletes' => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
              'str' => 'Illuminate\\Support\\Str',
              'hastranslations' => 'Spatie\\Translatable\\HasTranslations',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'locale',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * A single pricing entry: the package price for a (meal-types x duration)
 * combination, with an optional duration discount.
 *
 * @property int $id
 * @property int $plan_version_id
 * @property array<int, string> $meal_types
 * @property string $meal_types_key
 * @property DurationUnit $duration_unit
 * @property int $duration_length
 * @property int $price
 * @property string $discount_percent
 * @property bool $is_active
 * @property int $sort_order
 */',
         'namespace' => 'App\\Modules\\Plans\\Models',
         'uses' => 
        array (
          'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
          'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
          'money' => 'App\\Support\\Money\\Money',
          'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'money' => 'App\\Support\\Money\\Money',
              'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'newFactory',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Database\\Factories\\PlanPricingRuleFactory',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'money' => 'App\\Support\\Money\\Money',
              'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'version',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<PlanVersion, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'money' => 'App\\Support\\Money\\Money',
              'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealTypes',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The meal types included in this pricing option, as enum cases.
     *
     * @return list<MealType>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'money' => 'App\\Support\\Money\\Money',
              'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'priceMoney',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Support\\Money\\Money',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'discountBasisPoints',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Discount expressed in basis points (10000 = 100%).
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'durationunit' => 'App\\Modules\\Plans\\Enums\\DurationUnit',
              'mealtype' => 'App\\Modules\\Plans\\Enums\\MealType',
              'money' => 'App\\Support\\Money\\Money',
              'planpricingrulefactory' => 'Database\\Factories\\PlanPricingRuleFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'totalDays',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Models\\PlanVersion',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property int $plan_id
 * @property int $version_number
 * @property PlanVersionStatus $status
 * @property Carbon|null $published_at
 * @property int|null $created_by
 */',
         'namespace' => 'App\\Modules\\Plans\\Models',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
          'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
          'carbon' => 'Illuminate\\Support\\Carbon',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'newFactory',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Database\\Factories\\PlanVersionFactory',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'plan',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<Plan, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'creator',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return BelongsTo<User, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pricingRules',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return HasMany<PlanPricingRule, $this>
     */',
             'namespace' => 'App\\Modules\\Plans\\Models',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'planversionfactory' => 'Database\\Factories\\PlanVersionFactory',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'hasmany' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
              'carbon' => 'Illuminate\\Support\\Carbon',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isDraft',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isPublished',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Policies\\MealPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Policies\\PlanPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'viewAny',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'view',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Seeders\\MealSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Seeders\\PlanSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Services\\MealService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\Meal',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Plans\\DTOs\\MealData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\Meal',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Plans\\DTOs\\MealData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'meal',
               'type' => 'App\\Modules\\Plans\\Models\\Meal',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'syncPlanMeals',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Sync the meals made available to a plan.
     *
     * @param  list<int>  $mealIds
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'mealdata' => 'App\\Modules\\Plans\\DTOs\\MealData',
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'mealIds',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Services\\PlanPricingService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * The single source of truth for plan pricing.
 *
 * Clients submit only their choices (meal types + duration); every monetary
 * figure is computed here from the plan\'s published pricing version and the
 * platform finance settings, using integer minor units throughout.
 */',
         'namespace' => 'App\\Modules\\Plans\\Services',
         'uses' => 
        array (
          'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
          'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
          'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
          'invaliddeliverydaysexception' => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
          'plannotavailableexception' => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
          'pricingrulenotfoundexception' => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
          'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
          'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
          'settingsservice' => 'App\\Modules\\Settings\\Services\\SettingsService',
          'money' => 'App\\Support\\Money\\Money',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'settings',
               'type' => 'App\\Modules\\Settings\\Services\\SettingsService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'quote',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @throws PlanNotAvailableException
     * @throws PricingRuleNotFoundException
     * @throws InvalidDeliveryDaysException
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
              'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'invaliddeliverydaysexception' => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
              'plannotavailableexception' => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
              'pricingrulenotfoundexception' => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'settingsservice' => 'App\\Modules\\Settings\\Services\\SettingsService',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'mealTypeOptions',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Distinct meal-type combinations offered by a version, in order.
     *
     * @return list<array{key: string, meal_types: list<string>}>
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
              'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'invaliddeliverydaysexception' => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
              'plannotavailableexception' => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
              'pricingrulenotfoundexception' => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'settingsservice' => 'App\\Modules\\Settings\\Services\\SettingsService',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'matrix',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Active pricing rules grouped by meal-type combination key.
     *
     * @return array<string, list<PlanPricingRule>>
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'planquote' => 'App\\Modules\\Plans\\DTOs\\PlanQuote',
              'planquoterequestdata' => 'App\\Modules\\Plans\\DTOs\\PlanQuoteRequestData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'invaliddeliverydaysexception' => 'App\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException',
              'plannotavailableexception' => 'App\\Modules\\Plans\\Exceptions\\PlanNotAvailableException',
              'pricingrulenotfoundexception' => 'App\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'settingsservice' => 'App\\Modules\\Settings\\Services\\SettingsService',
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Plans\\Services\\PlanService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\Plan',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Plans\\DTOs\\PlanData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\Plan',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'App\\Modules\\Plans\\DTOs\\PlanData',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'delete',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Soft-delete (archive) a plan and record the action.
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'plandata' => 'App\\Modules\\Plans\\DTOs\\PlanData',
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'publishedversionimmutableexception' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createDraftVersion',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Open a new editable draft version, cloning the current pricing.
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'plandata' => 'App\\Modules\\Plans\\DTOs\\PlanData',
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'publishedversionimmutableexception' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\PlanVersion',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'savePlanPricing',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Persist submitted pricing to the plan, keeping versioning transparent.
     *
     * Nothing happens when the submitted matrix matches the current effective
     * pricing. Otherwise the changes are written to a draft version (creating
     * one from the published pricing when needed).
     *
     * @param  list<PricingRuleData>  $rules
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'plandata' => 'App\\Modules\\Plans\\DTOs\\PlanData',
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'publishedversionimmutableexception' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'plan',
               'type' => 'App\\Modules\\Plans\\Models\\Plan',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'rules',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updatePricing',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Replace the pricing rules of a draft version.
     *
     * @param  list<PricingRuleData>  $rules
     *
     * @throws PublishedVersionImmutableException
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'plandata' => 'App\\Modules\\Plans\\DTOs\\PlanData',
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'publishedversionimmutableexception' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'rules',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'publish',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Publish a draft version, superseding any previously published one.
     *
     * @throws PublishedVersionImmutableException
     */',
             'namespace' => 'App\\Modules\\Plans\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'plandata' => 'App\\Modules\\Plans\\DTOs\\PlanData',
              'pricingruledata' => 'App\\Modules\\Plans\\DTOs\\PricingRuleData',
              'planversionstatus' => 'App\\Modules\\Plans\\Enums\\PlanVersionStatus',
              'publishedversionimmutableexception' => 'App\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'planpricingrule' => 'App\\Modules\\Plans\\Models\\PlanPricingRule',
              'planversion' => 'App\\Modules\\Plans\\Models\\PlanVersion',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Plans\\Models\\PlanVersion',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'version',
               'type' => 'App\\Modules\\Plans\\Models\\PlanVersion',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingGroup.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Company',
           'value' => '\'company\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Localization',
           'value' => '\'localization\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Finance',
           'value' => '\'finance\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Operations',
           'value' => '\'operations\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Policies',
           'value' => '\'policies\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return list<string>
     */',
             'namespace' => 'App\\Modules\\Settings\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingType.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Enums\\SettingType',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'String',
           'value' => '\'string\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Text',
           'value' => '\'text\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Boolean',
           'value' => '\'boolean\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Integer',
           'value' => '\'integer\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Decimal',
           'value' => '\'decimal\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'Select',
           'value' => '\'select\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'cast',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Cast a stored (string) value to its typed PHP representation.
     */',
             'namespace' => 'App\\Modules\\Settings\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string|int|bool|null',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'serialize',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Serialize a typed value into its stored string representation.
     */',
             'namespace' => 'App\\Modules\\Settings\\Enums',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Models\\Setting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Models\\Setting',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property bool $is_encrypted
 */',
         'namespace' => 'App\\Modules\\Settings\\Models',
         'uses' => 
        array (
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @var list<string>
     */',
             'namespace' => 'App\\Modules\\Settings\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, string>
     */',
             'namespace' => 'App\\Modules\\Settings\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Policies\\SettingsPolicy',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'manage',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'user',
               'type' => 'App\\Models\\User',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Services\\SettingsService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'audit',
               'type' => 'App\\Modules\\Audit\\Services\\AuditService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'all',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * All settings as typed values, merging stored rows over registry defaults.
     *
     * @return array<string, string|int|bool|null>
     */',
             'namespace' => 'App\\Modules\\Settings\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'setting' => 'App\\Modules\\Settings\\Models\\Setting',
              'settingdefinition' => 'App\\Modules\\Settings\\Support\\SettingDefinition',
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'crypt' => 'Illuminate\\Support\\Facades\\Crypt',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'get',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string|int|bool|null',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'group',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Typed values for a single group, keyed by setting key.
     *
     * @return array<string, string|int|bool|null>
     */',
             'namespace' => 'App\\Modules\\Settings\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'setting' => 'App\\Modules\\Settings\\Models\\Setting',
              'settingdefinition' => 'App\\Modules\\Settings\\Support\\SettingDefinition',
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'crypt' => 'Illuminate\\Support\\Facades\\Crypt',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'group',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Persist a batch of settings.
     *
     * Only keys present in the registry are accepted; each value is serialized,
     * optionally encrypted, and the change set is recorded in the audit trail
     * (encrypted values are redacted from the audit payload).
     *
     * @param  array<string, mixed>  $input
     */',
             'namespace' => 'App\\Modules\\Settings\\Services',
             'uses' => 
            array (
              'auditaction' => 'App\\Modules\\Audit\\Enums\\AuditAction',
              'auditservice' => 'App\\Modules\\Audit\\Services\\AuditService',
              'setting' => 'App\\Modules\\Settings\\Models\\Setting',
              'settingdefinition' => 'App\\Modules\\Settings\\Support\\SettingDefinition',
              'settingsregistry' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
              'cache' => 'Illuminate\\Support\\Facades\\Cache',
              'crypt' => 'Illuminate\\Support\\Facades\\Crypt',
              'db' => 'Illuminate\\Support\\Facades\\DB',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'input',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Support\\SettingDefinition',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Structural description of a single platform setting.
 *
 * The catalog of definitions is the source of truth for a setting\'s type,
 * group, default value, validation rules, and whether it must be encrypted at
 * rest. Human-readable labels/hints live in the translation files, keyed by the
 * setting key, so they stay localizable.
 */',
         'namespace' => 'App\\Modules\\Settings\\Support',
         'uses' => 
        array (
          'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
          'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  list<string>  $rules  Laravel validation rules for the value.
     * @param  list<string>  $options  Allowed values for a Select setting.
     */',
             'namespace' => 'App\\Modules\\Settings\\Support',
             'uses' => 
            array (
              'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
              'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'group',
               'type' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'App\\Modules\\Settings\\Enums\\SettingType',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'default',
               'type' => 'string|int|bool|null|null',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'rules',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'options',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'encrypted',
               'type' => 'bool',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'labelKey',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'hintKey',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fieldName',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * HTML-safe field name for this setting.
     *
     * Keys contain dots, which Laravel treats as nested paths in field names,
     * `old()`, and error bags. Dots are encoded as `__` so the value lives at a
     * flat `settings.<field>` path and repopulation/error display work cleanly.
     */',
             'namespace' => 'App\\Modules\\Settings\\Support',
             'uses' => 
            array (
              'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
              'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Settings\\Support\\SettingsRegistry',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Central catalog of every platform setting (BRD §9.20).
 *
 * Adding a setting here is all that is required: validation, casting, defaults,
 * and the admin UI are all driven from these definitions.
 */',
         'namespace' => 'App\\Modules\\Settings\\Support',
         'uses' => 
        array (
          'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
          'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'all',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, SettingDefinition>
     */',
             'namespace' => 'App\\Modules\\Settings\\Support',
             'uses' => 
            array (
              'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
              'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'find',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => '?App\\Modules\\Settings\\Support\\SettingDefinition',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'key',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'grouped',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Definitions grouped by their {@see SettingGroup}, preserving order.
     *
     * @return array<string, list<SettingDefinition>>
     */',
             'namespace' => 'App\\Modules\\Settings\\Support',
             'uses' => 
            array (
              'settinggroup' => 'App\\Modules\\Settings\\Enums\\SettingGroup',
              'settingtype' => 'App\\Modules\\Settings\\Enums\\SettingType',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditlog' => 'App\\Modules\\Audit\\Models\\AuditLog',
              'auditlogpolicy' => 'App\\Modules\\Audit\\Policies\\AuditLogPolicy',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'rolepolicy' => 'App\\Modules\\Identity\\Policies\\RolePolicy',
              'userpolicy' => 'App\\Modules\\Identity\\Policies\\UserPolicy',
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'mealpolicy' => 'App\\Modules\\Plans\\Policies\\MealPolicy',
              'planpolicy' => 'App\\Modules\\Plans\\Policies\\PlanPolicy',
              'setting' => 'App\\Modules\\Settings\\Models\\Setting',
              'settingspolicy' => 'App\\Modules\\Settings\\Policies\\SettingsPolicy',
              'gate' => 'Illuminate\\Support\\Facades\\Gate',
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'auditlog' => 'App\\Modules\\Audit\\Models\\AuditLog',
              'auditlogpolicy' => 'App\\Modules\\Audit\\Policies\\AuditLogPolicy',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'rolepolicy' => 'App\\Modules\\Identity\\Policies\\RolePolicy',
              'userpolicy' => 'App\\Modules\\Identity\\Policies\\UserPolicy',
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
              'mealpolicy' => 'App\\Modules\\Plans\\Policies\\MealPolicy',
              'planpolicy' => 'App\\Modules\\Plans\\Policies\\PlanPolicy',
              'setting' => 'App\\Modules\\Settings\\Models\\Setting',
              'settingspolicy' => 'App\\Modules\\Settings\\Policies\\SettingsPolicy',
              'gate' => 'Illuminate\\Support\\Facades\\Gate',
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Dto\\Data.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Dto\\Data',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Base for immutable, typed data transfer objects.
 *
 * DTOs carry validated use-case input into application services. They never
 * depend on the HTTP request, session, or route helpers; controllers map
 * validated data into a DTO via {@see fromArray()}.
 */',
         'namespace' => 'App\\Support\\Dto',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $attributes
     */',
             'namespace' => 'App\\Support\\Dto',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => true,
           'final' => false,
           'static' => true,
           'returnType' => 'static',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'attributes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Support\\Dto',
             'uses' => 
            array (
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Enums\\ApiErrorCode.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Support\\Enums\\ApiErrorCode',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'VALIDATION_FAILED',
           'value' => '\'VALIDATION_FAILED\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UNAUTHENTICATED',
           'value' => '\'UNAUTHENTICATED\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'FORBIDDEN',
           'value' => '\'FORBIDDEN\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'NOT_FOUND',
           'value' => '\'NOT_FOUND\'',
           'phpDoc' => NULL,
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CONFLICT',
           'value' => '\'CONFLICT\'',
           'phpDoc' => NULL,
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'CURRENCY_MISMATCH',
           'value' => '\'CURRENCY_MISMATCH\'',
           'phpDoc' => NULL,
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'SERVER_ERROR',
           'value' => '\'SERVER_ERROR\'',
           'phpDoc' => NULL,
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Exceptions\\DomainException.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Exceptions\\DomainException',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Base type for business/domain errors.
 *
 * Every domain error carries a stable API error code, an HTTP status, and an
 * optional structured details payload. The central API exception renderer maps
 * these directly onto the error envelope without any exception-specific logic.
 */',
         'namespace' => 'App\\Support\\Exceptions',
         'uses' => 
        array (
          'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
          'runtimeexception' => 'RuntimeException',
          'throwable' => 'Throwable',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'RuntimeException',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $details
     */',
             'namespace' => 'App\\Support\\Exceptions',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'runtimeexception' => 'RuntimeException',
              'throwable' => 'Throwable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'errorCode',
               'type' => 'App\\Support\\Enums\\ApiErrorCode',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'httpStatus',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'details',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 68,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'previous',
               'type' => '?Throwable',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'errorCode',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Support\\Enums\\ApiErrorCode',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'httpStatus',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'details',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array<string, mixed>
     */',
             'namespace' => 'App\\Support\\Exceptions',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'runtimeexception' => 'RuntimeException',
              'throwable' => 'Throwable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\ApiResponse.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Http\\Responses\\ApiResponse',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Central builder for the standard API success and error envelopes.
 *
 * Every response carries the request id from the request attributes, keeping the
 * envelope shape defined in exactly one place.
 */',
         'namespace' => 'App\\Support\\Http\\Responses',
         'uses' => 
        array (
          'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
          'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
          'request' => 'Illuminate\\Http\\Request',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedClassConstantsNode::__set_state(array(
           'constants' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedClassConstantNode::__set_state(array(
               'name' => 'REQUEST_ID_ATTRIBUTE',
               'value' => '\'request_id\'',
               'attributes' => 
              array (
              ),
            )),
          ),
           'public' => true,
           'private' => false,
           'final' => false,
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'success',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'mixed',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'error',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @param  array<string, mixed>  $details
     */',
             'namespace' => 'App\\Support\\Http\\Responses',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'code',
               'type' => 'App\\Support\\Enums\\ApiErrorCode',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            4 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'details',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Http\\Responses\\MoneyPresenter',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Renders a {@see Money} value object for API output without losing precision.
 *
 * Both the integer minor amount (authoritative) and a formatted decimal string
 * (display only) are returned, alongside the currency code.
 */',
         'namespace' => 'App\\Support\\Http\\Responses',
         'uses' => 
        array (
          'money' => 'App\\Support\\Money\\Money',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toArray',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * @return array{minor: int, amount: string, currency: string}
     */',
             'namespace' => 'App\\Support\\Http\\Responses',
             'uses' => 
            array (
              'money' => 'App\\Support\\Money\\Money',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'money',
               'type' => 'App\\Support\\Money\\Money',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Money\\Currency.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Money\\Currency',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Immutable currency descriptor.
 *
 * The minor unit exponent defines how many integer minor units make up one
 * major unit (e.g. 2 for SAR, where 100 halalas = 1 riyal).
 */',
         'namespace' => 'App\\Support\\Money',
         'uses' => 
        array (
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'code',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'minorUnitExponent',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 1,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'sar',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'equals',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Money\\Money.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Money\\Money',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Immutable money value object stored as integer minor units.
 *
 * Floating-point amounts are prohibited: there are no float parameters and no
 * float return values. Multiplication is expressed as an integer ratio (or
 * basis points) and all rounding is delegated to {@see Rounding}.
 */',
         'namespace' => 'App\\Support\\Money',
         'uses' => 
        array (
          'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
          'domainexception' => 'App\\Support\\Exceptions\\DomainException',
          'invalidargumentexception' => 'InvalidArgumentException',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromMinor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'amount',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'currency',
               'type' => '?App\\Support\\Money\\Currency',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fromMajor',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Build from a decimal string such as "12.50", "12.5", "12" or "-3.20".
     */',
             'namespace' => 'App\\Support\\Money',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'domainexception' => 'App\\Support\\Exceptions\\DomainException',
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'amount',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'currency',
               'type' => '?App\\Support\\Money\\Currency',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'zero',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'currency',
               'type' => '?App\\Support\\Money\\Currency',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'add',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'subtract',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'multiply',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Multiply by an integer ratio (numerator / denominator), rounded centrally.
     */',
             'namespace' => 'App\\Support\\Money',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'domainexception' => 'App\\Support\\Exceptions\\DomainException',
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'numerator',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'denominator',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'percentage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Apply a percentage expressed in basis points (10000 bps = 100%).
     */',
             'namespace' => 'App\\Support\\Money',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'domainexception' => 'App\\Support\\Exceptions\\DomainException',
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'self',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'basisPoints',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isZero',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isNegative',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'equals',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'greaterThan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'lessThan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'other',
               'type' => 'self',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toMinor',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'format',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Render as a decimal string for display (never used for calculation).
     */',
             'namespace' => 'App\\Support\\Money',
             'uses' => 
            array (
              'apierrorcode' => 'App\\Support\\Enums\\ApiErrorCode',
              'domainexception' => 'App\\Support\\Exceptions\\DomainException',
              'invalidargumentexception' => 'InvalidArgumentException',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Money\\Rounding.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Money\\Rounding',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Central, deterministic rounding for all money arithmetic.
 *
 * Uses integer-only math with half-up rounding on the magnitude, so results are
 * identical across web, API, and any recalculation. No floating point is used.
 */',
         'namespace' => 'App\\Support\\Money',
         'uses' => 
        array (
          'divisionbyzeroerror' => 'DivisionByZeroError',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'divide',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Divide two integers, rounding half away from zero (half-up on magnitude).
     */',
             'namespace' => 'App\\Support\\Money',
             'uses' => 
            array (
              'divisionbyzeroerror' => 'DivisionByZeroError',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'numerator',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'denominator',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Support\\Ui\\AuditActionPresenter',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Presentation helpers for rendering audit log rows.
 */',
         'namespace' => 'App\\Support\\Ui',
         'uses' => 
        array (
          'user' => 'App\\Models\\User',
          'role' => 'App\\Modules\\Identity\\Models\\Role',
          'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
          'meal' => 'App\\Modules\\Plans\\Models\\Meal',
          'plan' => 'App\\Modules\\Plans\\Models\\Plan',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => true,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'variant',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Badge variant for an audit action, driven by its verb suffix.
     */',
             'namespace' => 'App\\Support\\Ui',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'targetLabel',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Localized label for an auditable model class.
     */',
             'namespace' => 'App\\Support\\Ui',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'role' => 'App\\Modules\\Identity\\Models\\Role',
              'userinvitation' => 'App\\Modules\\Identity\\Models\\UserInvitation',
              'meal' => 'App\\Modules\\Plans\\Models\\Meal',
              'plan' => 'App\\Modules\\Plans\\Models\\Plan',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 0,
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
