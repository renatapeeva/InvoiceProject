<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $client = $_POST['client'];
    $item = $_POST['item'];
    $total_amount = $_POST['total_amount'];
    $date = $_POST['date'];

    $db = new SQLite3(__DIR__ . '/invoice');


    $stmt = $db->prepare("UPDATE invoices SET client = :client, item = :item, total_amount = :total_amount, date = :date WHERE id = :id");
    $stmt->bindValue(':client', $client);
    $stmt->bindValue(':item', $item);
    $stmt->bindValue(':total_amount', $total_amount);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating invoice.";
    }
}
?>