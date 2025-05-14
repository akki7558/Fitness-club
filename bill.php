<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Payment Page</title>
  <?php include 'head.php';?>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      padding: 20px;
      margin: 0;
    }
    .container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      margin: auto;
    }
    .table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    .table td, .table th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    .table th {
      background-color: #007bff;
      color: white;
    }
    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 16px;
      color: white;
      background-color: #28a745;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #218838;
    }
    .payment-buttons {
      margin-top: 20px;
    }
    .payment-buttons .btn {
      background-color: #007bff;
      margin: 5px;
    }
    .payment-buttons .btn:hover {
      background-color: #0056b3;
    }
    .scanner {
      display: none;
      margin-top: 20px;
    }
    .scanner img {
      width: 200px;
      height: 200px;
    }
  </style>
</head>
<body>
<?php include 'header.php';?>
<?php include 'menu.php';?>

<div class="container">
  <h2>Payment Details</h2>
  <table class="table">
    <tr>
      <td><strong>Name</strong></td>
      <td><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></td>
    </tr>
    <tr>
      <td><strong>Email</strong></td>
      <td><?php echo $_SESSION['email'];?></td>
    </tr>
    <tr>
      <td><strong>Phone</strong></td>
      <td><?php echo $_SESSION['uphone'];?></td>
    </tr>
  </table>
  
  <h3>Order Summary</h3>
  <table class="table">
    <tr>
      <th>Package Name</th>
      <th>Package Price</th>
    </tr>
    <?php
    $total = 0;
    $q = mysqli_query($con, "SELECT * FROM tblpackage, tblcart WHERE tblpackage.pid = tblcart.pid AND tblcart.uid = ".$_SESSION['uid']);
    while ($r = mysqli_fetch_array($q)) {
    ?>
      <tr>
        <td><?php echo $r['pname']; ?></td>
        <td><?php echo $r['pdprice']; ?></td>
      </tr>
    <?php 
      $total += $r['pdprice'];
    } 
    ?>
    <tr>
      <td><strong>Total</strong></td>
      <td><strong><?php echo $total; ?></strong></td>
    </tr>
  </table>

  <div class="payment-buttons">
    <button class="btn" onclick="openScanner('PhonePe')">Pay with PhonePe</button>
    <button class="btn" onclick="openScanner('GPay')">Pay with GPay</button>
    <button class="btn" onclick="openScanner('Paytm')">Pay with Paytm</button>
  </div>

  <div class="scanner" id="scanner">
    <img id="scanner-img" src="" alt="Scanner">
  </div>

  <form method="post">
    <input type="submit" name="btnpay" value="Pay" class="btn">
  </form>
</div>

<script>
  function openScanner(paymentMethod) {
    var scannerImg = document.getElementById('scanner-img');
    var scannerDiv = document.getElementById('scanner');
    
    if (paymentMethod === 'PhonePe') {
      scannerImg.src = 'phone.jpg';
    } else if (paymentMethod === 'GPay') {
      scannerImg.src = 'gpay.jpg';
    } else if (paymentMethod === 'Paytm') {
      scannerImg.src = 'Paytm.jpg';
    }
    
    scannerDiv.style.display = 'block';
  }
</script>

<?php
if (isset($_POST['btnpay'])) {
  mysqli_query($con, "UPDATE tblcart SET paid='1' WHERE paid='0' AND uid=" . $_SESSION['uid']);
  echo '<script>alert("Thank you for booking the package"); window.location.href="thankyou.php";</script>';
}
?>

<?php include 'footer.php';?>
</body>
</html>