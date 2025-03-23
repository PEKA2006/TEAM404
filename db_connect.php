<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "html";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($username) && !empty($email) && !empty($age) && !empty($password)) {
        // Hash the password before saving
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert into database
        $sql = "INSERT INTO users (username, email, age, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $username, $email, $age, $password);

        if ($stmt->execute()) {
            // Show alert and redirect to login page
            echo "<script>
                alert('Registration Successful!');
                window.location.href = 'index.php'; // Redirect to login page
            </script>";
            exit();
        } else {
            echo "<script>alert('Error: Unable to register.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}

?>
