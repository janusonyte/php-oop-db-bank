<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>
        <?= $pageTitle ?? 'Untitled' ?>
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="app.css"> -->
    <link rel="stylesheet" href="../../app.css">
</head>
<?php require __DIR__ . "/header.php" ?>
<?php if (!isset($inLogin)) : ?>

<?php endif ?>
<?php require_once 'Messages.php' ?>

<body>

    <!-- </body> -->

    <!-- </html> -->