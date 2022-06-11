<?php

function result($data) {
	exit(json_encode($data));
}

$conn = new mysqli("Домен",  "Логин", "Пароль", "бд");  
$conn ->set_charset("utf8");
if ($conn->connect_error) {die("Ошибка: невозможно подключиться: " . $conn->connect_error);}

$search = trim($_POST['word']);


$check = "SELECT * FROM `table` WHERE `name` = '$search'"; 
//table название натблички. Name название столбца
$result = $conn->query($check);
if(mysqli_num_rows($result)){
    result([
        'status'		=> 'success',
        'message'		=> 'Пользователь найден'
    ]);
} else {
	result([
        'status'		=> 'error',
        'message'		=> 'Пользователь не найден'
    ]);
}

?>