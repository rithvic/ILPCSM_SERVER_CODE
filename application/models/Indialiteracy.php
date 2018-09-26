<?php

class Application_Model_Indialiteracy extends Zend_Db_Table_Abstract {
	
	public function careerlist():array{
		try {
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select CAREER_GROUP_NUMBER_C,	NAME from careertb_link ORDER BY NAME";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}	
	}
	
	public function insidecourse(string $careerid):array{
		try {
		   $db =Zend_Db_Table_Abstract::getDefaultAdapter();
		   $final = "select career_insidedata.SUB_NAME from career_insidedata INNER JOIN careertb_link ON careertb_link.CAREER_GROUP_NUMBER_C = career_insidedata.CAREER_GROUP_NUMBER_C WHERE career_insidedata.CAREER_GROUP_NUMBER_C='$careerid'";
		   $result = $db->query($final);
		   $finalresult =  $result->fetchAll();
		   return $finalresult;
		}catch (Throwable $e){
		   return $errormsg=array($e->getMessage());
		}	
	}
	
	public function listdata(string $careerid):array{
		try {
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from career_insidedata INNER JOIN careertb_link ON careertb_link.CAREER_GROUP_NUMBER_C = career_insidedata.CAREER_GROUP_NUMBER_C WHERE career_insidedata.CAREER_GROUP_NUMBER_C='$careerid' ORDER BY career_insidedata.SUB_NAME ASC";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function statelist():array{
		try {
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select state_id,state_code,state_name from ref_state ORDER BY state_name";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
		
	}
	
	public function districtdata():array{
		try {
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select distid,dist_name,dist_code,st_code,slno from ref_district ORDER BY dist_name";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	 
	public function districtlist($stateid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from ref_district INNER JOIN ref_state ON ref_state.state_code = ref_district.st_code WHERE ref_district.st_code='$stateid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function coursemain():array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from ref_course_broad_disc_category INNER JOIN tbl_careers ON tbl_careers.discipline_category_id = ref_course_broad_disc_category.id";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function countcourse(string $count):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from course_majr_master ORDER BY NAME ASC limit $count,30";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function maincourse():array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from ref_course_broad_disc_category ORDER BY discipline_group_category";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function submaincoursedata(string $categoryid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select course_majr_master.NAME,course_majr_master.ref_Course_Broad_Discipline_Gro_ID,course_majr_master.ref_Course_Level_ID,course_majr_master.DURATION_YEARS,course_majr_master.ref_programme_ID,course_majr_master.ref_Course_Broad_Discipline_Gro_Category_id,ref_programme.programme_name from course_majr_master INNER JOIN ref_programme ON ref_programme.programmeid = course_majr_master.ref_programme_ID where course_majr_master.ref_Course_Broad_Discipline_Gro_Category_id='$categoryid' ORDER BY course_majr_master.NAME ASC";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	} 
	
	public function categorylist(string $categoryid,string $groupid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select course_majr_master.NAME,course_majr_master.ref_programme_ID,course_majr_master.DURATION_YEARS,ref_programme.course_level_id,ref_programme.programme_name,ref_course_level.name from course_majr_master INNER JOIN ref_programme ON ref_programme.programmeid = course_majr_master.ref_programme_ID INNER JOIN ref_course_level ON ref_course_level.id = ref_programme.course_level_id where course_majr_master.ref_Course_Broad_Discipline_Gro_ID='$groupid' and course_majr_master.ref_Course_Broad_Discipline_Gro_Category_id ='$categoryid' ORDER BY course_majr_master.NAME ASC";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function programlist(string $programid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select programmeid,programme_name,course_level_id from ref_programme where programmeid='$programid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return  $errormsg=array($e->getMessage());	
		}
	}
	
	public function collegelist(string $count):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from tabl_college_data ORDER BY Name limit $count,30";
			$result = $db->query($final);
			$finalresult = $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function collegeinsidecourse(string $collegeid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select clg_course.Discipline,clg_course.Program_ID,clg_course.Duration_Year,ref_programme.programmeid,ref_programme.programme_name,ref_programme.course_level_id from clg_course INNER JOIN ref_programme ON ref_programme.programmeid = clg_course.Program_ID where College_Id='$collegeid' ORDER BY clg_course.Discipline ASC";
			$result = $db->query($final);
			$finalresult =$result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return  $errormsg=array( $e->getMessage());	
		}
	}
	
	public function courseinsidecolleges(string $programid,string $count):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select clg_course.College_Id from clg_course where Program_ID='$programid' limit $count,30";
			$result = $db->query($final);
			$finalresult = $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	 public function courseinsidedatacollege($datacount){
		
		//try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = $datacount;
			$final=$final." ORDER BY tabl_college_data.Name ASC";
			// echo $final;
			 $result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
			//echo json_encode($finalresult);
		/* }catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		} */
	} 
	
	public function programcolleges(string $programid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select ref_program_broaddisciplinegrou.broad_discipline_group,ref_program_broaddisciplinegrou.broad_discipline_group_category_id from ref_program_broaddisciplinegrou where Program_ID='$programid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function disiplinecategorycollege(string $disiplineid,string $categoryid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select clg_course.College_Id from clg_course where broad_discipline_group='$disiplineid' and broad_discipline_group_category_id='$categoryid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function collegelistdata($valuelist):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select tabl_college_data.NAME from tabl_college_data where College_ID='$valuelist' ORDER BY tabl_college_data.NAME ASC limit 0,20";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}		
	} 
	
	public function listcollege(string $groupid,string $categoryid,string $count){
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select clg_course.College_Id from clg_course where broad_discipline_group='$groupid' and broad_discipline_group_category_id='$categoryid' limit $count,20";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
				
	}
	
	public function collegeview($datacount){
		
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = $datacount;
			//echo $final;
			$final=$final."ORDER BY tabl_college_data.Name ASC";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
			//echo json_encode($finalresult);
	}
	
	/*---------------------------Search colleges------------------------------*/
	public function searchcollege(string $collegename):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from tabl_college_data where tabl_college_data.Name LIKE '".$collegename."%'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	/*--------------------------Filter-----------------------------------------*/
	public function levelbasedcourse($levelid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select programmeid,programme_name,course_level_id from ref_programme where ref_programme.course_level_id='$levelid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}		
	}
	
	public function getlevelbasedid(string $levelid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select id,level,name from ref_course_level where ref_course_level.id='$levelid'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	
	public function getlevelbasedidany(){
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			//$levelid=array("4","6","7");
		   /*  $levelid1=count($levelid);
			foreach($levelid as $valuelist)
			
			{
			
			
			} */
			/* if($levelid=="99"){
				$leveliddata=array("4","6","7");
				$levelid1=count($leveliddata);
				for($i=0;$i<$levelid1;$i++){
					$levellist = $levelid1[$i];
					echo $levellist;
				}
			}
			echo $levelid; */
			//$valuelist="7";
			$final = "select id,level,name from ref_course_level where ref_course_level.id IN(7,4,6)";
		
				//echo $final;
			$result = $db->query($final);
			
			$finalresult =  $result->fetchAll();
			return $finalresult; 
		}
	
	
	
	
	public function searchcourseid($viewdata,$count){
		
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			//echo $count;
			if($count>="30"){
				//echo "jhguyjhgujh";
				$final = "select clg_course.Discipline,clg_course.Level_ID,clg_course.College_Id,clg_course.Program_ID,clg_course.Duration_Year,ref_programme.programme_name from clg_course INNER JOIN ref_programme ON ref_programme.programmeid = clg_course.Program_ID where clg_course.Level_ID = '$viewdata' ORDER BY clg_course.Discipline ASC";
			}else{
				$final = "select clg_course.Discipline,clg_course.Level_ID,clg_course.College_Id,clg_course.Program_ID,clg_course.Duration_Year,ref_programme.programme_name from clg_course INNER JOIN ref_programme ON ref_programme.programmeid = clg_course.Program_ID where clg_course.Level_ID = '$viewdata' ORDER BY clg_course.Discipline ASC limit $count,30";
			}
			//$final = "select clg_course.Discipline,clg_course.Level_ID,clg_course.College_Id,clg_course.Program_ID,clg_course.Duration_Year,ref_programme.programme_name from clg_course INNER JOIN ref_programme ON ref_programme.programmeid = clg_course.Program_ID where clg_course.Level_ID='$viewdata' ORDER BY clg_course.Discipline ASC limit $count,30";
			
			//echo $final;
			/* if($viewdata!='All' && $viewdata!=null)
			$final=$final." where clg_course.Level_ID='$viewdata'"; 
			$final=$final."ORDER BY clg_course.Discipline ASC limit $count,30"; */
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult; 
		
	}
	
	public function filtercollges(string $stateid,string $districtid):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select tabl_college_data.College_ID,tabl_college_data.Name,tabl_college_data.STATE_Code,tabl_college_data.DISTRICT_Code,tabl_college_data.Address_Line_1,tabl_college_data.Address_line_2,tabl_college_data.City,tabl_college_data.LATITUDE,tabl_college_data.LONGITUDE,tabl_college_data.Pin_Code,tabl_college_data.	
			STATE_Code,tabl_college_data.DISTRICT_Code,tabl_college_data.WEBSITE from tabl_college_data";
			if($stateid!='All' && $stateid!=null)
			$final=$final." where tabl_college_data.STATE_Code='$stateid'"; 
			if($districtid!='All' && $districtid!=null)
			$final=$final." and tabl_college_data.DISTRICT_Code='$districtid'"; 
	
			$final=$final."ORDER BY tabl_college_data.Name ASC";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult; 
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	} 
	
	/*--------------------------End----------------------------------*/
	public function searchcareer($careername):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select CAREER_GROUP_NUMBER_C,NAME from careertb_link where careertb_link.NAME LIKE '".$careername."%'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult; 
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}		
	}
	
	public function searchcareerlist($careername):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select career_insidedata.CAREER_GROUP_NUMBER_C,careertb_link.NAME from career_insidedata INNER JOIN careertb_link ON careertb_link.CAREER_GROUP_NUMBER_C = career_insidedata.CAREER_GROUP_NUMBER_C where career_insidedata.SUB_NAME LIKE '".$careername."%' GROUP BY `NAME`";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function searchnew2(string $career):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select * from career_insidedata INNER JOIN 
			careertb_link ON careertb_link.CAREER_GROUP_NUMBER_C = 
			career_insidedata.CAREER_GROUP_NUMBER_C where career_insidedata.SUB_NAME LIKE '".$career."%'";
		
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}			
	}
	public function searchdef(string $career):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select careertb_link.NAME,careertb_link.CAREER_GROUP_NUMBER_C from careertb_link where careertb_link.NAME LIKE '".$career."%'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
	}
	
	public function searchcoursefirst(string $coursename):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select id,discipline_group_category from ref_course_broad_disc_category where ref_course_broad_disc_category.discipline_group_category LIKE '".$coursename."%'";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		} 
	}
	
	public function searchcoursesecond(string $coursename):array{
		try{
			$db =Zend_Db_Table_Abstract::getDefaultAdapter();
			$final = "select course_majr_master.NAME,course_majr_master.ref_Course_Broad_Discipline_Gro_ID,course_majr_master.ref_Course_Level_ID,course_majr_master.DURATION_YEARS,course_majr_master.ref_programme_ID,course_majr_master.ref_Course_Broad_Discipline_Gro_Category_id,ref_programme.programme_name from course_majr_master INNER JOIN ref_programme ON ref_programme.course_level_id = course_majr_master.ref_Course_Level_ID where course_majr_master.NAME LIKE '".$coursename."%' and course_majr_master.ref_Course_Level_ID IN ('4','6','7')";
			$result = $db->query($final);
			$finalresult =  $result->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
		
	}
	
	public function userinformation($data):array{
		$db =Zend_Db_Table_Abstract::getDefaultAdapter();
		try {
			$result = $db->insert('User_informations', $data);
   			$lastinsertvalue = $db->lastInsertId('User_informations');
   			$sql = "select * from User_informations where S_id='$lastinsertvalue'";
			$stmt = $db->query($sql); 
         	$finalresult =  $stmt->fetchAll();
			return $finalresult;
		}catch (Throwable $e){
			return $errormsg=array($e->getMessage());	
		}
		}	
	}

?>