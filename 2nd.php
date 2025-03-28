<?php 

 include 'reusable.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Interface</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f4f4f9;
            color: #333;
        }
        header {
            background: #66bb6a;
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
            color: #66bb6a;
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
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .card h2 {
            margin-top: 0;
            color: #4caf50;
        }
        .card table {
            width: 100%;
            border-collapse: collapse;
        }
        .card table th, .card table td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .card table th {
            background: #f9f9f9;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #66bb6a;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            cursor: pointer;
        }
        button:hover {
            background: #4caf50;
        }
        .reports-list {
            list-style-type: none;
            padding: 0;
        }
        .reports-list li {
            margin-bottom: 0.5rem;
        }
        .reports-list li a {
            color: #4caf50;
            text-decoration: none;
        }
        .reports-list li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Doctor Dashboard</h1>
        <button onclick="logout()">Logout</button>
    </header>

    <div class="container">
        <!-- Patient Details Card -->
        <div class="card">
            <h2>Patient Details</h2>
            <table>
                <tr>
                    <th>Patient Name:</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>45</td>
                </tr>
                <tr>
                    <th>Condition:</th>
                    <td>Hypertension</td>
                </tr>
                <tr>
                    <th>Last Visit:</th>
                    <td>2025-03-15</td>
                </tr>
                <tr>
                    <th>Blood Pressure (BP):</th>
                    <td>140/90 mmHg</td>
                </tr>
                <tr>
                    <th>Sugar Levels:</th>
                    <td>180 mg/dL</td>
                </tr>
            </table>
        </div>

        <!-- Previous Scans and Reports -->
        <div class="card">
            <h2>Previous Scans and Reports</h2>
            <ul class="reports-list">
                <li><a href="scan1.pdf" target="_blank">Scan Report - Jan 2025</a></li>
                <li><a href="scan2.pdf" target="_blank">Blood Test Report - Feb 2025</a></li>
                <li><a href="scan3.pdf" target="_blank">MRI Report - March 2025</a></li>
            </ul>
        </div>

        <!-- Update Record Form -->
        <div class="card">
            <h2>Update Patient Record</h2>
            <form onsubmit="updateRecord(event)">
                <div class="form-group">
                    <label for="new-condition">Updated Condition:</label>
                    <input type="text" id="new-condition" name="new-condition" placeholder="Enter updated condition" required>
                </div>
                <div class="form-group">
                    <label for="bp">Blood Pressure (BP):</label>
                    <input type="text" id="bp" name="bp" placeholder="e.g., 120/80 mmHg" required>
                </div>
                <div class="form-group">
                    <label for="sugar-levels">Sugar Levels:</label>
                    <input type="text" id="sugar-levels" name="sugar-levels" placeholder="e.g., 150 mg/dL" required>
                </div>
                <div class="form-group">
                    <label for="doctor-response">Doctor's Response:</label>
                    <textarea id="doctor-response" name="doctor-response" rows="4" placeholder="Enter your response or notes for the patient" required></textarea>
                </div>
                <button type="submit">Update Record</button>
            </form>
        </div>
    </div>

    <script>
        function logout() {
            alert("Logged out successfully.");
            window.location.href = "index.html";
        }

        function updateRecord(event) {
            event.preventDefault();
            const updatedCondition = document.getElementById('new-condition').value;
            const bp = document.getElementById('bp').value;
            const sugarLevels = document.getElementById('sugar-levels').value;
            const doctorResponse = document.getElementById('doctor-response').value;

            // Display confirmation (mock updating the database)
            alert(`Record updated successfully.\n\nUpdated Condition: ${updatedCondition}\nBP: ${bp}\nSugar Levels: ${sugarLevels}\nDoctor's Response: ${doctorResponse}`);
        }
    </script>
</body>
</html>
