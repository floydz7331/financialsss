
fetch('get_expenses.php')
.then(response => response.json())
.then(data => {
  data.expenses.forEach(expense => {
    const expenseItem = document.createElement('li');
    expenseItem.textContent = `${expense.date}: ${expense.description} - ${expense.amount} руб.`;
    expensesList.appendChild(expenseItem);
  });
  totalExpenses.textContent = `Итого: ${data.total} руб.`;
})
.catch(error => console.error(error));


expenseForm.addEventListener('submit', event => {
  event.preventDefault();
  const formData = new FormData(event.target);
  fetch('add_expense.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    const expenseItem = document.createElement('li');
    expenseItem.textContent = `${data.date}: ${data.description} - ${data.amount} руб.`;
    expensesList.appendChild(expenseItem);
    totalExpenses.textContent = `Итого: ${data.total} руб.`;
    expenseForm.reset();
  })
  .catch(error => console.error(error));
});