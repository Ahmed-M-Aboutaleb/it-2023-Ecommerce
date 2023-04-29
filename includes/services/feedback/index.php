<?php 

include_once $_SERVER["DOCUMENT_ROOT"] .'/includes/functions/validateInput.php';

/*

Name: findFeedbacks()
Description: This function will find all feedbacks in the database.
Parameters: $conn - The database connection.
Version: 1.0

*/

function findFeedbacks($conn) {
    $sql = "SELECT * FROM feedbacks";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: findOneFeedback()
Description: This function will find one feedback in the database.
Parameters: $conn - The database connection. $id - The id of the feedback.
Version: 1.0
    
*/

function findOneFeedback($conn, $id) {
    if(!validateInput($id)) {
        header("Location: feedbacks.php");
        return false;
    }
    $id = validateInput($id);
    $sql = "SELECT * FROM feedbacks WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    $result = $result->fetch_assoc();
    return $result;
}

/*

Name: insertFeedback()
Description: This function will insert a feedback into the database.
Parameters: $conn - The database connection. $name - The name of the feedback. $email - The email of the feedback. $message - The message of the feedback.
Version: 1.0

*/

function insertFeedback($conn, $name, $email, $message, $date) {
    if(!validateInput($name) || !validateInput($email) || !validateInput($message) || !validateInput($date)) {
        return false;
    }
    $name = validateInput($name);
    $email = validateInput($email);
    $message = validateInput($message);
    $date = validateInput($date);
    $sql = "INSERT INTO feedbacks (name, email, feedback, date) VALUES ('$name', '$email', '$message', '$date')";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}

/*

Name: updateFeedback()
Description: This function will update a feedback in the database.
Parameters: $conn - The database connection. $id - The id of the feedback. $name - The name of the feedback. $email - The email of the feedback. $message - The message of the feedback.
Version: 1.0

*/

function updateFeedback($conn, $id, $name, $email, $message, $date) {
    if(!validateInput($id) || !validateInput($name) || !validateInput($email) || !validateInput($message) || !validateInput($date)) {
        header("Location: feedback.php");
        return false;
    }
    $id = validateInput($id);
    $name = validateInput($name);
    $email = validateInput($email);
    $message = validateInput($message);
    $date = validateInput($date);
    $sql = "UPDATE feedbacks SET name = '$name', email = '$email', feedback = '$message', date = '$date' WHERE id = $id";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}

/*

Name: deleteFeedback()
Description: This function will delete an Feedback from the database.
Parameters: $conn - The database connection. $id - The id of the order.
Version: 1.0
    
*/

function deleteFeedback($conn, $id) {
    if(!validateInput($id)) {
        return false;
    }
    $id = validateInput($id);
    $sql = "DELETE FROM feedbacks WHERE id = $id";
    if(!$conn->query($sql)) {
        return false;
    }
    return true;
}

?>