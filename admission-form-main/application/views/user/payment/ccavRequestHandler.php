<html>
    <head>
    <!--<title> Non-Seamless-kit</title>-->
    </head>
    <body>
    <center>

        <?php
       include($_SERVER['DOCUMENT_ROOT'] . '/davb11/assets/ccgateway/Crypto.php');



        $merchant_data = '';
        $payment_data = array(
            'tid'           => '',
            'merchant_id'   => 164442,
            'order_id'      => $orderno,
            'amount'        => $amount,
            'currency'      => 'INR',
            'redirect_url'  => "https://feesclub.co.in/davb11/payment/response",
            'cancel_url'    => "https://feesclub.co.in/davb11/payment/response",
            'language'      => 'EN',
           'billing_name' => $name,
           'billing_email' => $email,
           'billing_address' => 'India',
           'billing_city' => '',
           'billing_state' => '',
           'billing_zip' => '',
           'billing_country' => 'IND',
           'billing_tel' => $contact,
           'delivery_name' => $name,
           'delivery_address' => '',
           'delivery_city' => '',
           'delivery_state' => '',
           'delivery_zip' => '',
           'delivery_country' => '',
           'delivery_tel' => '',
           
            'merchant_param1' => $trans_id,
            'merchant_param2' => $form_no,
            'merchant_param3' => $name,
            'merchant_param4' => $contact,
        );

        $working_key = '85699D1D523F01C354DF11626611227B'; //Shared by CCAVENUES
        $access_code = 'AVUJ76FC73AS41JUSA'; //Shared by CCAVENUES


        foreach ($payment_data as $key => $value){
    $merchant_data.=$key.'='.$value.'&';
  }

//        print_r($merchant_data);

        $encrypted_data = encrypt($merchant_data, $working_key); // Method for encrypting the data.
        ?>
        <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
        <!--<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction ">--> 
            <?php
            echo "<input type=hidden name=encRequest value=$encrypted_data>";
            echo "<input type=hidden name=access_code value=$access_code>";
            ?>
        </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>
</body>
</html>

