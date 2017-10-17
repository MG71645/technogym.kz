<?php
    require_once 'swift/lib/swift_required.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    
    $sendTo = array('mara_mg@mail.ru', 'mg71645@gmail.com');
    $sendFrom = array("admin@technogym.kz" => "technogym.kz");
    $login = "admin@technogym.kz";
    $password = "Aa12341234";
    
    
    $date = new DateTime('now', new DateTimeZone('Asia/Almaty'));
    $date = $date->format('d.m.y H:i');
    
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $trigger = $_POST['trigger'];
    
    $ref = htmlspecialchars(trim($_COOKIE["ref"]));
    $reftext = rawurldecode(trim($_COOKIE["stext"]));
    
    $source = htmlspecialchars(trim($_COOKIE["source"]));
    $medium = htmlspecialchars(trim($_COOKIE["medium"]));
    $term = rawurldecode(trim($_COOKIE["term"]));
    $campaign = htmlspecialchars(trim($_COOKIE["campaign"]));
    
    
    if($phone || $email)
    {
        $transport = Swift_SmtpTransport::newInstance('smtp.yandex.ru', 465, "ssl")
            ->setUsername($login)
            ->setPassword($password);
        
        $mailer = Swift_Mailer::newInstance($transport);
        
        $message = "<b>Имя:</b> $name<br>";
        if($phone) $message .= "<b>Телефон:</b> $phone<br>";
        if($email) $message .= "<b>Email:</b> $email<br>";
        $message .= "<b>Откуда:</b> $trigger<br><br>";
        if($ref || $source) $message .= "<b>Сайт-источник:</b> $ref $source<br>";
        if($term || $reftext) $message .= "<b>Ключевое слово:</b> $term $reftext";
        
        $message_send = Swift_Message::newInstance("$date Сообщение от $name")
            ->setFrom($sendFrom)
            ->setTo($sendTo)
            ->setBody($message, 'text/html');
        
        $result = $mailer->send($message_send);
        echo $result;
        $regResult = array();
    }

?>