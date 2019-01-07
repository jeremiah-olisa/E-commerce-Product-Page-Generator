<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Ecommerse</title>
    <?php
    require 'config.php';
    // $now = time(); // or your date as well
    // $your_date = strtotime("2019-12-18");//year-montsh-day
    // $datediff = $now - $your_date;

    // echo round($datediff / (60 * 60 * -24)). " days";


    if(isset($_POST['but_upload'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            if (move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image)) {
                echo "Image Uploaded\n";

            }else{
                echo "Image Not Uploaded";
            }
            

        }

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO tbl_product (price,name,image)
        VALUES ('$price','$name','$image')";

        if (mysqli_query($con, $sql)) {
            echo "Product Added Successfully";
            header("refresh:5; url=product.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);

    
    }
    ?>
<body>
    <br>
    <br>
    <style type="text/css">
        .center{
            left: 16.665%;
            top: 24px;
        }
    </style>
    <form class="card col-lg-8 col-md-6 center" align="center" autocomplete method="post" action="" enctype='multipart/form-data'>
        <br>
        <br>
        <input type="" class="form-control" name="name" placeholder="What Is Your Name" required>
        <br>        
        <input type="number" class="form-control" name="price" placeholder="What Is The Price Of Your Product (1000)" required>       
        <input class="form-control" type='file' name='image' required/>
        <br>
        <input class="btn btn-primary btn-lg col-md-12" type='submit' value='Add Product' name='but_upload'>
        <br> 
    </form>

</body>
</html>
