
<?php
require ('../model/common/common_functions.php');

class companycontroller
{
    var $varModelObj;
    public $actionevents,$varDBConnection,$v_company_name,$v_phone_number,$v_email_id,$v_address,$v_fax,$v_vat,$v_country;
    function __construct()
    {
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents=$_POST['action'];
       
		$this->com_company_name = $_POST['v_company_name'];
        $this->com_phone_number =$_POST['v_phone_number'];
		$this->comapny_email_id=$_POST['v_email_id'];
		$this->company_address=$_POST['v_address'];
 		$this->company_fax=$_POST['v_fax'];
 		$this->company_vat=$_POST['v_vat'];
 		$this->company_country=$_POST['v_country'];
 		
    }
    function SQLArray()
    { 
        $array =  array();
      
        $array[1] = "call proc_add_company('".$this->com_company_name."','".$this->com_phone_number."','".$this->comapny_email_id."','".$this->company_address."','".$this->company_fax."','".$this->company_vat."','".$this->company_country."',@msg)";
            
        $array[2] = "SELECT * FROM `company`  order by company_id desc";
        
        
        return $array;
    }
    function RequestAccept($FunctionEvents)
    {
		
		
        $var =  $this->SQLArray();
      
        switch ($FunctionEvents)
        {
            
            case 'add_company':
                //echo $var[1];
               $this->varModelObj->ExecuteProcedure($var[1]);
           break;

           case 'list_company':
                //echo $var[2];
               $this->varModelObj->ListFromTable($var[2]);
           break;
          


                 default:
                 echo 'No Action Found...!';
                 break;
                
        }

    }
}//end of class

$obj = new companycontroller();
$obj->RequestAccept($obj->actionevents);
?>