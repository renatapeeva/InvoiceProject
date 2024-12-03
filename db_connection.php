<?php

$db=new SQLite3(__DIR__ . '/invoice');

$createTableQuery = <<<SQL
CREATE TABLE IF NOT EXISTS invoices(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    client INTEGER NOT NULL,
    item TEXT NOT NULL,
    total_amount FLOAT NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY (client) REFERENCES client(id)
);
SQL;

if($db->exec($createTableQuery)){
    echo "Table invoice created successfully";
}else{
    echo "Error creating table: " . $db->lastErrorMsg();
}

$db->close();
?>