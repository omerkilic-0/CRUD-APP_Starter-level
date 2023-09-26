<?php

//Local host girişi için değişkenlerimizi tanımlıyoruz.
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_database = "users";

//locahost bağlantısı için mysqli_connect fonksiyonunu kullanarak bağlantıyı gerçekleştiriyoruz.
$connect = mysqli_connect($db_host, $db_user, $db_password, $db_database);

//Girilen değerler türkçe olduğu için mysqli_set_charset fonksiyonunu kullanarak veri tabanında hata olmaması için türkçe karaktleri UTF8'i kullanarak tanımlıyoruz.
mysqli_set_charset($connect, "UTF8");

// Veri tabanı bağlantısının olup olmadığını kontrol ediyoruz.
// if ($connect) {
//     echo "Bağlantı Başarılı";
// }
