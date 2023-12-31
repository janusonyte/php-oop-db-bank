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
        $accountNumber = Filewriter::generateIban();
        $balance = 0;
        $name = $userData['name'];
        $lastName = $userData['lastName'];
        $personalId = $userData['personalId'];

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
        $sql =
            "
        UPDATE {$this->tableName}
        SET 
            `name` = ?,
            `lastName` = ?
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $userData['name'],
            $userData['lastName'],
            $userId
        ]);
    }

    public function updateAdd(int $userId, array $userData): void
    {
        if ($_POST['amount'] > 0) {

            $userData = DBWriter::show($userId);
            $oldBalance = $userData['balance'];
            $newBalance = $_POST['amount'];
            $userData['balance'] = $oldBalance + $newBalance;
            $sql =
                "
                    UPDATE {$this->tableName}
                    SET 
                        `balance` = ?
                    WHERE `id` = ?
                    ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $userData['balance'],
                $userId
            ]);
        } else {
            Messages::addMessage('danger', 'Amount must be more than 0');
        }
    }


    public function updateDeduct(int $userId, array $userData): void
    {
        $userData = DBWriter::show($userId);
        $amount = $_POST['amount'];

        if ($amount <= $userData['balance']) {

            $oldBalance = $userData['balance'];
            $newBalance = $oldBalance - $amount;
            $sql =
                "
                    UPDATE {$this->tableName}
                    SET 
                        `balance` = ?
                    WHERE `id` = ?
                    ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $newBalance,
                $userId
            ]);
            Messages::addMessage('success', 'Funds deducted');
        } else {
            Messages::addMessage('danger', 'Not enough funds');
        }
    }

    public function delete(int $userId): void
    {
        $sql =
            "
        DELETE FROM {$this->tableName}
        WHERE `id` = ?
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
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

    //For login:

    public function getUserByEmailAndPass(string $email, string $password): ?array
    {
        $sql =
            "
                SELECT *
                FROM {$this->tableName}
                WHERE `email` = ?
                AND `password` = ?
            ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, md5($password)]);

        $user = $stmt->fetch();

        return $user ? $user : null;
    }
}
