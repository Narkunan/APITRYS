<?php

require_once("global.php");

require_once("../../Model/Php/DisplayContent.php");

$pincode=$_GET['pincode'];

/**
 * This class is responsible for get City Info.
 */
class GetCity
{
   /**
   * Get Response from api by calling the object of API class.
   * 
   * Call the getResponseCity() function.
   *   
   * Call the parsejson function. 
   *  
   * @return void.
   * 
   * @param array $jsonarray. 
   * 
   * @param string $pincode.
   * 
   * @access public.
   * 
   */
	public function callApi(string $pincode,Api $obj):void
	{

     	$response=$obj->getResponseCity($pincode);
      	$jsonarray=json_decode($response,true);
      	$this->parseJson($jsonarray);

	}

   /**
   * This function is for parse json. 
   * 
   * Call the printcity or pincode to print city data.
   * 
   * @param array $jsonarray.
   * 
   * @var string $city.
   * 
   * @return void.
   * 
   * @access public.
   */

	public function parseJson(array $jsonarray):void
	{

     	$city=$jsonarray[0]['display_name'];
     	$getcity=new DisplayContent();
     	$printstring=$getcity->printCityorPincode($city);
     	echo $printstring;
	}

}

$callapi=new GetCity();
$callapi->callapi($pincode,$obj);

