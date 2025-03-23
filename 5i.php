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
            display: flex;
            align-items: center;
            gap: 10px;
        }
        header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
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
        .card, .form-card, .chart-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .card {
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
        .form-card h2, .chart-card h2 {
            margin-bottom: 1rem;
            color: #388e3c;
        }
        .form-card label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-card input[type="file"], .form-card textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-card button {
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            cursor: pointer;
        }
        .form-card button:hover {
            background: #388e3c;
        }
        canvas {
            width: 100% !important;
            max-height: 300px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>
            <img src="image.png" alt="Patient Avatar">
            Patient Dashboard
        </h1>
        <button onclick="logout()">Logout</button>
    </header>

    <div class="container">
        <div class="card">
            <img src="bc.jpg.webp" alt="Doctor Avatar">
            <div class="card-content">
                <h2>Your Health Records</h2>
                <p><strong>Doctor:</strong> Dr. John Doe</p>
                <p><strong>Condition:</strong> Hypertension</p>
                <p><strong>Last Visit:</strong> 2025-03-15</p>
                <p><strong>Blood Pressure:</strong> 120/80 mmHg</p>
                <p><strong>Sugar Levels:</strong> 110 mg/dL (fasting)</p>
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

        <div class="chart-card">
            <h2>Health Tracker</h2>
            <canvas id="healthChart"></canvas>
        </div>

        <div class="form-card">
            <h2>Submit Medical History</h2>
            <form id="medical-history-form">
                <label for="medical-files">Upload Medical Files:</label>
                <input type="file" id="medical-files" multiple>

                <label for="symptoms">Describe Your Symptoms:</label>
                <textarea id="symptoms" rows="4" placeholder="Describe your symptoms..."></textarea>

                <button type="button" onclick="submitMedicalHistory()">Submit</button>
            </form>
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

        function submitMedicalHistory() {
            const files = document.getElementById("medical-files").files;
            const symptoms = document.getElementById("symptoms").value;

            if (files.length === 0 || symptoms.trim() === "") {
                alert("Please upload medical files and describe your symptoms before submitting.");
                return;
            }

            alert("Your medical history and symptoms have been submitted successfully.");
        }

        const ctx = document.getElementById('healthChart').getContext('2d');
        const healthChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Blood Pressure (mmHg)',
                        data: [120, 125, 130, 128, 126, 124],
                        borderColor: '#4caf50',
                        backgroundColor: 'rgba(76, 175, 80, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    },
                    {
                        label: 'Sugar Levels (mg/dL)',
                        data: [100, 110, 105, 115, 120, 110],
                        borderColor: '#ff5722',
                        backgroundColor: 'rgba(255, 87, 34, 0.2)',
                        borderWidth: 2,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</body>
</html>
