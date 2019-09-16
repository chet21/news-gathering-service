<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5898b39126de691ffcf76a43f60c79e3
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'G' => 
        array (
            'Gumlet\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Gumlet\\' => 
        array (
            0 => __DIR__ . '/..' . '/gumlet/php-image-resize/lib',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'App\\Configuration\\BaseConfiguration' => __DIR__ . '/../..' . '/app/configuration/BaseConfiguration.php',
        'App\\Controllers\\AdminPageController' => __DIR__ . '/../..' . '/app/controllers/admin/pages/AdminPageController.php',
        'App\\Controllers\\BaseAdminController' => __DIR__ . '/../..' . '/app/controllers/BaseController/BaseAdminController.php',
        'App\\Controllers\\BaseController' => __DIR__ . '/../..' . '/app/controllers/BaseController/BaseController.php',
        'App\\Controllers\\BaseIndexController' => __DIR__ . '/../..' . '/app/controllers/BaseController/BaseIndexController.php',
        'App\\Controllers\\BaseSecureController' => __DIR__ . '/../..' . '/app/controllers/BaseController/BaseSecureController.php',
        'App\\Controllers\\BaseUserController' => __DIR__ . '/../..' . '/app/controllers/BaseController/BaseUserController.php',
        'App\\Controllers\\CategoryController' => __DIR__ . '/../..' . '/app/controllers/index/CategoryController.php',
        'App\\Controllers\\EnterController' => __DIR__ . '/../..' . '/app/controllers/secure/EnterController.php',
        'App\\Controllers\\IndexController' => __DIR__ . '/../..' . '/app/controllers/index/IndexController.php',
        'App\\Controllers\\NewsController' => __DIR__ . '/../..' . '/app/controllers/index/NewsController.php',
        'App\\Controllers\\OutController' => __DIR__ . '/../..' . '/app/controllers/secure/OutController.php',
        'App\\Controllers\\ProfileController' => __DIR__ . '/../..' . '/app/controllers/user/ProfileController.php',
        'App\\Controllers\\RegistrationController' => __DIR__ . '/../..' . '/app/controllers/secure/RegistrationController.php',
        'App\\Controllers\\SearchController' => __DIR__ . '/../..' . '/app/controllers/index/SearchController.php',
        'App\\Controllers\\TestController' => __DIR__ . '/../..' . '/app/controllers/index/TestController.php',
        'App\\Pattern\\Facade\\CreateBigNewsFacade' => __DIR__ . '/../..' . '/app/Facade/CreateBigNewsFacade.php',
        'BaseMigration' => __DIR__ . '/../..' . '/system/migration/BaseMigration.php',
        'Callback' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'CallbackBody' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'CallbackParam' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'CallbackParameterToReference' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'CallbackReturnReference' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'CallbackReturnValue' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'DOMDocumentWrapper' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/DOMDocumentWrapper.php',
        'DOMEvent' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/DOMEvent.php',
        'Helper\\Hash' => __DIR__ . '/../..' . '/helper/Hash.php',
        'Helper\\LnLocation' => __DIR__ . '/../..' . '/helper/LnLocation.php',
        'Helper\\PrivatBank' => __DIR__ . '/../..' . '/helper/Er/PrivatBank.php',
        'Helper\\TraceImg' => __DIR__ . '/../..' . '/helper/TraceImg.php',
        'Helper\\TranslateDay' => __DIR__ . '/../..' . '/helper/TranslateDay.php',
        'Helper\\TranslateMonth' => __DIR__ . '/../..' . '/helper/TranslateMonth.php',
        'Helper\\Translit' => __DIR__ . '/../..' . '/helper/Translit.php',
        'ICallbackNamed' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Callback.php',
        'Lib\\Location\\UserLocation' => __DIR__ . '/../..' . '/lib/location/UserLocation.php',
        'Lib\\Location\\UserTime' => __DIR__ . '/../..' . '/lib/location/UserTime.php',
        'Lib\\Location\\UserWeather' => __DIR__ . '/../..' . '/lib/location/UserWeather.php',
        'Lib\\Packeg\\BasePackeg' => __DIR__ . '/../..' . '/lib/packeg/BasePackeg.php',
        'Lib\\Parser\\BaseParser' => __DIR__ . '/../..' . '/lib/parser/BaseParser.php',
        'Lib\\Parser\\News\\BaseNewsParser' => __DIR__ . '/../..' . '/lib/parser/news/BaseNewsParser.php',
        'Lib\\Parser\\News\\InterfaceNewsParser' => __DIR__ . '/../..' . '/lib/parser/news/InterfaceNewsParser.php',
        'Lib\\Parser\\News\\NewsEtceteraMedia' => __DIR__ . '/../..' . '/lib/parser/news/NewsEtceteraMedia.php',
        'Lib\\Parser\\News\\NewsParser112' => __DIR__ . '/../..' . '/lib/parser/news/NewsParser112.php',
        'Lib\\Parser\\News\\NewsParser24Ua' => __DIR__ . '/../..' . '/lib/parser/news/NewsParser24Ua.php',
        'Lib\\Parser\\News\\NewsParserObozrevatel' => __DIR__ . '/../..' . '/lib/parser/news/NewsParserObozrevatel.php',
        'Lib\\Parser\\ProxyParser' => __DIR__ . '/../..' . '/lib/parser/proxy/ProxyParser.php',
        'Lib\\Parser\\ProxyParser2' => __DIR__ . '/../..' . '/lib/parser/proxy/ProxyParser2.php',
        'Lib\\User\\User' => __DIR__ . '/../..' . '/lib/user/User.php',
        'Migration' => __DIR__ . '/../..' . '/system/migration/Migration.php',
        'System\\ArRed' => __DIR__ . '/../..' . '/system/ArRed.php',
        'System\\CSRF' => __DIR__ . '/../..' . '/system/CSRF.php',
        'System\\Cache\\News\\CacheNews' => __DIR__ . '/../..' . '/system/cache/CacheNews.php',
        'System\\DB' => __DIR__ . '/../..' . '/system/DB.php',
        'System\\Error' => __DIR__ . '/../..' . '/system/Error.php',
        'System\\Lang' => __DIR__ . '/../..' . '/system/Lang.php',
        'System\\ORM' => __DIR__ . '/../..' . '/system/ORM.php',
        'System\\Router' => __DIR__ . '/../..' . '/system/Router.php',
        'System\\Statistics' => __DIR__ . '/../..' . '/system/Statistics.php',
        'System\\TwigView' => __DIR__ . '/../..' . '/system/TwigView.php',
        'System\\Verification' => __DIR__ . '/../..' . '/system/Verification.php',
        'ValidTag' => __DIR__ . '/../..' . '/lib/parser/valid/ValidTag.php',
        'Zend_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Exception.php',
        'Zend_Http_Client' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client.php',
        'Zend_Http_Client_Adapter_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Adapter/Exception.php',
        'Zend_Http_Client_Adapter_Interface' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Adapter/Interface.php',
        'Zend_Http_Client_Adapter_Proxy' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Adapter/Proxy.php',
        'Zend_Http_Client_Adapter_Socket' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Adapter/Socket.php',
        'Zend_Http_Client_Adapter_Test' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Adapter/Test.php',
        'Zend_Http_Client_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Client/Exception.php',
        'Zend_Http_Cookie' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Cookie.php',
        'Zend_Http_CookieJar' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/CookieJar.php',
        'Zend_Http_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Exception.php',
        'Zend_Http_Response' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Http/Response.php',
        'Zend_Json_Decoder' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Json/Decoder.php',
        'Zend_Json_Encoder' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Json/Encoder.php',
        'Zend_Json_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Json/Exception.php',
        'Zend_Loader' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Loader.php',
        'Zend_Registry' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Registry.php',
        'Zend_Uri' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Uri.php',
        'Zend_Uri_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Uri/Exception.php',
        'Zend_Uri_Http' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Uri/Http.php',
        'Zend_Validate_Abstract' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Abstract.php',
        'Zend_Validate_Alnum' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Alnum.php',
        'Zend_Validate_Alpha' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Alpha.php',
        'Zend_Validate_Barcode' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Barcode.php',
        'Zend_Validate_Barcode_Ean13' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Barcode/Ean13.php',
        'Zend_Validate_Barcode_UpcA' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Barcode/UpcA.php',
        'Zend_Validate_Between' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Between.php',
        'Zend_Validate_Ccnum' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Ccnum.php',
        'Zend_Validate_Date' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Date.php',
        'Zend_Validate_Digits' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Digits.php',
        'Zend_Validate_EmailAddress' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/EmailAddress.php',
        'Zend_Validate_Exception' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Exception.php',
        'Zend_Validate_File_Count' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/Count.php',
        'Zend_Validate_File_Exists' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/Exists.php',
        'Zend_Validate_File_Extension' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/Extension.php',
        'Zend_Validate_File_FilesSize' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/FilesSize.php',
        'Zend_Validate_File_ImageSize' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/ImageSize.php',
        'Zend_Validate_File_MimeType' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/MimeType.php',
        'Zend_Validate_File_NotExists' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/NotExists.php',
        'Zend_Validate_File_Size' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/Size.php',
        'Zend_Validate_File_Upload' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/File/Upload.php',
        'Zend_Validate_Float' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Float.php',
        'Zend_Validate_GreaterThan' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/GreaterThan.php',
        'Zend_Validate_Hex' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hex.php',
        'Zend_Validate_Hostname' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname.php',
        'Zend_Validate_Hostname_At' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/At.php',
        'Zend_Validate_Hostname_Ch' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Ch.php',
        'Zend_Validate_Hostname_De' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/De.php',
        'Zend_Validate_Hostname_Fi' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Fi.php',
        'Zend_Validate_Hostname_Hu' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Hu.php',
        'Zend_Validate_Hostname_Interface' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Interface.php',
        'Zend_Validate_Hostname_Li' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Li.php',
        'Zend_Validate_Hostname_No' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/No.php',
        'Zend_Validate_Hostname_Se' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Hostname/Se.php',
        'Zend_Validate_Identical' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Identical.php',
        'Zend_Validate_InArray' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/InArray.php',
        'Zend_Validate_Int' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Int.php',
        'Zend_Validate_Interface' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Interface.php',
        'Zend_Validate_Ip' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Ip.php',
        'Zend_Validate_LessThan' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/LessThan.php',
        'Zend_Validate_NotEmpty' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/NotEmpty.php',
        'Zend_Validate_Regex' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/Regex.php',
        'Zend_Validate_StringLength' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/Zend/Validate/StringLength.php',
        'lib\\UserException' => __DIR__ . '/../..' . '/lib/user/UserException.php',
        'phpQuery' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery.php',
        'phpQueryEvents' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/phpQueryEvents.php',
        'phpQueryObject' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/phpQueryObject.php',
        'phpQueryObjectPlugin_Scripts' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/Scripts.php',
        'phpQueryObjectPlugin_WebBrowser' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/WebBrowser.php',
        'phpQueryObjectPlugin_example' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/example.php',
        'phpQueryPlugin_Scripts' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/Scripts.php',
        'phpQueryPlugin_WebBrowser' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/WebBrowser.php',
        'phpQueryPlugin_example' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery/plugins/example.php',
        'phpQueryPlugins' => __DIR__ . '/../..' . '/lib/phpQuery/phpQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5898b39126de691ffcf76a43f60c79e3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5898b39126de691ffcf76a43f60c79e3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5898b39126de691ffcf76a43f60c79e3::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5898b39126de691ffcf76a43f60c79e3::$classMap;

        }, null, ClassLoader::class);
    }
}
