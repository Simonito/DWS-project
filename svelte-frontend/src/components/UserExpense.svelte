<script>
    export let expense;

// You can access properties of expense like expense.category, expense.amount, etc.
</script>

<div class="user-expense">
    <p>Category: {expense.category_name}</p>
    <p>Amount: {expense.amount}</p>
    <p>Paid At: {expense.paid_at}</p>
</div>
  
<style>
    /* Add styles for the user-expense component */
    .user-expense {
        /* Your styles for a single expense */
        margin-bottom: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 4px;
    }
</style>