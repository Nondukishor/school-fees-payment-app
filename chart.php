<!DOCTYPE html>
<html lang="en">
<head>
        <script src="js/highcharts.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Fees Payment System</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
</head>
<body>
	<?php
								include("php/header.php");
								include("php/dbconnect.php");
								include("php/checklogin.php");
                                $GetAllIncomeOverall    = "SELECT *,SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=1" ;
                                $GetAIncomeJan      = $conn->query($GetAllIncomeOverall);
                                $IncomeColJan       = mysqli_fetch_assoc($GetAIncomeJan);
                                $Jan          = $IncomeColJan['SUM(paid)'];
                                 $GetAllIncomeOverall    = "SELECT *,SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=2" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Feb          = $IncomeColOverall['SUM(paid)'];
                            

                                 $GetAllIncomeOverall    = "SELECT *, SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=3" ;
                                $GetAIncomeMar      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeMar);
                                $March          = $IncomeColOverall['SUM(paid)'];
                                
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=4" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $April          = $IncomeColOverall['SUM(paid)'];
                               
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=5" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $May          = $IncomeColOverall['SUM(paid)'];
                                
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=6" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $June          = $IncomeColOverall['SUM(paid)'];
                              
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=7" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $July          = $IncomeColOverall['SUM(paid)'];
                                
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=8" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Aug          = $IncomeColOverall['SUM(paid)'];
                                
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=9" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Sep          = $IncomeColOverall['SUM(paid)'];
                               
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=10" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Oct          = $IncomeColOverall['SUM(paid)'];
                                
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=11" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Nov          = $IncomeColOverall['SUM(paid)'];
                               
                                
                                 $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=12" ;
                                $GetAIncomeOverall      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeOverall);
                                $Dec          = $IncomeColOverall['SUM(paid)'];
                          
                                
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Fee  Chart
						
						</h1>
 <div id="container"></div>
                    </div>
                </div>
       
</div>
</div>
<div id="footer-sec">
    School Fees Payment System | Brought To You Nipu Chakraborty
    </div>

		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
            },



    title:{
        text:'Students Monthly fee'
    }
   ,
 


    xAxis: {
        categories: ['Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec','Jan', 'Feb'],
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Fee (Rs)',
            align: 'none'
        },

        labels: {
            overflow: 'justify',
            align: 'left',
                x: -15,
                y: 0,
        }
    },
    series: [{
        name: 'Total',
        data: [<?php echo $March; ?>,<?php echo $April;?>, <?php echo $May;?>, <?php echo $June;?>, <?php echo $July;?>, <?php echo $Aug;?>,<?php echo $Sep;?>,<?php echo $Oct;?>,<?php echo $Nov;?>,<?php echo $Dec;?>,<?php echo $Jan;?>,<?php echo $Feb;?>]
    }]
});
		</script>
		   <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="js/custom1.js"></script>

	</body>
</html>
