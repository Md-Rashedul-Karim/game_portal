<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Message</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
        <tr>
            <td style="background-color: #4a90e2; color: white; text-align: center; padding: 20px;">
                <h2 style="margin: 0;">📩 New Contact Form Message</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p><strong style="color:#333;">👤 Name:</strong> {{ $data['name'] }}</p>
                <p><strong style="color:#333;">🏢 Company:</strong> {{ $data['company'] }}</p>
                <p><strong style="color:#333;">📧 Email:</strong> {{ $data['email'] }}</p>
                <p><strong style="color:#333;">📝 Subject:</strong> {{ $data['subject'] }}</p>
                <p><strong style="color:#333;">💬 Message:</strong></p>
                <div style="background:#f1f1f1; padding: 15px; border-radius: 8px; margin-top: 10px; color:#444;">
                    {{ $data['message'] }}
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 15px; background: #f5f5f5;">
                <p style="margin: 0; color:#666;">🙏 Thank you for contacting us!</p>
            </td>
        </tr>
    </table>
</body>
</html>
