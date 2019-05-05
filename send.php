<!-- 
    За основу взято с сайта
    https://smartlanding.biz/kontaktnaya-forma-s-chekboksami.html
  -->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Создание формы обратной связи</title>
<meta http-equiv="Refresh" content="4; URL=index.html#application"> <!-- редирект на нужную страицу через 4 секунды-->
</head>
<body>

<?php
 
$sendto   = " "; // почта, на которую будет приходить письмо !!! Измените на свою!!!
$username = $_POST['name'];   // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['textarea']; // сохраняем в переменную данные полученные из поля c телефонным номером
// $usermail = $_POST['email']; // сохраняем в переменную данные полученные из поля c адресом электронной почты
// проверяем наличие данных в радиокнопке  и сохраняем их
$adapt = '';
if (empty($_POST["adapt"]))
{
    $adapt = "notCheckbox";
}
elseif (!empty($_POST["adapt"]) && is_array($_POST["adapt"]))
{
    $adapt = implode(" ", $_POST["adapt"]);
}

// проверяем наличие данных в радиокнопке  и сохраняем их
$seo = '';
if (empty($_POST["seo"]))
{
    $seo = "notRadio";
}
elseif (!empty($_POST["seo"]) && is_array($_POST["seo"]))
{
    $seo = implode(" ", $_POST["seo"]);
}

$tPlan =$_POST ['tPlan']; // сохраняем данные из выподающего списка

// Формирование заголовка письма
$subject  = "Новое сообщение";
// $headers  = "From: " . strip_tags($usermail) . "\r\n";
// $headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";
 
// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>Text:</strong> ".$username."</p>\r\n";
// $msg .= "<p><strong>Почта:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Sed ut perspiciatis unde omnis iste natus:<br/> </strong> ".$adapt."</p>\r\n";
$msg .= "<p><strong>Lorem ipsum dolor sit amet, consectetur:<br/> </strong>  <p>".$seo."</p>\r\n";
$msg .= "<p><strong>Select:<br/> </strong>  <p>".$tPlan."</p>\r\n";
$msg .= "<p><strong>textarea:</strong> ".$usertel."</p>\r\n";
$msg .= "</body></html>";
 
// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<center><img src='img/sendform/ok-send.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
} else {
    echo "<center><img src='img/sendform/not-send.png'></center>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
}
 
?>

</body>
</html>