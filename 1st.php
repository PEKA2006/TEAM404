
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Are You a Doctor?</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #333;
        }
        .selection-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
            text-align: center;
        }
        .selection-container h1 {
            margin-bottom: 1.5rem;
            font-size: 2.2rem;
            font-weight: 600;
            color: #4a4a4a;
        }
        .selection-container p {
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
            color: #666;
        }
        .selection-container button {
            background: linear-gradient(135deg, #81c784, #66bb6a);
            color: #ffffff;
            border: none;
            border-radius: 25px;
            padding: 0.8rem 2.2rem;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .selection-container button:hover {
            background: linear-gradient(135deg, #66bb6a, #81c784);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
        .selection-container .link-button {
            background: none;
            border: none;
            color: #4caf50;
            text-decoration: underline;
            cursor: pointer;
            font-size: 0.9rem;
            margin-top: 1rem;
        }
        .selection-container .link-button:hover {
            color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="selection-container">
        <h1>Are You a Doctor?</h1>
        <p>Please select your role to proceed to the appropriate interface.</p>
        <button onclick="window.location.href='doctor-login.html'">Yes, I am a Doctor</button>
        <button onclick="window.location.href='patient-login.html'">No, I am a Patient</button>
        <p>Don't have an account? <button class="link-button" onclick="window.location.href='signup.html'">Sign Up</button></p>
    </div>
</body>
</html>


