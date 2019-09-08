<?php
require("../require/sessions.php");
require("../require/connection.php");
$ep=$_POST['employee_name'];
	$a_1='0';
	$a_2='0';
	$a_3='0';
	$a_4='0';
	$a_5='0';
	$a_6='0';
	$a_7='0';
	$a_8='0';
	$a_9='0';
	$a_10='0';
	$a_11='0';
	$a_12='0';
	$a_13='0';
	$a_14='0';
	$a_15='0';
	$a_16='0';
	$a_17='0';
	$a_18='0';
	$a_19='0';
	$a_20='0';
	$a_21='0';
	$a_22='0';
	$a_23='0';
	$a_24='0';
	$a_25='0';
	$a_26='0';

$reg=$_SESSION['reg'];
foreach ($_POST['authority'] as $selected) {
switch ($selected){
			case 1:
					$a_1='1';
				break;
			case 2:
					$a_2='1';
				break;
			case 3:
					$a_3='1';
				break;
			case 4:
					$a_4='1';
				break;
			case 5:
					$a_5='1';
				break;
				case 6:
					$a_6='1';
				break;
				case 7:
					$a_7='1';
				break;
				case 8:
					$a_8='1';
				break;
				case 9:
					$a_9='1';
				break;
				case 10:
					$a_10='1';
				break;
				case 11:
					$a_11='1';
				break;
				case 12:
					$a_12='1';
				break;
				case 13:
					$a_13='1';
				break;
				case 14:
					$a_14='1';
				break;
				case 15:
					$a_15='1';
				break;
				case 16:
					$a_16='1';
				break;
				case 17:
					$a_17='1';
				break;
				case 18:
					$a_18='1';
				break;
				case 19:
					$a_19='1';
				break;
				case 20:
					$a_20='1';
				break;
				case 21:
					$a_21='1';
				break;
				case 22:
					$a_22='1';
				break;
				case 23:
					$a_23='1';
				break;
				case 24:
					$a_24='1';
				break;
				case 25:
					$a_25='1';
				break;
				case 26:
					$a_26='1';

				} 

				}
$sql = "UPDATE employee_authority SET  a_1='$a_1',a_2='$a_2',a_3='$a_3',a_4='$a_4',a_5='$a_5',a_6='$a_6',a_7='$a_7',
										 a_8='$a_8',a_9='$a_9',a_10='$a_10',a_11='$a_11',a_12='$a_12',a_13='$a_13',a_14='$a_14',a_15='$a_15',a_16='$a_16',a_17='$a_17',a_18='$a_18',a_19='$a_19',a_20='$a_20',a_21='$a_21',a_22='$a_22',a_23='$a_23',a_24='$a_24',a_25='$a_25',a_26='$a_26' WHERE user_id = '$ep' AND school_reg = '$reg'";
			$result = mysql_query( $sql);
 echo $result;
 if($result)
	{
		header("Location: employee_authorities.php?status=1");
	}
	else
	{
		header("Location: employee_authorities.php?status=2");
	}
 ?>