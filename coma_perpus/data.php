<?php

include_once("connect.php");

$result_transactions = $connection->query("SELECT * FROM transactions");
$transactions = $result_transactions->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Peminjam</th>
                <th>Buku</th>
                <th>Dari</th>
                <th>Sampai</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($transactions as $key => $transaction) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $transaction["user_id"] ?></td>
                    <td><?= $transaction["book_id"] ?></td>
                    <td><?= $transaction["start_date"] ?></td>
                    <td><?= $transaction["end_date"] ?></td>
                    <td><?= $transaction["quantity"] ?></td>
                    <td><?= $transaction["book_status"] ?></td>
                    <td></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>