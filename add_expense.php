<?php

require_once('expenses.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  exit('Метод не поддерживается');
}

$date = $_POST['date'];
$description = $_POST['description'];
$amount = $_POST['amount'];

addExpense($date, $description, $amount);

$totalExpenses = getTotalExpenses();

$response = [
  'date' => $date,
  'description' => $description,
  'amount' => $amount,
  'total' => $totalExpenses
];

header('Content-Type: application/json');
echo json_encode($response);

?>