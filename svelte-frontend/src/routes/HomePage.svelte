<script>
    import Header from '../components/Header.svelte';
    import ExpenseForm from '../components/ExpenseForm.svelte';
    import UserExpenses from '../components/UserExpenses.svelte';
    import { onMount } from 'svelte';
    import { push, replace } from 'svelte-spa-router';
  
    let username = "ahoj";
    let expenses = [
        {
            amount: 0,
            paid_at: "0",
            category_name: "None",
        },
    ];
    
    async function authenticate() {
        try {
            const response = await fetch('/auth.php', {
                method: 'GET',
            });

            if (response.status != 200) {
                await replace('/login');
            } else {
                // AUTHORIZED
                const res = await response.json();
                console.log({res});
            }
        } catch(err) {
            await replace('/login');
        }
    }

    async function updateUserData() {
        const user_data_response = await fetch('/data-user.php', {
            method: 'GET',
        });

        if (user_data_response.status === 200) {
            const user_data_json = await user_data_response.json();
            username = user_data_json.username;
            console.log({user_data_json});
            expenses = user_data_json.user_expenses;
        }
    }

    onMount(() => {
        authenticate().then(() => updateUserData());
    });


</script>
  
<main>
    <Header {username} />
    <div class="form-container">
        <ExpenseForm />
    </div>
    <div>
        <UserExpenses {expenses}/>
    </div>
</main>

<style>
    main {
        margin-top: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
</style>