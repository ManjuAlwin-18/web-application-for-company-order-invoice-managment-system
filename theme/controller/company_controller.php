<?php session_start();

require ('../model/common/common_functions.php');


class sportController
{
        var $varModelObj,$varDBConnection;
        public $actionevents ;
        
        
    function __construct()
	{
	    
        
        $this->varModelObj = new CommonModel();
        $this->varDBConnection = $this->varModelObj->varDBConnection;
        $this->actionevents = $_POST['action'];

	
	   
		
		$this->com_company_name = $this->varDBConnection->real_escape_string($_POST['v_company_name']);
        $this->com_phone_number =$this->varDBConnection->real_escape_string($_POST['v_phone_number']);
		$this->comapny_email_id=$this->varDBConnection->real_escape_string($_POST['v_email_id']);
		$this->company_address=$_POST['v_address'];
 		$this->company_fax=$this->varDBConnection->real_escape_string($_POST['v_fax']);
 		$this->company_vat=$this->varDBConnection->real_escape_string($_POST['v_vat']);
 		$this->company_country=$this->varDBConnection->real_escape_string($_POST['v_country']);
 			
        date_default_timezone_set('Asia/Bahrain');
        $this->current_date = date("Y-m-d h:i:s");
       
    }
    
    
    
    function SQLArray()
    { 
        $array =  array();
      
         
	        $array[1] = "call proc_add_company('".$this->com_company_name."','".$this->com_phone_number."','".$this->comapny_email_id."','".$this->company_address."','".$this->company_fax."','".$this->company_vat."','".$this->company_country."',@msg)";
          
    
        return $array;
    }
    function RequestAccept($FunctionEvents)
    {
        $var =  $this->SQLArray();
      
        switch ($FunctionEvents)
        {
           
            case 'add_company':
				 echo $var[1];
                $this->varModelObj->ExecuteProcedure($var[1]);
            break;
           
            
            
            default:
             echo 'No Action Found...!';
             break;
            
        }

    }
}//end of class

$obj = new sportController();
$obj->RequestAccept($obj->actionevents);
?>