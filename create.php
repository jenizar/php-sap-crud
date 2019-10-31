<?php
// Define variables and initialize with empty values
$productid_err = $name_err = $category_err = $available_err = $unitprice_err = $datechecked_err = "";					
$productid = $name = $category = $available = $unitprice = $datechecked = "";		
// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST")
if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    // Get hidden input value
    $productid = $_POST["productid"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate category
    $input_category = trim($_POST["category"]);
    if(empty($input_category)){
        $category_err = "Please enter a category.";     
    } else{
        $category = $input_category;
    }
    
    // Validate available
    $input_available = trim($_POST["available"]);
    if(empty($input_available)){
        $available_err = "Please enter available.";     
    } elseif(!ctype_digit($input_available)){
        $available_err = "Please enter a positive integer value.";
    } else{
        $available = $input_available;
    }	

    // Validate Unit Price
    $input_unitprice = trim($_POST["unitprice"]);
    if(empty($input_unitprice)){
        $unitprice_err = "Please enter available.";     
    } elseif(!ctype_digit($input_unitprice)){
        $unitprice_err = "Please enter a positive integer value.";
    } else{
        $unitprice = $input_unitprice;
    }	
	
    // Validate Date Checked
    $input_datechecked = trim($_POST["datechecked"]);
    if(empty($input_datechecked)){
        $datechecked_err = "Please enter available.";     
    } elseif(!ctype_digit($input_datechecked)){
        $datechecked_err = "Please enter a positive integer value.";
    } else{
        $datechecked = $input_datechecked;
    }	
	
   $productid = $_POST["productid"];		
   $name = $_POST["name"];		
   $category = $_POST["category"];
   $available = $_POST["available"];
   $unitprice = $_POST["unitprice"];
   $datechecked = $_POST["datechecked"];	
         $data = array( 'c_productid'=>$productid, 'c_name'=>$name, 'c_category'=>$category, 'c_available'=>$available, 
             	'c_unitprice'=>$unitprice, 'c_datechecked'=>$datechecked ); 		
    $url = 'http://saprestdev.saprest.com:8000/sap(bD1lbiZjPTAxMA==)/bc/bsp/sap/zres_app/z1.htm';
	echo $productid;
     $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

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
    <title>Create data</title>
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
                        <h2>Create data</h2>
                    </div>
                    <p>Please fill this form.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <table class='table table-bordered table-striped'>
				  <tr>
                        <div class="form-group <?php echo (!empty($productid_err)) ? 'has-error' : ''; ?>">
                            <td><label>Product ID</label></td>
                            <td><input type="text" name="productid" class="form-control" value="<?php echo $productid; ?>"></td>
                            <span class="help-block"><?php echo $productid_err;?></span>
                        </div>		
                  <tr>						
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <td><label>Name</label></td>
                            <td><input type="text" name="name" class="form-control" value="<?php echo $name; ?>"></td>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
				  </tr>
                  <tr>				  
                        <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                            <td><label>Category</label></td>
                            <td><input type="text" name="category" class="form-control" value="<?php echo $category; ?>"></td>
                            <span class="help-block"><?php echo $category_err;?></span>
                        </div>
				  </tr>
                  <tr>				  
                        <div class="form-group <?php echo (!empty($available_err)) ? 'has-error' : ''; ?>">
                            <td><label>Available</label></td>
                            <td><input type="text" name="available" class="form-control" value="<?php echo $available; ?>"></td>
                            <span class="help-block"><?php echo $available_err;?></span>
                        </div>
				  </tr>		 
				  <tr>
                        <div class="form-group <?php echo (!empty($unitprice_err)) ? 'has-error' : ''; ?>">
                            <td><label>Unit Price</label></td>
                            <td><input type="text" name="unitprice" class="form-control" value="<?php echo $unitprice; ?>"></td>
                            <span class="help-block"><?php echo $unitprice_err;?></span>
						</div>	
				  </tr>			
				  <tr>
                        <div class="form-group <?php echo (!empty($datechecked_err)) ? 'has-error' : ''; ?>">
                            <td><label>Date Checked</label></td>
                            <td><input type="text" name="datechecked" class="form-control" value="<?php echo $datechecked; ?>"></td>
                            <span class="help-block"><?php echo $datechecked_err;?></span>
                        </div>	
  				  </tr>
			<tr>	  
             <td></td>
              <td>					  
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
			  </td>
			</tr>
						</table>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>