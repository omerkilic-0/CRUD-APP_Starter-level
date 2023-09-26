<?php

//baglanti.php dosyasının bağlantısını yaptık.
include 'connection.php';

//oturumu başalttık
session_start();

//isset ile doluluk boşluk kontrolü yapıyoruz. eğer kullanıcı adı girildi ise ekrana kullanıcı adı yazacak
if (isset($_SESSION["user_name"])) {

    //giriş başarılı işe kullanıcı adı yazıyoruz.
    $w1 = "<h6>WELCOME TO " . $_SESSION["user_name"] . "</h6>";
    //giriş başarılı ise mail yazıyoruz
    $w2 = "<h6>E-Posta= " . $_SESSION["email"] . "</h6>";

    //kullanıcı adı girilmedi ise veya url ile yetkisiz girmeye çalışıyorsak
} else {

    //yetkisiz bir şekilde girmeye çalışırsak hata mesajı alırız.
    echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
    echo "<br><br> Lütfen ana sayfaya dönün: <a href = 'index.php' style = 'color: red; backroun-color: yellow; border: 1px solid red; padding: 5px 5px'>Anasayfa</a>";
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
        <a class="navbar-brand" href="profile.php">CRUD APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="exit.php">Exit</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--NavBar Bitiş-->

<!--Blog Başlangıç-->
<div class="container p-4" style="border-radius: 15px; background-color: rgba(128, 128, 128, 0.251);">
    <div class="row" style=" padding:10px; ">
        <a href="nodejs.php" style="text-decoration: none; color:black; font-size:large;">
            <img src="img/nodejs.jpg" style="float:left; width: 30%;" class="img-thumbnail">
            <p style=" padding-left: 10px;" class="m-5"> Node.js, hızlı ve verimli bir şekilde sunucu tarafı
                uygulamaları geliştirmek için kullanılan bir JavaScript çalıştırma ortamıdır. Özellikle olay tabanlı,
                asenkron programlama anlayışıyla web uygulamalarının performansını artırır.</p>
        </a>
    </div>
    <div class="row" style=" padding:10px; ">
        <a href="php.php" style="text-decoration: none; color:black; font-size:large;">
            <img src="img/php.jpg" style="float:left; width: 30%;" class="img-thumbnail">
            <p style="padding-left: 10px;" class="m-5">PHP, özellikle web geliştirme için tasarlanmış popüler bir betik
                dildir. Dinamik içerik oluşturma, veritabanı etkileşimi ve web sayfalarının dinamik oluşturulması gibi
                işlemlerde sıkça tercih edilir.</p>
        </a>
    </div>
    <div class="row" style=" padding:10px; ">
        <a href="python.php" style="text-decoration: none; color:black; font-size:large;">
            <img src="img/python.jpg" style="float:left; width: 30%;" class="img-thumbnail">
            <p style="padding-left: 10px;" class="m-5">Python, basit ve okunabilir sözdizimi ile öne çıkan çok amaçlı
                bir programlama dilidir. Geniş kütüphane desteği sayesinde veri analizi, yapay zeka, web geliştirme gibi
                birçok alanda kullanılır.</p>
        </a>
    </div>
</div>
<!--Blog Bitiş-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

</body>

</html>