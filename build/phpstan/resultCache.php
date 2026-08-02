<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1785662159,
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
    0 => 'C:\\newme\\app\\Modules\\Dashboard',
    1 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php',
  ),
  'scannedFiles' => 
  array (
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LoginController.php' => '7d47c14bc3dfbd2dcaf5f6dd991e78d1eae5f2bc74d69581ac0771fc6057dc4b',
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\LogoutController.php' => 'edc6b466131a3f7046c0ddd9d772619704da2b3963b9bc8dc415cac55554877e',
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\Auth\\MeController.php' => '212b6dc38fe903c85156c9799cb1078db129f6c30ed9715206154483a95864cf',
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\HealthController.php' => '6fb4b95997743460808bd1f9eb56ef2b294fb6cce1dd7374b6e9ec2108313444',
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanController.php' => 'a72fe316e5167b146546d8383588559de636732664ab113ce18cb857a568c9bc',
    'C:\\newme\\app\\Http\\Controllers\\Api\\V1\\PlanQuoteController.php' => '9e5ce25ad4957c8e9faf414c9250c28bf20ac5b7b9e7f3f1aa312c415962150e',
    'C:\\newme\\app\\Http\\Controllers\\Controller.php' => 'd90b757ef4dfdb1146846db9d6d531024b5b2c0275f0832b9dbc5af1b4ae5091',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\AccountController.php' => 'e63390738f6ee5cb02b93b1f2970fabec07fffbe0dcdbf7ddc2d2058133e26d2',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\ForgotPasswordController.php' => '4e6f6028623c31159a51b683d6e6963b7800d8e06791bfd42d976231e1ddbe2b',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\InvoiceController.php' => 'a24716d99da32c6d7bdbc6a045900d7d070b8ff9eef0458bfcf928815c6278a0',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\LoginController.php' => '3bcd6b9432fdb3032f6b3148223c903fb4e93614102139927540047684410a48',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\RegisterController.php' => '22fe43ba99dddd5102cead9ebe2a9307157e0d39867af1e79aff31147ed0b9ba',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Account\\ResetPasswordController.php' => 'f1b5977f615a8d219c66c3c20e2b3593288c927c939e9b0712bcd133d90bc114',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\AuditController.php' => '15dae1c2993e8508044002ba4477ef484f14bcec33eb7feb27bc6799c7618c6c',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ForgotPasswordController.php' => '4bb8442159eb8d914e983b792cdb138499d4fe841763dd23c929a4921e249a72',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\LoginController.php' => '05659d64e7701cff979324948b0c543ef368702ecb9d8f0365d8e9ca231e0006',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\Auth\\ResetPasswordController.php' => 'f99928393efd27298a05539fa2c28dd542a193c6b2c12dd18115c0add292cf22',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\CategoryController.php' => 'b4ba66b99b0fdc2b0e446d48e173b0387d308c561ff3bc303bf32a362ac8c8a8',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\CouponController.php' => 'ceb03450875463b2abdbbab2d194faf7b90f56384ae7e03f5c290ba6659004ce',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\CustomerController.php' => 'b2109316dc11e0c92fdc85863410315a06a6872ea5ffdb312a2a2eccb18efb9a',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvitationController.php' => '36e8a9d2750c67412d95c8434dab581c5bf9ce76e022e8d620200efadc758f9b',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\InvoiceController.php' => 'ab5f2d34614a27b492c50f2299ccf48c9c157a1f58413f43852dc7e77c0a2ad7',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\MealController.php' => 'b3f333459c8b12eb3d0c3d47865588d0bdc159379abf4177bf0e209d0d089719',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\NotificationController.php' => 'aca301658e4078881c551e258cc449f6e49cdd7c76410995826dc6c02ec11982',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\OrderController.php' => '56633bb5c75c176d2e808b9d2806bd1a7ebaa077387415ce1d4921cbfc77157a',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PaymentController.php' => '13b0146e7b4938aa2298e937dec2f015609696b835861de26e796359628ad26d',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanController.php' => '2299054eb947c668b67610263a4288493360c64fd7662e78fcd6b8a9060860e7',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanMealController.php' => '538377e91bf1c3918307f0dd2a0bc061f7e64a9bf660b20a6c8d9017296adabd',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanPricingController.php' => '7b31502e477f80180ee556221b6cd8703f5ea78eeefffae9da412408eb1b8958',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\PlanVersionController.php' => '52554c8b15f70d763899c13f94acd66de37fc2d4b96cccd4b736e9140d1ee52f',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\ProductController.php' => '1e1528ac849e31249b5bf0d11720ee332d47e820f67b777ba423749d709f40d3',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\RoleController.php' => '71f01ff6a9de75883b17775d11a3c755712225ef170e68df1109d85685101ab1',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SettingController.php' => 'dc704958e178cabd5df3a5dd9bd69814234f937f2c3f8dc872f1b1eff17cd943',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\SubscriptionController.php' => 'a8d68febfb8fda77cc8ab56d3f6868323ee20d658fd566918c0e14538bf2ce22',
    'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\UserController.php' => 'b945b3c3879173c42421d0a2c81721ee29dfd915d9ef8fc7e07ad39ede34ae88',
    'C:\\newme\\app\\Http\\Controllers\\Web\\CartController.php' => '44a2aaf7937d71b9c8f3bfea3625aef00eebea1c71fbf63ec9f4ab2fcaecbe34',
    'C:\\newme\\app\\Http\\Controllers\\Web\\CheckoutController.php' => '9271f886c3f51d43f9454bb4cbbc87245f14625348391cd7d662f5f82f2bcba4',
    'C:\\newme\\app\\Http\\Controllers\\Web\\InvitationController.php' => 'c32b303b29c07c34888b6f84d951c2f736aad422966992cd747e8cb7694752d0',
    'C:\\newme\\app\\Http\\Controllers\\Web\\LocaleController.php' => '64b21a13bbffd6afc2968c0b3657b4e08c8490d5c0b795894933b77b8911c546',
    'C:\\newme\\app\\Http\\Controllers\\Web\\WebsiteController.php' => 'd4d79b84939af7f4b3348cd55a8b0a5bb9861f0683fa0cc2b5f78fd6a6c93205',
    'C:\\newme\\app\\Http\\Middleware\\AssignRequestId.php' => '4d229c622f748a11274db65de67d248b6074be61548aa7d0f11aa5d354fbaa62',
    'C:\\newme\\app\\Http\\Middleware\\EnsureUserType.php' => 'c1a45d8963d3942e4d2bd61d36fd962681aac783d87f465497e2423ab61c03f3',
    'C:\\newme\\app\\Http\\Middleware\\SetLocale.php' => '8392c3f3e1bbce55593940259eb95a3b2ea23b0936ff122a58012dae0612ae81',
    'C:\\newme\\app\\Http\\Middleware\\SetWebLocale.php' => '3b0c86e623cc1f74583e99717c621b6351cf7c2dcbd1142092682caf4e102213',
    'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Auth\\LoginRequest.php' => '005875fa96778a2bea5c455bcabc3dacf338938a09b211e26db4da06a9e0ed81',
    'C:\\newme\\app\\Http\\Requests\\Api\\V1\\Plans\\PlanQuoteRequest.php' => '5d678fa40785708750c5dfbd0afd2fe4af0e0231991da1bdaf079c789cd180e6',
    'C:\\newme\\app\\Http\\Requests\\Web\\Account\\ForgotPasswordRequest.php' => 'c8d7d4b8064a5cc04a01e8efd1a670d6205727bb4a6648414dd8b31b73b30fd8',
    'C:\\newme\\app\\Http\\Requests\\Web\\Account\\LoginRequest.php' => '3b687570f046a793b9de49cf61bfdd23a5964741ad242867c4faeaa2ef5042c3',
    'C:\\newme\\app\\Http\\Requests\\Web\\Account\\RegisterRequest.php' => '8a530026826d04375d5527ad5bff5d40e368e0edb55ede0d19b18e378f6d4642',
    'C:\\newme\\app\\Http\\Requests\\Web\\Account\\ResetPasswordRequest.php' => '7155ba9ea491c2d5f317d9899706d52e2efa3717b5456d8338c0605844e15391',
    'C:\\newme\\app\\Http\\Requests\\Web\\Account\\SubscribeRequest.php' => 'd3c669198314bc62e9629d8ca881f936aeebe3324198e36950e9fe36e2424ef4',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ForgotPasswordRequest.php' => '0c1163799238b560f5e3f089c93db726785f7943fd41045e2746795420c1684f',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\LoginRequest.php' => '3b08abb92e0a6de7668074732f4f8902842e89f5f4fffdf071f1a2f2018d0ca2',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Auth\\ResetPasswordRequest.php' => '75686db1cca57f23ceda384fdcc1f6c9151da979f5e1e0cc6e0c36ec0cc72a3e',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Categories\\CategoryRequest.php' => '8590484a82614c2c6c49615d0fca2a32f0868109433ded7c40e0a5effb47d37a',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Categories\\StoreCategoryRequest.php' => 'a572134bfbf02d1376b284c0f601512cf944e5db63f097b28066679e0154984a',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Categories\\UpdateCategoryRequest.php' => 'f8971745c5d389d294b522a6002465a7f492571d659d11ad9c0bd06729b9e7f7',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Coupons\\CouponRequest.php' => '2941f5552d3dd25d073fb1dc424f87adeb52a4882ddc52a0c1e540246f5aa48b',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Coupons\\StoreCouponRequest.php' => 'a0b6c9ef094c80643c8ab881db7d058551f8e457707fb6449976dd26373882ee',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Coupons\\UpdateCouponRequest.php' => '568beb34de6a312c4ac94f0a160bdd99c61b12cc99699a210c9013526b510363',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\MealRequest.php' => 'e8df7c526f801436f1f59ccaf678f02df67cf811096e215704ecfd4fa3144e3d',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\StoreMealRequest.php' => '585de23243ba9054676da9dbb323e631fed9f27ef88909e6ca312b22c83a0a4b',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Meals\\UpdateMealRequest.php' => 'b69ac0fc861aae1d5bd6f3eb316fba028c587c19f291e2bdced424812df22afa',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\PlanRequest.php' => '83bd5224034e9901b46d456ade6a52507b7253feee66a817199bdcf2fa54cb8d',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\StorePlanRequest.php' => 'ca6b1d964855b44348189cb540b93268d18af40ba48b716036bd43041fdc8e17',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanMealsRequest.php' => '243186796fb6b3d28ff75e3e3e76ff03a8fae6d73462dae5324e3c977cc4d35a',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePlanRequest.php' => 'b386f89f16df27806ffe913225a9c3e3149beab45f4910340043bd2c070740e4',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Plans\\UpdatePricingMatrixRequest.php' => 'd99d608f56c6411a33ca3b11eaec3b9da8de2af5d9d0b17e3b3659a1d8730fec',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Products\\ProductRequest.php' => '2356d82d249c58dfbe4e2032a086b1411a7cd09789e8ea5252d177cd8fc92e3e',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Products\\StoreProductRequest.php' => 'f8bc06a7dedad6b9f58e995e5b9044ffd9846d169f593207828773b2204ed21d',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Products\\UpdateProductRequest.php' => '7bd1a77fca5ed0c6b842f8689f431807cf7edf215aacb98db796080563c9b2eb',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\StoreRoleRequest.php' => 'c9e646cd7a13067916aca3a6c7f701a6998c88f539efb45e7b585faaa35bee40',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Roles\\UpdateRoleRequest.php' => 'd3f0161013108778acd308f03d9561332db86331d4850a1e3d18b4196721d907',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Settings\\UpdateSettingsRequest.php' => '0ab7d6178740d46bde98d518b8b20732579140986a4419b241e72ac81b2b5b67',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Subscriptions\\UpdateHandlingRequest.php' => '26189779079ad5623261130beefb5f4f86d85aea127b016111acd3ce70e611a2',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\SendInvitationRequest.php' => '34142492f9b8dad37a58d04caee564c0bb5fd81da7384d0af7af948ca52dedb7',
    'C:\\newme\\app\\Http\\Requests\\Web\\Admin\\Users\\UpdateUserRequest.php' => '86f632b233d4db6f71b9dcc16589378205f35cf052b2695cfa15254075f74213',
    'C:\\newme\\app\\Http\\Requests\\Web\\Checkout\\AddressRequest.php' => 'eb606a7569263185e66b3c7c8477ff91fce021ef7c1c7101d2d039610d9ab67a',
    'C:\\newme\\app\\Http\\Requests\\Web\\Checkout\\PlaceOrderRequest.php' => '2df1dead06b1a4ea049b6a4c1fa659f84e8e2eb159528a45d8ab5b41fbeec275',
    'C:\\newme\\app\\Http\\Requests\\Web\\Invitations\\AcceptInvitationRequest.php' => '1ed390ed492c34451856263e88e019cea44942538b5b5ba8033df93278c3b411',
    'C:\\newme\\app\\Http\\Resources\\V1\\MealResource.php' => 'd4b0bd176ecb4294944f4bca536984859d7cf8af91f6710b690f06023975744e',
    'C:\\newme\\app\\Http\\Resources\\V1\\PlanQuoteResource.php' => '4ef1e06426530d8a951034a8e3e9fb40022f1803692d617345b36c58bb3fda63',
    'C:\\newme\\app\\Http\\Resources\\V1\\PlanResource.php' => 'a7e85e283c706d2fe10e995965feb68ace8b5f1b9111b99bf7509355b3a8feb5',
    'C:\\newme\\app\\Http\\Resources\\V1\\PlanVersionResource.php' => '7938faad9ad519ccf17082ded044635371e658cb51a468f3a7741a6cdfff665b',
    'C:\\newme\\app\\Http\\Resources\\V1\\UserResource.php' => '9cd4ab2fb19afc5c6a54e5eb09723cb6d9f00c35dba8bb0ac3ffa58d09200eca',
    'C:\\newme\\app\\Models\\User.php' => 'fb2bb6503fcbf6954a445fed29fe49cd41b2ec218e871d8048aad0a387c77e49',
    'C:\\newme\\app\\Modules\\Addresses\\DTOs\\AddressData.php' => 'ddf32ca4f3a419f07789d1760a286a3d1cea2821919a9f0721f15afa81662edc',
    'C:\\newme\\app\\Modules\\Addresses\\DTOs\\AddressSnapshot.php' => '2943298f7b51420880b12c2eef59559cd45ecdc5dcb2a28cc0388b766fb0ae02',
    'C:\\newme\\app\\Modules\\Addresses\\Models\\Address.php' => 'df7cc7bad1cf3f1d42522e3275e3416d8a009fef7f7d13de01e721f94f6bad5e',
    'C:\\newme\\app\\Modules\\Addresses\\Services\\AddressService.php' => '1108573cfa26380ba37fdfef9a5ed6b17ce500c3af0ab69f3bccfdd661729f75',
    'C:\\newme\\app\\Modules\\Audit\\Enums\\AuditAction.php' => '839fff2a433d5332ffb81f66c3f9e9839e1ddae021b6de5f00e20acd63e8bb8a',
    'C:\\newme\\app\\Modules\\Audit\\Models\\AuditLog.php' => '2bde148de266c6aa14e31b3f426cf891377f265d46d1386764f3e1be8463f674',
    'C:\\newme\\app\\Modules\\Audit\\Policies\\AuditLogPolicy.php' => '57efe91dde7eff88ac3cb8b9751e43919a000a918306fa65f6ac2ad90478f3af',
    'C:\\newme\\app\\Modules\\Audit\\Services\\AuditService.php' => '0e50e4287709249b850ddefcedc2c3f44cc435ec4517a12dd594a8981cb6a710',
    'C:\\newme\\app\\Modules\\Checkout\\DTOs\\CheckoutSummary.php' => 'd2633ef981196cdd5b2cd2569501f93dcedee37d8f74b62125c0177e4dd6ad92',
    'C:\\newme\\app\\Modules\\Checkout\\DTOs\\SubscriptionDraft.php' => '44639cedb768b7ba26bcc255567e092542cdd8e5f873dbb06ce144acea84e8e0',
    'C:\\newme\\app\\Modules\\Checkout\\Enums\\CheckoutSource.php' => 'ddff3c8c1fbe80d85c623ffc9878061ba01012277e2795fbb392a7a6d43537b9',
    'C:\\newme\\app\\Modules\\Checkout\\Exceptions\\NothingToCheckoutException.php' => '61376473e03098384dd7972a8ca30c8272ed8c8fff1988d8427277776a96ac37',
    'C:\\newme\\app\\Modules\\Checkout\\Services\\CheckoutDraftService.php' => '23207e1c793c18995330666f3477a050d51246158cc1ef27cbd796754cb62efd',
    'C:\\newme\\app\\Modules\\Checkout\\Services\\CheckoutService.php' => 'a3a345350c9dffe7646217220c49a04d8a57c8b74562bd0389ccdbd531704944',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\AuthResult.php' => '2facfd9177a58acad39a716f6497b3a1f3d06c9ba3a1324d0f03d0a0b801b6d6',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\InvitationData.php' => 'eb78758ffedcb8d0c2f5ba94edee3d62c97c9ac01b199179002136792a19f2f6',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\LoginData.php' => '359289901c644bfe3f81f1b7f1cf061574b327b71f5ec0aa6ae473eeac626eb9',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\RegisterCustomerData.php' => 'ca9aca429f25f4f6de880e36c9e7ebff6580dee71b60d9233359e98fa896a16b',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\RoleData.php' => '324e9e313d237fc3890e8b82f20f6b964a0744c6d689e79e61168d4b631cc879',
    'C:\\newme\\app\\Modules\\Identity\\DTOs\\UserData.php' => '17b504efa45a15077220a1f8cebbfb6f2448f98c8b88f3dfefebd9767ab0e96e',
    'C:\\newme\\app\\Modules\\Identity\\Enums\\PermissionName.php' => 'ea4af47b12312f5db68df09c2c78efacb8de6f0f050a797c2c31ce9bdb252f37',
    'C:\\newme\\app\\Modules\\Identity\\Enums\\RoleName.php' => 'ba7a0727505c2413698b689157df955793d1ef2deb5e95373f4c9f0e0c93cc2d',
    'C:\\newme\\app\\Modules\\Identity\\Enums\\UserStatus.php' => '5a537ed435ee406da99b6ca1a9bdfaafb5acfdf2cb779b87a463f3ac1191f8ab',
    'C:\\newme\\app\\Modules\\Identity\\Enums\\UserType.php' => '6f9076a4d00d747b5ffe714d9b6ad7de470137b243e8342a24e9cec827e69825',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\CannotDeactivateSelfException.php' => '2e3d8ce9e6e83b35015fbeeba1ab4ed8e21b73f5b489391085f2315c632b9f48',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InactiveUserException.php' => '8a497b58798dee097f2b292df5ed0aee33587b4389aa63458530bc3627c0f0d0',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvalidCredentialsException.php' => '82129614d6ce8eb2124120792aa1a015b699ba109f50dda6ec260e25e15db1a3',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationAlreadyAcceptedException.php' => 'c278f81155083d05cc7d27f4ccfac52ba474af236f76eba2420bc71d0b4496a2',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\InvitationInvalidException.php' => '98d2a12ce3fa42c65c884c2e43479766ed99e5ee7c5e1c5af9d5b6805e14d8e0',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\LastSuperAdminException.php' => '537f2bbb9210135ac22f3f4e121666d40234ac6cda0ebc0d81935f3a8242c329',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\PasswordResetInvalidException.php' => 'bf9bb33ed87061fa6e3342d57b91aecb18693f7e97612d4876b92d1ab4aff5be',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\RoleInUseException.php' => 'f4743600a5018b89052aef92f83dac8ca56c208b21d573aac14394e17d779183',
    'C:\\newme\\app\\Modules\\Identity\\Exceptions\\SystemRoleException.php' => 'f0ffdd0a9ee2eee36b89b4365c96c81b983a9cf9e59fcbd095464bf18fa55057',
    'C:\\newme\\app\\Modules\\Identity\\Models\\Role.php' => 'b8872020935c7b7a25b92cdf699cd49c3c38e4f3eada100ae38e8d8fb153703b',
    'C:\\newme\\app\\Modules\\Identity\\Models\\UserInvitation.php' => '02e7ac5f0fe2ae2f4a27f1ffc8f95b0bdaf628df6a0b54ec72b511e3eeac2edd',
    'C:\\newme\\app\\Modules\\Identity\\Notifications\\PasswordResetNotification.php' => 'ec7d3c0a2d79a904a67b64fe26fc72d3fbec783ca13cfaff54ad76b9c8ddfacd',
    'C:\\newme\\app\\Modules\\Identity\\Notifications\\UserInvitationNotification.php' => '314a20d48d9f7d90a7a94ae0507cfc7d84a39af73765d954fa3accd4ff910789',
    'C:\\newme\\app\\Modules\\Identity\\Policies\\RolePolicy.php' => 'e6db95ee3ee217987ad20784f4be133c6e73ad0104117ebf8b895b48ebf001f4',
    'C:\\newme\\app\\Modules\\Identity\\Policies\\UserPolicy.php' => 'f51be3b83a6d91a5017fda5360c980e8dc887797feeeef2ce9d6d75115331aa4',
    'C:\\newme\\app\\Modules\\Identity\\Seeders\\RolesAndPermissionsSeeder.php' => 'ee97562fe98de302efe894ef00b19ff4d1165286a53bdfb4f13893098e2ee264',
    'C:\\newme\\app\\Modules\\Identity\\Seeders\\SuperAdminSeeder.php' => 'e149d06f974191a17bbd1327a69f3016314d892c6ef0c2642c05b7863253094f',
    'C:\\newme\\app\\Modules\\Identity\\Services\\AuthService.php' => '6bf735edad3fb252a2f8cb6e9ec820344df624b8de6953321251deaac16217c6',
    'C:\\newme\\app\\Modules\\Identity\\Services\\CustomerAuthService.php' => '650d758681fa7047012b8a13e2fb06a4e35406f7a3dd2551f64a82dac9b4a772',
    'C:\\newme\\app\\Modules\\Identity\\Services\\InvitationService.php' => 'cbabbde5bf8e8a071912b8db50759bf6caaee6d7f49c7d0eaa6ee8ff047c80c3',
    'C:\\newme\\app\\Modules\\Identity\\Services\\PasswordResetService.php' => '3c696e1e336ee7d8acd8245d8f28ef53482cd58dfae9f3fc05048f16b0b57f8b',
    'C:\\newme\\app\\Modules\\Identity\\Services\\RoleService.php' => '8e3b5b776a732e3e4e85e09a451455d6fd79b2be82de386c40194a5595f71af3',
    'C:\\newme\\app\\Modules\\Identity\\Services\\UserService.php' => 'b122ef5617f6e4092ecd6defa9ff9af7cbab1044dc792ee87dc64417e44f01a3',
    'C:\\newme\\app\\Modules\\Invoices\\DTOs\\InvoiceDraft.php' => 'c817bc4973bdcd9681d165febbc7a0d1c02259d3750f9bfd52a96dddcd91a8bc',
    'C:\\newme\\app\\Modules\\Invoices\\DTOs\\InvoiceLine.php' => 'ca177275b716f004f7ba1cc583107c48575be5fdab676b305e896b3f2add58e3',
    'C:\\newme\\app\\Modules\\Invoices\\DTOs\\InvoiceParty.php' => '75a38f80a9e29caf17fa91caca5c530e3d28498a0de237536c2b3a0468924748',
    'C:\\newme\\app\\Modules\\Invoices\\Models\\Invoice.php' => '20aa152b5ba33f22c30fbe33241c9e1ed45e7e44e21b30dcd19a1b9b64182e0f',
    'C:\\newme\\app\\Modules\\Invoices\\Notifications\\InvoiceIssuedNotification.php' => 'd7b1d331fcdd040395d027ac32d34da9300d7c6cf5345106ddcf9c914da7e6b2',
    'C:\\newme\\app\\Modules\\Invoices\\Policies\\InvoicePolicy.php' => '784b0ce4dfe6e0bd1a2f0f97e2ff0f2d8009e2184ed8975ecd6c39489069a8dc',
    'C:\\newme\\app\\Modules\\Invoices\\Services\\InvoiceNumberGenerator.php' => '65f59ec2d68c7d53d033157d58d21db87f2648e634f8e2771538d53aa817c705',
    'C:\\newme\\app\\Modules\\Invoices\\Services\\InvoicePdfRenderer.php' => '54078ac803f02f4f631a2a9bd20ad1d670856615cea094f64fd6cec903a9cd2a',
    'C:\\newme\\app\\Modules\\Invoices\\Services\\InvoiceService.php' => '3dd9b72e74d2f89c7a2979bf22180a10f352396c212a668c4a4ede1a23969ceb',
    'C:\\newme\\app\\Modules\\Invoices\\Support\\ZatcaQr.php' => '7077442032b3b3b5c23d937d4485e6493aa1c1673a183ce571ae4891bcb3adb4',
    'C:\\newme\\app\\Modules\\Notifications\\Enums\\NotificationEvent.php' => '2a863ab2dc2d93f138101df55aaf8f93acf3e0e2e0ee5a269cf2fa814e098e4a',
    'C:\\newme\\app\\Modules\\Notifications\\Notifications\\NewOrderNotification.php' => '057be794275aea2b6423a7c69fef852244cd86c6959b710ca2ade380c50a0c9f',
    'C:\\newme\\app\\Modules\\Notifications\\Notifications\\NewSubscriptionNotification.php' => '1bb703f37548f698e3f739bdefcfc61903f52abd296c3b85908ee3f3e90da9be',
    'C:\\newme\\app\\Modules\\Notifications\\Services\\AdminNotifier.php' => 'ed9d2e9be8c6d42d62ff8cada563b3bdc3939adab9abe90a0f2dd769b4ed80d3',
    'C:\\newme\\app\\Modules\\Notifications\\Support\\NotificationPresenter.php' => '297d3cf875d236d6f6876dcb6e18f9cfce881927c840d3d1bd5eeae19a006dff',
    'C:\\newme\\app\\Modules\\Orders\\Enums\\OrderStatus.php' => '1d066af1837b95cfc673bfe86020e09a160e036bfcbf4d81d66f7d56252ca6c4',
    'C:\\newme\\app\\Modules\\Orders\\Exceptions\\EmptyCartException.php' => '07f0a37a26cf4000f977fce9b1b22041bf2c92fe9606c967b1008bb69f69e0a6',
    'C:\\newme\\app\\Modules\\Orders\\Models\\Order.php' => '2e7e28a2c4207f2bc1f048b15894c469125e58f453813c84bdc6f34096bb47bc',
    'C:\\newme\\app\\Modules\\Orders\\Models\\OrderItem.php' => '3869b5e870ce16e9d7d0f43de5218edcb2b1e22af624d61f8fcceb091e34586b',
    'C:\\newme\\app\\Modules\\Orders\\Policies\\OrderPolicy.php' => '4beb65eabbdcb8c0a38848778ef9ab02ca477de4edbe3d4ff34532b4155b620e',
    'C:\\newme\\app\\Modules\\Orders\\Services\\OrderService.php' => '4bf0078b62641622bc584a2d54dcca1a96ea67510406f6f76851cb04c5e2ed90',
    'C:\\newme\\app\\Modules\\Payments\\Contracts\\PaymentGateway.php' => 'ebba4ada926d9e2cb6400e6901a5070ee45f77404c38fe2227a351f2ed2ceb35',
    'C:\\newme\\app\\Modules\\Payments\\DTOs\\CardDetails.php' => '5a9b0325ea4076031bde30c2755b965f8fa231039fc5bfa651f4f59debeb6642',
    'C:\\newme\\app\\Modules\\Payments\\DTOs\\ChargeRequest.php' => 'c7ce6473434d9c369612fb1cd4fbc28cc43af28b109facb3e81e0eb0a8b7b46b',
    'C:\\newme\\app\\Modules\\Payments\\DTOs\\ChargeResult.php' => '239f2d52ac5aae0d98cadd616326e778511ef3d2301af4686f1864ef2c6ec3c1',
    'C:\\newme\\app\\Modules\\Payments\\Enums\\PaymentDecline.php' => '09ba04919c2fc3ead1f9993649fe5b445ef2a487f8bf6f649a052981c34dc9ee',
    'C:\\newme\\app\\Modules\\Payments\\Enums\\PaymentMethod.php' => 'b714456267fad9eb5fa73346062147728e130c5b9838a94c05f2be35624770c8',
    'C:\\newme\\app\\Modules\\Payments\\Enums\\PaymentStatus.php' => 'e63b6773567bd5dc965bfe146786180f7a87e200c2cfb73f4de9db4daf2722f9',
    'C:\\newme\\app\\Modules\\Payments\\Exceptions\\PaymentDeclinedException.php' => 'd89083a4f65f9c762f534b182295b53ea7a397ae0a6b6269b7f642934e7e5d5f',
    'C:\\newme\\app\\Modules\\Payments\\Gateways\\SimulatedGateway.php' => '9eabeedacdeddb0601f3ff394dede2071fa66bc9a08dfa9cd859676ba23606b8',
    'C:\\newme\\app\\Modules\\Payments\\Models\\Payment.php' => '3b2ea0293884d02fb28aecba99d7ad4ef44bb37f9e5a0654ce7c1a15486a448f',
    'C:\\newme\\app\\Modules\\Payments\\Services\\PaymentService.php' => '0e1424d9e141c8ba4828c4cc7d1a6b731201ae8f606d968ef1e4ccaa97758c6c',
    'C:\\newme\\app\\Modules\\Plans\\DTOs\\MealData.php' => '77192629c87496a5d949cfe3d4ac13baa99800d244ff72e875cf5314f848736f',
    'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanData.php' => '683750d51399b0497dc3af2252c36165dfa739136b94228f4049cb6ecbc852a0',
    'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuote.php' => '8ee27a736d956523a13532f272f00664f5df1857af88ba7a86d1ffd615d87433',
    'C:\\newme\\app\\Modules\\Plans\\DTOs\\PlanQuoteRequestData.php' => '36bf58dae2fcbd948f05510294fd92998ca3badec4b956fb33784774f81fb7b3',
    'C:\\newme\\app\\Modules\\Plans\\DTOs\\PricingRuleData.php' => 'c66caa774852412cd502a5d6b2519c8e089575f915743485520a2bc2bcf6fc28',
    'C:\\newme\\app\\Modules\\Plans\\Enums\\DurationUnit.php' => '9fb02048ad6373a531ce70df9aeac4c7603999d39d69e2f42fee2aa383fb8c5d',
    'C:\\newme\\app\\Modules\\Plans\\Enums\\MealType.php' => '473fac6449a650e844400b1c3ba287c9bb8508f6bb3fa9d73e94b770b65ff1e3',
    'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanGoal.php' => 'e64ed0efcd98762263ccda674222cbe06ebe76d1cc27e54327e5169fa445fe35',
    'C:\\newme\\app\\Modules\\Plans\\Enums\\PlanVersionStatus.php' => 'dcede3b5bc0097436c5ca0f270716f9079a497e6212627651b5a2f361c1d424d',
    'C:\\newme\\app\\Modules\\Plans\\Exceptions\\InvalidDeliveryDaysException.php' => '2ebf99264911af9cb63aa80da7f6540a1da0da3416c077d420fa64e6cac75eb0',
    'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PlanNotAvailableException.php' => '68518c66a6eace9e6f4797a52cd22598131d0765ca228cf1bd9c9703b89d70e8',
    'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PricingRuleNotFoundException.php' => 'ce15d5cc8ff1ac04a078563b9b30956aaa7bcc0162202a4c3b580565f7221519',
    'C:\\newme\\app\\Modules\\Plans\\Exceptions\\PublishedVersionImmutableException.php' => 'b09f4b4d83cff02a59d303aa02572ca823f50245ddea8caac2adbd60ecfe9721',
    'C:\\newme\\app\\Modules\\Plans\\Models\\Meal.php' => 'e7efd678fd47353578f42a2ff21015838aafe65a94055c10c74ddcd8a56fa9e3',
    'C:\\newme\\app\\Modules\\Plans\\Models\\Plan.php' => '1cfa4ae0d8f64dc3f563985c3fc4496ef27617e8359e429618987577d45e8f1e',
    'C:\\newme\\app\\Modules\\Plans\\Models\\PlanPricingRule.php' => '7bd2c1b80c8e38515cdf2030b9109f8cd1a94840f6fc62959e308b33cbf9da15',
    'C:\\newme\\app\\Modules\\Plans\\Models\\PlanVersion.php' => 'e0ee8b61439a275252dc93d175ff7e32a8f39ab92feec98a90174760a8ccb1c4',
    'C:\\newme\\app\\Modules\\Plans\\Policies\\MealPolicy.php' => 'dbd32928adaab680a6705a8c21cc86612fe4cc6ce0d580564095c9cbe6d5fd24',
    'C:\\newme\\app\\Modules\\Plans\\Policies\\PlanPolicy.php' => '677d7a2150ef1de8b1206bad01852c41d4697a4d1b4cf55dc81c3afd6cd24f80',
    'C:\\newme\\app\\Modules\\Plans\\Seeders\\MealSeeder.php' => '527ea4c16dfbba1685a442cac9d6d7adebb03decdffa3b48f1f21390701426fa',
    'C:\\newme\\app\\Modules\\Plans\\Seeders\\PlanSeeder.php' => '810d2f3f0a400059dc62e1a41c18f5f0d51243a22bf96cda571a331943cba0fe',
    'C:\\newme\\app\\Modules\\Plans\\Services\\MealService.php' => '9d7e42b7fa9d65400b772ce4d38118ed24db912c297a7d038c7097724760f776',
    'C:\\newme\\app\\Modules\\Plans\\Services\\PlanPricingService.php' => 'f6f75a47373286fb62e0d3b35e8941f6aed72ddce8a633a580c80ffca6799b34',
    'C:\\newme\\app\\Modules\\Plans\\Services\\PlanService.php' => 'cb81d1a4896fb0d8d1d2a90f06f411b6a6802435be5286511f6b2fe916791abb',
    'C:\\newme\\app\\Modules\\Promotions\\DTOs\\AppliedCoupon.php' => '86df1fdc06d90497c66d74626a69aed82d36cae897f78f62e77b844fca776830',
    'C:\\newme\\app\\Modules\\Promotions\\DTOs\\CouponData.php' => 'd905832267284fa1985eb8e9501e4624c10bbcb68ec2d74b5308fb639b13b4ab',
    'C:\\newme\\app\\Modules\\Promotions\\Enums\\CouponRejection.php' => 'a304b6779804b8205019225421bb79c8ceb2eeea6176209c2ffb77fdd731f062',
    'C:\\newme\\app\\Modules\\Promotions\\Enums\\CouponScope.php' => '21207433a22b1d0f9b15c4493b6fe70ae4dd8970a391c7d6f5c0526436d3d70b',
    'C:\\newme\\app\\Modules\\Promotions\\Enums\\CouponType.php' => '18ca2390d41871b5fd519afb49b1a636818cbe117dbbf177c8f6e7eb51c3599e',
    'C:\\newme\\app\\Modules\\Promotions\\Exceptions\\CouponRejectedException.php' => '5ec38fa987981c8680c365106045f0953cc13e5a6db7ae73b88f649ef3545594',
    'C:\\newme\\app\\Modules\\Promotions\\Models\\Coupon.php' => '3e6590f40b6c59c5ab9900cac7fa9122b08be50a2a5a885edd4929ffdd24704d',
    'C:\\newme\\app\\Modules\\Promotions\\Models\\CouponRedemption.php' => '5cbc26be5a791a54599458b2a441d7150ed1311c2ab935fe1f3ec5574dc159fa',
    'C:\\newme\\app\\Modules\\Promotions\\Policies\\CouponPolicy.php' => 'b3537a699f49f048c4778e6f02216274145392e43d581b1c8caa2bae2116dbc3',
    'C:\\newme\\app\\Modules\\Promotions\\Services\\CouponRedemptionService.php' => 'cb684f1e273068b5843908a7a638c2b4b2600f0355c9f717640f80cda32be4f1',
    'C:\\newme\\app\\Modules\\Promotions\\Services\\CouponService.php' => '79e8c33ffc78f087787be35709ab9fc16d86eeca0656ad884fbb81b03ee910f7',
    'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingGroup.php' => 'f09128c0a614e59af169ace91fc9951d9bc52c5730bde80c11ebd243ff185526',
    'C:\\newme\\app\\Modules\\Settings\\Enums\\SettingType.php' => '727c1f6b2a1892d176fecedca672d47f4deebf8245616c9a8cde4936c22ae09f',
    'C:\\newme\\app\\Modules\\Settings\\Models\\Setting.php' => '8fcd73de1519265199d3bb6e1d140f99864c4a1a1147c5833b80c547951c8a76',
    'C:\\newme\\app\\Modules\\Settings\\Policies\\SettingsPolicy.php' => '6c768cd82bbe94824d6365823cf7428881f371a9ca3eeb1aa61a81917e646b7c',
    'C:\\newme\\app\\Modules\\Settings\\Services\\SettingsService.php' => '96c01c9dc59b71591f67bed9ef3414e73ed7724886b68da3c5b8ce7a7fde7a4d',
    'C:\\newme\\app\\Modules\\Settings\\Support\\SettingDefinition.php' => 'c1f62b6dd9f5f59ea983d8d209a3d9de5cceca01e22afc53adbed58a90a827a7',
    'C:\\newme\\app\\Modules\\Settings\\Support\\SettingsRegistry.php' => '62007a2ad8c9db3832cf7325da3858990de8fd54aec14d9d1cd560c90e43a39f',
    'C:\\newme\\app\\Modules\\Store\\DTOs\\CategoryData.php' => '8b058076b5eb7425bd1cf55b37a11c2d3e43db9764803a0a12859fec256121cb',
    'C:\\newme\\app\\Modules\\Store\\DTOs\\ProductData.php' => 'b17374005229f36c15673afafdf069e41da019cf60cfbcb923d113d6cb4b22a7',
    'C:\\newme\\app\\Modules\\Store\\Enums\\NutritionNote.php' => 'a104a592ce91cd10767a558d17102ede30309531db792ea36c3445d04732b0c7',
    'C:\\newme\\app\\Modules\\Store\\Enums\\ProductFlag.php' => '13105a85f23ffb9413bf947e083ff3e4622ca58661a6fdaec896c343395cb71b',
    'C:\\newme\\app\\Modules\\Store\\Enums\\ServingSize.php' => '8d06a0bba3324d1a7f4e387500af6d1dcd7603e916f7ae8362720271c823e737',
    'C:\\newme\\app\\Modules\\Store\\Models\\Category.php' => '93c16d1a14f02a7e0d79e26fb2b24061c49bef43e2a4b1bb93d887e5a790ba9a',
    'C:\\newme\\app\\Modules\\Store\\Models\\Product.php' => 'e2e4c0cfa956712e80dbbaf948d40c3b542e5e0aafc0cb67f8fe53c96dacb065',
    'C:\\newme\\app\\Modules\\Store\\Policies\\CategoryPolicy.php' => '61909b5846e759bcf7b9149f39c177aa7deaf891074497746dfb66aa31713b9d',
    'C:\\newme\\app\\Modules\\Store\\Policies\\ProductPolicy.php' => '156a99f492560f6456223a607c77c4c50cdfb7dfbe8efb169966c33f11539ac2',
    'C:\\newme\\app\\Modules\\Store\\Seeders\\StoreCatalogSeeder.php' => 'f6941c69f786a4c7fd90cf421e0aa78f1d55c6a8aec6e560b7dce28829a40489',
    'C:\\newme\\app\\Modules\\Store\\Services\\CartService.php' => '310e95fcad8196b3416f343bd2c2ec35cd6f4bf76a44534c9c192fc26cf2f01d',
    'C:\\newme\\app\\Modules\\Store\\Services\\CategoryService.php' => '6d049c77b5ae7b0dc3a89fb4c57b4c672164fbd8ab99f2ddb76bc6f8cff2c643',
    'C:\\newme\\app\\Modules\\Store\\Services\\ProductService.php' => '2919565317fbf5b18c7aea91304f6e2d111b9522a9b034c842abc31d599fff78',
    'C:\\newme\\app\\Modules\\Subscriptions\\Enums\\HandlingStatus.php' => 'f875c11155f3dc86b89b798def4449167c59de77f47861cb7b5dbc93956d377c',
    'C:\\newme\\app\\Modules\\Subscriptions\\Enums\\SubscriptionStatus.php' => 'eee5e230a5bec65a685e70927900362ba18b5e405c60bc8913349006c1104b49',
    'C:\\newme\\app\\Modules\\Subscriptions\\Models\\Subscription.php' => 'ad9d793109889757793832c6496129026edfec52de37f986f260836bd0a841ec',
    'C:\\newme\\app\\Modules\\Subscriptions\\Policies\\SubscriptionPolicy.php' => 'dc5ad9ba04ee04d9affd58e5fa219dc8ac6e013c2ac4e27383209b72b9da598b',
    'C:\\newme\\app\\Modules\\Subscriptions\\Services\\SubscriptionService.php' => '8be2e046dae0d9610c7a6848ba55b54b3f0b8c668afd091ae93f25924f361461',
    'C:\\newme\\app\\Providers\\AppServiceProvider.php' => 'c7dc3d123760745908f1408651e6e808012c4868dfabef9ddad1fa4d76bb028f',
    'C:\\newme\\app\\Support\\Dto\\Data.php' => '7a04f15eba8e252d1ee1ca489d12daea91dcc7a11691db1b8504386830d3c99b',
    'C:\\newme\\app\\Support\\Enums\\ApiErrorCode.php' => '715191174f42287e93076152913590de3233bdc9477589c1e74a99ac8ec1a2cf',
    'C:\\newme\\app\\Support\\Exceptions\\DomainException.php' => '9108a2748bca61a2041d351a555b3210592435ed696f219d572a921219138a4e',
    'C:\\newme\\app\\Support\\Http\\Responses\\ApiResponse.php' => '96e94563c6c61e73d146c55cb6fccc0b8627d240fe9bc51880e2f138a3879777',
    'C:\\newme\\app\\Support\\Http\\Responses\\MoneyPresenter.php' => 'd9488780a22c8bd82edcf70a2cb895e8cb013d9b896b6057a75921487e3f6e69',
    'C:\\newme\\app\\Support\\Money\\Currency.php' => 'd8e7457c940fbf567a88660fd786d8c12432d83f964cbcd910c739768f6d815a',
    'C:\\newme\\app\\Support\\Money\\Money.php' => '87ad29df91b355cb67f6454eb49d6bbcf907a153fc6a481651c66f1f7cd48d15',
    'C:\\newme\\app\\Support\\Money\\Rounding.php' => '8276a58f1bbf8ecb0381d317c9158e53042135f519c210d14a8264bdbc91c0d9',
    'C:\\newme\\app\\Support\\Time\\DisplayTime.php' => 'b872979e8aad07fb27bed5db85d30ae57f68ba9c8860dc014d2feb195db7d057',
    'C:\\newme\\app\\Support\\Ui\\AuditActionPresenter.php' => '6aa8ce2d6ab2ed0244ed9cd4d901a672330023ca944ca31520794f432e67acb8',
    'C:\\newme\\routes\\api.php' => '669e6bf1a7be5d0a6dd76ecf1f2c557ba5bc0304b64181ba0c92ac2e113d56cc',
    'C:\\newme\\routes\\console.php' => 'e4b5f7e4cc006cddfd7b23756862e6909376851c2779c512689562e7509a6f8a',
    'C:\\newme\\routes\\web.php' => '823dbd5e5ea305cfbfd62d1709b443232973309dfabcc0d9e22f8a8bf7f23b51',
  ),
  'composerLocks' => 
  array (
    'C:/newme/composer.lock' => 'eaae11352e2757b59d3529f88e3fe69844497a81f9f3bfb88c5fe4ae98c259b5',
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
        'mpdf/mpdf' => 
        array (
          'pretty_version' => 'v8.3.1',
          'version' => '8.3.1.0',
          'reference' => '2a454ec334109911fdb323a284c19dbf3f049810',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../mpdf/mpdf',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mpdf/psr-http-message-shim' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => 'f25a0153d645e234f9db42e5433b16d9b113920f',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../mpdf/psr-http-message-shim',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mpdf/psr-log-aware-trait' => 
        array (
          'pretty_version' => 'v3.0.0',
          'version' => '3.0.0.0',
          'reference' => 'a633da6065e946cc491e1c962850344bb0bf3e78',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../mpdf/psr-log-aware-trait',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mpdf/qrcode' => 
        array (
          'pretty_version' => 'v1.2.2',
          'version' => '1.2.2.0',
          'reference' => 'd4fa19117a7241c30ac84902b6236a02c7a3f268',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../mpdf/qrcode',
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
          'dev_requirement' => false,
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
        'paragonie/random_compat' => 
        array (
          'pretty_version' => 'v9.99.100',
          'version' => '9.99.100.0',
          'reference' => '996434e5492cb4c3edcb9168db6fbb1359ef965a',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../paragonie/random_compat',
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
        'setasign/fpdi' => 
        array (
          'pretty_version' => 'v2.6.8',
          'version' => '2.6.8.0',
          'reference' => '881945be29a4996ad3d008eb18ddc01fa3df890c',
          'type' => 'library',
          'install_path' => 'C:\\newme\\vendor\\composer/../setasign/fpdi',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
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
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.dashboard',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Controllers\\Web\\Admin\\DashboardController',
        1 => 
        array (
        ),
      ),
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
          1 => 'm' . "\0" . 'app\\modules\\dashboard\\services\\dashboardservice' . "\0" . 'snapshot',
        ),
      ),
    ),
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\DTOs\\DashboardSnapshot.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Modules\\Dashboard\\DTOs\\DashboardSnapshot',
        1 => 
        array (
        ),
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    'fileHash' => 'eee8d1a555612a1b0a31f75c672b8be7847f3fdc66aba015bd01e1391541918b',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\DTOs\\DashboardSnapshot.php' => 
  array (
    'fileHash' => '975cd84a720c22f7b4af96e027ea1b65bcddc5656d195bff6f6fdbfb935e202f',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php',
      1 => 'C:\\newme\\app\\Modules\\Dashboard\\Services\\DashboardService.php',
    ),
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\Services\\DashboardService.php' => 
  array (
    'fileHash' => '20a222f1e1d40547eb97ddcbd351aba34aaf7c269ccaf4d62576438f29bab59c',
    'dependentFiles' => 
    array (
      0 => 'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php',
    ),
  ),
),
	'packageDependencies' => array (
  'C:\\newme\\app\\Http\\Controllers\\Web\\Admin\\DashboardController.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\DTOs\\DashboardSnapshot.php' => 
  array (
    0 => 'laravel/framework',
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\Services\\DashboardService.php' => 
  array (
    0 => 'laravel/framework',
    1 => 'nesbot/carbon',
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
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
               'name' => 'dashboard',
               'type' => 'App\\Modules\\Dashboard\\Services\\DashboardService',
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
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\DTOs\\DashboardSnapshot.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Dashboard\\DTOs\\DashboardSnapshot',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Numbers and lists the admin dashboard needs in one trip.
 *
 * Sales figures are taken from issued invoices so only confirmed money is
 * counted — a cash-on-delivery order waiting for collection stays out.
 */',
         'namespace' => 'App\\Modules\\Dashboard\\DTOs',
         'uses' => 
        array (
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'collection' => 'Illuminate\\Support\\Collection',
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
     * @param  array<string, int>  $ordersByStatus
     * @param  array<string, int>  $subscriptionsByStatus
     * @param  Collection<int, Order>  $recentOrders
     * @param  Collection<int, Subscription>  $recentSubscriptions
     */',
             'namespace' => 'App\\Modules\\Dashboard\\DTOs',
             'uses' => 
            array (
              'order' => 'App\\Modules\\Orders\\Models\\Order',
              'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
              'collection' => 'Illuminate\\Support\\Collection',
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
               'name' => 'salesTodayMinor',
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
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'salesMonthMinor',
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
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'ordersToday',
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
               'name' => 'ordersMonth',
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
               'name' => 'ordersPending',
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
            5 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subscriptionsActive',
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
            6 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subscriptionsNeedingAttention',
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
               'name' => 'invoicesMonth',
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
               'name' => 'ordersByStatus',
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
            9 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'subscriptionsByStatus',
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
            10 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'recentOrders',
               'type' => 'Illuminate\\Support\\Collection',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
               'phpDoc' => NULL,
               'flags' => 65,
            )),
            11 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'recentSubscriptions',
               'type' => 'Illuminate\\Support\\Collection',
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
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\newme\\app\\Modules\\Dashboard\\Services\\DashboardService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Modules\\Dashboard\\Services\\DashboardService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Assembles the figures shown on the admin home screen.
 *
 * Every query is scoped to the current calendar day / month in the app
 * timezone so the numbers match what staff expect when they say "today".
 */',
         'namespace' => 'App\\Modules\\Dashboard\\Services',
         'uses' => 
        array (
          'dashboardsnapshot' => 'App\\Modules\\Dashboard\\DTOs\\DashboardSnapshot',
          'invoice' => 'App\\Modules\\Invoices\\Models\\Invoice',
          'orderstatus' => 'App\\Modules\\Orders\\Enums\\OrderStatus',
          'order' => 'App\\Modules\\Orders\\Models\\Order',
          'handlingstatus' => 'App\\Modules\\Subscriptions\\Enums\\HandlingStatus',
          'subscriptionstatus' => 'App\\Modules\\Subscriptions\\Enums\\SubscriptionStatus',
          'subscription' => 'App\\Modules\\Subscriptions\\Models\\Subscription',
          'carbon' => 'Illuminate\\Support\\Carbon',
          'db' => 'Illuminate\\Support\\Facades\\DB',
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
           'name' => 'snapshot',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Modules\\Dashboard\\DTOs\\DashboardSnapshot',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'now',
               'type' => '?Illuminate\\Support\\Carbon',
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
); },
];
