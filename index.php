<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-SAP database CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
    <style type="text/css">
        .wrapper{
            width: 950px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
		
    </style>
	
    <script type="text/javascript">
        $(document).ready(function(){
    //        $('[data-toggle="tooltip"]').tooltip();  	

  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
        });

    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
					    <h1 class="pull-center">PHP-SAP database CRUD</h1>
                        <h2 class="pull-left">Product Inventory</h2>
                    </div>
									
<a href="create.php" class="btn btn-success pull-right">Add Data</a>
<input type="text" id="myInput" placeholder="Type to search">
<br></br>  
<?php
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th bgcolor='#ccccff'>Product ID</th>";
                                        echo "<th bgcolor='#ccccff'>Name</th>";
                                        echo "<th bgcolor='#ccccff'>Category</th>";
                                        echo "<th bgcolor='#ccccff'>Available</th>";
                                        echo "<th bgcolor='#ccccff'>Unit Price</th>";
										echo "<th bgcolor='#ccccff'>Date Checked</th>";
										echo "<th bgcolor='#ffd480'>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody id='myTable'>";						
$url = 'http://saprestdev.saprest.com:8000/sap(bD1lbiZjPTAxMA==)/bc/bsp/sap/zres_app/z1.htm';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$result = curl_exec($curl);
curl_close($curl);
unset($curl); 

//$result = '{"PRODUK":[{"MANDT":"","PRODUCTID":"PROD004","NAME":"Aromatherapy gel","CATEGORY":"Pharmacy","AVAILABLE":"57","UNITPRICE":"18","DATECHECKED":"20190925"}]}';
// json convert into array to remove root node 
$array1 = current(json_decode($result, true));
// array convert into json 
$json1 = json_encode($array1);
// json convert into array for get value
$array = json_decode($json1, true); 
 for($i=0;$i<count($array);$i++){ 
    $productid = $array[$i]['PRODUCTID'];
	$name = $array[$i]['NAME'];
	$category = $array[$i]['CATEGORY'];
	$available = $array[$i]['AVAILABLE'];
	$unitprice = $array[$i]['UNITPRICE'];
	$datechecked = $array[$i]['DATECHECKED']; 
 echo "<tr><td>" . $productid . "</td>";
 echo "<td>" . $name . "</td>";
 echo "<td>" . $category . "</td>";
 echo "<td>" . $available . "</td>";	
 echo "<td>" . $unitprice . "</td>";	 
 echo "<td>" . $datechecked . "</td>";
 echo "<td>";
 echo "<a href='read.php?r_productid=". $productid ."&r_name=". $name ."&r_cat=". $category ."&r_avail=". $available ."&r_price=". $unitprice ."&r_date=". $datechecked ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
 echo "<a href='update.php?u_productid=". $productid ."&u_name=". $name ."&u_cat=". $category ."&u_avail=". $available ."&u_price=". $unitprice ."&u_date=". $datechecked ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
 echo "<a href='delete.php?d_productid=". $productid ."&d_name=". $name ."&d_cat=". $category ."&d_avail=". $available ."&d_price=". $unitprice ."&d_date=". $datechecked ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>"; 
 echo "</td>";
 echo "</tr>"; 
 }
  echo "</tbody>";                            
  echo "</table>"; 
?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>