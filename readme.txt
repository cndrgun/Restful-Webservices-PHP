
postman ile test edildi. Bütün servisler çalışıyor. SS'leri postman klasöründe.



Servisler:

/kullaniciKayit
Bu serviste kullanıcı json data göndererek sisteme kayıt olabilir. Şifre ve Kullanıcı adı için herhangi şart konulmamıştır

/kullaniciGiris
Bu serviste kullanici daha önceden kayit olduğu sisteme username ve passwordü ile giriş yapabilir.
Giriş yaptığında bir token döndürür bu tokenla diğer sipariş işlemlerini gerçekleştirebilir

/yeniSiparis
Bu serviste kullanici sipariş oluşturabilir.
Sistem product_id sorgulaması yapar sistemde o product_id ye ait ürün yoksa kayıt etmez.
Sipariş ettiği ürünün stoğu yoksa stokta yok hatası döner.
Sipariş ettiği ürün stoktan düşer.

/siparisGuncelle
Bu serviste kullanici siparişlerini güncelleyebilir.
Eğer sipariş edilen ürünün quantity si değiştiyse aradaki fark stoğa eklenir veya stoktan düşer.
Başkasının siparişini güncelleyemez sadece kendi verdiği siparişleri güncelleyebilir.

/siparişDetay
Bu serviste kullanici siparişinin detaylarını görebilir.
Eğer sipariş kendisine ait değilse detayını göremez.

/tumSiparisler
Bu serviste kullanici kendisine ait siparişleri görebilir.

/tumÜrünler
Bu serviste kullanici sistemde kayıtlı ürünleri görebilir.

/uyelikSonlandirma
Bu serviste kullanici sistemdeki üyeliğini dondurabilir.