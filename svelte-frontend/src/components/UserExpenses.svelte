<script>
    import UserExpense from './UserExpense.svelte';
  
    export let expenses;

</script>
  
<div class="user-expenses">
    <h2>User Expenses</h2>
    {#each expenses as expense (expense.id)}
        <UserExpense {expense} />
    {/each}
</div>

<style>
    /* Add styles for the user-expenses component */
    .user-expenses {
        /* Your styles for the list of expenses */
        margin-top: 20px;
    }
</style>