<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f3f4f6;
            height: 100vh;
        }
        .success-container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #28a745;
            font-size: 2em;
        }
        ul {
            text-align: left;
            margin: 20px auto;
            padding: 0;
            max-width: 300px;
            list-style: none;
        }
        li {
            background: #f9f9f9;
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .close-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .close-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <h1>Submitted Successfully!</h1>
        <p>Here are your details:</p>
        <ul>
            <li><strong>Full Name:</strong> <?php echo htmlspecialchars($_POST['fullName']); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></li>
            <li><strong>Phone:</strong> <?php echo htmlspecialchars($_POST['phone']); ?></li>
            <li><strong>Date of Birth:</strong> <?php echo htmlspecialchars($_POST['dob']); ?></li>
            <li><strong>Highest Education:</strong> <?php echo htmlspecialchars($_POST['education']); ?></li>
            <li><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($_POST['address'])); ?></li>
        </ul>
        <button class="close-btn" onclick="window.close()">Close</button>
    </div>
</body>
</html>