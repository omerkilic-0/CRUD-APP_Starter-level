<?php

include("../connection.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Veritabanı İşlemleri</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../style.css">
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
						<a class="nav-link active" aria-current="page" href="../exit.php">Exit</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>
	<!--NavBar Bitiş-->

	<div class="container p-5">
		<center>

			<div class="col-md-6">
				<form action="" method="post">

					<table class="table">

						<tr>
							<td>User Name:</td>
							<td><input type="text" name="username" class="form-control"></td>
						</tr>

						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" class="form-control"></td>
						</tr>

						<tr>
							<td>Password:</td>
							<td><input type="password" name="password" class="form-control"></td>
						</tr>

						<tr>
							<td></td>
							<td><input class="btn btn-primary" type="submit" value="Ekle"></td>
						</tr>

					</table>

				</form>

				<!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

				<?php

				if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

					$username = $_POST['username']; // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
					$email = $_POST['email'];
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT); //parolayı kayıt ederken kriptoluyoruz

					if ($username <> "" && $email <> "" && $password <> "") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz. başka kontrollerde yapabilirsiniz.

						if ($connect->query("INSERT INTO users (user_name, email, password) VALUES ('$username','$email', '$password')")) // Veri ekleme sorgumuzu yazıyoruz.
						{
							echo "<p style= color:blue;>Veri Eklendi</p>"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
						} else {
							echo "<p style= color:red;>Hata oluştu!!</p>";
						}
					}
				}

				?>
			</div>
			<!-- ############################################################## -->

			<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
			<div class="col-md-7">
				<table class="table">

					<tr>
						<th>Id</th>
						<th>Name Surname:</th>
						<th>Email:</th>
						<th>Password:</th>
						<th></th>
						<th></th>
					</tr>

					<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

					<?php

					$sorgu = $connect->query("SELECT * FROM users"); // Makale tablosundaki tüm verileri çekiyoruz.

					while ($sonuc = $sorgu->fetch_assoc()) {

						$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
						$username = $sonuc['user_name'];
						$email = $sonuc['email'];
						$password = $sonuc['password'];

						// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
					?>

						<tr>
							<td>
								<?php
								echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. 
								?>
							</td>
							<td><?php echo $username; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $password; ?></td>
							<td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
							<td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
						</tr>

					<?php } // Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
					?>

				</table>
			</div>
		</center>
	</div>
</body>

</html>