<?php
  
  $phone = '254'.substr($_POST['phone'], 1);
  $amount = $_POST["amount"];


  // our file
  $confirmation_url ="https://f3f8ba70.ngrok.io/mpesa/confirmation.php?token=c9b10b9a7b1f4ff9824743cc741eaea29c4e5e8880502bab86f5e87b1b1d6e7c$";
  $validation_url   ="https://f3f8ba70.ngrok.io/lians/confirmation.php";

  $stk_request_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  $outh_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';


  $safaricom_pass_key = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
  $safaricom_party_b = "174379";
  $safaricom_bussiness_short_code = "174379";

  $safaricom_Auth_key = "hAVnRxa2UOjyAnydVJMG31A0OuDDCxm5";
  $safaricom_Secret = "UcpmdCdI8bAakdgm";



  $outh = $safaricom_Auth_key . ':' . $safaricom_Secret;


  $curl_outh = curl_init($outh_url);
  curl_setopt($curl_outh, CURLOPT_RETURNTRANSFER, 1);

  $credentials = base64_encode($outh);
  curl_setopt($curl_outh, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
  curl_setopt($curl_outh, CURLOPT_HEADER, false);
  curl_setopt($curl_outh, CURLOPT_SSL_VERIFYPEER, false);

  $curl_outh_response = curl_exec($curl_outh);

  $json = json_decode($curl_outh_response, true);


  $time = date("YmdHis", time());

  $password = $safaricom_bussiness_short_code . $safaricom_pass_key . $time;


  $curl_stk = curl_init();
  curl_setopt($curl_stk, CURLOPT_URL, $stk_request_url);
  curl_setopt($curl_stk, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $json['access_token'])); //setting custom header


  $curl_post_data = array(

    'BusinessShortCode' => '174379',
    'Password' => base64_encode($password),
    'Timestamp' => $time,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $phone,
    'PartyB' => '174379',
    'PhoneNumber' => $phone,
    'CallBackURL' => $confirmation_url,
    'AccountReference' => 'Mojes payment',
    'TransactionDesc' => ' Pay'
  );


  $data_string = json_encode($curl_post_data);

  curl_setopt($curl_stk, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl_stk, CURLOPT_POST, true);
  curl_setopt($curl_stk, CURLOPT_HEADER, false);
  curl_setopt($curl_stk, CURLOPT_POSTFIELDS, $data_string);

  $curl_stk_response = curl_exec($curl_stk);
   $obj=json_decode($curl_stk_response);

  // echo $curl_stk_response;

error_reporting(0);
  $ResponseCode =$obj->{'ResponseCode'};
  if ($ResponseCode == '0') {
    // echo "Working whala inserted into mpesa_payments";
    header('Location: ../add-vehicle.php');
  }

  else{
    // echo "Failed. Kindly send ". $amount ." to 174379 to load your wallet.";
    echo "<script>alert('Something went Wrong... Please try again later'); window.open('index.php','_self')</script>";
    // include('../add-vehicle.php');
  }

?>