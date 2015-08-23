<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Cookie;

use Anonym\Components\Crypt\AnonymCrypt;
use Anonym\Components\Crypt\SecurityKeyGenerator;

/**
 * Class AnonymEncode
 * @package Anonym\Components\Cookie
 */
class AnonymEncode extends AnonymCrypt implements CookieEncoderInterface
{

    /**
     * Sınıfı başlatır ve anahtar olarak özel güvenlik anahtarını kullanır
     *
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->setSecurityKey(new SecurityKeyGenerator());
    }

    /**
     * Metni şifreler
     *
     * @param string $value
     * @return string
     */
    public function encode($value = '')
    {
        return parent::encode($value);
    }

    /**
     * Şifrelenmiş metni çözer
     *
     * @param string $value
     * @return string
     */
    public function decode($value = '')
    {
        return parent::decode($value);
    }

}
