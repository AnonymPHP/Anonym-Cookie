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
 * Interface ReposityInterface
 * @package Anonym\Components\Cookie
 */
interface ReposityInterface
{

    /**
     * Elde edilen cookieleri döndürür
     *
     * @return array
     */
    public function getCookies();
}
