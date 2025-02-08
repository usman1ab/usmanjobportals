<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Selection Notification</title>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h2 {
            color: #2c3e50;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #2980b9;
        }
        .button {
            display: inline-block;
            background: #27ae60;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .attachment {
            margin-top: 15px;
            padding: 10px;
            background: #ecf0f1;
            border-radius: 5px;
            display: inline-block;
        }
        .attachment a {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Company Logo -->
    <img src="{{ asset('backend/assets/images/logo.png') }}" alt="Company Logo" class="logo">

    <h2>🎉 Congratulations, <span class="highlight">{{$name}}</span>!</h2>
    <p>We are pleased to inform you that you have been selected for the position of <span class="highlight">{{$job_name}}</span> at <span class="highlight">{{$company}}</span>.</p>

  
    <p><strong>Next Steps:</strong> Please confirm your acceptance by replying to this email before <span class="highlight">[Response Deadline]</span>.</p>

    <!-- Offer Letter Attachment -->
    <div class="attachment">
       @if(isset($file_name) && !empty($file_name))
    📎 Offer Letter: <a href="{{ asset('uploads/avatar/' . $file_name) }}" download>Download Here</a>
@else
    <p>No offer letter available.</p>
@endif

    </div>



    <p>If you have any questions, feel free to reach out to us.</p>

    <p class="footer">Best Regards, <br>
    <strong>{{$name}}</strong> <br>
      {{$company}} | {{$email}} <br></p>
</div>

</body>
</html>
