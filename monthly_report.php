<?php
$conn = new mysqli("localhost", "root", "", "expenses_db");
$month = $_GET['month'];
$sql = "SELECT * FROM expenses WHERE DATE_FORMAT(date, '%Y-%m') = '$month'";
$result = $conn->query($sql);
$total = 0;
echo "<h3>Report for $month</h3><ul>";
while($row = $result->fetch_assoc()) {
  echo "<li>{$row['date']} - {$row['category']}: ₹{$row['amount']} ({$row['description']})</li>";
  $total += $row['amount'];
}
echo "</ul><strong>Total: ₹$total</strong>";
?>
