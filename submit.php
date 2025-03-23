<?php
error_reporting(E_ALL);

$host = 'localhost';
$db_name = 'html'; // Change this to your actual DB name
$user = 'root';
$pass = '';

try {
    // Establish PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the request is a POST and is an Ajax request
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        
        // Define the required parameters
        $requiredParams = [
            'name', 'age', 'gender', 'bp', 'sugar', 'reports', 'doctor', 'date', 'time'
        ];

        // Check if all required parameters are provided
        foreach ($requiredParams as $param) {
            if (!isset($_POST[$param]) && !isset($_FILES[$param])) {
                $response = ['success' => false, 'message' => 'Required parameter missing: ' . $param];
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }

        // Extract form data
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $bp = $_POST['bp'];
        $sugar = $_POST['sugar'];
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        // Medical reports file handling
        $medicalReports = $_FILES['reports'];
        $reportFileName = "";
        if ($medicalReports['error'] == 0) {
            $reportFileName = $medicalReports['name'];
            $uploadDir = "uploads/"; // Make sure this folder is writable
            move_uploaded_file($medicalReports['tmp_name'], $uploadDir . $reportFileName);
        }

        // Prepare SQL query to insert the data
        $sql = "INSERT INTO patients (name, age, gender, bp, sugar, doctor, date, time, reports)
                VALUES (:name, :age, :gender, :bp, :sugar, :doctor, :date, :time, :reports)";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':bp', $bp);
        $stmt->bindParam(':sugar', $sugar);
        $stmt->bindParam(':doctor', $doctor);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':reports', $reportFileName); // Store the file name in the database

        // Execute the query
        if ($stmt->execute()) {
            $response = ['success' => true, 'message' => 'Patient data submitted successfully!'];
        } else {
            $response = ['success' => false, 'message' => 'Error: Could not insert the data into the database.'];
        }

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();

    } else {
        $response = ['success' => false, 'message' => 'Invalid request.'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

} catch (PDOException $e) {
    $response = ['success' => false, 'message' => 'Connection failed: ' . $e->getMessage()];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
