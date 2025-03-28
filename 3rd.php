<?php 

 include 'reusable.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Interface</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f4f9;
            color: #333;
        }
        header {
            background: #4caf50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }
        header button {
            background: white;
            color: #4caf50;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            cursor: pointer;
        }
        header button:hover {
            background: #e8f5e9;
        }
        .container {
            padding: 2rem;
            max-width: 900px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4caf50;
        }
        .card-content {
            flex-grow: 1;
        }
        .card-content h2 {
            margin: 0 0 0.5rem 0;
            color: #388e3c;
        }
        .card-content p {
            margin: 0.5rem 0;
            line-height: 1.6;
        }
        .card-content button {
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            cursor: pointer;
            margin-top: 1rem;
        }
        .card-content button:hover {
            background: #388e3c;
        }
    </style>
</head>
<body>
    <header>
        <h1>Patient Dashboard</h1>
        <button onclick="logout()">Logout</button>
    </header>

    <div class="container">
        <div class="card">
            <img src="ab.jpg.webp" alt="Doctor Avatar">
            <div class="card-content">
                <h2>Your Health Records</h2>
                <p><strong>Doctor:</strong> Dr. John Doe</p>
                <p><strong>Condition:</strong> Hypertension</p>
                <p><strong>Last Visit:</strong> 2025-03-15</p>
                <button onclick="requestDetails()">Request More Details</button>
            </div>
        </div>

        <div class="card">
            <img src="a1.jpg.webp" alt="Appointment Avatar">
            <div class="card-content">
                <h2>Appointments</h2>
                <p>You have no upcoming appointments.</p>
                <button onclick="bookAppointment()">Book an Appointment</button>
            </div>
        </div>

        <div class="card">
            <img src="aa.jpg.webp" alt="Health Tips Avatar">
            <div class="card-content">
                <h2>Health Tips</h2>
                <p>Stay hydrated and exercise regularly to manage hypertension.</p>
                <p>Maintain a balanced diet rich in fruits and vegetables.</p>
            </div>
        </div>
    </div>

    <script>
        function logout() {
            alert("Logged out successfully.");
            window.location.href = "index.html";
        }

        function requestDetails() {
            alert("Your request for more details has been sent to the doctor.");
        }

        function bookAppointment() {
            alert("Redirecting to appointment booking page...");
            window.location.href = "book-appointment.html";
        }
    </script>
</body>
</html>
