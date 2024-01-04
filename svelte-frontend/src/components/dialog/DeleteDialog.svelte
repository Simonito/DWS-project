<script>
    import { getContext } from 'svelte';

    export let message;
    export let onCancel = () => {};
    export let onConfirm = () => {};

    const { close } = getContext('simple-modal');

    function handleCancel() {
        onCancel();
        close();
    }

    function handleConfirm() {
        onConfirm();
        close();
    }
</script>

<h2>{message}</h2>

<div class="buttons">
    <button on:click={handleCancel}>
        No, keep the expense
    </button>
    <button on:click={handleConfirm}>
        Yes, delete the expense
    </button>
</div>


<style>
    h2 {
        font-size: 2rem;
        text-align: center;
    }

    .buttons {
        display: flex;
        justify-content: space-between;
    }
</style>