 
<?php

$to = 'deztsentrprogress@yandex.ru';
$subject = "Сообщение с формы на $_SERVER[SERVER_NAME]";
$message = "";
foreach ($_POST as $key => $value) {
    if (!preg_match('/^(tildaspec-|form-spec-)/', $key)) {
        $message .= "$key: $value\r\n";
    }
}

$result = false;
if ($to && $subject && $message) {
    $result = mail($to, $subject, $message, "From: noreply@$_SERVER[SERVER_NAME]");
}

echo json_encode([ 'result' => $result ]);
