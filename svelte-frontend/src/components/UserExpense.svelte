<script>
	import DeleteDialog from './dialog/DeleteDialog.svelte';
    import { Trash2Icon } from 'svelte-feather-icons';

    export let expense;



    let status = 0;

	const onCancel = () => {
		status = -1;
	};

	const onOkay = () => {
		status = 1;
	};

    const deleteDialog = () => {
		open(
			DeleteDialog,
			{
				message: "What is your name?",
				hasForm: false,
				onCancel,
				onOkay
			},
			{
				closeButton: false,
                closeOnEsc: false,
                closeOnOuterClick: true,
			}
	  );
	};

</script>

<div class="user-expense">
    <div class="icon-button-div">
        <div id="cat-divs">
            <div>
                Category:
            </div>
            <div class="item-val">
                {expense.category_name}
            </div>
        </div>
        <div id="del-but-div">
            <button on:click={deleteDialog}>
                <Trash2Icon/>
            </button>
        </div>
    </div>

    <div class="next-to-each">
        Amount:
        <div class="item-val spaced">
            {expense.amount}€
        </div>
    </div>

    <div class="next-to-each">
        Paid At:
        <div class="item-val spaced">
            {expense.paid_at}
        </div>
    </div>
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
    
    .icon-button-div {
        text-align: right;
        padding: 0px;
        overflow: hidden;
    }

    .next-to-each {
        display: flex;
    }

    .spaced {
        padding-left: 10px;
    }
    .item-val {
        font-weight: 600;
    }

    #cat-divs {
        float: left;
        text-align: left;
    }
    #del-but-div {
        overflow: hidden;
        margin: 5px;
    }

    button {
        background-color: #a06645;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #843c38;
    }
</style>