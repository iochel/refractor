<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class DatabaseFactory {
    public static function createConnection(): mysqli {
        require $_SERVER["DOCUMENT_ROOT"] . '/expertsystem-psychologist/config/database.php';
        return $conn;
    }
}

class UserFactory {
    public static function getUserData($email, $conn) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['fk-user-id'] = $row['user_id'];
            }
        } else {
            echo "User not found in the database.";
        }
    }
}

class ResultFactory {
    public static function getResults($user_id, $conn) {
        $stmt = $conn->prepare("SELECT * FROM result WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultsArray = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultsArray[] = $row;
            }
        }

        return $resultsArray;
    }
}

if (isset($_SESSION['email'])) {
    $conn = DatabaseFactory::createConnection();
    $email = $_SESSION['email'];
    UserFactory::getUserData($email, $conn);
    $user_id = $_SESSION['fk-user-id'];
    $resultsArray = ResultFactory::getResults($user_id, $conn);
} else {
    echo "Email not found in the session.";
}
?>
