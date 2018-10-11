<?php
						session_start();
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "ResultManagmentSystem";

						// Create connection
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						// Check connection
						if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
						}


$sql = "SELECT * FROM   users";
$records=mysqli_query($conn,$sql);
 while($row1 = mysqli_fetch_array($records)){
  if($row1['Name'] == $_SESSION['login_user']){
		$Nn=$row1['Name'];
		$gmail=$row1['Gmail'];
		$Name=$row1['Name'];
		$phoneNumber=$row1['phoneNumber'];
$password=$row1['Password'];
	}
}



  require 'phpmailer\PHPMailerAutoload.php';

// $mail = new PHPMailer;                              // Passing `true` enables exceptions

                                     // Enable verbose debug output
	  $mygmail = 'shehadyk4@gmail.com';//מקבל
		$message='Hello,'. $Name ." " . 'just registered to your website'." " . 'phonenumber:' . $phoneNumber ;
    $mess='Hello,'. $Name ." " . 'sending you a message';




		$mail = new PHPMailer;
		  $mail->isSMTP();        //Sets Mailer to send message using SMTP
		  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
		  $mail->Port = 587;       //Sets the default SMTP server port
		  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = $gmail;                 // SMTP username
	    $mail->Password = $password;
		$mail->SMTPSecure = 'tls';        //Sets connection prefix. Options are "", "ssl" or "tls"
		  $mail->From = $gmail;     //Sets the From email address for the message
		  $mail->FromName = $Nn;    //Sets the From name of the message
		  $mail->AddAddress('shehadyk4@gmail.com', 'Name');//Adds a "To" address



		  $mail->Subject ='log in';    //Sets the Subject of the message
		  $mail->Body = $message ;    //An HTML or plain text message body




    // //Content
    // $mail->isHTML(true);                                  // Set email format to HTML
    // $mail->Subject = 'log in';
    // $mail->Body = $message ;


    if($mail->send()){
            $success = '<div class="alert alert-success">We have recieved your message </div>';

     $sql = "SELECT * FROM   users";
     $records=mysqli_query($conn,$sql);
     $sender=$_SESSION['login_user'];
       while($row1 = mysqli_fetch_array($records)){
            if($row1['role'] == 'Lecturer') {
              	$receiver=$row1['Name'];
                $sql2="INSERT INTO noti (username,notification,message,status,sender)VALUES
                     ('$receiver', '$mess','$message',0,'$sender')";

if ($conn->query($sql2) === TRUE) {
 header("location:Main.php");
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}
}
}
}
?>
