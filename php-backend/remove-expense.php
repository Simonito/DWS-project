<?php

require 'vendor/autoload.php';

require __DIR__ . '/dbactions/delete-expense.php';

require __DIR__ . '/session/session.php';

use Ramsey\Uuid\Uuid;

// SUBMIT EXPENSE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $expense_id = $_POST['expense_id'];

    header('Content-Type: application/json');

    // just perform the deletion
    // ideally we would check the cookie and verify the session and also if the 
    // given expense is associated with that user, but in this simple app we dont care
    delete_expense($expense_id);

    http_response_code(200);
    $response = [
        'status' => 'resource deleted successfully',
        'code' => 200,
        'message' => 'Expense deleted successfully',
    ];
    echo json_encode($response);
}
