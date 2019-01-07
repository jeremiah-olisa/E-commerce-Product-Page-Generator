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
    <title>Real House Web</title>
    <?php
    require 'config.php';
    // $now = time(); // or your date as well
    // $your_date = strtotime("2019-12-18");//year-month-day
    // $datediff = $now - $your_date;

    // echo round($datediff / (60 * 60 * -24)). " days";


    if(isset($_POST['but_upload'])){
        $size = $_POST['size'];
        $garage = $_POST['garage'];
        $bedroom = $_POST['bedroom'];
        $bathrooms = $_POST['bathrooms'];
        $agent = $_POST['agent'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $address = $_POST['address'];
        $dates = time();

        
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
           

            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO images (size, garage, bedroom, bathrooms, agent, dates,price,status,address,name,image)
        VALUES ('$size', '$garage', '$bedroom', '$bathrooms', '$agent', '$dates','$price','$status','$address','$name','$image')";

        if (mysqli_query($con, $sql)) {
            echo "Product Added Successfully";
            header("refresh:3; url=product.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);

    
    }
    ?>
<body>
    <style type="text/css">
        .center{
            left: 16.665%;
            top: 24px;
        }
    </style>
    <form class="card col-md-8 center" align="center" autocomplete method="post" action="" enctype='multipart/form-data'>
        <br>
        <input type="" class="form-control" name="size" placeholder="What Is The Size Of The Land Or House In Meters" required>
        <br>
        <input type="" class="form-control" name="garage" placeholder="How Many Garage Does The House Have" required>
        <br>
        <input type="" class="form-control" name="bedroom"  placeholder="How Many Bedroom Does The House Have" required>
        <br>
        <input type="" class="form-control" name="bathrooms" placeholder="How Many Bathroom Does The House Have" required>
        <br>
        <input type="" class="form-control" name="agent" placeholder="What Is Your Name" required>
        <br>        
        <input type="number" class="form-control" name="price" placeholder="What Is The Price Of the House Or Land " required>
        <br>        
        <input type="" class="form-control" name="status" placeholder="Is The the House Or Land for sale or rent" required>
        <br>
        <input type="" class="form-control" name="address" placeholder="Address Of Land Or House For Sale" required>
        <br>       
        <input class="form-control" type='file' name='file' required/>
        <br>
        <input class="btn btn-primary btn-lg col-md-12" type='submit' value='Add Product' name='but_upload'>
        <br>
    </form>
        <br>
        <br>
        <br>

</body>
</html>
