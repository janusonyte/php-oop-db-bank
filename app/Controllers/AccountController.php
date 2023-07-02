<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\FileWriter;
use Bank\OldData;
use Bank\Messages;

class AccountController
{
    public function index()
    {
        $data = new FileWriter('account');

        return App::view('account/index', [
            'pageTitle' => 'Accounts',
            'accounts' => $data->showAll(),
        ]);
    }

    public function create()
    {
        return App::view('account/create', [
            'pageTitle' => 'Create an account',
        ]);
    }

    public function store(array $request)
    {

        $data = new FileWriter('account');

        if (strlen($request['name']) < 3) {
            Messages::addMessage('danger', 'First name must be at least 3 characters');
            OldData::flashData($request);
            header('Location: /account/create');
        } elseif (strlen($request['lastName']) < 3) {
            Messages::addMessage('danger', 'Last name must be at least 3 characters');
            OldData::flashData($request);
            header('Location: /account/create');
        } elseif (strlen($request['personalId']) < 11) {
            Messages::addMessage('danger', 'Personal ID is not correct');
            OldData::flashData($request);
            header('Location: /account/create');
        } else {
            $data->create($request);
            Messages::addMessage('success', 'Account created successfully');
            header('Location: /account');
        }
    }

    public function edit(int $id)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);

        return App::view('account/edit', [
            'pageTitle' => 'Edit an account',
            'account' => $account,
        ]);
    }

    public function deposit(int $id)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);

        return App::view('account/deposit', [
            'pageTitle' => 'Edit an account',
            'account' => $account,
        ]);
    }

    public function withdraw(int $id)
    {
        $data = new FileWriter('account');
        $account = $data->show($id);

        return App::view('account/withdraw', [
            'pageTitle' => 'Edit an account',
            'account' => $account,
        ]);
    }


    public function update(int $id, array $request)
    {
        $data = new FileWriter('account');

        if (strlen($request['name']) <= 3) {
            Messages::addMessage('danger', 'First name must be at least 3 characters');
            header('Location: /account/edit/' . $id);
        } elseif (strlen($request['lastName']) <= 3) {
            Messages::addMessage('danger', 'Last name must be at least 3 characters');
            header('Location: /account/edit/' . $id);
        } elseif (strlen($request['personalId']) < 11) {
            Messages::addMessage('danger', 'Personal ID is not correct');
            header('Location: /account/edit/' . $id);
        } elseif ($request['amount'] < 0) {
            Messages::addMessage('danger', "Specified amount cannot be negative");
            header('Location: /account/edit/' . $id);
        } else {
            $data->update($id, $request);
            Messages::addMessage('success', 'Account edited successfully');
            header('Location: /account');
        }
        // $data->update($id, $request);

        // header('Location: /account');
    }

    public function updateAdd(int $id, array $request)
    {
        $data = new FileWriter('account');
        $data->updateAdd($id, $request);

        header('Location: /account/deposit/' . $id);
    }

    public function updateDeduct(int $id, array $request)
    {
        $data = new FileWriter('account');
        $data->updateDeduct($id, $request);

        header('Location: /account/withdraw/' . $id);
    }




    public function delete(int $id)
    {
        $account = (new FileWriter('account'))->show($id);
        return App::view('account/delete', [
            'pageTitle' => 'Close an account',
            'account' => $account,
        ]);
    }

    public function destroy(int $id)
    {
        $data = new FileWriter('account');
        // $data->delete($id);
        // header('Location: /account');
        $account = $data->show($id);
        if ($account['balance'] == 0) {
            $data->delete($id);
            Messages::addMessage('success', 'Bank account successfully closed');
            header('Location: /account');
        } else {
            Messages::addMessage('danger', 'Bank account is not empty. Cannot delete');
            header('Location: /account/delete/' . $id);
        }
    }
}