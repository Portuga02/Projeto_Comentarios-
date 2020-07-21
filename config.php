<?php
try {
	$pdo = new PDO("mysql:dbname=blog;host=localhost", "root");
} catch (Exception $e) {
	echo "Error".$e->getMessage();
	exit;
}
// conecção com o banco de dados 
?>