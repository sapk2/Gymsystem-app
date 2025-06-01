<!DOCTYPE html>
<html>
<head>
    <title>Subscription Expiry Reminder</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $member->user->name }},</h2>

    <p>
        We hope you're enjoying your fitness journey with us!
    </p>

    <p>
        This is a friendly reminder that your gym subscription plan <strong>{{ $member->plan->name }}</strong> is set to expire on 
        <strong>{{ \Carbon\Carbon::parse($member->expirydate)->format('F d, Y') }}</strong>.
    </p>

    <p>
        You currently have <strong>10 days</strong> remaining in your subscription. To avoid any interruption in your access to facilities and training, we encourage you to renew your subscription before it expires.
    </p>

    <p>
        <a href="#" style="display:inline-block; padding:10px 20px; background-color:#1e40af; color:white; text-decoration:none; border-radius:5px;">
            Renew Subscription Now
        </a>
    </p>

    <p>
        If you have already renewed your plan, please disregard this message.
    </p>

    <hr>

    <p>
        <strong>Need Assistance?</strong><br>
        If you have any questions or need help with the renewal process, feel free to contact us:
    </p>

    <ul>
        <li>Email: <a href="mailto:support@gymexample.com">support@gymexample.com</a></li>
        <li>Phone: +977-9800000000</li>
        <li>Visit: Our front desk during working hours</li>
    </ul>

    <p>Thank you for being a valued member of our gym community. We look forward to supporting your fitness goals!</p>

    <p>Best regards,<br><strong>The Gym Management Team</strong></p>
</body>
</html>

