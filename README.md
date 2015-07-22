AnonymCookie
============

AnonymFramework Cookie işlemlerinin yapılacağı sınıftır, ayrıca sınıftan ayrı olarakda
kullanılabilir.


Sınıfın Çağrımı
--------------

```php 

use Anonym\Components\Cookie\Cookie;
$cookie = new Cookie();
```

Basit İşlemler
==============

Bu kısımda veri okuma veri yazma gibi işlemler vardır,

Veri Okumak
-----------

```php

$value = $cookie->get('cookiename');

```

Veri Yazmak
-----------

```php

$value = $cookie->set('cookiename', 'cookievalue', time()+3600);

```

Veri Silmek
-----------

```php

$cookie->delete('cookiename');

```

Veri Kontrolu
-------------

```php

var_dump($cookie->has('cookiename')); // bool true or false
```

Verileri Şifrelemek
==================
Bu kısımda verileri nasıl şifreleyebileceğiniz anlatılmaktar


verileri şifreleyebilmek için sınıfı ilk oluştururken parametre olarak bir adet
true atamanız yada setEncode ile öncelikle encode yapacağınızı belli etmeniz gerekir.
Şifrelemeyi ayarladıktan sonra özel olarak bir şifreleyici girilmesse default olarak
base64 şifrelemesi kullanılır

Default Şifreleme
-------------

```php
$cookie = new Cookie(true);
```

----------------------------------

```php
$cookie->setEncode(true);
```

Özleştirilmiş Şifreleme
---------------------

```php
$cookie->setEncoder( new Base64Encoder());
```

Verileri göndermek
============================

Cookie atanması yapıldıktan sonra bunun tarayıcıya bildirilmesi gerekir.

```php

use Anonym\Components\Cookie\UseCookieHeaders; 

$useHeaders = new UseCookieHeaders();
$useHeaders->useCookies();
```
