<?php
$input=getInput();

if($input['text']=="")
{
	echo "CON Welcome to Crisp Events".PHP_EOL .
	"1 Subscribe for event notifications".PHP_EOL .
	"2 Exit";
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
				echo "CON".$explodedData[0];
			}
			else if($explodedData[0]==2)
			{
				echo "END".$explodedData[0];
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