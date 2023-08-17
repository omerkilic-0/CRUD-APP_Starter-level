<?php 
include("../connection.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veritabanı İşlemleri</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<?php 

$sorgu = $connect->query("SELECT * FROM users WHERE id =".(int)$_GET['id']); //id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

?>

<div class="container">
<div class="col-md-6">

<form action="" method="post">
	
	<table class="table">
		
		<tr>
			<td>Name Surname:</td>
			<td><input type="text" name="username" class="form-control" value="<?php echo $sonuc['user_name']; // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><textarea name="email" class="form-control"><?php echo $sonuc['email']; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
		</tr>

	</table>

</form>
</div>
<div>
<?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
	
	$username = $_POST['username']; // Post edilen değerleri değişkenlere aktarıyoruz
	$email = $_POST['email'];

	if ($username <>"" && $email<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
		
		if ($connect->query("UPDATE users SET user_name = '$username', email = '$email' WHERE id =".$_GET['id'])) // Veri güncelleme sorgumuzu yazıyoruz.
		{
			header("location:ekle.php"); // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
		}
		else
		{
			echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
		}

	}

}

?>

</body>
</html>