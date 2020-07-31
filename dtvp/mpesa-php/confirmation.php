    <?php

    include 'dbconnect.php';
    header("Content-Type:application/json");

    if (!isset($_GET["token"]))
    {
        echo "Technical error";
        exit();
    }

    if ($_GET["token"]!='c9b10b9a7b1f4ff9824743cc741eaea29c4e5e8880502bab86f5e87b1b1d6e7c$')
    {
        echo "Invalid authorization";
        exit();
    }

    $request=file_get_contents('php://input');

    $datex = date("d/m/Y");
    $timex = date('H:i:s');

   file_put_contents("mpesa_logs.log", $array['TransID']." Confirmed. Ksh ".$array['TransAmount']." received from ".$array['FirstName']." ".$array['MiddleName']." ".$array['LastName']." ".$array['MSISDN']." on ".$datex." at ".$timex." New M-PESA balance is ".$array['OrgAccountBalance'].PHP_EOL , FILE_APPEND | LOCK_EX);
   

    //Put the json string that we received from Safaricom to an array
    $array             = json_decode($request, true);
    $transactiontype   = mysqli_real_escape_string($con,$array['TransactionType']); 
    $transid           = mysqli_real_escape_string($con,$array['TransID']); 
    $transtime         = mysqli_real_escape_string($con,$array['TransTime']); 
    $transamount       = mysqli_real_escape_string($con,$array['TransAmount']); 
    $businessshortcode = mysqli_real_escape_string($con,$array['BusinessShortCode']); 
    $billrefno         = mysqli_real_escape_string($con,$array['BillRefNumber']); 
    $invoiceno         = mysqli_real_escape_string($con,$array['InvoiceNumber']); 
    $msisdn            = mysqli_real_escape_string($con,$array['MSISDN']); 
    $orgaccountbalance = mysqli_real_escape_string($con,$array['OrgAccountBalance']); 
    $firstname         = mysqli_real_escape_string($con,$array['FirstName']); 
    $middlename        = mysqli_real_escape_string($con,$array['MiddleName']); 
    $lastname          = mysqli_real_escape_string($con,$array['LastName']); 
     

 


if (!empty($msisdn)) { 

    $sql="INSERT INTO mpesa_payments
    ( 
    TransactionType,
    TransID,
    TransTime,
    TransAmount,
    BusinessShortCode,
    BillRefNumber,
    InvoiceNumber,
    MSISDN,
    FirstName,
    MiddleName,
    LastName,
    OrgAccountBalance
    )  
    VALUES  
    ( 
    '$transactiontype', 
    '$transid', 
    '$transtime', 
    '$transamount', 
    '$businessshortcode', 
    '$billrefno', 
    '$invoiceno', 
    '$msisdn',
    '$firstname', 
    '$middlename', 
    '$lastname', 
    '$orgaccountbalance' 
    )";

     
   $succes = mysqli_query($con,$sql);
    if ($succes) {
        echo "worked";
    }
    mysqli_close($con); 

}
?>