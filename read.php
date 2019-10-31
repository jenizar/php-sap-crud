<?php
// Define variables and initialize with empty values
$productid_err = $name_err = $category_err = $available_err = $unitprice_err = $datechecked_err = "";					

if (isset($_GET["r_productid"], $_GET["r_name"], $_GET["r_cat"], $_GET["r_avail"], $_GET["r_price"], $_GET["r_date"]))
{
$productid = $_GET["r_productid"];		
$name = $_GET["r_name"];		
$category = $_GET["r_cat"];
$available = $_GET["r_avail"];
$unitprice = $_GET["r_price"];
$datechecked = $_GET["r_date"];
}
	
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Data</title>
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
                        <h2>Display Data</h2>
                    </div>
                    <p>Detail Data</p>
			
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
                <a href="index.php" class='btn btn-primary'>Back</a>
            </td>
        </tr>
                    </table>				
                </div>
            </div>        
        </div>
    </div>
</body>
</html>