<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add a New Invoice</h2>

    <form action="add_invoice.php" method="post" class="space-y-4">
        <div>
            <label for="client" class="block text-gray-600">Client's name:</label>
            <input type="text" id="client" name="client" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="item" class="block text-gray-600">Item:</label>
            <textarea id="item" name="item" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <div>
            <label for="total_amount" class="block text-gray-600">Total amount:</label>
            <input type="number" id="total_amount" name="total_amount" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="date" class="block text-gray-600">Date:</label>
            <input type="date" id="date" name="date" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Add Invoice</button>
    </form>
</div>

</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client = $_POST['client'];
    $item = $_POST['item'];
    $total_amount = $_POST['total_amount'];
    $date = $_POST['date'];

    $db=new SQLite3(__DIR__ . '/invoice');


    $stmt = $db->prepare("INSERT INTO invoices (client, item, total_amount, date) VALUES (:client, :item, :total_amount, :date)");
    $stmt->bindValue(':client', $client);
    $stmt->bindValue(':item', $item);
    $stmt->bindValue(':total_amount', $total_amount);
    $stmt->bindValue(':date', $date);

    if ($stmt->execute()) {
        Header("Location: index.php");
    } else {
        echo "<script>alert('Error adding invoice.');</script>";
    }
}
?>
