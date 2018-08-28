<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>HBM | Customer History</title>
        <?php include '../includes/js_css_links.php'; ?>
    </head>
    <body class="nav-md">
        <?php include '../config/config.php'; ?>
        <div class="container body">
            <div class="main_container">
                <!-- Menu--> 
                <?php include '../includes/left_menus.php'; ?>
                <!-- Menu-->       
                <!-- top navigation -->                
                <?php include '../includes/top_navigation.php'; include '../models/models.php';
                if(isset($arr[11])){ $accessControl=$arr[11]; }else{ $accessControl=0; } ?>
                <?php if($accessControl['View']==1){ } else{ header('location:index.php'); }
                ?>             
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <!--h3>Dashboard</h3-->
                            </div>                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6 col-xs-12">
                             <div class="x_panel">
                               <div class="x_title">
                                <h2>Customer Report <small>Sessions</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                               <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="x_content">
                    <?php 
                      if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!=""){ $start_date=$_REQUEST['start_date']; }else{ $start_date=''; }
                      if(isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=""){   $end_date=$_REQUEST['end_date']; }else{ $end_date=''; }
                      if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" || isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=""){ $status=1;}else{ $status=0;}
                      ?>                     
                                                                <form id="demo-form-user" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                                                    <br/> 
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date:
                                                                        <input type="text" id="single_cal5" name="start_date" placeholder="Start Date" aria-describedby="inputSuccess2Status3"  readonly="" value="<?php echo $start_date;?>" />
                                                                        </label>                                                                        
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Date:
                                                                        <input type="text" id="single_cal6" name="end_date" placeholder="End Date" aria-describedby="inputSuccess2Status4" readonly="" value="<?php echo $end_date;?>" />
                                                                        </label>
                                                                        </div>                                                                    
                                                                    <div class="ln_solid"></div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                            <button type="submit" class="btn btn-success">Search</button>
                                                                            <button type="button" onclick="refreshPage();" class="btn btn-primary">Clear</button>
                                                                        </div>
                                                                    </div>
                                                                </form>  
                             </div>
                             </div>

                      <div class="clearfix"></div>
                            <div class="x_content">
                                <table style="width:100%!important;" id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                     <tr>
                                      <th>Customer Name</th>
                                      <th>Contact No</th>
                                      <th>Address</th>
                                      <th>Booking History</th>
                                     </tr>
                                  </thead>
                                  <tbody id="clientsitedetails_row">
                                          <?php $restuaranthappyhoursrows = get_customerhistory($start_date,$end_date,$status,$con); //echo '<pre>';  print_r($restuaranthappyhoursrows);
                                                if($restuaranthappyhoursrows != 0) {
                                                   for($hapyhourrow = 0; $hapyhourrow < count($restuaranthappyhoursrows); $hapyhourrow++) {
                                          ?>     <tr>
                                                   <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['name']; ?></td>
                                                   <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['contact_no']; ?></td>
                                                   <td><?php echo $restuaranthappyhoursrows[$hapyhourrow]['address']; ?></td>
                                                    <td><a href="#">Show</a></td>
                                                 </tr>
                                          <?php
                                                         }
                                                       } else {
                                                  }
                                          ?>
                                  </tbody>
                                </table>
                               </div> 
                             </div>
                        </div>
                      </div>
               </div>                                      
        </div>
        </div>
        </div>
        </div>                         

        <!-- /page content -->
        <!--Modal Starts Here -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: medium none !important;padding: 5px;">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body" id="patrolling_detail">
                    </div>
                </div>
            </div>
        </div>        
        <!--Modal Ends Here -->
        <!-- footer content -->
<?php include '../includes/footer.php'; ?>
        <!-- /footer content -->
        <!-- Parsley -->
<style type="text/css"> 
.glyphicon-ok-sign::before{ color: white; }
#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}
</style>
<script type="text/javascript">
  $(document).ready(function () {

      var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable({ "order": [[ 3, "desc" ]]});
        $('#datatable-scroller').DataTable({
            ajax: "../js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        TableManageButtons.init();
    });
$(document).ready(function () {
 $(".select2_single").select2({ placeholder: "Select a option",allowClear: true });
 $('#single_cal5').daterangepicker({ singleDatePicker: true,calender_style: "picker_3",format: 'YYYY-MM-DD',}, function(start, end, label) { console.log(start.toISOString(), end.toISOString(), label); });  
 $('#single_cal6').daterangepicker({ singleDatePicker: true,calender_style: "picker_4",format: 'YYYY-MM-DD',}, function(start, end, label) { console.log(start.toISOString(), end.toISOString(), label);});
 $('#reservation').daterangepicker(null, function(start, end, label) { });
 });
 function refreshPage(){ window.location = window.location.href; }
</script>
</body>
</html>