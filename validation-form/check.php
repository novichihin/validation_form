<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Длина логина недопустимая";
} else if(mb_strlen($name) < 2 || mb_strlen($name) > 50) {
    echo "Длина имени недопустимая";
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
    echo "Длина пароля недопустимая (от 2 до 6)";
    exit();
}

$pass = md5($pass."bjdbcjkslamxnjdnf4567");

require "validation-form/connect.php";
$my_sql->query("INSERT INTO `users`(`login`, `pass`, `name`)
VALUES('$login', '$pass', '$name')");

$my_sql->close();

header('Location: /');
exit();
?>