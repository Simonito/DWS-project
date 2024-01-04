<script>
    import UserExpense from './UserExpense.svelte';
  
    export let expenses;

</script>

<div class="user-expenses">
    <h2>User Expenses</h2>
    {#each expenses as expense (expense.expense_id)}
        <UserExpense {expense} />
    {/each}
</div>

<style>
    .user-expenses {
        margin-top: 20px;
    }
</style>