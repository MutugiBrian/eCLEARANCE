<?php 


function sms($to,$message){
  $url = 'http://techsultsms.co.ke/sms/api?';
$action = 'send-sms';
$apikey = 'QnJpYW46QnJpYW5QQHNz';
$from = 'Techsult';
$myvars = 'action=' . $action . '&api_key=' . $apikey . '&to=' . $to . '&from=' . $from . '&sms=' .$message ;
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
}

function makequery($query){

  include 'includes/strings.php';

   $conn = mysqli_connect('localhost','root','','eclearance');

   if (mysqli_connect_errno($conn)){
       return $a = array('error', 'Failed to connect to MySQL: ' . mysqli_connect_error());
   }else{
   if ($result = mysqli_query($conn,$query)){
      $rowcount = mysqli_num_rows($result);
      return  $a = array('success',$result, $rowcount);
      unset($_POST);
    }else{
      return $a  = array('error', $query, mysqli_error($conn)); 
  }
  mysqli_close($conn);
}
}

function endpost(){
	   unset($_POST);
unset($_REQUEST);
$_POST = array();
$_REQUEST = array();

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = '';
}

}



class DB{

public $conn;

function connectDB($query,$type){

	// Create connection
$conn = new mysqli($GLOBALS['server'], $GLOBALS['dbuser'], $GLOBALS['dbpass'],$GLOBALS['dbname']);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	$results = $conn->query($query);

if($type == 'put'){

	if($results === TRUE){
		return "OK";
	}else{
		return "ERROR";
	}
}else{
	return $results;
}
} 

}

function putData($query,$type){
	DB::connectDB($query,$type);
}

}


?>