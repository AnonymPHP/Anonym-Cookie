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
 * Interface CookieInterface
 * @package Anonym\Components\Cookie
 */
interface CookieInterface
{
    /**
     * Cookie olayını tutar
     *
     * @param string $name
     * @return mixed
     */
    public function get($name = '');

    /**
     * Öyle bir cookie varmı yokmu diye bakar
     *
     * @param string $name
     * @return bool
     */
    public function has($name = '');

    /**
     * Cookie Atamasını yapar
     * $name -> cookie adı
     * $value -> cookie değeri
     * $expires -> geçerlilik süresi
     * $path->cookie nin geçerli olacağı alan
     * $domain->cookie'in geçerli olduğu domain
     * $sucere->cookie'nin secure değeri
     * $httpOnly -> cookie'in httpony değeri
     *
     * @param string $name
     * @param string $value
     * @param int $expires
     * @param string $path
     * @param null $domain
     * @param bool $secure
     * @param bool $httpOnly
     * @return $this
     */
    public function set(
        $name = '',
        $value = '',
        $expires = 3600,
        $path = '/',
        $domain = null,
        $secure = false,
        $httpOnly = false
    );

    /**
     * Girilen name değerini siler
     *
     * @param $name
     * @return $this
     */
    public function delete($name);
}
