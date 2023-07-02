<?php

$users = [
    ['name' => 'Gjan', 'email' => 'gjan@gmail.com', 'password' => md5('1234')],
    ['name' => 'test', 'email' => 'test@gmail.com', 'password' => md5('1234')]
];

$host = 'localhost:4306';
$db   = 'php-oop-bank';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

foreach ($users as $user) {
    $name = $user['name'];
    $email = $user['email'];
    $password = $user['password'];


    $sql =
        "
    INSERT INTO users 
    (name, email, password)
    VALUES (?, ?, ?)
    ";


    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $password]);
}

die;
