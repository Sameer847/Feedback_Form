<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die(json_encode(array("success" => false, "message" => "Connection failed: " . $conn->connect_error)));
    }

    // Prepare SQL statement to insert feedback data into cust_feedback table
    $sql = "INSERT INTO cust_feedback (customer_name, customer_email, customer_mobile, rating_assistance, rating_environment, rating_pricing, rating_recommend, rating_purchase, submission_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiiii", $customer_name, $customer_email, $customer_mobile, $rating_assistance, $rating_environment, $rating_pricing, $rating_recommend, $rating_purchase);


    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobile = $_POST['customer_mobile'];
    $rating_assistance = $_POST['rating1']; 
    $rating_environment = $_POST['rating2']; 
    $rating_pricing = $_POST['rating3']; 
    $rating_recommend = $_POST['rating4'];
    $rating_purchase = $_POST['rating5']; 


    if ($stmt->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error));
    }

    $stmt->close();
    $conn->close();
} else {

    http_response_code(405);
    echo json_encode(array("success" => false, "message" => "Method Not Allowed"));
}
?>
