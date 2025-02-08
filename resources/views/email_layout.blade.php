<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Job Alert</title>
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
        .job-card {
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
        .job-description {
            font-size: 14px;
            color: #777;
            margin: 10px 0;
        }
        .apply-btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background: #28a745;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .show-more {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        .show-more a {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background: #28a745;
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
            .job-card {
                padding: 10px;
            }
            .apply-btn, .show-more a {
                font-size: 14px;
                padding: 8px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section with Logo -->
        <div class="header">
            <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Company Logo" class="logo">
        </div>

        <!-- Email Content -->
        <div class="content">
            <p>Hi {{ $name }},</p>
            <p>A new job matching your skills has been posted:</p>

            <!-- Job Card -->
            <div class="job-card">
                <p class="job-title">{{ $job }}</p>
                <p class="company-name">{{ $company }}</p>
                <p class="job-description">{{ \Illuminate\Support\Str::limit($job_description, 100, '...') }}</p>
                <a href="{{ route('job.show',[$job_id, $job_slug]) }}" class="apply-btn">View Job</a>
            </div>

            <!-- Show More Jobs Button -->
            <div class="show-more">
                <a href="{{ route('alljobs') }}">Show More Jobs</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for using our platform!<br> Job Portal Team</p>
        </div>
    </div>
</body>
</html>
