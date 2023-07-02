<?php

$users = [
    ['name' => 'Gjan', 'email' => 'gjan@gmail.com', 'password' => md5('1234')],
    ['name' => 'test', 'email' => 'test@gmail.com', 'password' => md5('1234')]
];

file_put_contents(__DIR__ . '/users.json', json_encode($users));

echo "\n users.json created \n";