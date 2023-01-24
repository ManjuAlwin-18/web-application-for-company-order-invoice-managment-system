<?php
class DBConnection
{

    function ConnectToMYSQL()
    {
        
      $con = mysqli_connect("localhost:3308","root","123","application");
        
      if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $con;
    }
   
       
}
// class AcntConnection
// {

//     function ConnectToMYSQLAcnts()
//     {
        
//       $acnt_con = mysqli_connect("localhost","sianlab_accountsuser","s@nds1@b","sianlab_accounts");

//       if (mysqli_connect_errno())
//         {
//         echo "Failed to connect to MySQL: " . mysqli_connect_error();
//         }
//         return $acnt_con;
//     }


// }


?>
