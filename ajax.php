<?php
include("conf.php");
$ip = $_SERVER['REMOTE_ADDR'];

//$qry = "select e.Description as Name, e.EmployeeHRNo, pp.Picture from Employees e join Persons p on p.PartyId = e.PartyId join 
//PersonPictures pp on pp.PersonId = p.PersonId where e.ExternalId = '$_POST[id]'";

///*
$qrystu ="select scn.grno, spi.student_code, spi.first_name, spi.last_name, simg.image_file FROM student_personal_info spi JOIN student_card_no scn ON spi.gr_no=scn.grno LEFT OUTER JOIN student_images simg ON simg.student_code=spi.student_code WHERE scn.cardno='$_POST[id]'";
$qrystf ="select scn.staffcode, spi.staff_code, spi.first_name, spi.last_name, simg.image_file FROM stf_personal_info spi JOIN stf_card_no scn ON spi.staff_code=scn.staffcode LEFT OUTER JOIN staff_images simg ON simg.staff_code=spi.staff_code WHERE scn.cardno='$_POST[id]'";
//$qry ="SELECT scn.grno, spi.student_code, spi.first_name, spi.last_name FROM student_personal_info spi JOIN stu_card_no scn ON spi.gr_no = scn.grno WHERE scn.cardno='$_POST[id]'";
//echo $_POST[id];
//echo $qry;
//exit;

$resultstu = mysql_query($qrystu);
$rowstu = mysql_fetch_assoc($resultstu);
$resultstf = mysql_query($qrystf);
$rowstf = mysql_fetch_assoc($resultstf);
 if($rowstu>0) //------------------------------ Student Block
 	{
		echo '<center><br><br><br><font color="#FF0000" size="5"><strong>Name:</strong></font><font size="5">';
    	echo($rowstu[first_name] . " " . $rowstu[last_name] . '<br> <strong><font color="#FF0000">GR No.:</font></strong>' . $rowstu[grno]); 
		echo '</font><br>';
		if (is_null($rowstu[image_file])){
		echo('<br><br><font color="red">IMAGE NOT FOUND</font>');
		}
		else
		{
		 echo('<img src=data:image/jpeg;base64,' . base64_encode($rowstu[image_file]) . ' width="228" height="299">');
		}
		echo '</center>';
		
		
		//--------------- Insert Code ------------------
				$qry_att ="INSERT INTO student_att_rfid(gr_no,student_code,cardno,date,systemip) VALUES('$rowstu[grno]','$rowstu[student_code]','$_POST[id]',NOW(),'$ip')";
        		$result_att = mysql_query($qry_att);

		//--------------- End Code ---------------------	         
	}
	
	elseif ($rowstf>0)  //------------------------------ Staff Block
	{
		echo '<center><br><br><br><font color="#FF0000" size="5"><strong>Name:</strong></font><font size="5">';
    	echo($rowstf[first_name] . " " . $rowstf[last_name] . '<br> <strong><font color="#FF0000">Staff Code.:</font></strong>' . $rowstf[staffcode]); 
		echo '</font><br>';
		if (is_null($rowstf[image_file])){
		echo('<br><br><font color="red">IMAGE NOT FOUND</font>');
		}
		else
		{
		 echo('<img src=data:image/jpeg;base64,' . base64_encode($rowstf[image_file]) . ' width="228" height="299">');
		}
		echo '</center>';
		
		
		//--------------- Insert Code ------------------
				$qry_att ="INSERT INTO stf_att_rfid(staff_code,cardno,date,systemip) VALUES('$rowstf[staff_code]','$_POST[id]',NOW(),'$ip')";
				$result_att = mysql_query($qry_att);

		//--------------- End Code ---------------------	         
	}

	else
    {
	 //	echo "Not Found";
	    		$qry_att_notfound ="INSERT INTO attendance_notfound(cardno,date,systemip) VALUES('$_POST[id]',NOW(),'$ip')";
        		$result_att_notfound = mysql_query($qry_att_notfound);
	    		include("notfound.php");
	}
			 

?>  
