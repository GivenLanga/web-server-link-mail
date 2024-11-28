 if(isset($_POST['submit'])) 
    { 
    	$to= "Email address that you want to send textarea text as mail"; 
    	$subject= "Subject for your email"; 
    	$msg= $_POST["value1"]; //textarea value will be send as message here. 
    	$header= "Header for mail" //For example: From: abc@xyz.com 
    	mail($to,$subject,$msg,$header); 
    } 