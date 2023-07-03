<?php

namespace Bank;

use App\DB\DataBase;
use Bank\FileWriter;
use Bank\OldData;
use Bank\Messages;
use PDO;


class DBWriter
{
    private $tableName, $pdo;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;

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

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }


    public function create(array $userData): void
    {
        $id = rand(100000000, 999999999);
        // $userData['id'] = $id;
        $accountNumber = Filewriter::generateIban();
        // $userData['accountNumber'] = $accountNumber;
        $balance = 0;
        // $userData['balance'] = $balance;
        $name = $userData['name'];
        $lastName = $userData['lastName'];
        $personalId = $userData['personalId'];

        // $this->data[] = $userData;

        $sql  =
            "
            INSERT INTO {$this->tableName} 
            (
                `id`,
                `name`,
                `lastName`,
                `personalId`,
                `accountNumber`,
                `balance`

            )
            VALUES (
                ?,?,?,?,?,?
            )
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $id,
            $name,
            $lastName,
            $personalId,
            $accountNumber,
            $balance
        ]);
    }

    public function update(int $userId, array $userData): void
    {
        // foreach ($this->data as $key => $user) {
        //     if ($user['id'] == $userId) {
        //         $userData['id'] = $userId; // for safety
        //         $this->data[$key] = $userData;
        //     }
        // }
    }

    public function updateAdd(int $userId, array $userData): void
    {
        // foreach ($this->data as $key => $user) {

        //     if ($user['id'] == $userId) {
        //         $userData['id'] = $userId; // for safety
        //         if ($_POST['amount'] > 0) {
        //             $oldBalance = $user['balance'];
        //             $newBalance = $_POST['amount'];
        //             $userData['balance'] = $oldBalance + $newBalance;
        //             $userData['name'] = $user['name'];
        //             $userData['lastName'] = $user['lastName'];
        //             $userData['personalId'] = $user['personalId'];
        //             $userData['accountNumber'] = $user['accountNumber'];
        //             Messages::addMessage('success', 'Funds added');
        //             $this->data[$key] = $userData;
        //         } else {
        //             Messages::addMessage('danger', 'Amount must be more than 0');
        //             // $this->data[$key] = $userData;
        //             // header('Location: /account/deposit/' . $userId);
        //         }
        //     }
        // }
    }


    public function updateDeduct(int $userId, array $userData): void
    {
        // foreach ($this->data as $key => $user) {
        //     if ($user['id'] == $userId) {
        //         $userData['id'] = $userId; // for safety
        //         $userData['name'] = $user['name'];
        //         $userData['lastName'] = $user['lastName'];
        //         $userData['personalId'] = $user['personalId'];
        //         $userData['accountNumber'] = $user['accountNumber'];
        //         $amount = $_POST['amount'];
        //         $oldBalance = $user['balance'];
        //         if ($amount <= $oldBalance) {
        //             $userData['balance'] = $oldBalance - $amount;
        //             Messages::addMessage('success', 'Funds deducted');
        //             $this->data[$key] = $userData;
        //         } else {

        //             $userData['balance'] = $oldBalance;
        //             Messages::addMessage('danger', 'Not enough funds');
        //             // $this->data[$key] = $userData;
        //             // header('Location: /account/withdraw/' . $userId);
        //         }
        //     }
        // }
    }

    public function delete(int $userId): void
    {
        // foreach ($this->data as $key => $acc) {
        //     if ($acc['id'] == $userId) {
        //         unset($this->data[$key]);
        //     }
        // }
    }

    public function show(int $userId): array
    {
        $sql =
            "
        SELECT *
        FROM {$this->tableName}
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch();
    }

    public function showAll(): array
    {

        $sql =
            "
        SELECT *
        FROM {$this->tableName}
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }
}
