<!DOCTYPE html>
<html>
<head>
    <title>Fresh Threads - Checkout</title>
    <meta charset="UTF-8">
    <meta name="description" content="Buy t-shirts and clothing at Fresh Threads">
    <meta name="keywords" content="T-Shirts, Clothing, Shop, Fresh Threads">
    <meta name="author" content="Chris Eddy, Cody Bergin, Colton Askew, Jeevenn Sangara">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/checkout.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120597001-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-120597001-1');
    </script>
</head>
<body onload="loadCheckoutItems()">

<?php

require_once('../../stripe-php-6.7.4/init.php');
\Stripe\Stripe::setApiKey('sk_test_WYkbIbCufD36ZWcLpOJij4RN');
$charge = \Stripe\Charge::create(['amount' => 2000, 'currency' => 'usd', 'source' => 'tok_189fqt2eZvKYlo2CTGBeg6Uq']);
echo $charge;

?>
    <div id="content">
    <?php include '../shop/navbarShop.php' ?>
        <div class="row" id="cartTools">
            <?php include './loadCheckoutTools.php' ?>
        </div>
        <div id="checkoutItems">
        </div>
    <?php include '../common/footer.html' ?>

    <script>
        function loadCheckoutItems() {
            $.ajax({
                type: "POST",
                url: 'loadCheckoutItems.php',
            }).done(function(html){
                document.getElementById("checkoutItems").innerHTML = html;
            })
        }
    </script>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>