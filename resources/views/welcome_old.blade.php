<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            text-align: left;
        }
        .content h2 {
            color: #333;
        }
        .content p {
            color: #666;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #55C4CF;
            text-decoration: none;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #55C4CF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Company Logo -->
        <div class="header">
            <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Company Logo">
        </div>

        <!-- Email Content -->
        <div class="content">
            <h2>Dear {{ $user }},</h2>
            <p>We appreciate your interest in the <strong>{{ $job_name }}</strong> position at <strong>{{ $company }}</strong>. After careful consideration, we regret to inform you that we have decided to move forward with another candidate.</p>
            <p>We were truly impressed by your experience and skills, and we encourage you to apply for future opportunities at our company. We will keep your resume on file for any suitable roles in the future.</p>
            <p>We wish you success in your job search and career ahead. Thank you for considering <strong>{{ $company }}</strong> as a potential employer.</p>

            <p>Best regards,</p>
            <p><strong>{{ $hr_name }}</strong><br>
            HR Department<br>
            <strong>{{ $company }}</strong></p>

            <a href="{{ route('alljobs') }}" class="btn">View Other Openings</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Need assistance? <a href="mailto:{{ $hr_email }}">Contact us</a></p>

        </div>
    </div>
</body>
</html>
