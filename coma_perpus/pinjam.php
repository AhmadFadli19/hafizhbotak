<?php

include_once("connect.php");

$result_users = $connection->query("SELECT * FROM users");
$users = $result_users->fetch_all(MYSQLI_ASSOC);

$result_books = $connection->query("SELECT * FROM books");
$books = $result_books->fetch_all(MYSQLI_ASSOC);

if(isset($_POST["btn_pinjam"])){
    $user_id = $_POST["user_id"];
    $book_id = $_POST["book_id"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $quantity = $_POST["quantity"];
    $book_status = $_POST["book_status"];

    $result = $connection->query("INSERT INTO transactions (user_id, book_id, start_date, end_date, quantity, book_status) VALUES ('$user_id', '$book_id', '$start_date', '$end_date', '$quantity', '$book_status')");

    if($result){
        echo "Berhasil meminjam buku";
    }
    else{
        echo "Gagal";
    }
}

?>

<!DOCTYPE html>Document
<body>
    <form method="POST" action="">
        <div>
            <label>Peminjam</label>
            <select name="user_id">
                <?php foreach($users as $user) : ?>
                    <option value="<?= $user["id"] ?>">
                        <?= $user["username"] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label>Buku</label>
            <select name="book_id">
                <?php foreach($books as $book) : ?>
                    <option value="<?= $book["id"] ?>">
                        <?= $book["name"] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div>
            <label>Dari</label>
            <input type="date" name="start_date">
        </div>
        <div>
            <label>Sampai</label>
            <input type="date" name="end_date">
        </div>
        <div>
            <label>Jumlah</label>
            <input type="number" name="quantity">
        </div>
        <div>
            <label>Kondisi</label>
            <select name="book_status">
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>
        <button type="submit" name="btn_pinjam">SUBMIT</button>
    </form>
</body>
</html>