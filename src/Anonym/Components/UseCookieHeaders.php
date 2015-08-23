<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Cookie;

use Anonym\Components\Cookie\HeadersAlreadySendedException;

/**
 * Class UseCookieHeaders
 * @package Anonym\Components\Cookie
 */
class UseCookieHeaders
{
    /**
     * @var array
     */
    private $cookies;

    /**
     * Cookie dosyalarının atanabilmesi için sınıfı hazırlar
     */
    public function __construct()
    {
        $this->setCookies(CookieContainer::getCookies());
    }

    /**
     * Cookie leri header olarak atar
     *
     * @throws HeadersAlreadySendedException
     * @return $this
     */
    public function useCookies()
    {

        if (!headers_sent()) {

            if (count($this->getCookies())) {
                foreach ($this->getCookies() as $cookie) {
                    header($cookie);
                }

            }
            return $this;
        } else {
            throw new HeadersAlreadySendedException(
                '
                 Başlıklarınız zaten gönderilmiş, cookie kullanılamaz.
                '
            );
        }
    }

    /**
     * @return mixed
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @param mixed $cookies
     * @return UseCookieHeaders
     */
    public function setCookies($cookies)
    {
        $this->cookies = $cookies;

        return $this;
    }
}
