<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <!-- Include jQuery only once -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            text-align: center;
        }
        .container {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #388e3c;
            margin-bottom: 1rem;
        }
        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }
        input, select, textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            background: #4caf50;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 20px;
            cursor: pointer;
            font-size: 1rem;
        }
        button:hover {
            background: #388e3c;
        }
    </style>
</head>
<body>
    <header>
        <h1>Patient Dashboard</h1>
    </header>

    <div class="container">
        <h2>Submit Your Details</h2>
        <form id="patientForm" enctype="multipart/form-data">
            <!-- Personal Information -->
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" placeholder="Enter your age" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <!-- Health Information -->
            <h3>Health Information</h3>
            <label for="concerns">Current Health Concerns</label>
            <textarea id="concerns" name="concerns" rows="4" placeholder="Describe your health concerns..."></textarea>

            <label for="bp">Blood Pressure (mmHg)</label>
            <input type="text" id="bp" name="bp" placeholder="Enter your BP (e.g., 120/80)" required>

            <label for="sugar">Sugar Levels (mg/dL)</label>
            <input type="number" id="sugar" name="sugar" placeholder="Enter your sugar level" required>

            <!-- Medical History -->
            <h3>Medical History</h3>
            <label for="reports">Upload Medical Reports</label>
            <input type="file" id="reports" name="reports" multiple>

            <label for="notes">Notes or Previous Treatments</label>
            <textarea id="notes" name="notes" rows="4" placeholder="Add any additional information..."></textarea>

            <!-- Appointment Preferences -->
            <h3>Appointment Preferences</h3>
            <label for="doctor">Preferred Doctor</label>
            <input type="text" id="doctor" name="doctor" required>

            <label for="date">Preferred Appointment Date</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Preferred Appointment Time</label>
            <input type="time" id="time" name="time" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#patientForm').on('submit', function(event) {
                event.preventDefault(); // Prevent form from submitting normally

                // Create a FormData object to handle file uploads and other data
                var formData = new FormData(this);

                // AJAX request to submit the form data
                $.ajax({
                    url: 'submit.php', // The PHP file that will handle the form submission
                    type: 'POST',
                    data: formData,
                    processData: false, // Don't process the data
                    contentType: false, // Don't set content type for file upload
                    success: function(response) {
                        // Check the response for success
                        if (response.success) {
                            alert("Form submitted successfully!");
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors in AJAX request
                        alert("There was an error submitting the form. Please try again.");
                        console.error(xhr, status, error);
                    }
                });
            });
        });
    </script>
</body>
</html>
