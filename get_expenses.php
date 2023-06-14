<?php

require_once('expenses.php');

$expenses = R::findAll('expenses');

$totalExpenses = getTotalExpenses();

$response = [
  'expenses' => array_map(function ($expense) {
    return [
      'date' => $expense->date,
      'description' => $expense->description,
      'amount' => $expense->amount
    ];
  }, $expenses),
  'total' => $totalExpenses
];

header('Content-Type: application/json');
echo json_encode($response);

?>