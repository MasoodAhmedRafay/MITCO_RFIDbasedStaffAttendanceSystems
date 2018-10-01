<?php
$servername = "localhost";
$username = "famousel_rnutest";
$password = "XJz^Il0O_n@0";
$dbname = "famousel_marqs";

// Create connection
    $conn=mysql_connect($servername, $username, $password);

//connect database
	mysql_select_db($dbname,$conn);


	$sql = "UPDATE staff_personal_info SET first_name='Javed', last_name='Gill', religion='Christianity', address='Gulshan-e-Iqbal', telephone='', emergency_no='', updatedby='Rafay', updatedon='NOW()' WHERE cardno='3800187b0b'";
    $sql = "UPDATE staff_personal_info SET first_name='Shahzaib', last_name='Khan', religion='Muslim', address='Gulistan-e-Jauhar', telephone='', emergency_no='', updatedby='Rafay', updatedon='NOW()' WHERE cardno='3800181a73'";
    $sql = "UPDATE staff_personal_info SET first_name='Samad', last_name='Mannan', religion='Muslim', address='Gulshan-e-Maymar', telephone='', emergency_no='', updatedby='Rafay', updatedon='NOW()' WHERE cardno='3800181b22'";

if (mysql_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo  "Error updated record: " . $conn->error;
}

?>
