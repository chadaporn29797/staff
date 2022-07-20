<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$user= null;
$userID = null;
$MIN_STR_LENGTH = 5;
$user = $_GET["user"];

$servername = "localhost";
$username = "staffdb";
$password = "staffdb4466";

$dbname = "staffdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM cv_title ";
$cv = $conn->query($sql);
$titles = array();
if ($cv->num_rows > 0) {
	while($row = $cv->fetch_assoc()){

		$title=array("en"=> $row["en"] , "th" => $row["th"] );

		$titles[ $row["name"] ] = $title;
	}
}



$sql = "SELECT * FROM v_userinfo WHERE ubu_mail='$user'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
	die();
}
$row = $result->fetch_assoc();
$userID = $row["userID"];
$overview = $row["description"];
$language = $row["language"];

$html="
<!doctype html>
<html>
<head>
<meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<title>Science Staff UBU</title>

<link rel=\"stylesheet\" href=\"assets/css/cv.css\">
<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Athiti\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
<style>
</style>
</head>
<body>
<div class=\"main-container\">

<header class=\"w3-row\">

	<div class=\"profile w3-col m3 l2\" style='padding:10px'  >
	   <div class=\"image-profile\" >
";
		$fs=file_exists(dirname( $_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME']).'/avatars/'.$row["ubu_mail"].'.png' );
		if ( null !== $row["ubu_mail"]  && $fs)
	  		$html .= "<img  src=\"avatars/". $row["ubu_mail"] .".png?". rand(). "\" alt=\"". $row["fullNameENG"] ."\" />";
		else 
	  		$html .="<img  src=\"avatars/unknown.png\" />";

	$html.="   </div>
	</div>

</header>
<!--//header wrapper-->
";

$html.="<div class=\"body-container\">";

if( NULL != $overview &&  strlen($overview) > $MIN_STR_LENGTH ){

 $html .= "<div class=\"overview\" >
	  <h5><i class=\"fa fa-user\"></i>". $titles['overview'][$language] ." </h5>
	  <div>".  $overview 
	  ."</div><!-- //item -->
 	</div><!-- //overview-->";
}


$html.="</div>
</body>
</html>";
echo $html;
$conn->close();
$mpdf->WriteHTML($html);
//$mpdf->Output();

?>

