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
        }
        .header img {
            max-width: 150px;
        }
        .header-title {
            font-size: 24px;
            font-weight: bold;
            color: #0f7dc2;
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
            background-color: #83c341;
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
            <img src="https://rahaal-theexplorer.com/public/logo-black.png" alt="Rahaal Logo" height="45px">
            <hr>
            <div class="header-title">Your verification code</div>
        </div>
        <div class="content">
            <h4>Hi,</h4>
            <p>
                To complete your request, enter the following verification code:
            </p>
            
            <div class=" text-center" style="justify-content:center; width: 100%; text-align: center;">

                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[0]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[1]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[2]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[3]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[4]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">
                <input type="text" class="form-control text-center" readonly="readonly" value="{{$otp[5]}}"
                    style="width: 50px;background-color: #e3e3e3;font-size:large;color: #0f7dc3;border: 1px solid;">

            </div>

            <div class="divider"></div>

            <div style="text-align: left; font-size: 16px; padding-top: 10px;">

                <p>
                    Please note this is a temparary code and will expired in 5 minutes.if you are facing any issue
                        feel free to contact our support team.
                        
                </p>


            </div>
        </div>
        <div class="footer">
            &copy; {{date('Y')}} Rahaal - The Explorer. All Rights Reserved.
        </div>
    </div>
</body>
</html>
