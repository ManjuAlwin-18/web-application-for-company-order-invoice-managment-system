<!DOCTYPE html>
<html lang="en">
<!--Head Includes starts-------------------------------------------------------------------------------------->
<?PHP include('../includes/head.php');?>
<!--Head Includes Ends---------------------------------------------------------------------------------------->

<body>

    <!--Navigation Includes Starts----------------------------------------------------------------------------->
    <?PHP include('../includes/navigation.php');?>
    <!--Navigation Includes Ends------------------------------------------------------------------------------->
    
    <!--Header Includes Starts--------------------------------------------------------------------------------->
    <?PHP include('../includes/header.php');?>
    <!--Header Includes Ends-------------------------------------------------------------------------------> 

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Company</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-elements">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Company Name</label>
                                                        <input type="text" class="form-control" id="txt_company_name" placeholder="Please Enter Company Name ">
                                                    </div>
                                                    

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" id="txt_phone_number" placeholder="Please Enter Phone Number ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email ID</label>
                                                        <input type="text" class="form-control" id="txt_email_id" placeholder="Please Enter Email ID ">
                                                    </div>
                                                    

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" rows="3" id="txt_address" placeholder="Please Enter Your Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="text" class="form-control" id="txt_fax" placeholder="Please Enter Fax ">
                                                    </div>
                                                    

                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>VAT</label>
                                                        <input type="text" class="form-control" id="txt_vat" placeholder="Please Enter VAT ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Country</label>
                                                        <select class="form-control" id="sel_country">
                                                            <option>Please Select Country</option>
															<option>New Zealand</option>
															<option>India</option>
															<option>China</option>
															<option>Japan</option>
															<option>US</option>
                                                            <option>UK</option>
                                                            <option>Germany</option>
                                                            <option>Spain</option>
                                                            <option>South Koreia</option>
                                                            <option>North Koreia</option>
                                                            <option>Autralia</option>
                                                            <option>Africa</option>
                                                            <option>Finland</option>
                                                            <option>Poland</option>
                                                            
														</select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                        <label style="height:18px;"></label><br>
                                                        <button type="button" style="width:200px;" id="btn_company_submit" class="btn btn-success m-b-10 m-l-5">Submit</button>
                                                    </div>
                                                </div>
                                            </div>

                                         

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="Table-content">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Bootstrap Data Table </h4>
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table  id="tbl_list_comapny" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No:-</th>
                                                    <th>CompanyName</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Fax</th>
                                                    <th>Vat</th>
                                                    <th>Coutry</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               
                                            </tbody>
                                           
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Navigation Includes Starts ---------------------------------------------------------->
                    <?PHP include('../includes/footer.php');?>
                    <!--Navigation Includes Ends ---------------------------------------------------------->
                </section> 
   
            </div>
        </div>
    </div>
    

    <!-- jquery vendor -->
    <script src="../js/lib/jquery.min.js"></script>
    <script src="../js/lib/jquery.nanoscroller.min.js"></script>
    <script src="../js/lib/toastr/toastr.min.js"></script>
    <script src="../js/lib/toastr/toastr.init.js"></script>
    <!-- nano scroller -->
    <script src="../js/lib/menubar/sidebar.js"></script>
    <script src="../js/lib/preloader/pace.min.js"></script>
   
     <!-- datatable js-->
     <script src="../js/lib/data-table/datatables.min.js"></script>
    <script src="../js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../js/lib/data-table/jszip.min.js"></script>
    <script src="../js/lib/data-table/pdfmake.min.js"></script>
    <script src="../js/lib/data-table/vfs_fonts.js"></script>
    <script src="../js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../js/lib/data-table/buttons.print.min.js"></script>
    <script src="../js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../js/lib/data-table/datatables-init.js"></script>
    <script src="../js/lib/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="../js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../js/lib/calendar-2/pignose.init.js"></script>

    


    <script src="../js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../js/lib/weather/weather-init.js"></script>
    <script src="../js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="../js/lib/chartist/chartist.min.js"></script>
    <script src="../js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="../js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
   
    <script src="../js/dashboard2.js"></script>
    <script src="../js/user_js/company.js"></script>
</body>

</html>
