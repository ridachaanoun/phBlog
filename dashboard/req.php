<?php

require './test.php';

header('Access-Control-Allow-Methods: POST');

// Get the request data
$data = json_decode(file_get_contents("php://input"));

// Validate the request data
if (!isset($data->role_name)) {
    echo json_encode(["error" => "Invalid request data"]);
    exit;
}

$role_name = $data->role_name;

try {
    // Query to insert a new role
    $stmt = $pdo->prepare("INSERT INTO role (role_name) VALUES (?)");
    $stmt->execute([$role_name]);

    // Output a success message
    echo json_encode(["message" => "Role created successfully"]);

} catch (PDOException $e) {
    // Handle database connection or query errors
    echo json_encode(["error" => $e->getMessage()]);
}

?>
