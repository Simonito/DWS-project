<script>
    import Header from '../components/Header.svelte';
    import ExpenseForm from '../components/ExpenseForm.svelte';
    import { onMount } from 'svelte';
  
    let username = "ahoj";

    async function updateUserData() {
        const user_data_response = await fetch('/user-data.php', {
            method: 'GET',
        });

        const user_data_json = await user_data_response.json();
        username = user_data_json.username;
    }

    onMount(() => {
        updateUserData();
    });


</script>
  
<main>
    <Header {username} />
    <div class="form-container">
        <ExpenseForm />
    </div>
</main>

<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
</style>