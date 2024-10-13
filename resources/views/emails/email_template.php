<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        p {
            line-height: 1.6;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Form Submission</h1>
        <p><strong>Name:</strong> <?= htmlspecialchars($formData['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($formData['email']) ?></p>
        <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($formData['message'])) ?></p>
    </div>
</body>
</html>
