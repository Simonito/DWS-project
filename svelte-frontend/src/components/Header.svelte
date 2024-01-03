<script>
    import { push } from "svelte-spa-router";

    export let username = 'lols';

    async function logout() {
        const response = await fetch('/logout.php', {
            method: 'GET',
        });

        if (response.status === 200) {
            push('/');
        } else {
            username = "MAAAAH";
        }
    }

</script>
  
<header>
    <p>Hello, {username}!</p>
    <button on:click|preventDefault={logout}>Logout</button>
</header>


<style>
    header {
        background-color: #4caf50;
        padding: 10px;
        text-align: center;
        color: white;
        border-radius: 4px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    button {
        background-color: #45a049;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #398438;
    }
</style>
  