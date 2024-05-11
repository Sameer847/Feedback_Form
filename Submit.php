<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback_new";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die(json_encode(array("success" => false, "message" => "Connection failed: " . $conn->connect_error)));
    }

    // Extract data from POST request
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobile = $_POST['customer_mobile'];
    $branch_location = $_POST['dummy_selector'];
    $rating_assistance = $_POST['rating1'];
    $rating_environment = $_POST['rating2'];
    $rating_pricing = $_POST['rating3'];
    $rating_recommend = $_POST['rating4'];
    $rating_purchase = $_POST['rating5'];

    // Insert data into Branch table if not already exists
    $branchID = null;
    $checkBranch = $conn->prepare("SELECT BranchID FROM Branch WHERE BranchName = ?");
    $checkBranch->bind_param("s", $branch_location);
    $checkBranch->execute();
    $checkBranch->store_result();

    if ($checkBranch->num_rows > 0) {
        $checkBranch->bind_result($branchID);
        $checkBranch->fetch();
    } else {
        // Insert new branch
        $insertBranch = $conn->prepare("INSERT INTO Branch (BranchName) VALUES (?)");
        $insertBranch->bind_param("s", $branch_location);
        $insertBranch->execute();
        $branchID = $insertBranch->insert_id;
        $insertBranch->close();
    }
    $checkBranch->close();

    // Insert data into Customer table
    $stmtCustomer = $conn->prepare("INSERT INTO Customer (customer_name, customer_email, customer_mobile, BranchID) VALUES (?, ?, ?, ?)");
    $stmtCustomer->bind_param("sssi", $customer_name, $customer_email, $customer_mobile, $branchID);
    $stmtCustomer->execute();

    if ($stmtCustomer->affected_rows > 0) {
        $customerID = $stmtCustomer->insert_id;

        // Insert data into Cust_Feedback table
        $stmtFeedback = $conn->prepare("INSERT INTO Cust_Feedback (CustomerID, BranchID, rating_assistance, rating_environment, rating_pricing, rating_recommend, rating_purchase, submission_date) VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_DATE())");
        $stmtFeedback->bind_param("iiiiiii", $customerID, $branchID, $rating_assistance, $rating_environment, $rating_pricing, $rating_recommend, $rating_purchase);
        $stmtFeedback->execute();

        if ($stmtFeedback->affected_rows > 0) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "message" => "Failed to submit feedback"));
        }

        $stmtFeedback->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to insert customer data"));
    }

    $stmtCustomer->close();
    $conn->close();
} else {
    // If the request method is not POST, return Method Not Allowed response
    http_response_code(405);
    echo json_encode(array("success" => false, "message" => "Method Not Allowed"));
}
?>
