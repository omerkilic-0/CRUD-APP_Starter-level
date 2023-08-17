<?php 

if ($_GET) 
{

include("../connection.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

if ($connect->query("DELETE FROM users WHERE id =".(int)$_GET['id'])) // id'si seçilen veriyi silme sorgumuzu yazıyoruz.
{
	header("location:ekle.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}

?>