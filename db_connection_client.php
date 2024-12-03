<?php

$db=new SQLite3(__DIR__ . '/client');

$createTableQuery = <<<SQL
CREATE TABLE IF NOT EXISTS clients(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL
);
SQL;

if($db->exec($createTableQuery)){
    echo "Table client created successfully";
}else{
    echo "Error creating table: " . $db->lastErrorMsg();
}

$db->close();
?>