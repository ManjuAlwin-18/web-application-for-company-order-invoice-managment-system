$(document).ready(function(){
  

 	// $("#select_player").change(function(e){
 	    
 	//       v_coach_player_id_val=$("#select_player option:selected").val();
 	//      //alert(v_coach_player_id);
 	//      var res = v_coach_player_id_val.split("_");
 	//      v_coach_player_id=res[0];
 	//       v_player_personal_id=res[1];
 	     
 	// });
	
                 
       	
    $("#btn_company_submit").click(function(e){
                
       
        var v_company_name=$("#txt_company_name").val();
		var v_phone_number=$("#txt_phone_number").val();        
		var v_email_id=$("#txt_email_id").val();        
        var v_address=$("#txt_address").val(); 
        var v_fax=$("#txt_fax").val(); 
        var v_vat=$("#txt_vat").val(); 
        var v_country=$("#sel_country option:selected").val(); 
                
                
            $.post("../controller/company_controller.php",{action:'add_company',
					v_company_name:v_company_name,v_phone_number:v_phone_number,
					v_email_id:v_email_id,v_address:v_address,v_fax:v_fax,v_vat:v_vat,v_country:v_country}
                                , function(result,status)
                                  {
                                    if(result.charAt(0)=='U')
                                    {
                                     $('#toastr-danger-top-right').toast('show');
                                     clear_text_company()
                                     
                                    }
                                    else 
                                    {
                                      //$('#toastr-success-top-right').toast('show');
                                        alert("success")
                                      //load_data_to_grid_registered_association_list_dis();
                                        clear_text_company();
                                    }
                                    
                                     
                                
                        }); 
                
    });

    function clear_text_company()
        {
            $("#txt_company_name").val('');
            $("#txt_phone_number").val('');
            $("#txt_email_id").val('');
            $("#txt_address").val('');
            $("#txt_fax").val('');
            $("#txt_vat").val('');
            $("#sel_country option:selected").val(''); 

        } 
      

});