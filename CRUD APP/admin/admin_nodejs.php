<?php

include '../connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $comment = $_POST['comment'];

    $commentsql = "INSERT INTO nodejs_comment (`user_name`, `comment`) VALUES ('$name','$comment')";

    mysqli_query($connect, $commentsql);

}
$sql = "SELECT `id`, `user_name`, `comment` FROM `nodejs_comment` ORDER BY id DESC";
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
            <a class="navbar-brand" href="../admin_profile.php">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="ekle.php">Control Panel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../exit.php">Exit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--NavBar Bitiş-->

    <!--İcerik Başlangıç-->
    <div class="container" style="border-radius: 15px; background-color: rgba(128, 128, 128, 0.251);">
        <center>
            <img src="../img/nodejs.jpg" style="width: 500px; padding-top:15px; border-radius: 20px">
        </center>
        <h1>Node.js ile Web Geliştirmenin Gücü</h1>

        <p>Node.js, modern web geliştirmenin vazgeçilmez araçlarından biridir. JavaScript tabanlı bu platform, hızlı ve verimli sunucu tarafı uygulamaları oluşturmak için kullanılır. Geleneksel web sunucularının aksine, Node.js olay tabanlı ve asenkron bir yapı sunar. Bu özellikleri sayesinde yoğun talepler altında bile yüksek performanslı uygulamalar oluşturabilirsiniz.</p>

        <h2>Başlıca Avantajlar</h2>

        <p>Node.js'in getirdiği birçok avantaj bulunmaktadır. Öncelikle, aynı dili (JavaScript) hem istemci tarafında hem de sunucu tarafında kullanabilme yeteneği, geliştiricilere tutarlı bir deneyim sunar. Bu da geliştirme süreçlerini hızlandırır ve karmaşıklığı azaltır.</p>

        <p>Asenkron programlama modeli, Node.js'in en güçlü yönlerinden biridir. Geleneksel sunucu modellerinde, her istemci isteği için bir iş parçacığı oluşturulur ve bu da bellek tüketimini artırabilir. Ancak Node.js, tek bir iş parçacığında yüzlerce hatta binlerce bağlantıyı eşzamanlı olarak yönetebilir. Bu da daha az kaynak tüketimi ve daha iyi ölçeklenebilirlik anlamına gelir.</p>

        <h2>Paket Yönetimi ve Kütüphaneler</h2>

        <p>Node.js'in gücünü artıran bir diğer faktör, geniş kütüphane ve paket ekosistemidir. Node Package Manager (NPM), binlerce önceden yazılmış modül ve kütüphaneye erişim sağlar. Bu modüller, her türlü işlevi yerine getirebilmek için kullanılabilir. Veritabanı entegrasyonundan, HTTP istemcisi oluşturmaya, oturum yönetiminden, web sunucularına kadar pek çok alanı kapsayan kütüphaneler bulunmaktadır.</p>

        <h2>Gerçek Dünya Senaryoları</h2>

        <p>Node.js'in kullanım alanları oldukça geniştir. Özellikle gerçek zamanlı uygulamalarda, canlı sohbet sistemlerinde, işbirlikli araçlarda ve etkileşimli oyunlarda Node.js büyük bir avantaj sağlar. Aynı zamanda hızlı prototipleme ve hızlı geliştirme için de ideal bir platformdur.</p>

        <h2>Sonuç</h2>

        <p>Node.js, web geliştirmenin geleceğine yönelik bir bakış açısı sunuyor. Asenkron programlama, ölçeklenebilirlik ve geniş kütüphane desteği gibi avantajları sayesinde, web uygulamalarını daha hızlı, daha etkili ve daha güçlü bir şekilde oluşturmanıza yardımcı olur. Bu nedenle, geliştiriciler için Node.js'in öğrenilmesi ve kullanılması büyük bir fırsattır.</p>
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
            <form action="admin_nodejs.php" method="POST">
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

    <div class="card-footer text-body-secondary">
        <center>
            <p>Design by <b>ÖMER KILIÇ </b> | &copy; 2023</p>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>