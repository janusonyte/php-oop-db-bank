<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\DBWriter;
use Bank\Messages;
use Bank\OldData;

class LoginController
{

    public function index()
    {
        $old = OldData::getFlashData();

        return App::view('auth\index', [
            'pageTitle' => 'Login',
            'inLogin' => true,
            'old' => $old,
        ]);
    }

    public function login(array $data)
    {
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        //Filewriter version of login:

        // $users = (new FileWriter('users'))->showAll();

        // foreach ($users as $user) {
        //     if ($user['email'] == $email && $user['password'] == md5($password)) {
        //         $_SESSION['email'] = $email;
        //         $_SESSION['name'] = $user['name'];
        //         Messages::addMessage('success', 'You have successfully logged in');
        //         header('Location: /account');
        //         die;
        //     }
        // }

        //end

        //DBWriter version of login:
        $user = App::get('users')->getUserByEmailAndPass($email, $password);
        if ($user) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];
            Messages::addMessage('success', 'You are logged in');
            header('Location: /account');
            die;
        } else {
            Messages::addMessage('danger', 'Wrong email or password');
            OldData::flashData($data);
            header('Location: /login');
            die;
        }
        //end


    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        Messages::addMessage('success', 'You have successfully logged out');
        header('Location: /login');
        exit;
    }
}
