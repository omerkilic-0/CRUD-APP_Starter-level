<?php
//oturumumuzu başlatıyoruz.
session_start();

//verileri sıfırlayarak oturumu kapatıyoruz
$_SESSION = array();

//outurum verilerini yok ediyoruz
session_destroy();

//çıkış yaptıktan sonra yönlendiriyoruz
header("location: log_in.php");

?>