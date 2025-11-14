<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Me</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            background-color: #03334f !important;
        }
        .header img {
            max-width: 150px;
        }
        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-top: 30px;
        }
        .content {
            font-size: 16px;
            color: #000;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #ffffff;
            background-color: #03334f;
            padding: 12px 0px;
        }
        a {
            text-decoration: none;
            font-weight: 600;
            color: #0f7dc2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://gulfrealty.ae/wp-content/uploads/new-logo-destop-view-e1693218580296.png" alt="GulfRealty Logo" height="60px">
            <hr>
            <div class="header-title">New Enquiry Received!</div>
            <br>
        </div>
        <div class="content">
            <p>Dear <strong>Team</strong>,</p>
            <p style="margin-bottom: 0;">
                Enquiry Details:
            </p>
            <p style="margin-top:0;">
                <strong>Name: </strong>{{$name}}<br>
                
                @if(!empty($phone))
                    <strong>Phone:</strong>{{$phone}}<br>
                @endif
                
                <strong>Email: </strong>{{$email}}<br>
                
                @if(!empty($property_name))
                    <strong>Intrested in Property: </strong>{{$property_name}}<br>
                @endif
                
                @if(!empty($description))
                    <strong>Message:</strong><br>
                    {{$description}}
                @endif
            </p>
        </div>
        <div class="footer">
            &copy; {{date('Y')}} GulfRealty. All Rights Reserved.
        </div>
    </div>
</body>
</html>
