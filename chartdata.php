<?php
								
								include("php/dbconnect.php");                              
                                  $GetAllIncomeOverall    = "SELECT SUM(paid)  FROM fees_transaction WHERE  month(`submitdate`)=3" ;
                                $GetAIncomeMar      = $conn->query($GetAllIncomeOverall);
                                $IncomeColOverall       = mysqli_fetch_assoc($GetAIncomeMar);
                                $March          = $IncomeColOverall['SUM(paid)'];
                            
 ?>
 