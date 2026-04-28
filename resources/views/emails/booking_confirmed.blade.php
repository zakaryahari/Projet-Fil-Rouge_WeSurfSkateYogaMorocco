<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #00aef7 0%, #0066cc 100%);
            color: #ffffff;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #222;
        }
        .success-message {
            background-color: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin-bottom: 30px;
            border-radius: 4px;
            color: #2e7d32;
        }
        .booking-details {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 30px;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #555;
        }
        .detail-value {
            color: #00aef7;
            font-weight: 500;
        }
        .price-row {
            background-color: #ffffff;
            padding: 15px;
            margin-top: 15px;
            border-radius: 4px;
            border: 2px solid #00aef7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total-label {
            font-size: 16px;
            font-weight: bold;
            color: #222;
        }
        .total-price {
            font-size: 24px;
            font-weight: bold;
            color: #00aef7;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        .footer p {
            margin: 10px 0;
            font-size: 13px;
            color: #666;
        }
        .team-signature {
            margin-top: 20px;
            font-weight: 600;
            color: #00aef7;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🏄 Booking Confirmed!</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Hello {{ $booking->user->name }},
            </div>

            <div class="success-message">
                ✓ Your booking with WeSurfSkate Morocco has been confirmed!
            </div>

            <p>Thank you for choosing us for your adventure. Your payment has been successfully processed and your reservation is confirmed.</p>

            <!-- Booking Details -->
            <div class="booking-details">
                <div class="detail-row">
                    <span class="detail-label">Booking ID:</span>
                    <span class="detail-value">#{{ $booking->id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Package:</span>
                    <span class="detail-value">{{ $booking->package->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Check-in:</span>
                    <span class="detail-value">{{ $booking->start_date->format('M d, Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Check-out:</span>
                    <span class="detail-value">{{ $booking->end_date->format('M d, Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Room Type:</span>
                    <span class="detail-value">{{ $booking->room->type }}</span>
                </div>

                <!-- Total Price -->
                <div class="price-row">
                    <span class="total-label">Total Paid:</span>
                    <span class="total-price">€{{ number_format($booking->total_price, 2) }}</span>
                </div>
            </div>

            <p>We're excited to welcome you! Get ready for an unforgettable experience combining world-class surfing, skateboarding, and yoga on the beautiful Moroccan coast.</p>

            <p>If you have any questions or need to make changes to your booking, please don't hesitate to contact us.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="team-signature">
                The WeSurfSkate Morocco Team 🌊🛹🧘
            </div>
            <p>📧 Email: hello@wesurfskateyogamorocco.com</p>
            <p>🌐 www.wesurfskateyogamorocco.com</p>
            <p style="margin-top: 20px; font-size: 11px; color: #999;">
                © {{ date('Y') }} WeSurfSkate Morocco. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
