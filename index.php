<?php
include("connect.php");
$input=getInput();
$phoneNumber=$input['phoneNumber'];

if($input['text']=="")
{
	echo "CON    Welcome to Crisp Events".PHP_EOL .PHP_EOL .
	"1 Subscribe for notifications".PHP_EOL .
	"2 Unsubscribe";
}
else
{
	$explodedData=explode('*',$input['text']);
	$explodedCount=count($explodedData);

	switch ($explodedCount)
	 {
		case 1:
			if($explodedData[0]==1)
			{
				echo  "CON 1 Car Events"
				.PHP_EOL ."2 Fashion Events"
				.PHP_EOL ."3 Music Events"
				.PHP_EOL ."4 Charity Events"
				.PHP_EOL ."5 Lifestyle Events";
			}
			else if($explodedData[0]==2)
			{
				// $search_sql="SELECT * FROM events WHERE phoneNumber='$phoneNumber'";
				// $search_result=mysql_query($search_sql);
				// if(mysql_num_rows($search_result)==1)
				// {
				// 	//Check code from here to see where problem of deleting lies...
				// $delete_sql="DELETE FROM events WHERE phoneNumber='$phoneNumber'";
				// $delete_result=mysql_query($delete_sql);
				// if(mysql_num_rows($search_result)==0)
				// {
				// 	echo "END Macharia";
				// 	exit;
					echo "END We're sad :( to see you leave!";
				// }
				// else
				// {
				// 	echo "END Error! Please try again later.";
				// }
			}
			else
			{
				echo "END Error! Please try again later.";
			}
			break;

		case 2:
			if($explodedData[1]==1)
			{
				$column="Car";
			}
			else if($explodedData[1]==2)
			{
				$column="Fashion";
			}
			else if($explodedData[1]==3)
			{
				$column="Music";
			}
			else if($explodedData[1]==4)
			{
				$column="Charity";
			}
			else if($explodedData[1]==5)
			{
				$column="Lifestyle";
			}
			else
			{
				echo "END Entry Invalid. Please try again!";
				exit;
			}
			$search_sql="SELECT * FROM events WHERE phoneNumber='$phoneNumber'";
			$search_result=mysql_query($search_sql);
			if(mysql_num_rows($search_result)==0)
			{
			$insert_sql="INSERT INTO events (phoneNumber,$column) VALUES('$phoneNumber','1')";
			$insert_results=mysql_query($insert_sql);
			if($insert_results==1)
			{
				echo "END You've successfully registered to receive notifications for $column Events";
				exit;
			}
			else
			{
				echo "END Error occured! Please try again later!";
			}
			}
			else if(mysql_num_rows($search_result)==1)
			{
				echo "END Running!";
				exit;
			$update_sql="UPDATE events SET `$column`='1' WHERE `phoneNumber`='$phoneNumber'";
			$update_results=mysql_query($update_sql);
			if(mysql_num_rows($update_results)==1)
			{
				echo "END You've successfully registered to receive notifications for $column Events";
				exit;
			}
			else
			{
				echo "END Error occured! Please try again later!";
			}
			}
			break;
		
		default:
			# code...
			break;
	}
}

function getInput()
{
	$input=array();
	$input['text']=$_REQUEST['text'];
	$input['phoneNumber']=$_REQUEST['phoneNumber'];
	$input['sessionId']=$_REQUEST['sessionId'];
	$input['serviceCode']=$_REQUEST['serviceCode'];
	return $input;
}
?>