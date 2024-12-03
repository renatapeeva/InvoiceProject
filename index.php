<?php
require_once 'db_connection.php';

$db=new SQLite3(__DIR__ . '/invoice');


$result = $db->query("SELECT * FROM invoices");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 p-8">

<header class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Invoice Management System</h1>
    <a href="add_invoice.php" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add New Invoice</a>
</header>

<h2 class="text-2xl font-semibold mb-6 text-gray-700">Invoice List</h2>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Invoice number</th>
            <th class="py-3 px-6 text-left">Client</th>
            <th class="py-3 px-6 text-left">Items</th>
            <th class="py-3 px-6 text-center">Total amount</th>
            <th class="py-3 px-6 text-center">Due date</th>
        </tr>
        </thead>
        <tbody class="text-gray-700 text-sm font-light">
        <?php while ($invoice = $result->fetchArray(SQLITE3_ASSOC)): ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($invoice['id']); ?></td>
                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($invoice['client']); ?></td>
                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($invoice['item']); ?></td>
                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($invoice['total_amount']); ?></td>
                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($invoice['date']); ?></td>

                <td class="py-3 px-6 text-center">
                    <a href="update_invoice_form.php?id=<?php echo $invoice['id']; ?>" class="text-blue-500 hover:underline mr-4">Update</a>
                    <a href="delete.php?id=<?php echo $invoice['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this invoice?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$db->close();
?>
