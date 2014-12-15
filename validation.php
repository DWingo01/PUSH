<!doctype html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css" />
        
<style type="text/css">
.centerbutton{
	margin: 0px auto;
}
#home{
	color:#58585B;
    background-color: rgba(2, 46, 103, 0.9);
    font-family:'bebas_neuebook';
    font-weight: normal;
    font-style: normal;
}
.backButton{
  border-radius: 5px; 
-moz-border-radius: 5px; 
-webkit-border-radius: 5px; 
border: 1px solid #A2783C;
  background-color:#A2783C;
  cursor:pointer;
  font-family: 'bebas_neuebook';
  font-weight: normal;
  line-height: normal;
  position: relative;
  text-decoration: none;
  text-align: center;
  -webkit-appearance: none;
  -webkit-border-radius: 0;
  display: table;
  padding-top: 1rem;
  padding-right: 1rem;
  padding-bottom: 1rem;
  padding-left: 1rem;
  font-size: 1rem;
  /*background-color: #008cba;*/
  color: #EDEEE6;
  webkit-transition: all .5s ease;
-moz-transition: all .5s ease;
-ms-transition: all .5s ease;
-o-transition: all .5s ease;
transition: all .5s ease; 
}
.backButton:hover{
	font-family: 'novecento_sans_widelight';
    font-weight: normal;
    line-height: normal;
	background-color:#C1A37A;
	color: #EDEEE6;
    -webkit-transition: all .5s ease;
	-moz-transition: all .5s ease;
	-ms-transition: all .5s ease;
	-o-transition: all .5s ease;
	transition: all .5s ease;
}
.normal {
	color: #F37333;
	font-size: 2.75rem;
	line-height: 1.4;
	font-family: 'bebas_neuebold';
	font-weight: normal;
}

.validsubtitles {
	font-family: 'bebas_neuebook';
	font-weight: normal;
	color: #F37333;
	font-size: 1.4375rem;
	text-align: center;
}

h1{
	padding-bottom: 9px;
padding-top: 9px;
margin: 30px 0 30px;
text-align: center;
color: #F37333;
font-family: 'bebas_neuebook';
font-weight: normal;
font-size: 2.75rem;
}
</style>
</head>


<body id="home">
<?php

//print "included OK";     // uncomment  to check the page is included in the form



// You should not need to edit anything below here, unless you wish to add or remove form fields
//for your form.

$name 			= 		'';
$email			= 		'';
$message 		= 		'';


if(@$_POST['submitted'])
{
	//create vars from user input
	$name 			= 		@$_POST['name'];
	$email			= 		@$_POST['email'];
	$message 		= 		@$_POST['message'];
 
	
	// if magic quotes on, remove Magic Quotes effect
	if ( get_magic_quotes_gpc() ) 
	{ 
	  $name = stripslashes($name);
	  $email = stripslashes($email);
	  $message = stripslashes($message);
	}
	
	
	//Validate user input. Create error array to store errors
	
	$error_msg =  array();
	
	$valid = verifyAlphaNum($name, 'Write your name here.');
	
	if(!$valid)
	{
		$error_msg[] = 'Please provide a valid name.';
		$name_error = '<span class="error">Name must be letters, numbers, spaces, and dashes only.</span>';
	}
	
	$valid = verifyEmail($email, 'Write your email address');
	
	if(!$valid)
	{
		$error_msg[] = 'Please provide a valid email address.';
		$email_error = '<span class="error">Email must be a valid format (e.g. john@yahoo.com).</span>';
	}
	
	$message = cleanText($message);
	
	if($message == 'Write your message here.')
	{
		$error_msg[] = 'Please provide a valid message.';
		$message_error = "<span class=\"error\">Message can only contain letters, numbers and basic punctuation \" ' - ? ! </span>";
		
	}



	// if no errors, send email
	if(count($error_msg) === 0)
	{

		$headers  = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type: text/html; charset=utf-8"."\r\n";

		/* additional headers */
		$headers .= 'From:' . FROM_ADDRESS ."\r\n";
		$headers .= 'Reply-To:' . REPLY_TO ."\r\n";
		
		//prepare for sending email
		$destination		= 	DESTINATION_EMAIL;
		$subject			= 	MESSAGE_SUBJECT;
		$body				=	"$name \r\n<br/> $email \r\n<br /> $message";

		
		if(mail($destination, $subject, $body, $headers))
		{
		
			// test to see if form data is received.
			echo "<h1><span class='normal'>thanks</span> for providing your insight</h1>";
			echo "<h4 class='validsubtitles'>I have received your message and will get back to you shortly</h4>";
			echo "<a href=\"". REDIRECT_URL ."\" class='backButton centerbutton'>back to the portfolio</a>";
			
			exit();
		}
		
	}//end if count
	
} //ends if submitted






function verifyAlphaNum ($testString, $defaultText) {
	//check if field hasn't changed from default text
	if($testString == $defaultText || $testString == "") return false;
	// Check for letters, numbers and dash, period, space and single quote only. 
	return (preg_match("/^([[:alnum:]]|-|\.| |')+$/", $testString));
}	

function verifyEmail ($testString, $defaultText) {
	//check if field hasn't changed from default text
	if($testString == $defaultText || $testString == "") return false;
	// Check for a valid email address 
	return (preg_match("/^([[:alnum:]]|_|\.|-)+@([[:alnum:]]|\.|-)+(\.)([a-z]{2,4})$/", $testString));
}	

function verifyPhone ($testString, $defaultText) {
	//check if field hasn't changed from default text
	if($testString == $defaultText || $testString == "") return false;
	// Check for only numbers, dashes and spaces in the phone number 
	return (preg_match('/^([[:digit:]]| |-)+$/', $testString));
}


function cleanText ($testString) {
	$testString =  strip_tags($testString);
	$testString = htmlspecialchars($testString);
	//$testString= mysql_real_escape_string($testString);
	
	return 	$testString;
}

?>