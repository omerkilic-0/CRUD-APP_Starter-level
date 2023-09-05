<?php

include '../connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $comment = $_POST['comment'];

    $commentsql = "INSERT INTO python_comment (`user_name`, `comment`) VALUES ('$name','$comment')";

    mysqli_query($connect, $commentsql);

}
$sql = "SELECT `id`, `user_name`, `comment` FROM `python_comment` ORDER BY id DESC";
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
            <img src="../img/python.jpg" style="width: 500px; padding-top:15px; border-radius: 20px">
        </center>
        <h1>Python Programlama Dili: Basitlik ve Güç Arasındaki Dengesi</h1>
        <p>Python, son yıllarda programlama dünyasında büyük bir popülarite kazanan, açık kaynaklı ve genel amaçlı bir programlama dilidir. Guido van Rossum tarafından geliştirilen Python, temiz ve anlaşılır sözdizimi ile ünlüdür. Hem yeni başlayanlar hem de deneyimli geliştiriciler için birçok avantaj sunan bu dil, çeşitli alanlarda kullanılmaktadır.</p>

        <h2>Basitlik ve Okunabilirlik</h2>
        <p>Python'ın en belirgin özelliklerinden biri, basit ve okunabilir sözdizimidir. Geliştiricilere sadece kod yazma yolu sunmakla kalmaz, aynı zamanda kodun anlaşılabilir olmasını sağlar. Bu özellik, özellikle yeni başlayanlar için öğrenmeyi kolaylaştırırken, deneyimli geliştiricilerin daha hızlı ve verimli çalışmasına olanak tanır.</p>

        <h2>Geniş Kütüphane Desteği</h2>
        <p>Python, zengin ve geniş bir standart kütüphaneye sahiptir. Bu kütüphaneler, geliştiricilere çeşitli görevleri gerçekleştirmek için hazır çözümler sunar. Veri analizi, web geliştirme, yapay zeka, bilimsel hesaplamalar ve daha pek çok alanda kullanılan kütüphaneler, zaman kazanmanıza ve daha karmaşık projeleri daha hızlı şekilde oluşturmanıza yardımcı olur.</p>

        <h2>Çeşitli Uygulama Alanları</h2>
        <p>Python, çok yönlü yapısı sayesinde birçok uygulama alanında kullanılır. Web geliştirme için Flask veya Django gibi çerçevelerle etkileyici web siteleri ve uygulamaları oluşturabilirsiniz. Veri analizi ve görselleştirme amacıyla Pandas, NumPy ve Matplotlib gibi kütüphaneleri kullanarak karmaşık veri setlerini işleyebilirsiniz. Yapay zeka ve makine öğrenme projelerinde de sıkça tercih edilen Python, TensorFlow ve PyTorch gibi kütüphanelerle güçlü algoritmaları uygulamanıza olanak sağlar.</p>

        <h2>Topluluk ve Kaynaklar</h2>
        <p>Python'ın büyük bir aktif topluluğu vardır. Çevrimiçi forumlar, dokümantasyonlar, video eğitimleri ve kitaplar gibi birçok kaynak geliştiricilere yardımcı olur. Bu, öğrenme sürecini kolaylaştırırken, projelerinizi daha verimli bir şekilde geliştirmenize olanak tanır.</p>

        <h2>Taşınabilirlik ve Çapraz Platform Desteği</h2>
        <p>Python, çeşitli işletim sistemlerinde (Windows, macOS, Linux) sorunsuz çalışabilir. Bu da kodunuzun farklı platformlarda çalışabilmesi anlamına gelir. Ayrıca, Python dilinde yazılan kodlar genellikle taşınabilir ve sık sık çapraz platform desteği sunar.</p>

        <p><strong>Sonuç olarak</strong>, Python programlama dili, basit ve okunabilir sözdizimi ile yeni başlayanlar için ideal bir seçenektir, ancak aynı zamanda deneyimli geliştiricilerin de ihtiyaçlarını karşılar. Geniş kütüphane desteği ve çeşitli uygulama alanları, Python'ı çok yönlü ve güçlü bir dil yapar. Eğer verimlilik, anlaşılabilirlik ve çeşitlilik arıyorsanız, Python sizin için mükemmel bir seçenek olabilir.</p>
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
            <form action="admin_python.php" method="POST">
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
            <p>Design by <a href="https://www.linkedin.com/in/%C3%B6mer-k%C4%B1l%C4%B1%C3%A7-5513b1252" target="_blank" style="text-decoration: none; color:black;"><b>ÖMER KILIÇ </b></a> | &copy; 2023</p>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>