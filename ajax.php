<?php
// print_r($_POST);exit();
$host = 'localhost';
$db = 'test';
$user = 'root';
$password = 'Qaz159';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($dsn, $user, $password);
	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}

if(isset($_POST['link'])){
  $url = $_POST['link'];
  $sql = "UPDATE click_count SET counter = counter+1 WHERE address = '".$url."'";
  $result = $pdo->query($sql);
}
?>
