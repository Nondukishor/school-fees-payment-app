<?php
require_once "DatabaseBackup.php";
require_once "php/header.php";
$databaseBackup = new DatabaseBackup();

if(!empty($_POST["table"]) && count($_POST["table"]) > 0) {
    $databaseBackup->backupDatabase($_POST["table"]);
}

$tables = $databaseBackup->getAllTable();

?>

<HTML>
<head>
<title>School Fees Payment System</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
<style>


div#database-export-container {
	background: #d5dde2;
}

.checkbox-row-header {
	padding: 10px 15px;
	border-bottom: #c3cbd0 1px solid;
	color: #71777b;
	overflow: auto;
}

.checkbox-row {
	padding: 10px 15px;
	border-bottom: #d9e1e6 1px solid;
	background: #e2eaef;
	color: #8c9296;
	clear: both;
}

input#btnAction {
	padding: 6px 25px;
	background: #71777b;
	border: #5e6367 1px solid;
	color: #FFF;
	font-size: 0.9em;
	border-radius: 4px;
	float: right;
    cursor:pointer;
}

#database-export-container input[type=checkbox] {
	vertical-align: text-top;
}

#error-message {
    padding: 12px 20px;
    display: none;    
    color: #424242;
    background-color: #F7902D;
}

#success-message {
    padding: 8px 20px;
    display: none;
    color: rgb(40, 40, 40);
    background-color: #48e0a4;
}
</style>

<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function () {
$("#checkbox-header").on("change", function() {
    if ($(this).is(':checked')) {
       $(".checkbox-input").prop("checked",true);
    } else {
    	   $(".checkbox-input").prop("checked",false);
    }
});

});
function validateCheckbox() {
    var valid = true;
    var checkedLength = $(".checkbox-input:checked").length;
    if(parseInt(checkedLength) <= 0) {
        $("#error-message").show();
        $("#error-message").html("Check atleast 1 Table to Export");
        valid= false;
    }
    if(valid) {
        $(".checkbox-input").each(function(){
            if($(this).prop("checked") == true) {
            	    var tableName = $(this).data("table-name");
                $(this).next(".checkbox-tablename").val(tableName);
            } else {
                $(this).next(".checkbox-tablename").val("");
            }
        });
    }
    return valid;
}
</script>
</head>
<body>
    <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" ></span>Database Backup  
                        
                        </h1>
<div id="database-export-container">
<div id="checkbox-container">
<form name="frmDatabaseBackup" method="post" action="" onSubmit="return validateCheckbox();">
<div class="checkbox-row-header"><div style="
    float: left;
    vertical-align: text-top;
    padding-top: 6px;
"><input type="checkbox" name="" id="checkbox-header"> Check/Uncheck All</div><input type="submit" name="submit" id="btnAction" value="Export"></div>
<?php 
if(!empty($tables))
{
    
    foreach($tables as $table) 
    {
?>
<div class="checkbox-row">
<input type="checkbox" class="checkbox-input" data-table-name="<?php echo $table; ?>"> <?php echo $table; ?>
<input type="hidden" name="table[]" vaule="<?php echo $table; ?>" class="checkbox-tablename">
</div>
<?php
    }
}
?>
</form>
</div>
</div>
<div id="error-message"></div>
</div>
</div>
</div>
</body></HTML>