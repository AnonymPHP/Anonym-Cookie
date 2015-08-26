<?php

/**
 *  Bu Sınıf AnonymFramework'de cookie işlemlerinin yapılması için yapılmıştır
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 */
namespace Anonym\Components\Cookie\Http;

use Anonym\Components\Cookie\ReposityInterface;

/**
 * Class CookieBag
 * @package Anonym\Components\Cookie\Http
 */
class CookieBag implements ReposityInterface
{

    /**
     * Cookileri tutar
     *
     * @var array
     */
    private $cookies;

    /**
     * Cookie değerlerini atar
     */
    public function __construct()
    {

        $get = function_exists('getallheader') ? getallheaders(): [];
        if (isset($get['Cookie'])) {
            $this->cookies = $this->rendeCookieString($get['Cookie']);
        } else {
            $this->cookies = [];
        }
    }

    /**
     * Cookie verilerini parçalar
     *
     * @param string $cookie
     * @return array
     */
    private function rendeCookieString($cookie = '')
    {

        if ($cookie !== '') {

            $explode = explode(";", $cookie);
            $cookies = [];

            foreach ($explode as $ex) {

                $ex = explode('=', $ex, 2);
                $cookies[trim($ex[0])] = ($ex[1]);
            }

            return $cookies;
        }
    }

    /**
     * Cookileri döndürür
     *
     * @return array
     */
    public function getCookies()
    {
        return $this->cookies;
    }
}

