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
            <a class="navbar-brand" href="admin_profile.php">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/ekle.php">Control Panel</a>
                    </li>
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
            <a href="admin/admin_nodejs.php" style="text-decoration: none; color:black; font-size:large;">
                <img src="img/nodejs.jpg" style="float:left; width: 30%;" class="img-thumbnail">
                <p style=" padding-left: 10px;" class="m-5"> Node.js, hızlı ve verimli bir şekilde sunucu tarafı uygulamaları geliştirmek için kullanılan bir JavaScript çalıştırma ortamıdır. Özellikle olay tabanlı, asenkron programlama anlayışıyla web uygulamalarının performansını artırır.</p>
            </a>
        </div>
        <div class="row" style=" padding:10px; ">
            <a href="admin/admin_php.php" style="text-decoration: none; color:black; font-size:large;">
                <img src="img/php.jpg" style="float:left; width: 30%;" class="img-thumbnail">
                <p style="padding-left: 10px;" class="m-5">PHP, özellikle web geliştirme için tasarlanmış popüler bir betik dildir. Dinamik içerik oluşturma, veritabanı etkileşimi ve web sayfalarının dinamik oluşturulması gibi işlemlerde sıkça tercih edilir.</p>
            </a>
        </div>
        <div class="row" style=" padding:10px; ">
            <a href="admin/admin_python.php" style="text-decoration: none; color:black; font-size:large;">
                <img src="img/python.jpg" style="float:left; width: 30%;" class="img-thumbnail">
                <p style="padding-left: 10px;" class="m-5">Python, basit ve okunabilir sözdizimi ile öne çıkan çok amaçlı bir programlama dilidir. Geniş kütüphane desteği sayesinde veri analizi, yapay zeka, web geliştirme gibi birçok alanda kullanılır.</p>
            </a>
        </div>
    </div>
    <!--Blog Bitiş-->

    <br>
    <div class="card-footer text-body-secondary">
        <center>
            <p>Design by <a href="https://www.linkedin.com/in/%C3%B6mer-k%C4%B1l%C4%B1%C3%A7-5513b1252" target="_blank" style="text-decoration: none; color:black;"><b>ÖMER KILIÇ </b></a> | &copy; 2023</p>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>