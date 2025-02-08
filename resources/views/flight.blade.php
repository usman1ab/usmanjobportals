<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Flight Ticket Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .logo {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            text-align: left;
            font-size: 16px;
            color: #333333;
        }
        .flight-details {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .flight-details p {
            margin: 5px 0;
        }
        .cta-button {
            display: block;
            width: 200px;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin: 20px auto;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #555555;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="header">
            <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Company Logo" class="logo">
        </div>
        <div class="content">
            <p>Dear <strong>{{$name}}</strong>,</p>
            <p>Your flight ticket has been successfully booked. Please find your ticket details below.</p>

         

            <p>Click the button below to download your flight ticket.</p>
            
                @if(isset($filename) && !empty($filename))
            <a href="{{ asset('uploads/avatar/' . $filename) }}" class="cta-button btn btn-primary">Download ticket</a>
            @else
    <p>No ticket available.</p>
@endif
            
            <p>If you have any questions, feel free to contact us.</p>

            <p>Best regards,</p>
            <p><strong>{{$company}}</strong></p>
        </div>
        <div class="footer">
            &copy; 2025 Telantra | All Rights Reserved
        </div>
    </div>

</body>
</html>
