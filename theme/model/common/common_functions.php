<?php //session_start();?>
<?php 

include "../db_connection/connection.php" ;
//include('../../view/template/includes/en_de_header.inc');



abstract class FunctionDefinitions
{
	abstract public function ListFromTable($SQL);
    abstract public function AddToTable($SQL);
    abstract public function ReturnCountValue($SQL);
	abstract public function CreateDropDown($SQL,$value,$text,$controlName,$title);
	abstract public function returnValuefromDB($SQL,$item);
	abstract public function UpdateTable($SQL);
	abstract public function DeleteRow($SQL);
    abstract public function userAuthenticationforcheck($SQL,$password);
	abstract public function SignOut();
	abstract public function ExecuteProcedure($SQL);
	abstract public function CreateDropDownForSite($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function ExecuteProcedureForReturnTableFormat($SQL);
	abstract public function ListFromAcntsTable($SQL);
	abstract public function CreateDropDownforProject($SQL,$value,$value1,$value2,$text,$controlName,$title);
	abstract public function CreateDropDownforSubject($SQL,$value,$value1,$text,$controlName,$title);
	abstract public function ChangePassword($SQL,$password);
}

class CommonModel extends FunctionDefinitions
{
	public $varDBConnection,$varAcntConnection;
	var $result;
	var $flag=0;
	

	function __construct()
	{
		$DBConn = new DBConnection();
		$this->varDBConnection = $DBConn->ConnectToMYSQL();
	//	$OBJ = new URLEncription();
	//	$this->varEncode = $OBJ->URLEncode('title=dashboard');
   //	$ACNTConn= new AcntConnection();
	//	$this->varAcntConnection=$ACNTConn->ConnectToMYSQLAcnts();
	}

	public function ListFromTable($SQL)
	{
		//echo $SQL;
	//	$statSQL= 'SET CHARACTER SET utf8'; 
	 $this->varDBConnection->query("SET character_set_client=utf8");
     $this->varDBConnection->query("SET character_set_connection=utf8");
     $this->varDBConnection->query("SET character_set_results=utf8");
		$temp = array();
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
		}
		$this->flag=1;
		echo json_encode($temp);
		
	}
	
		public function ListFromAcntsTable($SQL)
	{
		//echo $SQL;
		$temp = array();
		$this->result = mysqli_query($this->varAcntConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$temp['data'][] = $row;
		}
		$this->flag=1;
		echo json_encode($temp);
		
	}
  

    function ReturnCountValue($SQL)
	{
			$this->result = mysqli_query($this->varDBConnection,$SQL);
			$affected_status = mysqli_num_rows($this->result);
			$this->flag=0;
			return $affected_status;
	}
	

