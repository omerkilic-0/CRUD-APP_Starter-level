<?php

//verştabanı bağlangtısını yaptık.
include 'connection.php';

//hata mesajları için boş değişken oluşturuyoruz
$name_err = $email_err = $password_err = $passwordagain_err = "";

//Kaydetme işlevi
//buton basılma kontrolu yapılacak. isset = basıldı ise. Ve parantez içerisine buton name'ini yazıyoruz.
if (isset($_POST["submit"])) {

    //kullanıcı adı, email, şifre ve şifre doğrulama işlemlerini gerçekleştirmek için fonksiyon yazıyoruz
    function safe_html($data)
    {
        //girilen değerin başındaki ve sonundaki boşluğu siler
        $data = trim($data);
        //özel karakterleri ters veya eğik çizgi vb. kaldırır
        $data = stripslashes($data);
        //özel karakterleri html koduna çevirir
        $data = htmlspecialchars($data);
        return $data;
    }

    //kullanıcı adı kontrol ediyoruz. empty ile karakter olup olmadığını kontrol ediyoruz
    if (empty($_POST["namesurname"])) {

        //eğer girdi bölümü boşsa hata verir
        $name_err = "<p style= color:red;>User Name gerekli alan.</p>";

        //girdi bölümünün en 6 karakter en fazla 20 karakter olması gerekir.
    } elseif (strlen($_POST["namesurname"]) < 6 or strlen($_POST["namesurname"]) > 20) {

        //6 karakterden az 20 karakterden fazla ise hara verir
        $name_err = "<p style= color:red;>User Name 6-20 karakter aralığında olmalıdır.</p>";

        //parola bölümüne özel değerler girilmesini kontrol ediyoruz
    } elseif (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST["namesurname"])) {

        //kullanıcı adına özel karakter girildi ise hata verir
        $name_err = "<p style= color:red;>User Name sadece rakam, harf ve alt çizgi karakterlerinden olmalıdır.</p>";

        //kullanıcı adı bölümünde hata yok ise devam eder
    } else {

        //kullanıcı adı doğruluk kontrolu için sql sorgusu yazıyoruz
        $sql = "SELECT id from users WHERE user_name = ?";

        //mysqli_prepare fonksiyonu sql sorgularını güvenli şekilde veri tabanına göndermeyi sağlar.
        //veritabanı sonuçlarını almak için stmt kullanıyoruz
        if ($stmt = mysqli_prepare($connect, $sql)) {

            //trim ile başındaki ve sonundaki boşlukları siliyoruz
            $param_username = trim($_POST["namesurname"]);

            //uygun veri tipinde veri girmek için mysqli_stmt_bind_param kullanıyoruz. string veri olması için 2. değer olarak "s" yazıyoruz
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //hazırlanan bir SQL sorgusunu çalıştırmak için kullanılan bir işlevdir.
            if (mysqli_stmt_execute($stmt)) {

                //SQL sorgusunun sonuçlarını alıp saklamak için kullanıla
                mysqli_stmt_store_result($stmt);

                //kullanıcı adının 1 kez kullanıla bilmesi için veri tabanına unique özelliği verdik. kullanıcı adının daha önce kullanılıp kullanılmadığını kontrol eder
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    //eğer daha önce kullanıldı ise hata mesajı verir.
                    $name_err = "<p style= color:red;>kullanıcı adı alınmış.</p>";

                    //eğer daha önce kullanılmadıysa kayıt gerçekleşir
                } else {
                    $name = safe_html($_POST["namesurname"]);
                }

                //sql sorgusu çalışırken bir hata oluşursa hata mesajı verir
            } else {
                echo mysqli_error($connect);

                //hata mesajı
                echo "<p style= color:red;>hata oluştu</p>";
            }
        }
    }

    if (empty($_POST["email"])) {
        $email_err = "<p style= color:red;>email gerekli alan.</p>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "<p style= color:red;>email hatalıdır</p>";
    } else {

        $sql = "SELECT id from users WHERE email = ?";

        //mysqli_prepare fonksiyonu sql sorgularını güvenli şekilde veri tabanına göndermeyi sağlar.
        if ($stmt = mysqli_prepare($connect, $sql)) {

            //trim ile başındaki ve sonundaki boşlukları siliyoruz
            $param_email = trim($_POST["email"]);

            //uygun veri tipinde veri girmek için mysqli_stmt_bind_param kullanıyoruz. string veri olması için 2. değer olarak "s" yazıyoruz
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            //hazırlanan bir SQL sorgusunu çalıştırmak için kullanılan bir işlevdir.
            if (mysqli_stmt_execute($stmt)) {

                //SQL sorgusunun sonuçlarını alıp saklamak için kullanıla
                mysqli_stmt_store_result($stmt);

                //kullanıcı adının 1 kez kullanıla bilmesi için veri tabanına unique özelliği verdik. kullanıcı adının daha önce kullanılıp kullanılmadığını kontrol eder
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    //eğer daha önce kullanıldı ise hata mesajı verir.
                    $email_err = "<p style= color:red;>email adı alınmış</p>";

                    //eğer daha önce kullanılmadıysa kayıt gerçekleşir
                } else {
                    $email = safe_html($_POST["email"]);
                }
                //sql sorgusu çalışırken bir hata oluşursa hata mesajı verir
            } else {
                echo mysqli_error($connect);

                //hata mesajı
                echo "<p style= color:red;>hata oluştu</p>";
            }
        }
    }

    //parola doğrulama
    //doluluk boşluk kontrolü yapan empty fonksiyonunu kullanıyoruz. ve parola doluluk boşluk kontrolü yapıyoruz.
    if (empty($_POST["password"])) {
        $password_err = "<p style= color:red;>password gerekli alan.</p>";
    } else {

        //parolada sorun yok ise kayıt  gerçekleşir.
        //veri tabanına kayıt gerçekleştirirken veriler açık şekilde görünmektedir. Veri tabanına erişimi olan birisinin parolaları görememesi için password_hash fonksiyonunu kullanarak ve password_defaul özelliğini kullanarak kriptolama(gölgeleme) işlemi yapıyoruz
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }

    //parola doğrulama alanında empty ile bir değer girilip girilmediğini kontrol ediypruz
    if (empty($_POST["passwordagain"])) {

        //alanda değer yok ise hata mesajı verir
        $passwordagain_err = "<p style= color:red;>password Again gerekli alan.</p>";

        //girdi bölümünde girdi varsa şifre değişkene atanır ve giriş işlemi gerçekleşir
    } else {
        $passwordagain = safe_html($_POST["password"]);
    }

    //şifre ve şifre doğrulama bölümlerini eşit olup olmadığını kontrol ediyoruz. 
    if ($_POST["password"] != $_POST["passwordagain"]) {

        //eğer aynı değilse hata mesajı verir
        $password_err = $passwordagain_err = "<p style= color:red;>parola tekrar alanı eşleşmiyor.</p>";

        //parola ve parola doğrulama aynı ise safe_html fonksiyonu ile giriş işlemi gerçekleşir.
    } else {
        $passwordagain = safe_html($_POST["passwordagain"]);
    }

    //hata mesajı olduğunda else if bloğu tamamlanamadığı ve else den sonra değer MySQL komutuna aktarılamadığı için hata verir. isset ile doluluk boşluk kontrolü yapıyoruz. eğer dolu ise çalışır
    if (isset($name) && isset($email) && isset($password)) {

        //sql sorgusu. ınsert ınto ile kayıt gerçekleştiriyoruz.
        $add = "INSERT INTO users (user_name, email, password) VALUES ('$name', '$email', '$password');";

        //sorguyu çalıştırıyoruz.
        //calistirekle fonksiyonu oluşturarak mysqli_query methodu ile sorgumuzu birleştirerek çalıştırıyoruz. 1. değer include ile aldığımız baglanti fonksiyonu ile veri tabanı bağlanıyor. 2. değer ile çalıştırılacak sorgu yazılıyor.
        $addrun = mysqli_query($connect, $add);

        //ekleme işlemini gerçekleştirilip gerçekleştirilmediğini yazdırıyoruz. bootstrap alertden yararlanıyoruz
        if ($addrun) {
            echo '
        <div class="alert alert-success" role="alert">
            Kayıt Başarılı Bir Şekilde Eklendi.
        </div>
        ';
        } else {
            echo '
        <div class="alert alert-danger" role="alert">
            Kayıt Eklenemedi, Tekrar Deneyiniz.
        </div>
        ';
        }

        header("Location: log_in.php");


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD APP</title>
</head>

<body>

    <!--NavBar Başlangıç-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="signin">
        <!--kaydet buton işlevi çalışması için action ekliyoruz. php kodları nerede yazılacak ise o dosya yolu yazılır. post methodu ekledik-->
        <form action="sign_in.php" method="post">

            <h1>Sign in</h1>
            <!--bağlantıda kullanılmak üzere name oluşturuldu-->
            <div class="name">
                <label for="namesurname">Name Surname:</label>
                <input type="text" class="input" name="namesurname" id="name" maxlength="15" size="20" placeholder="Dylan Davsen">
            </div>

            <?php

            echo $name_err

            ?>

            <div class="email">
                <label for="email">Email Adress:</label>
                <input type="email" class="input" name="email" id="email" maxlength="40" size="20" placeholder="example@gmail.com">
            </div>

            <?php

            echo $email_err

            ?>

            <div class="password">
                <label for="password">Password:</label>
                <input type="password" class="input password" name="password" id="password" maxlength="15" size="20" placeholder="paSSword123">
            </div>

            <?php

            echo $password_err

            ?>

            <div class="passwordagain">
                <label for="password">Password Again:</label>
                <input type="password" class="input password" name="passwordagain" id="passwordagain" maxlength="15" size="20" placeholder="paSSword123">
            </div>
            <?php

            echo $passwordagain_err

            ?>

            <div class="form-check">
                <input class="form-check-input is-invalid" type="checkbox" name="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                <label class="form-check-label-black" for="invalidCheck3">
                    i'am not a robot
                </label>
            </div>

            <div class="submit">
                <button type="submit" id="submit" class="btn btn-primary d-grid gap-2" name="submit">Submit</button>
            </div>

        </form>
    </div>
    <!--İnput Bitiş-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>