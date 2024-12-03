<?php

if (isset($_GET['id'])) {
    $invoiceId = $_GET['id'];

    $db=new SQLite3(__DIR__ . '/invoice');


    $stmt = $db->prepare("DELETE FROM invoices WHERE id = :id");
    $stmt->bindValue(':id', $invoiceId, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting invoice.";
    }
}
?>