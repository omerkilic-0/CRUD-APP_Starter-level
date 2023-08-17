# Starter-level_CRUD-APP
# Konu
Başlangıç seviye PHP uygulamasıdır.
CRUD APP yani Cread, Read, Update ve Delete özelliklerini bulunduran ve MySql ile bağlantılı bir web sayfası yapmak isteyenler için oldukça kolay başlangıç seviye bir uygulamadır.

# Veri Tabanı 
MySql yani phpMyAdmin üzerinde "user" adlı veri tabanını oluşturuyoruz. Oluşturduğumuz veri tabanına "users" isimli bir tablo oluşturarak sırasıyla 5 sütun ekliyoruz. 
1- "id" int(11) Auto_Increment
2- "User_name" varchar(250)
3- "email" varchar(250)
4- "password" varchar(250)
5- "user_typ"e varchar(250)
Daha sonra giriş yapıldıktan sonra yorum yapmamız için "nodejs_ccomment" isimli veri tabanımızı hazırlıyoruz. Ve sırasıyla 3 sütunumuzu ekliyoruz.
1- "id" int(20)
2- "user_name" varchar(300)
3- "comment" varchar(300)
Bu işlemi "php_comment" ve "python_comment" tablo isimlerini vererek 2 kere daha tekrarlıyoruz.

# Dosya yapısı
```
CRUD APP
├── admin 
└── image
```

# Details
Giriş sayfası yani index.php sayfasında navbar ve Welcome bölümü bulunmaktadır. Navbar'da Sign In ve Log In seçenekleri bulunmaktadır. 

# Sign In
Sign In sayfasında alışılmış olan İsim ve Soyisim girme, Email adersi, Şifre ve şifre doğrulama inputları bulunmaktadır. Ve bulunan bu inmuptlar hem html Required hemde PHP kodları ile dinamik hale getirilmiştir. Hatalı veya eksik bilgi girildiğinde uyaru vermektedir. MySql Veri Tabanımızda email aderesi yalnızca 1 kez kullanılacak şekilde ayarlandığı ve PHP ile kontrolü sağlanarak aynı eposta adersinin 2. kez kullanılmamasını kontrol ediyoru. Daha sonra şifre ve şifre doğrulama alanlarının uyuşmalarını kontrol ettiktten sonra Password_hash özelliği ile kabul edilen şifrenin kriptolanarak Veri Tabanına Kayıt ettiriyoruz.

# Log In
Log In sayfamızda daha önceden kayıt olurakn girdiğimiz Name Surname ve Şifer bilgilerimizi girerek giriş işlemini tamalıyoruz. Ayrıca Show Password diyerekte şifre görünür hale getirterek kullanıcı dostu bir sayfa tasarlamış oldul. Ayrıca yalnış girilen bilgiler için PHP uyarılarıda verilmektedir.

# User Girişi
User yani normal kullanıcılar girdiğinde içerideki bilgi sayfasına erişim sağlarak istediği başlık hakkında bilgi almak için üstüne tıklayrak açabilir ve en alt kısımda dinamik halde bulunan yorum bölümüne yorum yapabilir. Yapılan yotumlar sayfanın altında otomatik olarak listelenecektir.

# Admin Girişi (Veri tabanı üzerinden yetki verilir)
Admin yani yetkili kişi giriş yaptıktan sonra user kullanıcılar gibi bilgi sayfalarının dışında navbar' da bulunan kontrol paneline erişim sağlayabilir.

# Control Panell
Admin kullanıcıların erişebilgiği bu sayfada yeni kullanıcı eklene bilir veya kullanıcı hesaplarını silebilir. Aynı zamanda eski kullanıcıların kullanıcı adını ve email adreslerini düzenleye bilir.



# Uygulama Bilgisi
Bu uygulama 01.08.2023 - 28.08.2023 tarihlerinde Tren Ödeme A. Ş.(PAYGURU) şirketinde yaptığım stajda yazdım.
