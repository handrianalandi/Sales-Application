<?php
    include "./services/database.php";
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
    }
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `customer` ORDER BY `id_customer` DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql1 = "SELECT * FROM `sales` WHERE `id_sales` = $id";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/504410ced2.js"></script>
        <link rel="stylesheet" href="css\managerorder.css"><!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/navbar.css"> 

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    
    <script>
    </script>
    <style>
        .btn{
            height: 50px;
            width: 150px;
        }
        .item-list{
            text-align: center;
        }
        .navbar{
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="judul" href="#">Prototype Sales</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link" id="navbarDropdownMenuLink"aria-haspopup="true" aria-expanded="false">Activity</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="show_activity.php">Sales Activity</a>
                        <a class="dropdown-item" href="add_rencanakungjungan.php">Visit Plan</a>
                        <a class="dropdown-item" href="lihat_status_kunjungan.php">Plan Status</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="ListCustomer.php">Customer <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="manage_order.php">Order <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile_sales.php">Profile <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="transparent">
            <h4 style="text-align: center; margin-bottom: 35px;"><b>Add New Customer</b></h4>
            <?php
                if($stmt->rowCount() == 1){
                    $item = $stmt->fetch();
                    $item1 = $stmt1->fetch() ?>
                    <form action = "./services/addcustomer.php" method="POST">
                        <div id="item-list" class="item-list" style="width: 100%;">
                            <div class="w-25" style="margin-left: auto; margin-right: auto">
                                <label for="idorder"><b">ID Sales</b></label>
                                <input class = "form-control" style="text-align: center" value="<?php echo $id; echo " - ";echo $item1['nama']; ?>" readonly> 
                            </div>
                            <div class="w-25" style="margin-left: auto; margin-right: auto">
                                <label for="idorder"><b">ID Customer</b></label>
                               <input class="form-control" style="text-align: center" name="uidcust" value="<?php echo $item['id_customer'] + 1; ?>" readonly>
                            </div>
                            <div class="w-25" style="margin-left: auto; margin-right: auto">
                                <label for="namacust"><b">Nama Lengkap</b></label>
                                <input type="text" class="form-control" style="text-align:center" name="idnama" id="idnama" required>
                            </div>
                            <div class="w-25" style="margin-left: auto; margin-right: auto">
                                <label for="alamat"><b">Alamat</b></label>
                                <input type="text" class="form-control" style="text-align:center" name="idalamat" id="idalamat" required>
                            </div>
                            <div class="w-25" style="margin-left: auto; margin-right: auto">
                                <label for="notelp"><b">Nomor Telepon</b></label>
                                <input type="text" class="form-control" style="text-align:center" name="idno" id="idno" required>
                            </div>
                            <div class = "d-flex">
                                <button class="btn btn-outline-secondary p-2" onclick="window.history.go(-1)">Back</button>
                                <button class="btn btn-success ml-auto p-2 justify-content-center align-items-center">Add Customer</button>
                            </div>
                        </div>
                    </form>
                <?php }
                else {?>
                    <input> aa</input>
                <?php } ?>
        </div>
    </div>
</body>
</html>