<?php
class Classes_ScrapeThumb {

	
	public function bmwofsouthatlanta($url) {

	// echo $bmwofsouthatlanta;
	//echo $url;
	$fhtml=file_get_contents($url,100000);
	$dom = new simple_html_dom();
    $subhtmlcontent = $dom->load($fhtml);
	
	 /* if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;} */
	/* $thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		} */
		//$newpagedata['Thumb_Image_URL_Pattern']="";
		//$newpagedata['Image_Count']= 0;
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		$jcarouselitem="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		if(count($jcarousel)>0){		
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			//$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			//$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
			    //$httpcheck;
				 $jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
			}else{
			    //echo $httpcheck;
				 $jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		}else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
		}
		}
		}
		
		return $newpagedata;
		//echo json_encode($newpagedata);
	}
	public function miniofkennesaw($url){
	$fhtml=file_get_contents($url,100000);
	$dom = new simple_html_dom();
    $subhtmlcontent = $dom->load($fhtml);
	
	 /* if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;} */
	/* $thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		} */
		$newpagedata['Thumb_Image_URL_Pattern']="";
		$newpagedata['Image_Count']= 0;
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		$jcarouselitem="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel"); 
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			//$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			//$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
			    //$httpcheck;
				 $jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
			}else{
			    //echo $httpcheck;
				 $jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
	
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
     
	}
	public function nalleyauto($url) {
	// echo $nalleyauto;
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
	}
	public function sonshonda($url) {
		
	$fhtml=file_get_contents($url,100000);
	$dom = new simple_html_dom();
    $subhtmlcontent = $dom->load($fhtml);
	
	 /* if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;} */
	/* $thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		} */
		$newpagedata['Thumb_Image_URL_Pattern']="";
		$newpagedata['Image_Count']= 0;
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		$jcarouselitem="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel"); 
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			//$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			//$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
			    //$httpcheck;
				 $jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
			}else{
			    //echo $httpcheck;
				 $jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
	
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function sonsacura($url) {
				
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function sonskia($url) {
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
    foreach($photos as $photoid){
	 $jcarousel = $photoid->find('.jcarousel');
	 if(count($jcarousel)>0){
		$jcarouseltag = $photoid->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
			
		}
	 $newpagedata['Image_Count']=count($jcarouselitem);	
	 }else{
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
	    $newpagedata['Image_Count']= 0;
	 }
    }	
	return $newpagedata;
	}
	public function vipkars($url) { // 7
	
	$subhtmlcontent=file_get_html($url,100000);
		
	$ContentPhotoList = $subhtmlcontent->find(".ContentPhotoTab3PhotoList");

	foreach($ContentPhotoList as $ContentPhotoListinfo){
	$SmallPhoto = $ContentPhotoListinfo->find(".SmallPhoto");
		foreach($SmallPhoto as $SmallPhotoinfo){
		$thumbdata[] = $SmallPhotoinfo->attr['src'];
			
		$newpagedata['Thumb_Image_URL_Pattern']=str_replace(array("photos6.ebizautos.com","-107.jpg"),array("photos.ebizautos.com","-640.jpg"),$thumbdata);
		}
		$newpagedata['Image_Count']=count($SmallPhoto);
	}
	return $newpagedata;
	}
	public function dayschevrolet($url) {// 8
	
	$findme='dealers.aultec.com';	//changing url
	
	$pos = strpos($url, $findme);
	if ($pos!== false) {
	
	$url=str_replace('http://www.dayschevrolet.com/?','',$url);
	
	$html=file_get_html($url,100000);
		
	$findthamp = $html->find('#gallery');

	foreach($findthamp as $findtmp){
	  $gethamp  = $findtmp->find('.galleryImg');
	   $count[] = count($gethamp);
	foreach($gethamp  as $gimg){
		 $data[] = $gimg->attr['src'];
	$newpagedata['Thumb_Image_URL_Pattern'] = $data;	
		}
	}
	$newpagedata['Image_Count'] = count($gethamp);
 
	} else {
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;
   	}
	return $newpagedata;
	}
	public function palmerdodgegeorgia($url) {// 9
				
	$fhtml=file_get_contents($url,100000);
	$dom = new simple_html_dom();
    $subhtmlcontent = $dom->load($fhtml);
	
	 /* if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;} */
	/* $thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		} */
		//$newpagedata['Thumb_Image_URL_Pattern']="";
		//$newpagedata['Image_Count']= 0;
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		$jcarouselitem="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		if(count($jcarousel)>0){		
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			//$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			//$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
			    //$httpcheck;
				 $jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
			}else{
			    //echo $httpcheck;
				 $jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		}else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
		}
		}
		}
		
		return $newpagedata;
	}
	public function mariettatoyota($url) {
		
	 $subhtmlcontent=file_get_html($url,100000);
     $findthamp = $subhtmlcontent->find(".vdp-left-col");
  
       foreach($findthamp as $fthamp){
		  $getthamp = $fthamp->find('#gallery-carousel');
		   
 		foreach($getthamp as $key=>$gthamp){
	    $imagedetail = $gthamp->find('.lazyOwl');
		$count[] = count($imagedetail);
		  
		  foreach($imagedetail as $key=>$imgdetail){
			if($key == $imgdetail->attr['src'])
               {	
                $data[] = $imgdetail->attr['src'];
				} else{				  
				$data[] = $imgdetail->attr['data-src'];
					} 
				}  
			$dataarray['Image_Count'] = $count;
			$newpagedata['Thumb_Image_URL_Pattern'] = $data;
			}
			$newpagedata['Image_Count']=count($imagedetail);  
			} 
		return $newpagedata;
	}
	public function gravityautosatlanta($url) {
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function roswellinfiniti($url) {
		
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function vicbaileyvw($url) { // 13
	
	$subhtmlcontent=file_get_html($url,100000);
		$additionalimages = $subhtmlcontent->find(".additional-images");

		foreach($additionalimages as $additionalimagesinfo){
		$thumb = $additionalimagesinfo->find(".thumb");
			foreach($thumb as $thumbinfo){
				$thumbdata[] = $thumbinfo->find("img",0)->attr['src'];
					$newpagedata['Thumb_Image_URL_Pattern']=str_replace(array("width=85&height=58&","/w_85/h_58/"),array("width=640&height=480&","/w_640/h_480/"),$thumbdata);
			}
				$newpagedata['Image_Count']=count($thumb);
		}
		
		return $newpagedata;
	}
	public function vicbaileyhonda($url) { // 14
	
	$subhtmlcontent=file_get_html($url,100000);
		$vdpcarouselwrapper = $subhtmlcontent->find(".vdp-carousel-wrapper");

		foreach($vdpcarouselwrapper as $vdpcarouselwrapperinfo){
		$smallImageCarouselItem = $vdpcarouselwrapperinfo->find(".smallImageCarouselItem");
			foreach($smallImageCarouselItem as $thumbinfo){
				$thumbdata[] = $thumbinfo->attr['src'];
					$newpagedata['Thumb_Image_URL_Pattern']=$thumbdata;
			}
				$newpagedata['Image_Count']=count($smallImageCarouselItem);
		}
		
		return $newpagedata;
	}
	public function greeneford($url) {// 15
	
	$subhtmlcontent=file_get_html($url,100000);
		$depimagesliderulstyle = $subhtmlcontent->find(".dep_image_slider_ul_style");
		
		foreach($depimagesliderulstyle as $depimagesliderulstyleinfo){
		$previewvehicleimageitem = $depimagesliderulstyleinfo->find(".preview_vehicle_image_item");
			foreach($previewvehicleimageitem as $thumbinfo){
				$thumbdata[] = $thumbinfo->attr['data-src'];
				$newpagedata['Thumb_Image_URL_Pattern']=str_replace(array(",w_auto/"),array(",w_640/"),$thumbdata);
			}
				$newpagedata['Image_Count']=count($previewvehicleimageitem);
		}
		return $newpagedata;
	}
	public function subaruofgwinnett($url) { // 16
	
	// echo $subimageurldatainfo;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function goldrushjeeps($url) {// 17
	// echo $goldrushjeeps;
	
	$subhtmlcontent=file_get_html($url,100000);
	
    $finethampimag = $subhtmlcontent->find('#slideshow');
	 foreach($finethampimag as $fithamp){
	       $getthamp =$fithamp->find('.rsImg');
		  $count[] =  count($getthamp);
		   foreach($getthamp as $gthm){
			   $data[] =  $gthm->attr['src'];
		  $newpagedata['Thumb_Image_URL_Pattern'] = $data;	
		}
	}
	$newpagedata['Image_Count'] = count($getthamp);
	
	return $newpagedata;
 	} 
	public function jackyjones($url) {// 18

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function jackyjoneslincoln($url) { //  19

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function jackyjoneschryslerdodgejeep($url) {// 20

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function infinitiofgwinnett($url) {//  21

	// echo $infinitiofGwinnett;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	
	public function gwinnettmitsubishi($url) {// 22
	
	// echo $gwinnettMitsubishi;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function nissanofnewnan($url) {// 23
		
		$subhtmlcontent=file_get_html($url,100000);
		$photos = $subhtmlcontent->find(".details-page-gallerywrap");
		foreach($photos as $photoid){
			$jcarousel = $photoid->find('.gallerycarousel-thumbs');
			if(count($jcarousel)>0){
				foreach($jcarousel as $jcarouselinfo){
					$jcarouseltag = $jcarouselinfo->find(".lazyOwl");
					foreach($jcarouseltag as $jcarouseltaginfo){
						if(isset($jcarouseltaginfo->attr['data-src'])){
							$httpcheck = $jcarouseltaginfo->attr['data-src'];
							if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
								$jcarouselphoto[] = $httpcheck;
								$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
							}else{
								$jcarouselphoto[] = "http:".$httpcheck;
								$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
							}
						}else{
							$httpcheck = $jcarouseltaginfo->attr['src'];
							if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
								$jcarouselphoto[] = $httpcheck;
								$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
							}else{
								$jcarouselphoto[] = "http:".$httpcheck;
								$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
					        }
				        }
			        }
		        }
		        $newpagedata['Image_Count']=count($jcarouseltag);	
	        }else{
		        $newpagedata['Thumb_Image_URL_Pattern'] = "";
	            $newpagedata['Image_Count']= 0; 
	        }	
        }
		return $newpagedata;
	}
	public function kiaCarland($url) {// 24

	// echo $kiaCarland;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function acuracarland($url) {// 25

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}	
	public function paniaguaautos($url) { // 26
			
	$subhtmlcontent=file_get_contents($url,100000);

	$dom = new simple_html_dom();

	$fhtml = $dom->load($subhtmlcontent);
	 $pictureslink = $fhtml->find("#photosPanel");
		
	 foreach($pictureslink as $pictureslinkinfo){
		$thumbdata = $pictureslinkinfo->find('a');
		
		foreach($thumbdata as $pictinfo){
			$dataImage = $pictinfo->find('img');
			
			foreach($dataImage as $dataImageinfo){
			$newimg[] = $dataImageinfo->attr['src'];
			
			$newpagedata['Thumb_Image_URL_Pattern'] =$newimg;
			}
		} 
	$newpagedata['Image_Count']= count($thumbdata);
	}	
	return $newpagedata;
	}
	public function terdferguson($url) { // 27
		
	$subhtmlcontent=file_get_html($url,100000);

		$pictureslink = $subhtmlcontent->find(".thumbnail");
		
		foreach($pictureslink as $pictureslinkinfo){
			
		$thumbdata[] = 'http://www.terdferguson.net'.str_replace(array(
		"_thumb"),"",$pictureslinkinfo->attr['src']);
		
		$newpagedata['Thumb_Image_URL_Pattern']=$thumbdata;
		}
		$newpagedata['Image_Count']=count($pictureslink);
		
		return $newpagedata;
	}
 	public function premierautolocators($url){ // 28
	$subhtmlcontent=file_get_contents($url,100000);
    $html = new simple_html_dom();
    $fhtml = $html->load($subhtmlcontent);
    $thampimg = $fhtml->find('.Content-Background');
     foreach($thampimg as $fthamp){
	 $PictureFrame = $fthamp->find('.Picture-Frame-800');
      foreach($PictureFrame as $PFrame){
	  $data[] = $PFrame->find('img',0)->attr['src'];	 
      }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }	
	$newpagedata['Image_Count']=count($data);
	return $newpagedata;
	}
	
	public function gwinnettsuzuki($url) {//  29
		// Donegwinnettsuzuki
		// echo $url;
	// echo $gwinnettsuzuki;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	} 
	public function everybodysauto($url) { // 30
	$subhtmlcontent=file_get_html($url,100000);
	
	$pictureslink = $subhtmlcontent->find(".thumbnail");
	foreach($pictureslink as $pictureslinkinfo){
		$thumbdata[] = 'http://www.everybodysauto.com'.str_replace(array("_thumb"),"",$pictureslinkinfo->attr['src']);
		$newpagedata['Thumb_Image_URL_Pattern']=$thumbdata;
	}
		$newpagedata['Image_Count']=count($pictureslink);
		
	return $newpagedata;
	} 
	public function townandcountrymotors2($url) {// 31
		// Done
		// echo $url; 
	// echo $subimageurldatainfo;
	$subhtmlcontent=file_get_html($url,100000);
	$i05detailThumbsTable = $subhtmlcontent->find(".i05_detailThumbsTable");

	foreach($i05detailThumbsTable as $i05detailThumbsTableinfo){
	$previewvehicleimageitem = $i05detailThumbsTableinfo->find("img");

	foreach($previewvehicleimageitem as $thumbinfo){
		$thumbdata[] = str_replace(array("Thumbnails/"),array(""),$thumbinfo->attr['src']);
		$newpagedata['Thumb_Image_URL_Pattern']=$thumbdata;
		}
		$newpagedata['Image_Count']=count($previewvehicleimageitem);
	}

	return $newpagedata;
 	} 
	public function roswellmitsubishi($url) {// 32  
		// Done
		// echo $url;
	// echo $roswellMitsubishi;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	
	public function atlantausedcarsmarietta($url) {//33
		// Done
		// echo $url;
	// echo $gwinnettMitsubishi;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
		return $newpagedata;
	}
	
	public function angelakrauseford($url) 
	{ // 34 
	 // echo $url;
	// echo angelakrauseford;

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function jimellisvolkswagenkennesaw($url) {// 35
		// Done
	// echo $jimEllisKennesaw;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function edvoyleskiachamblee($url) {// 36
		// Done
		// echo $url;
	// echo $edVoylesKiaChamblee;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function edvoyleskia	($url) {// 36
		// Done
		// echo $url;
	// echo $edVoylesacura;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
		return $newpagedata;
	}
	public function edvoylesacura($url) {// 36
		// Done
		// echo $url;
	// echo $edVoylesacura;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
		return $newpagedata;
	}
	public function edvoyleschryslerjeep($url) {//  37
		// Done
		// echo $url;
	// echo $edvoyleschryslerjeep;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function edvoyleshyundai($url) {//  38
		// Done
		// echo $url;
	// echo $edVoylesHyundai;
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function speedwayford($url) {//  41
		// Done
		// echo $url;
	// echo $speedwayford;
	$subhtmlcontent=file_get_html($url,100000);
		$findthamp = $subhtmlcontent->find('.main-wrapper');
		
		foreach($findthamp as $fthamp){
		$getthamp = $fthamp->find('.vehicle-photo');
		$count[] = count($getthamp);
	
		foreach($getthamp as $gthamp){
			$data[] = str_replace(array("w=68"),array("w=640"),$gthamp->attr['src']);
		}
		$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}
		$newpagedata['Image_Count']=count($getthamp);
		return $newpagedata;
	}
	public function edvoyleshonda($url) {// 39
	$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    $header = file_get_contents($url,false,$context);
    $dom= new simple_html_dom();   
    $html=$dom->load($header);
    $findthamp=$html->find(".image-gallery-thumbnails-container");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.image-gallery-thumbnail');
	 foreach($getthamp as $gthamp){
	 $data[] = str_replace('scale=100','scale=700',$gthamp->find('img',0)->attr['src']);	 
     }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data; 
    }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function drivemax($url) {//  41
	$subhtmlcontent=file_get_html($url,100000);
	/* $pictureslink = $subhtmlcontent->find('.SmallPhoto');
	foreach($pictureslink as $pictureslinkinfo){
	$thumbdata[] = str_replace(array("photos6.ebizautos.com","-107."),array("photos.ebizautos.com","-640."),$pictureslinkinfo->attr['src']);
	$newpagedata['Thumb_Image_URL_Pattern']=$thumbdata;
	}
	$newpagedata['Image_Count']=count($pictureslink); */
	$findthamp = $subhtmlcontent->find("#vdp-slideshow-1");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find('.ebiz-media-viewer-img');
      foreach($getthamp as $gthamp){
      $data[] = 'https:'.$gthamp->attr['src'];	  
      }
     $newpagedata['Thumb_Image_URL_Pattern'] = $data;   
     }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function carconnectioninc($url) {//  41

	// echo $carconnection;
	$subhtmlcontent=file_get_html($url,100000);
					 
		 $findThamp = $subhtmlcontent->find('.i06_detailThumbsTable');
		 foreach($findThamp as $fthamp){
			
	    $findimg = $fthamp->find('img');
		
		 $count1 = count($findimg);
		 foreach($findimg as $fimg){
		 $data[] =  str_replace("Thumbnails","",$fimg->attr['src']);
		 }  
	$newpagedata['Thumb_Image_URL_Pattern'] = $data;
	}
		$newpagedata['Image_Count'] = $count1;

 		return $newpagedata;
	}
	public function NEWstchoiceautosga($url) {//  41

	 $nurl=str_replace("NEW","1",$url);
	// echo $choiceautosga;
	 $subhtmlcontent=file_get_html($nurl,100000);
	
	 $getthamp = $subhtmlcontent->find('.LargePhotos_Main');
	 foreach( $getthamp as $gthamp){
		$findimage  = $gthamp->find('.LargePhotos_Image');
		  $dataarray =  count($findimage);
		foreach($findimage as $fimage){
			 $getsrc =  $fimage->find('img');
			foreach($getsrc as $gsrc){
				$data[] = $gsrc->attr['src'];
			} 
		}
	 }
    $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count'] = $dataarray; 
	
	return $newpagedata;
	}
	public function carstock($url) {//  53

	// echo carstock;
	 $subhtmlcontent=file_get_html($url,100000);
	
	 $getthamp = $subhtmlcontent->find('.LargePhotos_Main');
	 foreach( $getthamp as $gthamp){
		$findimage  = $gthamp->find('.LargePhotos_Image');
		  $dataarray =  count($findimage);
		foreach($findimage as $fimage){
			 $getsrc =  $fimage->find('img');
			foreach($getsrc as $gsrc){
				$data[] = $gsrc->attr['src'];
			} 
		} 
	 }
    $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count'] = $dataarray; 
	
	return $newpagedata;
	}
	public function paniaguamotors($url) {//  52
	 
	$subhtmlcontent=file_get_contents($url,100000);

	$dom= new simple_html_dom();
    
	$html=$dom->load($subhtmlcontent);

	$getthamp = $html->find('.LargePhotos_Main');
	 foreach($getthamp as $gthamp){
		$findimage  = $gthamp->find('.LargePhotos_Image');
		  $dataarray[] = $findimage;
		foreach($findimage as $fimage){
			 $imgfind =  $fimage->find('img');
			 $getsrc[] = $imgfind;
			foreach($imgfind as $gsrc){
				$data[] = $gsrc->attr['src'];
			} 
		}
	 }
    $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count'] =count($getsrc); 
	return $newpagedata;
	}
	public function brandtautobrokers($url) {//  41

  	$subhtmlcontent=file_get_contents($url,100000);

	$dom= new simple_html_dom();
  
	$html=$dom->load($subhtmlcontent);
    $findslide = $html->find("#slideshow"); 
	foreach($findslide as $fslide){
		
	$finditem  = $fslide->find('.item');
	    $dataarray =  count($finditem );
		 
		 foreach($finditem as $fitem){
		 $findimg = $fitem->find('img');
		 foreach($findimg as $fimg){
			   $data[] = $fimg->attr['src'];
		 }
		}  
	 }
    $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count'] = $dataarray;
	
	return $newpagedata;
	}
	
	public function audiofbirmingham($url) {//  00056

	// echo audiofbirmingham
	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){ 
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function classicgmcbuick($url) {

	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		      
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
		return $newpagedata;
	}
	public function birminghambmw($url) {

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function bmwofmontgomery($url) {

	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		      
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
		return $newpagedata;
	}
	public function porschebirmingham($url) {

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function birminghamlandrover($url) {

	$fhtml=file_get_contents($url,100000);
	$dom = new simple_html_dom();
    $subhtmlcontent = $dom->load($fhtml);
	
	 if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	/* $thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		} */
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			//$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			//$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
			    //$httpcheck;
				 $jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; 
			}else{
			    //echo $httpcheck;
				 $jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
	
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function jaguarbirmingham($url) {

	$subhtmlcontent=file_get_html($url,100000);
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function capitolhyundai($url) {
	
		$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		      
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
		return $newpagedata;
	}
	public function capitolchevrolet($url){
	
		$curl_handle=curl_init();
		curl_setopt($curl_handle, CURLOPT_URL,$url);
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'capitolchevrolet');
		$query = curl_exec($curl_handle);
		curl_close($curl_handle);
		$subhtmlcontent=str_get_html($query,100000);
	
	if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
	$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
	$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		return $newpagedata;
	}
	public function lexusofbirmingham($url) {
	$subhtmlcontent=file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62-0bcc6075-4b02-4410-b482-20ae5d9854bf");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata; 
	}
	public function birminghammini($url) {  
		
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;
		
	return $newpagedata; 
	}
	
	public function centuryREMOVEbmw($url){  
		
		$nurl=str_replace("REMOVE","-",$url);
		$subhtmlcontent=file_get_html($nurl,100000);
		if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
		$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
		$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
	return $newpagedata; 
	}	
	/*public function capitolchevrolet($url){  
		
		//$nurl=str_replace("SCDEALER","",$url);
		$subhtmlcontent=file_get_html($url,100000);
		if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
		$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
		$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
	return $newpagedata; 
	} 
	public function capitolhyundai($url){  
		
		$subhtmlcontent=file_get_html($url,100000);
		if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
		$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
		$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			$jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
	return $newpagedata; 
	}*/
	public function fortmillford($url){ 
	
		$subhtmlcontent=file_get_html($url,100000);
		if($subhtmlcontent==""){$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;return $newpagedata;exit;}
		$thumbdata="";$vinid="";$newpagedata="";$jcarouselitem=array();
		$vinproduct = $subhtmlcontent->find(".vin");
		foreach($vinproduct as $vinproductinfo){
				$vinid = str_replace(array(" "),array(""),$vinproductinfo->find(".value",0)->plaintext);
				$newpagedata['VIN'] = $vinid;
		}
		$fuelefficiencycity = $subhtmlcontent->find(".fuel-efficiency-city");
		if(count($fuelefficiencycity)>0){
		foreach($fuelefficiencycity as $fuelefficiencycityinfo){
			$cityxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencycityinfo->find(".xsmall",0)->plaintext);
			
			$cityxlarge = $fuelefficiencycityinfo->find(".xlarge",0)->plaintext;				
		}
		$newpagedata[$cityxsmall] = $cityxlarge;
		}
		$fuelefficiencyhwy = $subhtmlcontent->find(".fuel-efficiency-hwy");
		if(count($fuelefficiencyhwy)>0){
		foreach($fuelefficiencyhwy as $fuelefficiencyhwyinfo){
			$hwyxsmall = str_replace(array(" ",":"),array("-",""),$fuelefficiencyhwyinfo->find(".xsmall",0)->plaintext);
			$hwyxlarge = $fuelefficiencyhwyinfo->find(".xlarge",0)->plaintext;
		}
		$newpagedata[$hwyxsmall] = $hwyxlarge;
		}
		$jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
		$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
	return $newpagedata; 
	} 
	public function centurymini($url) {  
		
		$htmlpage=file_get_html($url,100000);
  $findthamp = $htmlpage->find("body");
    foreach($findthamp as $fthamp){
	$findscript = $fthamp->find("script");
	 foreach($findscript as $fscript){
	  preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	  $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	   }
	 }	  
	}
	foreach($dividearray as $darray){
	 if($darray !=''){
	 $individualarray = explode(',',$darray);
	  foreach($individualarray as $indivarray){
	   if(strpos($indivarray,'thumbnail:') !== false){
	   $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	   $count = count($data);
	   }  
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
	}
	$newpagedata['Image_Count']=$count;
		
	return $newpagedata; 
	}
	public function burnsford($url) {//  72
	$subhtmlcontent=file_get_html($url,100000);
	$jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "https:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function hennessympg($url) { //74
	
	$subhtmlcontent=file_get_html($url,100000);
	$findthamp = $subhtmlcontent->find('#stockPicsslidearea');
		
		foreach($findthamp as $fthamp){
		  $getthamp = $fthamp->find('.test'); 
		  $count[] = count($getthamp);
	
		foreach($getthamp as $gthamp){
		 $data[] = str_replace(array("D=5"),array("D=0"),$gthamp->attr['src']); 
		}  
		 $dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}  
		$newpagedata['Image_Count']=count($getthamp);
		
		return $newpagedata;
	}
	
  public function hennessyNEWmazda($url) { //75
 
  $nurl=str_replace("NEW","-",$url);
  $subhtmlcontent=file_get_html($nurl,100000);
  $findthamp = $subhtmlcontent->find('#stockPicsslidearea');
		
   foreach($findthamp as $fthamp){
		  $getthamp = $fthamp->find('.test'); 
		   $count[] = count($getthamp);
	
		 foreach($getthamp as $gthamp){
		 $data[] = str_replace(array("D=5"),array("D=0"),$gthamp->attr['src']); 
		}  
		 $dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}  
		$newpagedata['Image_Count']=count($getthamp);

        return $newpagedata;
	}		
    public function hennessyjaguaratlanta($url) { //76
	
	$subhtmlcontent=file_get_html($url,100000);
	
	  $findthamp = $subhtmlcontent->find('.ddc-wrapper');
	    foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('.js-link');
	       $count[] = count($getthamp);
	     foreach($getthamp as $gthamp){
	       $data[] = $gthamp->attr['href']; 
	      
	   } 
		$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 }
     $newpagedata['Image_Count']=count($getthamp); 
	 
	 return $newpagedata;
	}		
    public function jaguarnorthpoint($url) { //77

    $subhtmlcontent=file_get_html($url,100000);
	$findthamp = $subhtmlcontent->find('.ddc-wrapper');
	foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('.js-link');
	     $count[] = count($getthamp);
	     foreach($getthamp as $gthamp){
	      
	       $data[] = $gthamp->attr['href']; 
	    } 
	  	$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
	   }
	$newpagedata['Image_Count']=count($getthamp);

    return $newpagedata;
	}			
	
	public function landroverbuckhead($url) { //78
	
	$subhtmlcontent=file_get_html($url,100000);
	
	  $jcarouselphotos = $subhtmlcontent->find("#photos");
		if(count($jcarouselphotos)>0){
		$thumbimages="";
		foreach($jcarouselphotos as $jcarouselphotosinfo){
		$jcarousel = $jcarouselphotosinfo->find(".jcarousel");
	$jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
		foreach($jcarousel as $jcarouselinfo){
			$jcarouselitem = $jcarouselinfo->find("li");
		}
		foreach($jcarouseltag as $jcarouseltaginfo){
			/* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
			$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
			$httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
		}
		}
		}
		$newpagedata['Image_Count']=count($jcarouselitem);
		
		return $newpagedata;
	}		
	
	public function rollsNEWroycemotorcarsNEWatlanta($url) { //82
		
	 $nurl=str_replace("NEW","-",$url);
	
	 $subhtmlcontent=file_get_html($nurl,100000);
     $findthamp = $subhtmlcontent->find('.mediaArea');
		
        foreach($findthamp as $fthamp){
		   $getthamp = $fthamp->find('#dealerPicsslider');  
		  
		   foreach($getthamp as $gthamp){
			 $imagedetail = $gthamp->find('.image');
			 $count[] = count($imagedetail); 
        foreach($imagedetail as $idetail){
			
		$data[] = str_replace("r64","r500",$idetail->attr['src']);
		     }
		$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}  
		  $newpagedata['Image_Count']=count($imagedetail);
		}
		return $newpagedata;
	}		
	public function hennessyporsche($url) {
		
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;
		
	return $newpagedata; 
	}
	public function hennessycadillac($url) {
	$subhtmlcontent=file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	  }
     } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata; 
	}	
	public function landrovergwinnett($url) {
		//No Thumb image
		
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count'] = 0;
		
	return $newpagedata; 
	}
	public function bestautooutlet1($url) { //84
		
	 $subhtmlcontent=file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find('.carousel-inner');  
    foreach($findthamp as $fthamp){
      $getthamp = $fthamp->find('.img-thumbnail');
	     $count[] = count($getthamp);
		foreach($getthamp as $gthamp){
		   //$image = $gthamp->attr['src']."<br>";
		   $data[] = $gthamp->attr['src'];
		}
		$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}
		$newpagedata['Image_Count']=count($getthamp);
		return $newpagedata;
	}
   public function selectcarscleveland($url) { //85
		
	 $subhtmlcontent=file_get_html($url,100000); 
		$findthamp = $subhtmlcontent->find('.carousel-inner');
		foreach($findthamp as $fthamp){
        $getthamp = $fthamp->find('.img-responsive');
		$count[] = count($getthamp);
		foreach($getthamp as $gthamp){
		   //echo $image = $gthamp->attr['src']."<br>";
		   $data[] = $gthamp->attr['src'];
		}
		$dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
		}
		$newpagedata['Image_Count']=count($getthamp);  
		return $newpagedata;
	}
 public function cfslcars($url) {//86 
	 
	 $subhtmlcontent=file_get_html($url,100000);
	
	$findthamp = $subhtmlcontent->find('#dealerPicsslider');
		//echo $findthamp;
		
		 foreach($findthamp as $fthamp){
			  $getthamp = $fthamp->find('.image'); 
			  $count[] = count($getthamp);
			  foreach($getthamp as $getimag){
				
				$data[] =  str_replace("r64","r500",$getimag->attr['src']);
				  
			  } 
			   $dataarray['Image_Count'] = $count;
		$newpagedata['Thumb_Image_URL_Pattern'] = $data;
			  
		} 
		
		$newpagedata['Image_Count']=count($getthamp);
		
	         return  $newpagedata;
	}
	
	public function broncomotorcars($url) {//87
     $subhtmlcontent=file_get_html($url,100000);
     $findthamp = $subhtmlcontent->find('#ctl00_cphBody_inv1_pnlthumbs');
	  foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('.thickbox');
	   foreach($getthamp as $gthamp){
	   $getthampimg = $gthamp->find('img');
	   $count[] = count($getthampimg);
	    foreach($getthampimg as $gthampimg){
	    $data[] = $gthampimg->attr['src'];
	    }
	   $dataarray['Image_Count'] = $count;
	   $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	   }
      }	
	 $newpagedata['Image_Count']=count($getthamp);
     return  $newpagedata;	 
	}
	
	public function kastratiautosales($url) {//88
	 $subhtmlcontent=file_get_html($url,100000);
     $imagecount = count($subhtmlcontent->find('img[alt=Click for Larger View]'));
      foreach($subhtmlcontent->find('img[alt=Click for Larger View]') as $findthamp){
      $data[]=str_replace("th_","",$findthamp->attr['src']);
      }
     $newpagedata['Thumb_Image_URL_Pattern'] = $data;
     $newpagedata['Image_Count']=$imagecount;
	 return  $newpagedata;	
	}
	public function mazdaofsouthcharlotte($url){//89
	$subhtmlcontent=file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find("#vehicleImgThumbnail",0)->find(".img-responsive");
	 foreach($findthamp as $fthamp){
	 $data[] = 'http://www.mazdaofsouthcharlotte.com'.str_replace(array("thumbs/","-320."),array("","."),$fthamp->attr['src']);
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 }
	 $newpagedata['Image_Count']=count($findthamp);
	 return  $newpagedata;
	}
	public function autoproscolumbia($url){//90
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find(".vehiclegallery");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find('li');
	  foreach($getthamp as $gthamp){
	  $data[] = $gthamp->find('img',0)->attr['src'];
	  }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
     }
     $newpagedata['Image_Count']=count($getthamp);
	 return  $newpagedata;
	}
	public function natewade($url){//91
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	    $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	 return  $newpagedata;
	}
	public function garnettmotorcars($url){//92
	/* $subhtmlcontent=file_get_html($url,10000);
	$findthamp = $subhtmlcontent->find("#vehicle_thumbs");
	 foreach($findthamp as $fthamp){
	 $getthamp = $fthamp->find('.vehicle_media');
	  foreach($getthamp as $gthamp){
	  $data[] = str_replace('_80','_800',$gthamp->attr['src']);
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 $newpagedata['Image_Count']=count($getthamp);
	 } */
	 $newpagedata['Thumb_Image_URL_Pattern'] = "";
	 $newpagedata['Image_Count']=0;
	 return  $newpagedata;
	}
	public function townsendautomotivedemopolis($url){//93
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return  $newpagedata;
	}
	public function hdmotorstn($url) {//94
     $subhtmlcontent=file_get_html($url,100000);
     $findthamp = $subhtmlcontent->find('#ctl00_cphBody_inv1_dlImage');
	  foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('.imageHover');
	  $count[] = count($getthamp);
	   foreach($getthamp as $gthampimg){
	   $data[] = $gthampimg->attr['src'];
	   }
	   $dataarray['Image_Count'] = $count;
	   $newpagedata['Thumb_Image_URL_Pattern'] = $data;
      }	
	 $newpagedata['Image_Count']=count($getthamp);
     return  $newpagedata;	 
	}
	public function harbinautomotive($url) {//95
	 $subhtmlcontent=file_get_html($url,100000);
     $findthamp = $subhtmlcontent->find(".additional-images");
      foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('img[itemprop=image]');
	   foreach($getthamp as $gthamp){
	   $data[] = str_replace("w_85/h_58/","",$gthamp->attr['src']);	 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	  $newpagedata['Image_Count']=count($getthamp); 
      }
	 return  $newpagedata;
	}
	public function greggsautosales($url) {//96
	$newpagedata['Thumb_Image_URL_Pattern'] = "";
	$newpagedata['Image_Count'] = 0;
	return $newpagedata;
	}
	public function lakewayautosales($url) {//97
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find(".ContentPhotoTab3PhotoListOuter");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find('.SmallPhoto');
	  foreach($getthamp as $gthamp){
	  $data[] = str_replace(array('photos6.','-107.'),array('photos.','-640.'),$gthamp->attr['src']);
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
     }
     $newpagedata['Image_Count']=count($getthamp);
	 return $newpagedata;
	}
	public function toyotakeene($url) {//98
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function hondaofkeene($url) {//99
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function subaruofkeene($url) {//100
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function hyundaiofkeene($url) {//101
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function volvokeene($url) {//102
	$subhtmlcontent=file_get_html($url,10000);
    $jcarouselphotos = $subhtmlcontent->find("#photos");
     if(count($jcarouselphotos)>0){
	 $thumbimages="";
	  foreach($jcarouselphotos as $jcarouselphotosinfo){
	  $jcarousel = $jcarouselphotosinfo->find(".jcarousel");
      $jcarouseltag = $jcarouselphotosinfo->find(".jcarousel a");
	   foreach($jcarousel as $jcarouselinfo){
	   $jcarouselitem = $jcarouselinfo->find("li");
	   }
	   foreach($jcarouseltag as $jcarouseltaginfo){
   	   /* $jcarouselphoto[] = "http:".$jcarouseltaginfo->attr['href'];
	   $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto; */
	   $httpcheck = $jcarouseltaginfo->attr['href'];
			if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
				$jcarouselphoto[] = $httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}else{
				$jcarouselphoto[] = "http:".$httpcheck;
			    $newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			}
	   }
	  }
	 }
	$newpagedata['Image_Count']=count($jcarouselitem);
	return $newpagedata;
	}
	public function marchmotorcars($url){//103
	$subhtmlcontent=file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find('#ctl00_cphBody_inv1_dlImage');
	foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.thickbox');
	 foreach($getthamp as $gthamp){
	 $getthampimg = $gthamp->find('img');
	 $count[] = count($getthampimg);
	  foreach($getthampimg as $gthampimg){
	  $data[] = $gthampimg->attr['src'];
	  }
	  $dataarray['Image_Count'] = $count;
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 }
    }	
	$newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function coastalautocompany($url){//104
	$subhtmlcontent=file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find('#ctl00_cphBody_inv1_dlImage');
	foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.thickbox');
	 foreach($getthamp as $gthamp){
	 $getthampimg = $gthamp->find('img');
	 $count[] = count($getthampimg);
	  foreach($getthampimg as $gthampimg){
	  $data[] = $gthampimg->attr['src'];
	  }
	  $dataarray['Image_Count'] = $count;
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 }
    }	
	$newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function lonestarmotorcarstx($url){//105
	$subhtmlcontent=file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find('.subpage');
	foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.bottom-border');
	 foreach($getthamp as $gthamp){
	 $getthampimg = $gthamp->find('img');
	 //$count[] = count($getthampimg);
	  foreach($getthampimg as $gthampimg){  
	  $data[] = $gthampimg->attr['src'];
	  }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	 }
    }	
	$newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function urbanmotorcars($url){//106
	$subhtmlcontent=file_get_html($url,100000); 
    $findthamp = $subhtmlcontent->find(".ar_vehinfo");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.ar_thumbs');
	 foreach($getthamp as $gthamp){
     $data[] = str_replace('_x106','_x640',$gthamp->attr['src']);
	 }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data; 
    }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function bladechevy($url){//107
	$subhtmlcontent=file_get_html($url,10000);
    /* $findthamp = $subhtmlcontent->find("body");
     foreach($findthamp as $fthamp){
	 $findscript = $fthamp->find("script");
	  foreach($findscript as $fscript){
	   preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	   $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	    if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	    }
	  }	  
	 }
	 foreach($dividearray as $darray){
	  if($darray !=''){
	  $individualarray = explode(',',$darray);
	   foreach($individualarray as $indivarray){
	    if(strpos($indivarray,'thumbnail:') !== false){
	    $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	    $count = count($data);
	    }  
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	  }
	 }
	 $newpagedata['Image_Count']=$count; */
	 $findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
      foreach($findthamp as $fthamp){
      $getthamp = $fthamp->find(".deck",0);
	  $findmedia = $getthamp->find(".media");
	   foreach($findmedia as $fmedia){
       $finalthump = $fmedia->find("img");
	    foreach($finalthump as $final){
	    $data[] = $final->attr["data-src"]; 
	    }
	   $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	   }
      } 
     $newpagedata['Image_Count']=count($findmedia);
	 return $newpagedata;
	}
	public function citystyleimports($url){//108
	$subhtmlcontent=file_get_html($url,100000); 
    $findthamp = $subhtmlcontent->find(".carousel-inner");
     foreach($findthamp as $fthamp){
	 $getthamp = $fthamp->find('.img-thumbnail');
	  foreach($getthamp as $gthamp){
      $data[] = $gthamp->attr['src'];
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
     }
     $newpagedata['Image_Count']=count($getthamp);
	 return $newpagedata;
	}
	public function denmarkautobrokers($url){//109
	$subhtmlcontent=file_get_html($url,100000); 
    $findthamp = $subhtmlcontent->find(".carousel-inner");
     foreach($findthamp as $fthamp){
	 $getthamp = $fthamp->find('.img-responsive');
	  foreach($getthamp as $gthamp){
      $data[] = $gthamp->attr['src'];
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
     }
     $newpagedata['Image_Count']=count($getthamp);
	 return $newpagedata;
	}
	public function billsmithbuickgmc($url){//110
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find("body");
     foreach($findthamp as $fthamp){
	 $findscript = $fthamp->find("script");
	  foreach($findscript as $fscript){
	   preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	   $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	    if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	    }
	  }	  
	 }
	 foreach($dividearray as $darray){
	  if($darray !=''){
	  $individualarray = explode(',',$darray);
	   foreach($individualarray as $indivarray){
	    if(strpos($indivarray,'thumbnail:') !== false){
	    $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	    $count = count($data);
	    }  
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	  }
	 }
	 $newpagedata['Image_Count']=$count;
	 return $newpagedata;
	}
	public function royalautosalenc($url){//111
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find(".i05_detailThumbsTable");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('img');
	 foreach($getthamp as $gthamp){
     $data[] = str_replace('/Thumbnails','',$gthamp->attr['src']);
	 }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data; 
    }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
         public function euromotorsraleigh($url){//112
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find(".carousel-inner");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.img-responsive');
	 foreach($getthamp as $gthamp){
     $data[] = $gthamp->attr['src'];
	 }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data; 
    }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function mazdacoconutcreek($url){//113
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find("body");
    foreach($findthamp as $fthamp){
	$findscript = $fthamp->find("script");
	 foreach($findscript as $fscript){
	  preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	  $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	   }
	 }	  
	}
	foreach($dividearray as $darray){
	 if($darray !=''){
	 $individualarray = explode(',',$darray);
	  foreach($individualarray as $indivarray){
	   if(strpos($indivarray,'thumbnail:') !== false){
	   $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	   $count = count($data);
	   }  
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
	}
	$newpagedata['Image_Count']=$count;
	return $newpagedata;
	}
	public function buyacarnc($url){//114
	$subhtmlcontent=file_get_html($url,10000);
	$findthamp = $subhtmlcontent->find(".carousel-inner");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.item');
	 foreach($getthamp as $gthamp){
     $data[] = $gthamp->find('img',0)->attr['src'];
	 }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data; 
    }
    $newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function auction123($url){//115
	$subhtmlcontent=file_get_html($url,10000);
	$findthamp = $subhtmlcontent->find(".carousel-thumbnails");
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.thumb-image');
	 foreach($getthamp as $gthamp){
	 $data[] = str_replace('?webimage001s','?wtrmk8nw',$gthamp->attr['src']);	 
	 }
    $newpagedata['Thumb_Image_URL_Pattern'] = $data; 	 
	}
	$newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function nissanofathens($url){//116
	$subhtmlcontent=file_get_html($url,10000);
   $findthamp = $subhtmlcontent->find('#vehicleImgLarge');
    foreach($findthamp as $fthamp){
	$getthamp = $fthamp->find('.img-responsive');
	 foreach($getthamp as $gthamp){
	  //if(strpos($gthamp->attr['src'],"/assets/inventory") !== false){	 
	  $data[] = "http://www.nissanofathens.com".$gthamp->attr['src'];
      //}	  
	 }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data;	
	}
	$newpagedata['Image_Count']=count($getthamp);
	return $newpagedata;
	}
	public function bobmaxeyford($url){//117
	 $subhtmlcontent = file_get_html($url,100000);
	 if(isset($subhtmlcontent->find('.js-link',0)->attr['href'])){
	 $ul = $subhtmlcontent->find('.jcarousel',0);
	 $atag = $ul->find('a');
	  foreach($atag as $atag_n){
	  $data[] = "https:".$atag_n->attr['href'];
	  }	
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	  $newpagedata['Image_Count']=count($atag);
	 }else{
	  $newpagedata['Thumb_Image_URL_Pattern'] = "";
	  $newpagedata['Image_Count'] = 0;
	 }
	 return $newpagedata;
	}
	public function belllexusnorthscottsdale($url){//118
	$subhtmlcontent = file_get_html($url,100000);
	$class = $subhtmlcontent->find('.dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62-0bcc6075-4b02-4410-b482-20ae5d9854bf');
    foreach($class as $class_n){
	 $deck = $class_n->find('.deck');
	 foreach($deck as $deck_n){
	 $count = $deck_n->find('.cards-none');
	  foreach($count as $count_n){
	  $media = $count_n->find('.media');
		foreach($media as $media_n){
		$data[] = trim($media_n->find('img',0)->attr['data-src']);
		}
	  }
	 }	
    }
	$newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count']=count($data);
	return $newpagedata;
	}
	public function donbrownchevrolet($url){//119
	$subhtmlcontent=file_get_html($url,10000);
    $findthamp = $subhtmlcontent->find("body");
     foreach($findthamp as $fthamp){
	 $findscript = $fthamp->find("script");
	  foreach($findscript as $fscript){
	  $valueSet = preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	   if($valueSet == 1){
	   $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   $dividearray = explode(';',$matchexplo[0]); 
		foreach($dividearray as $darray){
		$individualarray = explode(',',$darray);
		 if(strpos($individualarray[0],"media.push")!==false){
         $data[] = str_replace(array("media.push({","src:","'"," "),"",$individualarray[0]);
		 }				
		}
	   }
	  }
     }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 $newpagedata['Image_Count']=count($data);
	return $newpagedata;
	}
	public function groovesubaru($url){//120
	 $subhtmlcontent = file_get_html($url,100000);
     $class = $subhtmlcontent->find('.jcarousel',0);
     $class->find('.js-link',0)->attr['href'];
      if(isset($class->find('.js-link',0)->attr['href'])){
	  $jsLink = $class->find('.js-link');
	   foreach($jsLink as $jsArray){
	   $data[] = "https:".$jsArray->attr['href'];
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	  $newpagedata['Image_Count']=count($data);
      }else{
	  $newpagedata['Thumb_Image_URL_Pattern'] = "";
	  $newpagedata['Image_Count']= "";
     }
	return $newpagedata;
	}
	public function findlayhonda($url){//121
	$subhtml = file_get_html($url,300000);
    $findimage = $subhtml->find('#dealerPicsslider');
     foreach($findimage as $fimage){
	 $getimage = $fimage->find('.image');
	  foreach($getimage as $gimage){
	  $data[] = str_replace('r64','r600',$gimage->attr['src']);
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data;	
	 }
	 $newpagedata['Image_Count']=count($data);
	return $newpagedata; 
	}
	public function cartersubaruballard($url){//122
	 $subhtmlcontent = file_get_html($url,100000);
     $class = $subhtmlcontent->find('.jcarousel',0);
     $class->find('.js-link',0)->attr['href'];
      if(isset($class->find('.js-link',0)->attr['href'])){
	  $jsLink = $class->find('.js-link');
	   foreach($jsLink as $jsArray){
	   $data[] = $jsArray->attr['href'];
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	  $newpagedata['Image_Count']=count($data);
      }else{
	  $newpagedata['Thumb_Image_URL_Pattern'] = "";
	  $newpagedata['Image_Count']= "";
     }
	return $newpagedata;
	}
	public function longbeachmini($url){//123
	$subhtmlcontent = file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find("body");
    foreach($findthamp as $fthamp){
	$findscript = $fthamp->find("script");
	 foreach($findscript as $fscript){
	  preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	  $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	   }
	 }	  
	}
	foreach($dividearray as $darray){
	 if($darray !=''){
	 $individualarray = explode(',',$darray);
	  foreach($individualarray as $indivarray){
	   if(strpos($indivarray,'thumbnail:') !== false){
	   $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	   $count = count($data);
	   }  
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
	}
	$newpagedata['Image_Count']=$count;
	return $newpagedata;
	}
	public function miniofmonrovia($url){//124
	$subhtmlcontent = file_get_html($url,100000);
    $findthamp = $subhtmlcontent->find("body");
    foreach($findthamp as $fthamp){
	$findscript = $fthamp->find("script");
	 foreach($findscript as $fscript){
	  preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	  $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   if($matchexplo[0] !=''){
		$dividearray =  explode(';',$matchexplo[0]);
	   }
	 }	  
	}
	foreach($dividearray as $darray){
	 if($darray !=''){
	 $individualarray = explode(',',$darray);
	  foreach($individualarray as $indivarray){
	   if(strpos($indivarray,'thumbnail:') !== false){
	   $data[] = str_replace(array("thumbnail: ","'"," ","x51"),"",$indivarray);
	   $count = count($data);
	   }  
	  }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
	}
	$newpagedata['Image_Count']=$count;
	return $newpagedata;
	}
	public function lexusmarin($url){//125
	$subhtmlcontent = file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62-0bcc6075-4b02-4410-b482-20ae5d9854bf");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata;
	}
	public function lexusserramonte($url){//126
	$subhtmlcontent=file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62-0bcc6075-4b02-4410-b482-20ae5d9854bf");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata;
	}
	public function crownlexus($url){//127
	$subhtmlcontent = file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62-0bcc6075-4b02-4410-b482-20ae5d9854bf");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata;
	}
	
	public function carsonhonda($url){//128
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function hondaofsantamonica($url){//129
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function bmwofmonrovia($url){//130
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function buenaparkhonda($url){//131
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function powayhonda($url){//132
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function hondaofstevenscreek($url){//133
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function hondawest($url){//134
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function stevenscreekbmw($url){//135
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function mercedesofcalabasas($url){//136
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function cadillaclasvegaswest($url){//137
	$subhtmlcontent=file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-040250a3-da9b-455a-b49c-8c97fcfdbe2b");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata;
	}
	
	public function bmwofbeverlyhills($url){//138
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function wisimonson($url){//139
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function longbeachbmw($url){//140
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function volvocarslasvegas($url){//141
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function stclairecadillac($url){//142
	$subhtmlcontent=file_get_html($url,100000);	
	$findthamp = $subhtmlcontent->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
     foreach($findthamp as $fthamp){
     $getthamp = $fthamp->find(".deck",0);
	 $findmedia = $getthamp->find(".media");
	  foreach($findmedia as $fmedia){
      $finalthump = $fmedia->find("img");
	   foreach($finalthump as $final){
	   $data[] = $final->attr["data-src"]; 
	   }
	  $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 }
    } 
    $newpagedata['Image_Count']=count($findmedia);
	return $newpagedata;
	}
	
	public function concordhonda($url){//143
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function concordtoyota($url){//144
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function mbofwalnutcreek($url){//145
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function hondaofserramonte($url){//146
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function acuraofserramonte($url){//147
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function melodytoyota($url){//148
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	
	public function autobahnmotors($url){//149
	$subhtmlcontent = file_get_html($url,100000);
    $photos = $subhtmlcontent->find("#photos");
	foreach($photos as $photoid){
		$jcarousel = $photoid->find('.jcarousel');
		if(count($jcarousel)>0){
			$jcarouseltag = $photoid->find(".jcarousel a");
			foreach($jcarousel as $jcarouselinfo){
				$jcarouselitem = $jcarouselinfo->find("li");
			}
			foreach($jcarouseltag as $jcarouseltaginfo){
				$httpcheck = $jcarouseltaginfo->attr['href'];
				if((strpos($httpcheck,"http://")!== false)||(strpos($httpcheck,"https://")!== false)){
					$jcarouselphoto[] = $httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
				}else{
					$jcarouselphoto[] = "http:".$httpcheck;
					$newpagedata['Thumb_Image_URL_Pattern']=$jcarouselphoto;
			    }
			
		    }
			$newpagedata['Image_Count']=count($jcarouselitem);	
	    }else{
			$newpagedata['Thumb_Image_URL_Pattern'] = "";
			$newpagedata['Image_Count']= 0;
	    }
    }
	return $newpagedata;
	}
	public function toyotaoffortworth($url){//150
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function northcentralford($url){//151
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function philpottmotors($url){//152
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function mercedesbenzofmckinney($url){//153
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function luterileyhonda($url){//154
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function gillmanhondahouston($url){//155
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function clearlakevw($url){//156
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function cookfordtexas($url){//157
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	 return $newpagedata;
	}
	public function davischevrolet($url){//158
	$subhtmlcontent=file_get_html($url,10000);
   $dom= new simple_html_dom();   
	 $fhtml=$dom->load($subhtmlcontent);
	 $item = $fhtml->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
		foreach($item as $imageurl){
		 $mediaclsss = $imageurl->find(".deck",0);
		 if(($mediaclsss)>0){
		  $imgeurls = $mediaclsss->find(".media");
	   foreach($imgeurls as $imgdatas){
		   $imageurldata  = $imgdatas->find("img");
		     
		foreach($imageurldata as $datasd){
			  $datasrc = $datasd->attr['data-src'];
			 if(strpos($datasrc,"http://")!==false ||strpos($datasrc,"https://")!==false ){
				 $imgeurl[] = $datasrc;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$datasrc;
				  $newpagedata['Thumb_Image_URL_Pattern']= $datasrc;
			 }
		} 
		   $newpagedata['Image_Count']=count($imgeurls);
		  
	   }
	  }
	   else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
		
		}
	return $newpagedata;
	}
	public function alamotoyota($url){//159
	$htmlpage = file_get_contents($url,100000);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
		$jcarsoul = $imageurl->find(".jcarousel");
		if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
		foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
		}
		foreach($adata as $imgedata){
			$imagedatas  = $imgedata->attr['href']; 
			 
			if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		$newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	  return $newpagedata;
	}
   }
    public function dickpoetoyota($url){//160
	$htmlpage = file_get_contents($url);
   $dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
				 $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		 $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   }
   public function vivachevy($url){//161
	$htmlpage = file_get_contents($url);
 $dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
   $item = $fhtml->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
   foreach($item as $imageurl){
	   $mediaclsss = $imageurl->find(".deck",0);
		   
		   
	  if(($mediaclsss)>0){
		  $imgeurls = $mediaclsss->find(".media");
	   foreach($imgeurls as $imgdatas){
		   $imageurldata  = $imgdatas->find("img");
		     
		foreach($imageurldata as $datasd){
			  $datasrc = $datasd->attr['data-src'];
			 if(strpos($datasrc,"http://")!==false ||strpos($datasrc,"https://")!==false ){
				 $imgeurl[] = $datasrc;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$datasrc;
				  $newpagedata['Thumb_Image_URL_Pattern']= $datasrc;
			 }
		  }
		
			 
			
		
		  
		   $newpagedata['Image_Count']=count($imgeurls);
		  
	   }
	  }
	    
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
	  }
	return $newpagedata;
   }
   public function casaford($url){//162
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   }
    public function lovepreownedautocenter($url){//163
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   }
   
   public function autonationchevroletcorpuschristi($url){//164
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		      
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   }
    public function howdyhonda($url){//165
$subhtmlcontent=file_get_html($url);
   $thumpimg=$subhtmlcontent->find(".mod-vehicle-gallery");
   foreach($thumpimg as $timg){
	 $printimg=$timg->find(".additional-images");
	foreach($printimg as $imgurl){
		if(($printimg)>0){
	$getthamp = $imgurl->find('img[itemprop=image]');
	 foreach($getthamp as $gthamp){
	 $dataimg = str_replace("w_85/h_58/","",$gthamp->attr['src']);

		 
			  if(strpos($dataimg,"http://")!==false ||strpos($dataimg,"https://")!==false ){
				 $imgeurl[] = $dataimg;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$dataimg;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 } 
	 }
	   $newpagedata['Image_Count']=count($getthamp);
		}
	
	 else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	}
	
   }
	return $newpagedata;
   }
    public function autonationtoyotasouthaustin($url){//166
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   
   }  
	return $newpagedata;
   
} 
public function maxwellford($url){//167
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   
} 
public function kiaofsouthaustin($url){//168
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	return $newpagedata;
   
}
public function autonationfordfortworth($url){//169
$htmlpage = file_get_contents("http://www.autonationfordfortworth.com/new/Ford/2017-Ford-Focus-e534bb570a0e09900a8b07f9f3960f0a.htm?searchDepth=36:2785");
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
  }
	 
   return $newpagedata;
   } 
public function sewelllexusNEWfortworth($url){//170
$newurl=str_replace("NEW","-",$url);
$htmlpage = file_get_contents($newurl);
 $dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
    $item = $fhtml->find(".manufacturerPhotoGallery-caac439d-c9f8-4abd-8dea-7ea5541731c2-9f32cf6c-43da-4e75-b84c-b452a9f95899");
	foreach($item as $imageurl){
	   $mediaclsss = $imageurl->find(".deck",0);
		   
		   
	  if(($mediaclsss)>0){
		  $imgeurls = $mediaclsss->find(".media");
	   foreach($imgeurls as $imgdatas){
		   $imageurldata  = $imgdatas->find("img");
		     
		foreach($imageurldata as $datasd){
			  $datasrc = $datasd->attr['data-src'];
			 if(strpos($datasrc,"http://")!==false ||strpos($datasrc,"https://")!==false ){
				 $imgeurl[] = $datasrc;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$datasrc;
				  $newpagedata['Thumb_Image_URL_Pattern']= $datasrc;
			 }
		  }
		
			 
			
		
		  
		   $newpagedata['Image_Count']=count($imgeurls);
		  
	   }
	  }
	    
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
	  }
	 
   return $newpagedata;
   } 
   public function moritzkiafw($url){//171
$subhtmlcontent=file_get_html($url);
   $fhtml = $subhtmlcontent->find(".thumbs");
   if(($fhtml)>0){
   foreach($fhtml as $filesurl){
	   $imageurl = $filesurl->find('img[itemprop=image]');
	foreach($imageurl as $getthump){
	 $data[] = str_replace("w_85/h_58/","",$getthump->attr['src']);	 
	 }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data;
	$newpagedata['Image_Count']=count($imageurl); 
    }
   }
   else{
	   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0; 
   }
	 
   return $newpagedata;
   } 
public function autonationchryslerdodgejeepramftworth($url){//172
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		   $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				 
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem); 
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	 
   return $newpagedata;
   }
   public function autonationfordcorpuschristi($url){//173
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	 
   return $newpagedata;
   }
public function autonationtoyotacorpuschristi($url){//174
$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
  foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   
   }
	 
   return $newpagedata;
   }
	  public function sanantoniododge($url){//175
   $htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
  $fhtml=$dom->load($htmlpage);
	 $findthamp = $fhtml->find(".vdp-media-photo");
	 foreach($findthamp as $fthamp){
		 $getthamp = $fthamp->find(".imageContainer");
		if(($getthamp)>0){
	$adata = $fthamp->find(".imageChildren a");
	foreach($getthamp as $litagdta){
	$jacrsolitem = $litagdta->find("a");	  
	}
		foreach($adata as $imgedata){
		$imagedatas  = $imgedata->attr['href'];
		
		if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
	 }
	 $newpagedata['Image_Count']=count($jacrsolitem);
		}
		 else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
   return $newpagedata;
   }
   public function vara($url){//176
    $htmlpage=file_get_contents($url);
	$dom= new simple_html_dom();   
	 $fhtml=$dom->load($htmlpage);
	 $findthamp = $fhtml->find(".dealershipPhotoGallery-557b6520-db08-4297-a3a1-b889db348e62");
	 foreach($findthamp as $fthamp){
	  $getthamp = $fthamp->find('.deck',0);
	  if(($getthamp)>0){
		$figure = $getthamp->find('img');
		foreach($figure as $imgedata){
			  $imagedatas  = $imgedata->attr['data-src']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		   $newpagedata['Image_Count']=count($figure);
	   }
	   else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	   }
	    return $newpagedata;
	} 
	public function ingramparknissan($url){//177
    $htmlpage=file_get_contents($url);
 $fhtml=$dom->load($htmlpage);
	 $item = $fhtml->find(".js-carousel");
	 foreach($item as $imageurl){	
	 $mediaitem = $imageurl->find(".carousel__item"); 
	 if(($mediaitem)>0){
	 foreach($mediaitem as $media){
	 $image= $media->find("img");
	 foreach($image as $imgurl){
	if(isset($imgurl->attr['src'])){
	$imgload=$imgurl->attr['src'];
	$newpagedatass[]="https://www.ingramparknissan.com/".$imgload;
	}
	 }
	 $newpagedata['Thump_Image_URL_Pattern']=$newpagedatass;
	 }
	 $newpagedata['Image_Count']=count($newpagedatass);
	 }
	 else{ 
		   $newpagedata['Thump_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 }
	   return $newpagedata;
	 }
	    public function subarugeorgetown($url){//178
	 $htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
 $item = $fhtml->find("#photos-stock");
   foreach($item as $imageurl){
	 $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		   $adata = $imageurl->find(".jcarousel a");
	   foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			   $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem); 
	  }
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
   }
	return $newpagedata;
	 }	
	  public function gunnhonda($url){//179
	 $htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	$item = $fhtml->find("#photos");
	foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
   }
	return $newpagedata;
	 }	
	 
	  public function saford($url){//180
	 $htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
	$fhtml=$dom->load($htmlpage);
	 $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }	
	 
	  
	  public function fuelmotorcars($url){//181
	 $htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#right-div");
   foreach($item as $imageurl){
	  $thumbvehicle = $imageurl->find(".vehicle-thumbs");
	  if(($thumbvehicle)>0){
		  $adata = $imageurl->find(".vehicle-thumbs a");
	  foreach($thumbvehicle as $litagdta){
		  $thumblist = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($thumblist);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
   }
	return $newpagedata;
	 }	
	 
	 public function brondesfordtoledo($url){//182
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }
  public function byerskia($url){//183
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }
public function byerschryslerjeep($url){//184
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }
public function fallsmotorcity($url){//185
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }
public function ganleychryslerjeepdodge($url){//186
	$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
    
   }
	return $newpagedata;
	 }
	 public function autonationfordeast($url){//187
		$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
$fhtml=$dom->load($htmlpage);
 $item = $fhtml->find(".mod-vehicle-gallery");
  
	  foreach($item as $value){
		 $iteminfo=$value->find(".images");
		 
	 if(($iteminfo)>0){
			foreach($iteminfo as $valueinfo){
			$imagedata=$valueinfo->find("li");
			 
					foreach($imagedata as $pictureinfo){
				 
						 
						 $imageinfo=$pictureinfo->find('img',0)->attr['src'];
						 
						
						if(strpos($imageinfo,"http://")!==false ||strpos($imageinfo,"https://")!==false ){
				  $imgeurl[] = $imageinfo;	  
			 }
			 else{
				 $imgeurl[] = "http:".$imageinfo;
				   $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			  
					}
					
					
					 
					 $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			}
			$newpagedata['Image_Count']=count($imagedata);
			}
			
			 else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
	 } 
	 return $newpagedata;
 }
	public function genesishatfield($url){//188
	$htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	    }
     }
		return $newpagedata;
   }
	public function hatfieldhyundai($url){//189
	$htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
			}
		}
		return $newpagedata;
	}
	public function hatfieldkia($url){//190
	$htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
			}
		}
		return $newpagedata;
	}
	public function kriegerford($url){//191
	$htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
			}
		}
		return $newpagedata;
	}
	public function columbiahyundai($url){//192
	$subhtmlcontent=file_get_html($url);
    $findthamp = $subhtmlcontent->find("body");
     foreach($findthamp as $fthamp){
	 $findscript = $fthamp->find("script");
	  foreach($findscript as $fscript){
	  $valueSet = preg_match('/media.push(.*)/i', $fscript->innertext, $matches);
	   if($valueSet == 1){
	   $matchexplo = explode('// Add maufaturer photo data',$matches[0]);
	   $dividearray = explode(';',$matchexplo[0]); 
		foreach($dividearray as $darray){
		$individualarray = explode(',',$darray);
		 if(strpos($individualarray[0],"media.push")!==false){
         $data[] = str_replace(array("media.push({","src:","'"," "),"",$individualarray[0]);
		 }				
		}
	   }
	  }
     }
	 $newpagedata['Thumb_Image_URL_Pattern'] = $data; 
	 $newpagedata['Image_Count']=count($data);
	 return $newpagedata;
	 }
	 
	 public function hyundaiofohio($url){//193
	 $htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
   }
	return $newpagedata;
}

		public function taylorkiatoledo($url){//194
		$htmlpage = file_get_contents($url);
$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
 $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	 $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		   $adata = $imageurl->find(".jcarousel a");
	   foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			   $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
			
			
		  
		  $newpagedata['Image_Count']=count($jacrsolitem); 
	  }
	  else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
   }
		return $newpagedata;
}
	
		public function toyotawestohio($url){//195
		$htmlpage = file_get_contents($url);
		$dom= new simple_html_dom();   
 $fhtml=$dom->load($htmlpage);
  $item = $fhtml->find("#photos");
   foreach($item as $imageurl){
	  $jcarsoul = $imageurl->find(".jcarousel");
	  if(($jcarsoul)>0){
		  $adata = $imageurl->find(".jcarousel a");
	  foreach($jcarsoul as $litagdta){
		  $jacrsolitem = $litagdta->find("li");
		  
	  }
		  foreach($adata as $imgedata){
			  $imagedatas  = $imgedata->attr['href']; 
			 
			 if(strpos($imagedatas,"http://")!==false ||strpos($imagedatas,"https://")!==false ){
				 $imgeurl[] = $imagedatas;	
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			 else{
				 $imgeurl[] = "http:".$imagedatas;
				  $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
		  }
		  $newpagedata['Image_Count']=count($jacrsolitem);
	  }  
	  else{  
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  }
	 
   }
	return $newpagedata;
}

public function customcarswest($url){//196
	$htmlpage = file_get_contents($url);
	$dom= new simple_html_dom();   
$fhtml=$dom->load($htmlpage);
 $item = $fhtml->find(".mod-vehicle-gallery");
  
	  foreach($item as $value){
		 $iteminfo=$value->find(".images");
		 
	 if(($iteminfo)>0){
			foreach($iteminfo as $valueinfo){
			$imagedata=$valueinfo->find("li");
			 
					foreach($imagedata as $pictureinfo){
				 
						 
						 $imageinfo=$pictureinfo->find('img',0)->attr['src'];
						 
						
						if(strpos($imageinfo,"http://")!==false ||strpos($imageinfo,"https://")!==false ){
				  $imgeurl[] = $imageinfo;	  
			 }
			 else{
				 $imgeurl[] = "http:".$imageinfo;
				   $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			 }
			  
					}
					
					
					 
					 $newpagedata['Thumb_Image_URL_Pattern']= $imgeurl;
			}
			$newpagedata['Image_Count']=count($imagedata);
			}
			
			 else{ 
		   $newpagedata['Thumb_Image_URL_Pattern'] = "";
		    $newpagedata['Image_Count']= 0;
	  } 
	 } 
	 return $newpagedata;
	}
	
	public function clawandsledge($url){
		
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count']= 0;
		return $newpagedata;
	}
	
	public function joshuamotorsnj($url){
		
		$newpagedata['Thumb_Image_URL_Pattern'] = "";
		$newpagedata['Image_Count']= 0;
		return $newpagedata;
	}

}
	
?> 