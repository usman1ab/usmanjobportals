<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interview Schedule Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #dddddd;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            padding-bottom: 15px;
        }
        .logo {
            max-width: 150px;
        }
        .content {
            padding: 20px;
            text-align: left;
            font-size: 16px;
            color: #333;
        }
        .interview-details {
            background: #f8f9fa;
            border-left: 5px solid #007bff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .job-title {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }
        .company-name {
            font-size: 16px;
            color: #555;
        }
        .details {
            font-size: 14px;
            color: #777;
            margin: 10px 0;
        }
        .join-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 15px;
            color: white;
            background: #007bff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
            color: #777;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        /* Responsive */
        @media (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 15px;
            }
            .interview-details {
                padding: 10px;
            }
            .join-btn {
                font-size: 14px;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="header">
            <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Company Logo" class="logo">
        </div>

        <!-- Email Content -->
        <div class="content">
            <p>Dear {{ $user_name }},</p>
            <p>We are pleased to inform you that your interview has been scheduled for the following position:</p>

            <!-- Interview Details Card -->
            <div class="interview-details">
                <p class="job-title">{{ $job }}</p>
                <p class="company-name">{{ $company }}</p>
                <p class="details"><strong>Position:</strong> {{ $position }}</p>
                <p class="details"><strong>Date & Time:</strong> {{ $date_time }}</p>
                <p class="details"><strong>Location:</strong> {{ $location ? $location : 'Virtual' }}</p>
                
                <!-- Conditional Meeting Link -->
                @if($link)
                    <p class="details"><strong>Meeting Link:</strong> <a href="{{ $link }}" target="_blank">{{ $link }}</a></p>
                    <a href="{{ $link }}" class="join-btn">Join Interview</a>
                @endif
            </div>

            <p>If you have any questions or need to reschedule, please contact us at <a href="mailto:{{ $email }}">{{ $email }}</a>.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Best Regards,<br> {{ $company }}</p>
        </div>
    </div>
</body>
</html>
