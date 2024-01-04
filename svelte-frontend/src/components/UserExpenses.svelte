<script>
    import UserExpense from './UserExpense.svelte';
  
    let orderings = ['category ↓', 'category ↑', 'amount ↓', 'amount ↑', 'date ↓', 'date ↑'];
    let ordering = orderings[3];

    export let expenses;

    function removeExpense(event) {
        console.log({'pre-remove': expenses});
        expenses = expenses.filter(exp => exp != event.detail.expense);
        console.log({'post-remove': expenses});
    }

</script>

<div class="user-expenses">
    <h2>User Expenses</h2>
    <label for="">
        <select bind:value={ordering}>
            {#each orderings as ord (ord)}
            <option value={ord}>{ord}</option>
            {/each}
        </select>
    </label>
    {#each expenses as expense (expense.expense_id)}
        <UserExpense {expense} on:expenseDeleted={removeExpense}/>
    {/each}
</div>

<style>
    .user-expenses {
        margin-top: 20px;
    }
    
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #f2f2f2;
    }
</style>