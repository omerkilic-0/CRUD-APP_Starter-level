<?php

include 'connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $comment = $_POST['comment'];

    $commentsql = "INSERT INTO php_comment (`user_name`, `comment`) VALUES ('$name','$comment')";

    mysqli_query($connect, $commentsql);
}
$sql = "SELECT `id`, `user_name`, `comment` FROM `php_comment` ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>CRUD APP</title>
</head>

<body>

    <!--NavBar Başlangıç-->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="profile.php">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <!--İcerik Başlangıç-->
    <div class="container" style="border-radius: 15px; background-color: rgba(128, 128, 128, 0.251);">
        <center>
            <img src="img/php.jpg" style="width: 500px; padding-top:15px; border-radius: 20px">
        </center>
        <h1>PHP Nedir ve Web Geliştirmedeki Önemi</h1>
        <p>PHP (Hypertext Preprocessor), genellikle "PHP: İnternetin Arka Yüzü" olarak adlandırılan, web geliştirme alanında oldukça yaygın bir betik dildir. İnteraktif ve dinamik web siteleri oluşturmak amacıyla geliştirilmiş olan bu dili kullanarak, kullanıcılarla daha etkileşimli ve özelleştirilebilir deneyimler sunmak mümkün olur.</p>

        <h2>PHP'nin Temel Özellikleri ve Avantajları</h2>
        <ul>
            <li>Basit ve Okunabilir Sözdizimi: PHP'nin sözdizimi, C, Java ve Perl gibi dillerden esinlenmiştir. Bu da geliştiricilerin hızla öğrenmesini sağlar. Karmaşık yapılara sahip kodlar yazmak yerine, anlaşılabilir ve sade kodlar oluşturmak mümkündür.</li>
            <li>Veritabanı Entegrasyonu: PHP, farklı veritabanı sistemleriyle kolayca entegre edilebilir. MySQL, PostgreSQL, Oracle gibi popüler veritabanlarıyla uyumlu çalışarak dinamik içerikleri depolamak ve yönetmek mümkündür.</li>
            <li>Dinamik İçerik Üretimi: PHP, kullanıcıların sayfalara dinamik içerikler eklemesini sağlar. Kullanıcı girişi veya diğer değişkenlerle çalışarak, farklı kullanıcılar için özelleştirilmiş içerikler üretmek kolaylaşır.</li>
            <li>Modüler Yapı: PHP, fonksiyonlar ve sınıflar gibi modüler yapıları destekler. Bu sayede kodlar daha düzenli ve sürdürülebilir hale gelir.</li>
        </ul>

        <h2>PHP'nin Kullanım Alanları</h2>
        <ul>
            <li>Web Geliştirme: PHP, web sitelerinin dinamik ve etkileşimli olmasını sağlar. Form işleme, oturum yönetimi, kullanıcı girişi gibi temel web işlevlerini kolayca gerçekleştirebilir.</li>
            <li>Sunucu Tarafı Programlama: Sunucu taraflı bir dil olan PHP, istemci tarafında çalışan dillere kıyasla daha güvenli ve verimli bir seçenektir. Bu sayede güvenlik ve performans gereksinimleri yüksek projelerde tercih edilir.</li>
            <li>Veritabanı İşlemleri: PHP, veritabanlarıyla etkileşim kurmak için çeşitli fonksiyonları ve kütüphaneleri içerir. Veri tabanı işlemlerini yönetmek ve veriyi saklamak için oldukça etkilidir.</li>
        </ul>

        <p><strong>Sonuç olarak</strong>, PHP, web geliştirme dünyasının vazgeçilmez bir parçasıdır. Hem yeni başlayan geliştiricilerin öğrenmesi kolay bir dil olması hem de deneyimli geliştiricilerin karmaşık projelerde kullanabilmesi sayesinde popülerliğini korumaktadır. PHP'nin sunduğu avantajlar, dinamik ve etkileşimli web deneyimleri oluşturmak isteyen herkes için büyük bir çekicilik taşımaktadır.</p>
    </div>
    <!--İcerik Başlangıç-->

    <!--Yorumlar Başlangıç-->
    <center>
        <div class="container p-5">
            <div class="yorumlar p-3">
                <h2>Yorumlar</h2>
                <?php foreach ($comments as $comment) : ?>
                    <div class="yorum">
                        <figure class="text-center">
                            <p><?= $comment['user_name']; ?>:</p>
                            <figcaption class="blockquote-footer">
                                <p><?= $comment['comment']; ?></p>
                            </figcaption>
                        </figure>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="yoruminput p-3">
            <form action="php.php" method="POST">
                <h3>Yorumunuz:</h3>
                <input type="text" name="username" placeholder="User Name" size="30" required>
                <br>
                <br>
                <textarea name="comment" id="comment" cols="50" rows="10" placeholder="Yorumunuz:" required></textarea>
                <br>
                <br>
                <button class="btn btn-primary" name="submit" style="width: 100px;"><b>Gönder</b></button>
            </form>
        </div>
        </div>
        <!--Yorumlar Bitiş-->

    </center>

    <!-- Beğenme Başlangıç-->
    <!-- <center>
            <button>
                <i class="fa-regular fa-thumbs-up" style="font-size: xx-large; margin: 5px;"></i>
            </button>
            <button>
                <i class="fa-regular fa-thumbs-down" style="font-size: xx-large; margin: 5px;"></i>
            </button>
        </center> -->
    <!--Beğenme Bitiş -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>