	public function CreateDropDown($SQL,$value,$text,$controlName,$title)
	{
		
		$str = "<select class='form-control form-control-sm'  id='".$controlName."' name='".$controlName."'><option value=0>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$str=$str."<option value='".trim($row[$value])."'>".trim($row[$text])."</option>";
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	
	
	
	public function CreateDropDownForSite($SQL,$value,$value1,$value2,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
			//$str=$str."<option value=".$row[$value]."-".$row[$value1]."-".$row[$value2].">".$row[$text]."</option>";
			$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	public function CreateDropDownForSubject($SQL,$value,$value1,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
	
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
		$str=$str."<option value=".trim($row[$value])."-".trim($row[$value1]).">".trim($row[$text])."</option>";
			//$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}

		public function CreateDropDownforProject($SQL,$value,$value1,$value2,$text,$controlName,$title)
	{
	
		$str = "<select class='form-control form-control-sm'  id='".$controlName."' name='".$controlName."'><option value='0'>".$title."</option>";
		$this->result = mysqli_query($this->varAcntConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
		   
			$str=$str."<option value=".trim($row[$value])."/".trim($row[$value1]).">".$row[$text]." ( ".trim($row[$value1])." )"."</option>";
			//$str=$str."<option value=".$row[$value].">".$row[$text]."</option>";	
		}

		$str = $str .'</select>';

		$this->flag=1;
		echo $str;
		
	}
	
	
	public function returnValuefromDB($SQL,$item)
	{
		
		$res=0;
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		while($row=mysqli_fetch_assoc($this->result)) {
			$res=$row[$item];
		}

		$this->flag=0;
		echo $res;
		return $res;
		
	}
    
   
	
  

	public function userAuthenticationforcheck($SQL,$password)
	{
	
        $user_username;
		$user_password;
        $return_string="";
		$this->result = mysqli_query($this->varDBConnection,$SQL);
		$row_count = mysqli_num_rows($this->result);
		
		if($row_count>=1)
		{

            while($row=mysqli_fetch_assoc($this->result))
             {
			
				$user_id =$row['user_id'];
				$name =$row['name'];
                $username =$row['username'];
        		$user_password =$row['password'];
                $user_status =$row['status'];
                $user_type =$row['user_type'];
				$roles_id =$row['roles_id'];
                $permission =$row['roles_permissions'];
                $comments =$row['comments'];
                $roles_name =$row['roles_name'];
			 }
			
			if($user_status=='Active')
			{
			   
				if($password==$user_password)
				{
					session_start();
			  	  
									
									$_SESSION["loggedin"] = "true";
									$_SESSION["name"] = $name;
								    $_SESSION["username"] = $username;
									$_SESSION["password"] = $user_password; 
									$_SESSION["user_id"] =  $user_id; 
									
									$_SESSION["user_status"] = $user_status;
									$_SESSION['LOGINSTATUS']='true';
									$_SESSION['user_type']=$user_type;
									$_SESSION['roles_id']=$roles_id;
									$_SESSION['permission']=$permission;
									$_SESSION['comments']=$comments;
									$_SESSION['roles_name']=$roles_name;
									
									
									$return_string="../view/index.php";
									return 'true'.'#'.$return_string;
				}
				else
				{
					return 'Please provide correct password...!';
				}

			}
			else
			{
				return 'Your Login is not active, Please contact your administrator..!';
			}
			
		
		}
		else
		{
			return 'Username does not Exists...!';
		}
		
		
		
		$this->flag=1;
		
		
	}



	
	
	function AddToTable($SQL)
	{
		try { 
				mysqli_query($this->varDBConnection, $SQL);
				$inserted_id = mysqli_insert_id($this->varDBConnection);
				$this->flag=0;
				echo $inserted_id;
				return $inserted_id;
		}
		catch (mysqli_sql_exception $e) { 
			return $e->errorMessage(); 
		} 
		//exit();
		
	}

	function UpdateTable($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			//echo $affected_status;
	}




	function DeleteRow($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			$affected_status = mysqli_affected_rows($this->varDBConnection);
			$this->flag=0;
			echo $affected_status;
	}
	

	
    
	public function SignOut()
	{
	
		session_start();
		$_SESSION = array();
		session_destroy();
	}

   public function ExecuteProcedure($SQL)
	{
			$retval = mysqli_query($this->varDBConnection, $SQL);
			if (!($res = $this->varDBConnection->query("SELECT @msg as _p_out"))) {
				echo "Fetch failed: (" . $this->varDBConnection->errno . ") " . $this->varDBConnection->error;
			}
			$row = $res->fetch_assoc();
			$this->flag=0;
			
			echo $row['_p_out'];
		
			
	}
	
	
	function ExecuteProcedureForReturnTableFormat($SQL) 
	{	
			$temp = array();
			$this->result = mysqli_query($this->varDBConnection,$SQL);
			while($row=mysqli_fetch_assoc($this->result)) {
			
				$temp['data'][] = $row;
			}
	
			$this->flag=1;
			
			echo json_encode($temp);

	}
	function ChangePassword($SQL,$password)
	{
		$this->result = mysqli_query($this->varDBConnection,$SQL);
	
			while($row=mysqli_fetch_assoc($this->result)) {
				$old_password= $row['user_password'];
				
			}
		
			if(strcmp($old_password,$password)==0)
				{
					echo 'success';
				}
				else
				{
					echo 'Please provide correct password...!';
				}

	
		$this->flag=1;	
		
			
    }

	function __destruct() {
		if($this->flag==1)
		{
			mysqli_free_result($this->result);
		}
		
		mysqli_close($this->varDBConnection);
		//mysqli_close($this->varAcntConnection);
		//print "Destroying " . __CLASS__ . "\n";
		
    }
	
	

}

?>