<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Cookie;

    /**
     * Class Base64Encoder
     * @package Anonym\Components\Cookie
     */
    class Base64Encoder implements CookieEncoderInterface
    {

        /**
         * Base64 ile şifreler metni
         *
         * @param string $value
         * @return string
         */
        public function encode($value = ''){
            return base64_encode($value);
        }

        /**
         * Şifrelenmiş metni çözer
         *
         * @param string $value
         * @return string
         */
        public function decode($value = ''){
            return base64_decode($value);
        }

    }
