<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Agreement Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Donation Agreement Summary</h1>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Personal Information</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600"><strong>Full Name:</strong> {{ $donationAgreement->full_name }}</p>
                <p class="text-sm text-gray-600"><strong>Email Address:</strong> {{ $donationAgreement->email_address }}</p>
                <p class="text-sm text-gray-600"><strong>Phone Number:</strong> {{ $donationAgreement->phone_number }}</p>
                <p class="text-sm text-gray-600"><strong>Address:</strong> {{ $donationAgreement->address }}</p>
            </div>
        </div>
    
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Donation Details</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600"><strong>Donation Type:</strong> {{ $donationAgreement->donation_type }}</p>
                <p class="text-sm text-gray-600"><strong>Donation Amount (USD):</strong> {{ $donationAgreement->donation_amount }}</p>
                <p class="text-sm text-gray-600"><strong>Recurring Interval:</strong> {{ $donationAgreement->recurring_interval }}</p>
            </div>
        </div>
    
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Bank Information</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600"><strong>Bank Name:</strong> {{ $donationAgreement->bank_name }}</p>
                <p class="text-sm text-gray-600"><strong>Account Number:</strong> {{ $donationAgreement->account_number }}</p>
                <p class="text-sm text-gray-600"><strong>Account Holder Name:</strong> {{ $donationAgreement->account_holder_name }}</p>
            </div>
        </div>
    
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Agreement</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600">
                    I hereby agree to contribute the specified amount to support the elderly through this organization. I understand that:
                </p>
                <ul class="list-disc pl-5 text-sm text-gray-600">
                    <li>The donation amount will be automatically deducted from my account according to the selected interval</li>
                    <li>I will be notified of any changes to the donation process</li>
                    <li>I can cancel my support by providing 30 days notice</li>
                    <li>The organization will use my contribution responsibly and ethically</li>
                </ul>
            </div>
        </div>
    
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Additional Comments</h2>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600">{{ $donationAgreement->additional_comments }}</p>
            </div>
        </div>
    </div>
    </body>
    </html>
    