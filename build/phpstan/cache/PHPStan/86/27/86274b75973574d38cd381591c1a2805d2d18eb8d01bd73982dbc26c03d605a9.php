<?php declare(strict_types = 1);

// ftm-D:\newme\newme\app\Modules\Payments\Gateways\PayTabs\PayTabsSdkClient.php
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v5-2.3.3',
   'data' => 
  array (
    0 => 
    array (
      '426433f772c675aba1082fea9ce3f5ab' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
         'uses' => 
        array (
          'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
          'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
          'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
          'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
          'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
          'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
          'log' => 'Illuminate\\Support\\Facades\\Log',
          'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
          'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
          'language' => 'Paytabs\\Sdk\\Enums\\Language',
          'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
          'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
          'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
          'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
          'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
          'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
          'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
          'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
          'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
          'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
          'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
          'throwable' => 'Throwable',
        ),
         'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
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
      '06fe92544932e7244273c872dac40ce8' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
         'uses' => 
        array (
          'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
          'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
          'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
          'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
          'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
          'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
          'log' => 'Illuminate\\Support\\Facades\\Log',
          'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
          'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
          'language' => 'Paytabs\\Sdk\\Enums\\Language',
          'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
          'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
          'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
          'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
          'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
          'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
          'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
          'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
          'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
          'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
          'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
          'throwable' => 'Throwable',
        ),
         'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
         'functionName' => 'createHostedPage',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
           'uses' => 
          array (
            'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
            'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
            'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
            'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
            'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
            'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
            'log' => 'Illuminate\\Support\\Facades\\Log',
            'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
            'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
            'language' => 'Paytabs\\Sdk\\Enums\\Language',
            'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
            'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
            'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
            'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
            'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
            'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
            'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
            'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
            'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
            'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
            'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
            'throwable' => 'Throwable',
          ),
           'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
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
      '515ce4669b793ea93ad8c2b3ad0d72e3' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
         'uses' => 
        array (
          'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
          'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
          'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
          'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
          'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
          'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
          'log' => 'Illuminate\\Support\\Facades\\Log',
          'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
          'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
          'language' => 'Paytabs\\Sdk\\Enums\\Language',
          'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
          'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
          'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
          'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
          'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
          'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
          'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
          'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
          'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
          'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
          'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
          'throwable' => 'Throwable',
        ),
         'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
         'functionName' => 'parseBrowserReturn',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
           'uses' => 
          array (
            'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
            'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
            'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
            'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
            'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
            'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
            'log' => 'Illuminate\\Support\\Facades\\Log',
            'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
            'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
            'language' => 'Paytabs\\Sdk\\Enums\\Language',
            'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
            'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
            'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
            'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
            'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
            'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
            'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
            'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
            'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
            'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
            'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
            'throwable' => 'Throwable',
          ),
           'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
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
      'b6c1fb22b37e0e74a840549f97337756' => 
      \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
         'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
         'uses' => 
        array (
          'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
          'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
          'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
          'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
          'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
          'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
          'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
          'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
          'log' => 'Illuminate\\Support\\Facades\\Log',
          'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
          'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
          'language' => 'Paytabs\\Sdk\\Enums\\Language',
          'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
          'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
          'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
          'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
          'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
          'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
          'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
          'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
          'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
          'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
          'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
          'throwable' => 'Throwable',
        ),
         'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
         'functionName' => 'paymentMethod',
         'templatePhpDocNodes' => 
        array (
        ),
         'parent' => 
        \PHPStan\Analyser\IntermediaryNameScope::__set_state(array(
           'namespace' => 'App\\Modules\\Payments\\Gateways\\PayTabs',
           'uses' => 
          array (
            'paytabsclient' => 'App\\Modules\\Payments\\Contracts\\PayTabsClient',
            'chargerequest' => 'App\\Modules\\Payments\\DTOs\\ChargeRequest',
            'chargeresult' => 'App\\Modules\\Payments\\DTOs\\ChargeResult',
            'payerdetails' => 'App\\Modules\\Payments\\DTOs\\PayerDetails',
            'paymentcallback' => 'App\\Modules\\Payments\\DTOs\\PaymentCallback',
            'paymentdecline' => 'App\\Modules\\Payments\\Enums\\PaymentDecline',
            'paymentmethod' => 'App\\Modules\\Payments\\Enums\\PaymentMethod',
            'invalidpaymentcallbackexception' => 'App\\Modules\\Payments\\Exceptions\\InvalidPaymentCallbackException',
            'log' => 'Illuminate\\Support\\Facades\\Log',
            'invalidpayloadexception' => 'Paytabs\\Laravel\\Exceptions\\InvalidPayloadException',
            'paytabs' => 'Paytabs\\Laravel\\Facades\\Paytabs',
            'language' => 'Paytabs\\Sdk\\Enums\\Language',
            'tranclass' => 'Paytabs\\Sdk\\Enums\\TranClass',
            'trantype' => 'Paytabs\\Sdk\\Enums\\TranType',
            'httprequestexception' => 'Paytabs\\Sdk\\Exceptions\\HttpRequestException',
            'invalidconfigurationexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidConfigurationException',
            'invalidsignatureexception' => 'Paytabs\\Sdk\\Exceptions\\InvalidSignatureException',
            'abstractmethod' => 'Paytabs\\Sdk\\PaymentMethod\\AbstractMethod',
            'paymentmethodsfactory' => 'Paytabs\\Sdk\\PaymentMethod\\PaymentMethodsFactory',
            'customerdetails' => 'Paytabs\\Sdk\\Request\\Payload\\Parts\\CustomerDetails',
            'payloadsfactory' => 'Paytabs\\Sdk\\Request\\Payload\\PayloadsFactory',
            'requestsfactory' => 'Paytabs\\Sdk\\Request\\RequestsFactory',
            'completed' => 'Paytabs\\Sdk\\Response\\Payload\\Payloads\\Payment\\Completed',
            'throwable' => 'Throwable',
          ),
           'className' => 'App\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient',
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
      'D:\\newme\\newme\\app\\Modules\\Payments\\Gateways\\PayTabs\\PayTabsSdkClient.php' => '472bd8f0152fedb9072687f95ee602409f651388aaaa3aac8a6656564e181b43',
    ),
  ),
));