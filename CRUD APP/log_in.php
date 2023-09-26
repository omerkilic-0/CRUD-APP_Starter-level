<?php

//baglanti.php dosyasının bağlantısını yaptık.
include 'connection.php';

//hata mesajları için boş değişken oluşturuyoruz
$name_err = $password_err = "";

//giriş için kullanıcı adı girme işlevi
//buton basılma kontrolu yapılacak. isset = basıldı ise. Ve parantez içerisine buton name'ini yazıyoruz
if (isset($_POST["submit"])) {

    //veri tabanına yollamak için inputa girilen değeri password değişkenine atıyoruz.
    $name = $_POST["namesurname"];
    $password = $_POST["password"];

    //hata mesajı olduğunda else if bloğu tamamlanamadığı ve else den sonra değer MySQL komutuna aktarılamadığı için hata verir. isset ile doluluk boşluk kontrolü yapıyoruz. eğer dolu ise çalışır
    if (isset($name) && isset($password)) {

        //seçim sorgusu ile kullanıcı adı bölümüne yazdığımız kullanıcı adının MySQL komutları ile veri tabanında olup olmadığını kontrol ediyoruzç
        $command = "SELECT * FROM users WHERE user_name = '$name'";
        //baglanti.php dosyasında veri tabanı ile ilişkilendirdiğimiz $baglantı değişkeni ile secim değişkenini içinde bulunun SQL komutunu çalıştırıyoruz.
        $run = mysqli_query($connect, $command);
        //uyelik veri tabanında bulunan kullanıcılar tablosunun sütunlarını ayarlarken kullanici_adi sütununu unique yani benzersiz seçtiğimiz için aynı kullanıcı adından sağdece 1 tane olabilir. mysqli_num_rows fonksiyonu ile kullanıcı adı bölümüne girilen kullanıcı adının veri tabanında olup olmadığını kontrol ediyoruz. mysqli_num_rows fonksiyonu kaç adet sonuç olduğunu gösterir.
        $savenumber = mysqli_num_rows($run);

        //girilen kullanıcı adı veri tabanında olup olmadığı kontrol eddilir
        if ($savenumber > 0) {
            //girilen kullanıcı adı varsa giriş yapılır. mysqli_fetch_assoc fonksiyonun veri tabanında bulunan kullanıcının tüm verilerini getiriyor.
            $registered = mysqli_fetch_assoc($run);
            //veri tabanında şifrelenmiş(kriptolanmış) halde olan şifresine erişiyoruz.
            $hashpassword = $registered["password"];

            //parola girme alanına yazılan parolanın veri tabanındaki kriptolu şifre ile uyuşup uyuşmadığını kontrol ediyoruz. password_verify fonksiyonu kriptolanmış şifre ile girilen şifreyi karşılaştırır.
            if (password_verify($password, $hashpassword)) {

                //parola uyuşur ise oturum başlatılır
                session_start();
                $_SESSION["user_name"] = $registered["user_name"];
                $_SESSION["email"] = $registered["email"];

                //kullanıcının admin veya user olduğunu görmek için sql komutu yazıyoruz
                $admincontrol = "SELECT user_type FROM users WHERE user_name = '$name'";

                //query fonlsiyonu ile veri tabanındaki bilgileri çekiyoruz
                $result = mysqli_query($connect, $admincontrol);

                //result fonksiyonunu çalıştırıyoruz
                if ($result) {

                    //mysqli_fetch_assoc fonksiyonun veri tabanında bulunan kullanıcının user_type verileri getiriyor.
                    $row = mysqli_fetch_assoc($result);
                    //getirilen değer usertype'a atılır
                    $userType = $row['user_type'];

                    //veri tabanında admin yetkisi veren kullanıcıları özel sayfaya yönlendirmek için admin kontrolü yapıyoruz.
                    if ($userType == "admin") {

                        //kullanıcı eğer admin ise admin sayfasına yönlendirir
                        header("location: admin_profile.php");
                    } else {
                        //kullanıcı varsayılan olarak user ise standart giriş sayfasına yönlendirilir
                        header("location: profile.php");
                    }
                }

                //parola uyuşmaz ise hata mesajı verilir
            } else {
                echo '
                <div class="alert alert-danger" role="alert">
                Parola yanlış.
            </div>
                ';
            }

            //eğer girilen kullanıcı adı veri tabanında yoksa hata mesajı gösterilir
        } else {
            echo '
            <div class="alert alert-danger" role="alert">
            Kullanıcı Adı yanlış.
        </div>
            ';
        }

        //mysqli_close fonksiyonu ile veri tabanı bağlantımızı kapatıyoruz.
        mysqli_close($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"
          integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>CRUD APP</title>
</head>

<body>

<!--NavBar Başlangıç-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CRUD APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="sign_in.php">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="log_in.php">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--NavBar Bitiş-->

<!--İnput Başlangıç-->
<div class="login">
    <!--kaydet buton işlevi çalışması için action ekliyoruz. php kodları nerede yazılacak ise o dosya yolu yazılır. post methodu ekledik-->
    <form action="log_in.php" method="POST">

        <h1>Log in</h1>
        <!--bağlantıda kullanılmak üzere name'ler oluşturuldu-->
        <div class="namesurname">
            <label for="nameSurname">Name Surname:</label>
            <input type="text" class="input" name="namesurname" id="namesurname" maxlength="30" size="20"
                   placeholder="Dylan Davsen" required>
        </div>

        <div class="password_2">
            <label for="password">Password:</label>
            <input type="password" class="input" name="password" id="password_2" maxlength="15" size="20"
                   placeholder="paSSword123" required>
        </div>

        <!--Show Password aktif edildiğinde şifre görünür olsun-->
        <div>
            <input type="checkbox" id="password_2_checkbox" style="margin-left: 170px;">
            <label for="password_2">Show Password</label>
        </div>

        <div class="submit">
            <button type="submit" id="submit" class="btn btn-primary d-grid gap-2" name="submit">Submit</button>
        </div>

    </form>
</div>
<!--İnput Bitiş-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<script>
    // HTML'de "password_2" ID'ye sahip giriş alanını seçiyoruz
    const passwordInput = document.getElementById("password_2");

    // HTML'de "password_2_checkbox" ID'ye sahip onay kutusunu seçiyoruz
    const showPasswordCheckbox = document.getElementById("password_2_checkbox");

    // Onay kutusunun durumu değiştiğinde çalışacak olan olay dinleyici ekleniyor
    showPasswordCheckbox.addEventListener("change", function () {
        // Eğer onay kutusu işaretlendi ise
        if (showPasswordCheckbox.checked) {
            // Giriş alanının tipini "text" olarak değiştiriyoruz
            passwordInput.type = "text";
        } else {
            // Eğer onay kutusu işaretlenmemiş ise, giriş alanının tipini "password" olarak değiştiriyoruz
            passwordInput.type = "password";
        }
    });
</script>


</body>

</html>