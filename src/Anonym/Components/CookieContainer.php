<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Cookie;

    use Anonym\Components\Cookie\Http\CookieJar;

    /**
     * Class CookieContainer
     * @package Anonym\Components\Cookie
     */
    class CookieContainer
    {

        /**
         * Oluşturulan cookie değerlerini tutar
         *
         * @var array
         */
        private static $gCookies;


        /**
         * Cookie değeri atar
         *
         * @param CookieJar $jar
         */
        public static function addCookie(CookieJar $jar){
            $cookieStr = sprintf('Set-Cookie: %s', $jar);
            static::$gCookies[] = $cookieStr;
        }

        /**
         * Üretilen cookie değerlerini döndürür
         *
         * @return array
         */
        public static function getCookies(){
            return static::$gCookies;
        }
    }
