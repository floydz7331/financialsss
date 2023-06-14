<?php

require_once('db.php');

function addExpense($date, $description, $amount) {
  $expense = R::dispense('expenses');
  $expense->date = $date;
  $expense->description = $description;
  $expense->amount = $amount;
  R::store($expense);
}

function getTotalExpenses() {
  $date = date('Y-m-');
  $expenses = R::find('expenses', 'date LIKE ?', [$date.'%']);
  $total = 0;
  foreach ($expenses as $expense) {
    $total += $expense->amount;
  }
  return $total;
}

?>