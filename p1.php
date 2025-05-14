<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
            text-align: center;
            width: 300px;
        }
        .payment-options button, .confirm-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .payment-options button:hover, .confirm-button:hover {
            background-color: #0056b3;
        }
        .hidden {
            display: none;
        }
        #qr-section img {
            width: 150px;
            margin-top: 10px;
        }
        .confirm-button {
            background-color: #28a745;
        }
        .confirm-button:hover {
            background-color: #218838;
        }
        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #333;
            color: white;
        }
        form input::placeholder {
            color: #bbb;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Payment Method</h2>
        <div class="payment-options">
            <button onclick="showQR('phone.jpg')">PhonePe</button>
            <button onclick="showQR('gpay.jpg')">Google Pay</button>
            <button onclick="showQR('paytm.jpg')">Paytm</button>
            <button onclick="showCardForm()">Debit Card</button>
        </div>
        
        <div id="qr-section" class="hidden">
            <h3>Scan QR Code</h3>
            <img id="qr-image" src="" alt="QR Code">
            <button class="confirm-button" name="btnpay" onclick="confirmPayment()">Confirm Payment</button>
        </div>
        
        <div id="card-form" class="hidden">
            <h3>Enter Card Details</h3>
            <form action="process_payment.php" method="POST">
                <input type="text" name="card_number" placeholder="Card Number" required>
                <input type="text" name="card_holder" placeholder="Card Holder Name" required>
                <input type="text" name="expiry" placeholder="MM/YY" required>
                <input type="text" name="cvv" placeholder="CVV" required>
                <button type="submit" name="btnpay">Pay Now</button>
            </form>
        </div>
    </div>
    
    <script>
        function showQR(imageSrc) {
            document.getElementById('qr-image').src = imageSrc;
            document.getElementById('qr-section').classList.remove('hidden');
            document.getElementById('card-form').classList.add('hidden');
        }
        function showCardForm() {
            document.getElementById('qr-section').classList.add('hidden');
            document.getElementById('card-form').classList.remove('hidden');
        }
        function confirmPayment() {
            alert("Payment has been successful!");
        }
    </script>
    <?php
   // Include your database connection file
    
    if (isset($_POST['btnpay'])) {
        extract($_POST);
        mysqli_query($con, "UPDATE tblcart SET paid='1' WHERE paid='0' AND uid=" . $_SESSION['uid']);
    }
    ?>

</body>
</html>