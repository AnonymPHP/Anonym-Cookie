<?php
    /**
     * Bu Sınıf AnonymFrameworkde cookie işlemleri yapmakta kullanılır
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     */

    namespace Anonym\Components\Cookie\Http;

    use DateTime;
    use InvalidArgumentException;

    /**
     * Class CookieBar
     *
     * @package Anonym\Http
     */
    class CookieJar
    {

        /**
         * Cookie değerini tutar
         *
         * @var string
         */
        private $value;

        /**
         * Cookie adını tutar
         *
         * @var string
         */
        private $name;

        /**
         * Cookie nin sona ereceği zamanı tutar
         *
         * @var mixed
         */
        private $expires;

        /**
         * Cookie 'nin geçerli olduğu zamanı tutar
         *
         * @var string
         */
        private $domain;

        /**
         * Cookie güvenliği
         *
         * @var bool
         */
        private $secure;

        /**
         * Cookie güvenliği olan httponly
         *
         * @var bool
         */
        private $httpOnly;

        /**
         * Cookie'nin geçerli olacağı yol
         *
         * @var string
         */
        private $path;

        /**
         * Bu fonksiyon Cookie parametreleri'ni sınıfa atar.
         *
         * @param string $name
         * @param string $value
         * @param int $expires
         * @param string $path
         * @param null $domain
         * @param bool $secure
         * @param bool $httpOnly
         */
        public function __construct(
            $name = '',
            $value = '',
            $expires = 3600,
            $path = '/',
            $domain = null,
            $secure = false,
            $httpOnly = false
        ) {

            if (preg_match("/[=,; \t\r\n\013\014]/", $name)) {
                throw new InvalidArgumentException(
                    sprintf(
                        'Girdiğiniz %s ismi geçersiz karekterler içermektedir.',
                        $name
                    )
                );
            }

            if (empty($name)) {
                throw new InvalidArgumentException('İsim değeriniz boş olamaz');
            }

            if ($expires instanceof DateTime) {
                $expires = $expires->format('U');
            } elseif (is_string($expires)) {
                $expires = strtotime($expires);
                if (false === $expires || -1 === $expires) {
                    throw new InvalidArgumentException('Cookie e girmiş olduğunuz geçerlilik süresi yanlış.');
                }
            }

            $this->setName($name);
            $this->setValue($value);
            $this->setExpires($expires);
            $this->setDomain($domain);
            $this->setPath($path);
            $this->setSecure((bool) $secure);
            $this->setHttpOnly((bool) $httpOnly);

        }

        /**
         * Cookie metnini oluşturur
         *
         * @return string
         */
        public function __toString()
        {

            $cookie = urlencode($this->getName()).'=';

            if ('' === $this->getValue()) {
                $cookie .= 'deleted; expires='.date('D, d-M-Y H:i:s T', 0);
            } else {

                $cookie .= urlencode($this->getValue());
                if (0 !== $this->getExpires()) {

                    $cookie .= '; expires='.gmdate('D, d-M-Y H:i:s T', time() + $this->getExpires());
                }
            }

            if ($this->getPath()) {
                $cookie .= '; path='.$this->getPath();
            }

            if ($this->domain) {
                $cookie .= '; domain='.$this->getDomain();
            }

            if (true === $this->isSecure()) {
                $cookie .= '; secure';
            }

            if (true === $this->isHttpOnly()) {

                $cookie .= '; httponly';
            }

            return $cookie;
        }

        /**
         * Static olarak instance oluşturmak
         *
         * @param string $name
         * @param string $value
         * @param int $expires
         * @param string $path
         * @param null $domain
         * @param bool $secure
         * @param bool $httpOnly
         * @return static
         */
        public static function make(
            $name = '',
            $value = '',
            $expires = 0,
            $path = '/',
            $domain = null,
            $secure = false,
            $httpOnly = false
        ) {

            return new self($name, $value, $expires, $path, $domain, $secure, $httpOnly);
        }

        /**
         * @return string
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * @param string $value
         * @return CookieJar
         */
        public function setValue($value)
        {
            $this->value = $value;

            return $this;
        }

        /**
         * @return string
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param string $name
         * @return CookieJar
         */
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }

        /**
         * @return int|string
         */
        public function getExpires()
        {
            return $this->expires;
        }

        /**
         * @param int|string $expires
         * @return CookieJar
         */
        public function setExpires($expires)
        {
            $this->expires = $expires;

            return $this;
        }

        /**
         * @return string
         */
        public function getPath()
        {
            return $this->path;
        }

        /**
         * @param string $path
         * @return CookieJar
         */
        public function setPath($path)
        {
            $this->path = $path;

            return $this;
        }

        /**
         * @return boolean
         */
        public function isHttpOnly()
        {
            return $this->httpOnly;
        }

        /**
         * @param boolean $httpOnly
         * @return CookieJar
         */
        public function setHttpOnly($httpOnly)
        {
            $this->httpOnly = $httpOnly;

            return $this;
        }

        /**
         * @return boolean
         */
        public function isSecure()
        {
            return $this->secure;
        }

        /**
         * @param boolean $secure
         * @return CookieJar
         */
        public function setSecure($secure)
        {
            $this->secure = $secure;

            return $this;
        }

        /**
         * @return null
         */
        public function getDomain()
        {
            return $this->domain;
        }

        /**
         * @param null $domain
         * @return CookieJar
         */
        public function setDomain($domain)
        {
            $this->domain = $domain;

            return $this;
        }


    }
