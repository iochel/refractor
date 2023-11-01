<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the 'user_id' is set in the session
if (isset($_SESSION['fk-user-id'])) {
    // Include the database connection
    require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';

    // Get the user ID from the session
    $userid = $_SESSION['fk-user-id'];

    // Prepare and bind the query
    $stmt = $conn->prepare("SELECT * FROM result WHERE user_id = ?");
    $stmt->bind_param("i", $userid);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Close the prepared statement
    $stmt->close();
    // Close the database connection
    $conn->close();
} else {
    // Handle the case when 'fk-user-id' is not set in the session
    echo "User ID not found in the session";
}
?>
