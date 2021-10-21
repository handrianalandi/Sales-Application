<?php 

session_start();

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototype Sales</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="navbar.css"> 

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style media="screen">

    .bg-home-sales{
        background-image: url("image/max-shein.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        height:100vh;
    }
    .welcome-statement{
        text-align: center;
        color: white;
        font-weight: bold;
        position: absolute;
        top:30%;
        bottom:50%;
        width:90%;
    }
    .tulisanSatu{
        margin-left: -100px;
    }
    .tulisanDua{
        margin-left: 200px;
    }

    #ac-button{
        border-radius: 40%;
        background-color: #93733A !important;
        color: white;
    }

    

    @media only screen and (max-width: 768px) {
        .welcome-statement{
            text-align: center;
            color: white;
            font-weight: bold;
            
        }
        .tulisanSatu{
            margin-left: auto;
            text-align: center;
        }
        .tulisanDua{
            margin-left: auto;
            text-align: center;
        }
    }

</style>

</head>
<body>
    
    <div class="col-12 bg-home-sales p-sm-3 ">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent ">
                <a class="judul" href="#">Prototype Sales</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="show_image_upload.php">Activity</a>
                        <a class="nav-item nav-link" href="#">Customer</a>
                        <a class="nav-item nav-link" href="logout.php">Logout</a>
                    </div>
                </div>
        </nav>

        <div class="col-12 welcome-statement m-sm-3 p-sm-3">
            <h2 class="tulisanSatu">Welcome,</h2>
            <h2 class="tulisanDua"><?php echo $_SESSION['nama']; ?></h2>

            <div class="col-12 mt-lg-5 pt-lg-5 ml-lg-5">
                <button type="button" id="ac-button" name="see-ac-button" class="btn" style="margin-top: 150px;"> See Activity</button>
            </div>
            
        </div>

        
    </div>





<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>