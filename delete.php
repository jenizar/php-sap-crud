<?php
// Define variables and initialize with empty values
$productid_err = $name_err = $category_err = $available_err = $unitprice_err = $datechecked_err = "";					

if (isset($_GET["d_productid"], $_GET["d_name"], $_GET["d_cat"], $_GET["d_avail"], $_GET["d_price"], $_GET["d_date"]))
{
$productid = $_GET["d_productid"];		
$name = $_GET["d_name"];		
$category = $_GET["d_cat"];
$available = $_GET["d_avail"];
$unitprice = $_GET["d_price"];
$datechecked = $_GET["d_date"];
}
// Process delete operation after confirmation	
	if(isset($_POST["id"]) && !empty($_POST["id"]))
{
$productid = $_POST["productid"];
    $data  = array( 'd_productid'=>$productid ); 
	$postvars = '';
  foreach($data as $key=>$value) {
    $postvars .= $key . "=" . $value;
  }	
$url = 'http://saprestdev.saprest.com:8000/sap(bD1lbiZjPTAxMA==)/bc/bsp/sap/zres_app/z1.htm';
echo $productid;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec ($ch);

  curl_close ($ch);
  header("Location: index.php");
}	
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Delete Data</h2>
                    </div>
                    <p>Detail Data</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <table class='table table-bordered table-striped'>
<tr>
<td><label>Product ID</label></td>
<td><input type="text" name="productid" class="txtField" value="<?php echo $productid; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
<tr>
<td><label>Name</label></td>
<td><input type="text" name="name" class="txtField" value="<?php echo $name; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
<tr>
<td><label>Category</label></td>
<td><input type="text" name="category" class="txtField" value="<?php echo $category; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
<tr>
<td><label>Available</label></td>
<td><input type="text" name="available" class="txtField" value="<?php echo $available; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
<tr>
<td><label>Unit Price</label></td>
<td><input type="text" name="unitprice" class="txtField" value="<?php echo $unitprice; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
<tr>
<td><label>Date Checked</label></td>
<td><input type="text" name="datechecked" class="txtField" value="<?php echo $datechecked; ?>" style="background-color:black; color:Lime;" readonly="readonly"></td>
</tr>
        <tr>
            <td></td>
            <td>					
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Delete">
                        <a href="index.php" class="btn btn-default">Cancel</a>
		    </td>
		</tr>
                    </table>				
                </div>
            </div>        
        </div>
    </div>
</body>
</html>