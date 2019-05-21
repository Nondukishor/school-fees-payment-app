<?php
include("php/dbconnect.php");
include("php/checklogin.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>School Fees Payment System</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
    <!--Print-->
    <link href="validation/demo/print/css/normalize.min.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	 <link href="css/tableexport.css" rel="stylesheet">
	<link href="css/ui.css" rel="stylesheet" />
	<link href="css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />	
	<link href="css/datepicker.css" rel="stylesheet" />	
	   <link href="css/datatable/datatable.css" rel="stylesheet" />
	   
    <script src="js/jquery-1.10.2.js"></script>	
    <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
 

		 <script src="js/dataTable/jquery.dataTables.min.js"></script>
		
		 
	
</head>
<?php
include("php/header.php");

?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Report  
						
						</h1>

                    </div>
                </div>
				
				
	
		
		

<div class="row" style="margin-bottom:20px;">
<div class="col-md-12">
<fieldset class="scheduler-border" >
    <legend  class="scheduler-border">Search:</legend>
<form class="form-inline" role="form" id="searchform" method="POST" action="dates.php">
  <div class="form-group">
    <label for="email">Start Date</label>
    <input type="text" class="form-control" id="doj" placeholder="From" required name="start">
  </div>
  
   <div class="form-group">
    <label for="email">End Date </label>
<input type="text" class="form-control" id="end" placeholder="To" required name="end">  
  <div class="form-group">
    <label for="email"> Campus </label>
    <select  class="form-control" id="branch" name="branch" required>
		<option value="" name="Campus">Select Campus</option>
                          <?php
                  $sql = "select * from branch where delete_status='0' order by branch.branch asc";
                  $q = $conn->query($sql);
                  while($r = $q->fetch_assoc())
                  {
                  echo '<option value="'.$r['id'].'"  '.(($branch==$r['id'])?'selected="selected"':'').'>'.$r['branch'].'</option>';
                  }
                  ?>         
	</select>
  </div>
  
   <button type="submit" name="submit" class="btn btn-success btn-sm" id="" > Find </button>
  <button type="reset" class="btn btn-danger btn-sm" id="clear" > Clear </button>
</form>
</fieldset>

</div>
</div>


		<div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Fees  
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive" id="subjectresult" data-name="cool-table">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                          
                                            <th>Name</th>                                            
                                            <th>GR</th>
											<th>Class</th>
										<th>Fee</th>
                                  </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(isset($_POST['submit'])){
                                     $start=$_POST['start'];
                                     $Campus=$_POST['branch'];
                                     $end=$_POST['end'];
                                    $sql = "select *  from student, fees_transaction where student.id=fees_transaction.stdid and submitdate between '$start' and '$end' and student.branch=$Campus";
                                    $q = $conn->query($sql);
                                    while($r = $q->fetch_assoc()){          
                                    echo '<tr><td>'.$r['sname'].'</td>';
                                    echo '<td>'.$r['joindate'].'</td>';
                                    echo '<td>'.$r['contact'].'</td>';
                                    echo '<td>'.$r['paid'].'</td></tr>';
                   
                }
              }
                  ?>
								    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
	

    			
            
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

    <div id="footer-sec">
   School Fees Payment System | Brought To You Nipu Chakraborty
    </div>
   <script type="text/javascript">
    $( "#doj" ).datepicker({
dateFormat:"yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "2018:<?php echo date('Y');?>"
}); 
        $( "#end" ).datepicker({
dateFormat:"yy-mm-dd",
changeMonth: true,
changeYear: true,
yearRange: "2018:<?php echo date('Y');?>"
}); 
       
   </script>
  
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>
    <!--<script type="text/javascript" src="js/TableExport.js/jquery.tableexport.js"></script>-->
    <script type="text/javascript" src="js/jquery.tableexport.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
                            <script type="text/javascript">
                              $("table").tableExport({
    separator: ",",                         // [String] column separator, [default: ","]
    headings: true,                         // [Boolean], display table headings (th elements) in the first row, [default: true]
    buttonContent: "Export to CSV",              // [String], text/html to display in the export button, [default: "Export file"]
    addClass: "pull-right",                           // [String], additional button classes to add, [default: ""]
    defaultClass: "btn",                    // [String], the default button class, [default: "btn"]
    defaultTheme: "btn-success",            // [String], the default button theme, [default: "btn-default"]
    type: "csv",                            // [xlsx, csv, txt], type of file, [default: "csv"]
    fileName: "<?php echo $start." to ".$end;?>",                     // [id, name, String], filename for the downloaded file, [default: "export"]
    position: "bottom",                     // [top, bottom], position of the caption element relative to table, [default: "bottom"]
    stripQuotes: true                       // [Boolean], remove containing double quotes (.txt files ONLY), [default: true]
});
                            </script>
    
</body>
</html>