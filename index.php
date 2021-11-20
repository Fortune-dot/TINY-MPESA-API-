<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Lipa na Mpesa</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        body {
            background-color: #FFEBEE
        }

        .card {
            width: 350px;
            background: #4badf7;
            border-radius: 20px;
            border: none
        }

        .circle {
            height: 56px;
            width: 56px;
            line-height: 60px;
            border-radius: 50%;
            background-color: #fff;
            position: relative;
            left: 28px;
            top: 66px;
            -webkit-transition: height .25s ease, width .25s ease;
            transition: height .25s ease, width .25s ease;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .circle i {
            margin-left: 17px;
            color: #4badf7;
            font-size: 20px
        }

        .circle:before,
        .circle:after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-radius: 50%;
            border: 1px solid #fff
        }

        .circle:before {
            -webkit-animation: ripple 2s linear infinite;
            animation: ripple 2s linear infinite
        }

        .circle:after {
            -webkit-animation: ripple 2s linear 1s infinite;
            animation: ripple 2s linear 1s infinite
        }

        @-webkit-keyframes ripple {
            0% {
                -webkit-transform: scale(1)
            }

            75% {
                -webkit-transform: scale(1.75);
                opacity: 1
            }

            100% {
                -webkit-transform: scale(2);
                opacity: 0
            }
        }

        @keyframes ripple {
            0% {
                transform: scale(1)
            }

            75% {
                transform: scale(1.75);
                opacity: 1
            }

            100% {
                transform: scale(2);
                opacity: 0
            }
        }
        .custom{
            border-radius: 40px;
            box-shadow: 1px 1px 1px  black;
            outline: none;
        }

        .button {
            border-radius: 40px;
            cursor: pointer;
            font-size: 30px;
            text-align: center;
            color: #4badf7;
        }
        .custom2{
            border:none;
            width: 220px;
            outline: none;
        }
    </style>
</head>
<?php

if(isset($_POST['submit'])){

    $amount = '100'; //Amount to transact 
    $phonenumber = $_POST['phone-number']; // Phone number paying
    
    $Account_no = 'COMRADE MARKET'; // Enter account number optional
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => $amount,
        'msisdn' => $phonenumber,
        'account_no'=>$Account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: Me3s8tLM8vW' // Replace with your api key
     );
    $info = http_build_query($data);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);
    
    
    if ($msg_resp ->success == 'true') {
        echo "WAIT FOR  STK POP UP🔥";
      } else {
        echo "Transaction Failed";
       
      }
}



?>
<body oncontextmenu='return false' class='snippet-body'>
    <div class="container mt-5 d-flex justify-content-center">
       
        <div class="card p-3">
            <div class="d-flex flex-row align-items-center justify-content-between text-white">
                <div class="d-flex flex-row align-items-center"> <i class="fa fa-angle-left"></i> <span class="ml-2">Contactless Payment</span> </div>
                <div class="image mr-3"> <img src="https://i.imgur.com/0LKZQYM.jpg" class="rounded-circle" width="30" /> </div>
            </div>
            <div class="mt-5 mb-5 d-flex align-items-center justify-content-center">
                <div class="circle"><i class="fa fa-wifi"></i></div>
            </div>
            <div class="mt-5 align-items-center d-flex justify-content-center"> <small class="text-white">Transaction...</small> </div>
            <div class="px-5"> <span class="button mt-3 d-block bg-white p-2">KSH 100.00</span> </div>
            <br>
            <form action="index.php" method="POST">
            <div class="px-5"> <input  class=" d-block custom2 form-control mt-3 bg-white " type="text"  name="phone-number" placeholder="Phone number"></div>
           
            <div class="mt-5 align-items-center d-flex justify-content-center"><button class="btn btn-success  custom bg-lg" type="submit" name="submit">Lipa na Mpesa</button> </div>

        </div>
        </form>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript'></script>
</body>

</html>