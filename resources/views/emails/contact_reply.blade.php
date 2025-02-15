<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Email</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <div style="max-width: 600px; background: white; padding: 25px; border-radius: 10px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); margin: auto;">
        
        <h2 style="color: #007bff; text-align: center; font-size: 24px; margin-bottom: 10px;">
            🌟 Hello, Sir! 🌟
        </h2>
        <h3 style="color: #333; text-align: center; font-size: 20px; margin-top: 0;">
            We Appreciate Your Message! 💬
        </h3>

        <p style="color: #555; line-height: 1.6; text-align: center;">
            Thank you for reaching out! Your message means a lot to us. We hope our response helps to address your curiosity.
        </p>

        <div style="background: #f8f8f8; padding: 15px; border-left: 4px solid #007bff; margin: 20px 0; border-radius: 5px;">
            <p style="color: #333; font-style: italic; text-align: center;"> 
                “{{ $mailData['message'] }}”
            </p>
        </div>

        <p style="color: #555; text-align: center;">
            If this is urgent, feel free to contact us directly. We’re here to help! 🚀
        </p>

        <div style="text-align: center; margin-top: 20px;">
            <a href="mailto:support@yourapp.com" style="background: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                📩 Contact Support
            </a>
        </div>

        <br>
        <p style="color: #777; text-align: center; font-size: 14px;">
            Best Regards, <br> 
            <strong>{{ config('app.name') }}</strong>
        </p>
    </div>
</body>
</html>
