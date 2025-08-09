<?php
$conn = new mysqli("localhost", "root", "", "expenses_db");
$date = $_POST['date'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$desc = $_POST['description'];
$sql = "INSERT INTO expenses (date, amount, category, description) VALUES ('$date', '$amount', '$category', '$desc')";
$conn->query($sql);
header("Location: index.html");
?>
