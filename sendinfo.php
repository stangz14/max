

<?php



	if(isset($_GET['longitude'])){
		$test = $_GET['longitude'];
		echo $test;

		}

    if (isset($_POST['submit'])  || isset($_GET['longitude'])) {
		$lotitude = $_GET['longitude'];
		// $latitude = $_GET['latitude'];
        // $po= $_GET['gps'];
        $sToken ="CrAQMqtFnxHLzF7spOBguEZ7CqmrLY0Z0ITnc4uOxgD";
	    $sMessage = " ช่วยกู!!!!  $lotitude";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

    if ($result){
        $_SESSION['success'] = "แจ้งกู้กัยแล้ว...";
        header("location: index.php");
    } else {
        $_SESSION['error'] = "แจ้งผิดพลาด";
        header("location: index.php");
    }

	//Result error 
	// if(curl_error($chOne)) 
	// { 
	// 	echo 'error:' . curl_error($chOne); 
	// } 
	// else { 
	// 	$result_ = json_decode($result, true); 
	// 	echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	// } 
	// curl_close( $chOne );   

    
    }





?>