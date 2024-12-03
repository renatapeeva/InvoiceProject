<?php

$db=new SQLite3(__DIR__ . '/invoice');


$id = $_GET['id'];
$invoice = $db->querySingle("SELECT * FROM invoices WHERE id = $id", true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Update Invoice</h2>

    <form action="update_invoice.php" method="post" class="space-y-4">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div>
            <label for="client" class="block text-gray-600">Client's Name:</label>
            <input type="text" id="client" name="client" value="<?php echo htmlspecialchars($invoice['client']); ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="item" class="block text-gray-600">Item:</label>
            <textarea id="item" name="item" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400"><?php echo htmlspecialchars($invoice['item']); ?></textarea>
        </div>

        <div>
            <label for="total_amount" class="block text-gray-600">Price:</label>
            <input type="number" id="total_amount" name="total_amount" value="<?php echo htmlspecialchars($invoice['total_amount']); ?>" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label for="date" class="block text-gray-600">Price:</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($invoice['date']); ?>" step="0.01" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Update Invoice</button>
    </form>
</div>

</body>
</html>