<?php
class Api_EduappsController extends Zend_Controller_Action
{
	public function init()
	{
		$this->header = Zend_Controller_Front::getInstance ()->getResponse ();
		$this->header->setHeader ( "Content-Type", "application/json" );
		$this->header->setHeader ( "Method", $_SERVER ['REQUEST_METHOD'] );
		$this->header->setHeader ( "HOST", $_SERVER ['SERVER_NAME'] );
		$this->_filedate = date("Ymd", time());
		
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		$this->Rest = new Classes_Rest;
		$this->Auth = new Classes_Auth;
		
		$this->eduapps = new Application_Model_Indialiteracy;
	}	

	 	   public function preDispatch()
		{
			if (! $this->Auth->authAccepted($this->getRequest()))
			{
				$encode = json_encode(array('error'=>"Your request is not authenticated."));
				$this->header->setHttpResponseCode ( 401 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));
				echo $encode;			
				exit;
			}
		}

		public function indexAction()
		{
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit;
			}
		}      
		 
		public function careerListdataAction(){
			if (!$this->getRequest()->isGet())
			{
				$encode = json_encode(array('error'=>"This function accepts only GET."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit;
			} 
			
			$dataview = $this->eduapps->careerlist();
			if($dataview){
				echo $encode = json_encode ( array ( "Response" => "OK","Career_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function careerInsidecoursesAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit;
			} 
			$careerid = trim ( $this->getRequest ()->getParam ( 'careerid' ) );
			//$careerid="CG-0100";
			$dataview = $this->eduapps->insidecourse($careerid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Career_Inside_Courses" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function careerInsidedataAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit;
			} 
			$careerid = trim ( $this->getRequest ()->getParam ( 'careerid' ) );
			//$careerid="CG-0112";
			$dataview = $this->eduapps->listdata($careerid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Career_Inside_Data" =>$dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function stateListAction(){
			if (!$this->getRequest()->isGet())
			{
				$encode = json_encode(array('error'=>"This function accepts only GET."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit;
			}  
			
			$dataview = $this->eduapps->statelist();
			$listview = $this->eduapps->districtdata();
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","State_List" =>$dataview,
										"District_List" => $listview ));
			}else{
				echo $encode = json_encode ( array (
								"Response" =>"No data found"));
			}
		}
		
		public function districtListAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}
			$stateid = trim ( $this->getRequest ()->getParam ( 'stateid' ) );
			//$stateid = "33";
			$dataview = $this->eduapps->districtlist($stateid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","District_List" =>$dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		
		public function courseMainlistAction(){
			 if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			
			$dataview = $this->eduapps->coursemain();
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Course_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function courseListdataAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			if($count==""){
				$count = "30";
			}
			$dataview = $this->eduapps->countcourse($count);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Course_Main_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}	
		}
		
		public function courseMaindataAction(){
			 if (!$this->getRequest()->isGet())
			{
				$encode = json_encode(array('error'=>"This function accepts only GET."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$dataview = $this->eduapps->maincourse();
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Course_Main_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}	
		}
		
		public function subMaincourseAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$categoryid = trim ( $this->getRequest ()->getParam ( 'category_id' ) );
			//$categoryid = "1";
			$dataview = $this->eduapps->submaincoursedata($categoryid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Sub_Main_Course_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function getCategoryAction(){
			 if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$categoryid = trim ( $this->getRequest ()->getParam ( 'category_id' ) );
			$groupid = trim ( $this->getRequest ()->getParam ( 'group_id' ) );
			//$categoryid = "1";
			//$groupid = "1";
			$dataview = $this->eduapps->categorylist($categoryid,$groupid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Category_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function programListAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			} 
			$programid = trim ( $this->getRequest ()->getParam ( 'program_id' ) );
			//$programid = "111";
			$dataview = $this->eduapps->programlist($programid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Program_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function getCollegesAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			} 
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			if($count == ""){
			$count = "30";	
			}
			$dataview = $this->eduapps->collegelist($count);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","College_List" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function getCollegeinsideCourseAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$collegeid = trim ( $this->getRequest ()->getParam ( 'collegeid' ) );
			//$collegeid = "35899";
			$dataview = $this->eduapps->collegeinsidecourse($collegeid);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","College_Inside_Courses" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}

		public function courseInsideCollegesAction(){
			 if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$programid = trim ( $this->getRequest ()->getParam ( 'program_id' ) );
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			//$programid = "111";
			//$count = "60";
			
			$datacount = array();
			$dataview = $this->eduapps->courseinsidecolleges($programid,$count);
		
			 $length = count($dataview);
			$datacount = "select * from tabl_college_data where tabl_college_data.College_ID IN (";
			for ($i = 0; $i < $length; $i++) {
			$valuelist = $dataview[$i];
			if($i==$length-1){
				$datacount = $datacount."'".$valuelist['College_Id']."'".")";
			}else{
				$datacount = $datacount."'".$valuelist['College_Id']."'".",";
				}
			}  
			/* $length = count($dataview);
			$datacount = "select * from tabl_college_data where tabl_college_data.College_ID = ";
			for ($i = 0; $i < $length; $i++) {
			$valuelist = $dataview[$i];
			if($i==$length-1){
				$datacount = $datacount.$valuelist['College_Id']."and tabl_college_data.College_ID Like '--%'";
			}else{
				$datacount = $datacount.$valuelist['College_Id']." AND tabl_college_data.College_ID = ";
				}
			}  */
			
			$collgevalue = $this->eduapps->courseinsidedatacollege($datacount);
			//echo json_encode($collgevalue);
			 if($collgevalue){
				echo $encode = json_encode ( array ("Response" => "OK","Courses_Based_College" => $collgevalue ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			 
			} 
			
		}
		
		public function programBasedCollegesAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			$programid = trim ( $this->getRequest ()->getParam ( 'program_id' ) );
			//$programid = "133";
			$dataview = $this->eduapps->programcolleges($programid);
			foreach($dataview as $listview){
				$disiplineid = $listview['broad_discipline_group'];
				$categoryid = $listview['broad_discipline_group_category_id'];
			}
			$collgevalue = $this->eduapps->disiplinecategorycollege($disiplineid,$categoryid);
			$length = count($collgevalue);
			for ($i = 0; $i < $length; $i++) {
			$valuelist = $collgevalue[$i];
			$example = $valuelist['College_Id'];
			$variable = $this->eduapps->collegelistdata($example);
			$variable1 = $variable[0]; 
			$varable2 = $variable1['NAME'];
			$finallist[$i] = $varable2;
			}
	
			if($finallist){
				echo $encode = json_encode ( array ("Response" => "OK","Courses_Based_College" => $finallist ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function courseBasedCollegesAction(){
			 if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			
			$groupid = trim ( $this->getRequest ()->getParam ( 'groupid' ) );
			$categoryid = trim ( $this->getRequest ()->getParam ( 'categoryid' ) );
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			//$groupid = "179";
			//$categoryid = "5";
			//$count = "0";
			$collgevalue = $this->eduapps->listcollege($groupid,$categoryid,$count);
			//echo json_encode($collgevalue);
			$length = count($collgevalue);
			$datacount = "select * from tabl_college_data where College_ID IN (";
			for ($i = 0; $i < $length; $i++) {
		
			$valuelist = $collgevalue[$i];
			//echo json_encode("data come :".$valuelist['College_Id']);
			
			if($i==$length-1){
				$datacount = $datacount."'".$valuelist['College_Id']."'".")";
			}else{
				$datacount = $datacount."'".$valuelist['College_Id']."'".",";
				}
				
				/* 
				real=$datacount = $datacount.$valuelist['College_Id'].",";
				$datacount = $datacount."'".$valuelist['College_Id']."'".")";
			}else{
				$datacount = $datacount."'".$valuelist['College_Id']."'".",";

				*/
				
				
			} 
			$dataview = $this->eduapps->collegeview($datacount);
			if($dataview){
				echo $encode = json_encode ( array ("Response" => "OK","Courses_Based_College" => $dataview ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function filterCollegesAction(){
			 if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			
			$levelid = trim ( $this->getRequest ()->getParam ( 'levelid' ) );
			$stateid = trim ( $this->getRequest ()->getParam ( 'stateid' ) );
			$districtid = trim ( $this->getRequest ()->getParam ( 'districtid' ) );
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			$listdata = array();
			$finallist = array();
			
			//$stateid = "20";
			//$districtid = "354";
			//$levelid = "3";
			//$count = "1";
			if($levelid==""){
				$listdata= $this->eduapps->filtercollges($stateid,$districtid);
			}else{
					$listdatavalue= $this->eduapps->collgelistlevel($levelid,$count);
					$length = count($listdatavalue);
					for ($i = 0; $i < $length; $i++) {
					$valuelist = $listdatavalue[$i];
					$listcolleges = $valuelist['College_Id'];
					$collegetable = $this->eduapps->listcollegedata($listcolleges);
					$variable1 = $collegetable[0]; 
					$finallist[$i] = $variable1;
				}
			}
			
			if($finallist){
				echo $encode = json_encode ( array ("Response" => "OK","Filter_Colleges_Level_Based" => $finallist ));
			}elseif($listdata){
				echo $encode = json_encode ( array ("Response" => "OK","Filter_Colleges_State_District_Based" => $listdata ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function searchCollegeAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			} 
			
			$collegename = trim ( $this->getRequest ()->getParam ( 'collegename' ) );
			//$collegename = "Med";
			$listdata= $this->eduapps->searchcollege($collegename);
			if($listdata){
				echo $encode = json_encode ( array ("Response" => "OK","Search_colleges" => $listdata ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function searchFilterCollegesAction(){
			  if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}   
			
			$levelid = trim ( $this->getRequest ()->getParam ( 'levelid' ) );
			$stateid = trim ( $this->getRequest ()->getParam ( 'stateid' ) );
			$districtid = trim ( $this->getRequest ()->getParam ( 'districtid' ) );
			$count = trim ( $this->getRequest ()->getParam ( 'count' ) );
			$collegetable = array();
			$listdata = array();
			//$levelid = "99";
			//$stateid = "20";
			//$districtid = "354";
			//$count = "0";
			//$levelid = "";
			
			
			
			if($stateid=="" && $districtid==""){
				if($levelid=="Any" ||$levelid=="99"){
					$leveldataany = $this->eduapps->getlevelbasedidany();
					//echo json_encode($leveldataany);
				foreach($leveldataany as $leveldatalist){
				$viewdata = $leveldatalist['id'];
				//echo $viewdata;
				$collegetable = $this->eduapps->searchcourseid($viewdata,$count);
				//echo json_encode($collegetable);	
				   } 
				}
				 else{
				$leveldata = $this->eduapps->getlevelbasedid($levelid);
				foreach($leveldata as $leveldatalist){
				$viewdata = $leveldatalist['id'];
				$collegetable = $this->eduapps->searchcourseid($viewdata,$count);
				    }
				}
			}
			
			
			else{
				$listdata= $this->eduapps->filtercollges($stateid,$districtid);
			}
			
			
			if($collegetable){
				echo $encode = json_encode ( array ("Response" => "OK","Filter_Course_Level_Based" => $collegetable ));
			}elseif($listdata){
				echo $encode = json_encode ( array ("Response" => "OK","Filter_Colleges_State_District_Based" => $listdata ));
			}else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function searchCareerAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			} 
			
			$career = trim ( $this->getRequest ()->getParam ( 'careername' ) );
			//$collegename = "Med";
			//$career = "de";
			$listdata2=array();
			$listdata1=array();
			if($career){
				
				$listdata1= $this->eduapps->searchnew2($career);
				$listdata2= $this->eduapps->searchdef($career);
				}
				
			$finalresult = array($listdata1,$listdata2);
			$final = call_user_func_array('array_merge', $finalresult);
			
			if($final){
				echo $encode = json_encode ( array ("Response" => "OK",
					"Search_list" => $listdata2,"Search_data"=>$listdata1 ));
			}
			else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function courseTwoLevelSearchAction(){
			if (!$this->getRequest()->isPost())
			{
				$encode = json_encode(array('error'=>"This function accepts only POST."));
				$this->header->setHttpResponseCode ( 405 );
				$respcode = $this->header->getHttpResponseCode ();
				$this->header->setHeader ( "Status", $respcode );
				echo $this->header->setHeader ( "Content-Length", strlen($encode));			
				echo $encode;
				exit; 
			}  
			 
			$coursename = trim ( $this->getRequest ()->getParam ( 'coursename' ) );
			//$coursename = "Law";
			if($coursename){
				$listdataone= $this->eduapps->searchcoursefirst($coursename);
				$listdatatwo= $this->eduapps->searchcoursesecond($coursename);
			}
			$finalresult = array($listdataone,$listdatatwo);
			$final = call_user_func_array('array_merge', $finalresult);
			
			if($final){
				echo $encode = json_encode ( array ("Response" => "OK",
				"Search_main_course" => $listdataone,"Search_sub_course"=>$listdatatwo ));
			}
			else{
				echo $encode = json_encode ( array ("Response" =>"No data found"));
			}
		}
		
		public function userInformationAction(){
			 if (!$this->getRequest()->isPost())
			{
    		$encode = json_encode(array('Error'=>"This function accepts only POST."));
			$this->header->setHttpResponseCode ( 405 );
			$respcode = $this->header->getHttpResponseCode ();
			$this->header->setHeader ( "Status", $respcode );
			echo $this->header->setHeader ( "Content-Length", strlen($encode));			
			echo $encode;
    		exit;
			} 
			
			$json = file_get_contents('php://input');
			$array = json_decode($json);
			$dataarray = array();
			$obdata;
			
			if($array == null){
			  echo json_encode(array("Error" =>"Does not valid Request"));
			}else{
					 $Device_ID = $array->{'Device_ID'}; 
					 $Date_and_Time = $array->{'Date_and_Time'}; 
					 $Mobile_Make = $array->{'Mobile_Make'}; 
					 $Mobile_Model = $array->{'Mobile_Model'}; 
					
					$data=array('Device_id' => $Device_ID,
					'Date_and_Time'=>$Date_and_Time,
					'Device_Name'=>$Mobile_Make,
					'Device_Model'=>$Mobile_Model);
					
					$getview = $this->eduapps->userinformation($data);
						foreach($getview as $gview){
						$dataarray[] = $gview['Date_and_Time'];
					}	
					if($dataarray){
						echo json_encode(array("Response" =>"Success"));
					}else{
						echo json_encode(array("Error" =>"Error occured in Insert Data"));
				}
			}
		}			
}
?>