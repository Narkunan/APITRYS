<?php
require_once("global.php");
require_once("../../Model/Php/DisplayContent.php");

$city=$_GET['city'];

/**
 * This class is Responsible for get City info.
 */
class GetPincode
{

   /**
   * Get Response from api by calling the object of API class.
   * 
   * Call the getResponsePincode() function.
   * 
   * Call the parsejson function.
   * 
   * @param array $jsonarray.
   * 
   * @param string $city.
   * 
   * @param Api $obj.
   * 
   * @return void.
   * 
   * @access public.
   */
    public function callApi(string $city,Api $obj):void
	{

        $response=$obj->getResponsePincode($city);
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
   * @access public.
   * 
   * @return void.
   */
    public function parseJson(array $jsonarray):void
	{

        $city=$jsonarray[0]['display_name'];
        $getcity=new DisplayContent();
        $printstring=$getcity->printCityorPincode($city);
        echo $printstring;

	}

}

$callapi=new GetPincode();
$callapi->callapi($city,$obj);