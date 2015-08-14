<?php
include("connect.php");
if(isset($_POST))
{
$phoneNumber=$_REQUEST['no'];
$search_sql="SELECT * FROM events WHERE `phoneNumber`='$phoneNumber'";
				$search_result=mysql_query($search_sql);
				if($search_result=='1')
				{
					echo "Found";
				}
				else
				{
					echo "Not found";
				}
}

?>