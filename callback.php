<?
// ----------------------------конфигурация-------------------------- // 

$adminemail="technogympro@mail.ru";  // e-mail админа
$adminemail2="mg71645@gmail.com";

$headers = 'From: admin@technogym.kz' . "\r\n" .
   'Reply-To: admin@technogym.kz' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();


$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="javascript:history.back(1)";  // На какую страничку переходит после отправки письма 

//---------------------------------------------------------------------- // 



// Принимаем данные с формы

$name=$_POST['name'];

$phone=$_POST['phone'];

$trigger=$_POST['trigger'];


$ref = htmlspecialchars(trim($_COOKIE["ref"]));
$reftext = rawurldecode(trim($_COOKIE["stext"]));

$source = htmlspecialchars(trim($_COOKIE["source"]));
$medium = htmlspecialchars(trim($_COOKIE["medium"]));
$term = rawurldecode(trim($_COOKIE["term"]));
$campaign = htmlspecialchars(trim($_COOKIE["campaign"]));



// Проверяем валидность e-mail
/*
if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is", strtolower($phone)))

 { 

  echo
"Вы указали не верные данные";

  }
 
 else
 
 {
*/

$msg="
    Имя: $name
    Телефон: $phone
    Откуда: $trigger
    
    Сайт-источник: $ref $source
    Ключевое слово: $term $reftext
";


 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time Сообщение от $name", "$msg", $headers);
mail("$adminemail2", "$date $time Сообщение от $name", "$msg", $headers);



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Сообщение от $name");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

echo "<p>Спасибо! Наш оператор свяжется с вами в течении 30 минут</p>";
/*
 }
*/
?>