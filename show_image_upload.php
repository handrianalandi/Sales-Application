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
    <title>Show Uploaded Image</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/navbar.css"> 

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

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
                <li class="nav-item active dropdown"><a class="nav-link" id="navbarDropdownMenuLink"aria-haspopup="true" aria-expanded="false">Activity</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="show_activity.php">Sales Activity</a>
                        <a class="dropdown-item" href="add_rencanakungjungan.php">Visit Plan</a>
                        <a class="dropdown-item" href="lihat_status_kunjungan.php">Plan Status</a>
                    </div>
                </li>
                <li class="nav-item">
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
        <div class="row pt-4">
            <div class="col-6">
                <h3 class="title">History</h3>
            </div>
            <div class="col-6">
                <div class="text-right">
                    <a href="show_activity.php"><button id="add-user-btn" class="btn btn-secondary"></i> Back</button></a>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12 table-responsive-sm">
                <table id="tableImage" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%" data-sortable="true">No</th>
                            <th width="10%" data-sortable="true">ID Aktivitas</th>
                            <th width="10%" data-sortable="true">Nama Customer</th>
                            <th width="50%" data-sortable="true">Gambar</th>
                            <th width="15%" data-sortable="true">Nama Sales yang melakukan kunjungan</th>
                            <th wdith="15%" data-sortable="true">Waktu kunjungan</th>
                        </tr>
                    </thead>
                    <tbody id="user-content">

                    </tbody>
                </table>
            </div>
        </div>

        
    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- DataTable Query -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>

function load_data() {
    $.ajax({
        url: "/ProyekManpro/services/get_all_images.php",
            method: "GET",
            success: function(data) {
            var co = 1;
            $("#user-content").html('');
            data.forEach(function(aktivitas){
                var row = $("<tr></tr>");
                var col1 = $("<td>" + co + "</td>");
                var col2 = $("<td>" + aktivitas['id_aktivitas'] + "</td>");
                var col3 = $("<td>" + aktivitas['Nama_Cust'] + "</td>");
                var target_file = aktivitas['foto_kunjungan'];
                var col4 = $("<td><img src='" + target_file  + "' style='width:400px; height:400px;'></td>");
                var col5 = $("<td>" + aktivitas['nama'] + "</td>");
                var col6 = $("<td>" + aktivitas['jadwal_kunjungan'] + "</td>");

                col1.appendTo(row);
                col2.appendTo(row);
                col3.appendTo(row);
                col4.appendTo(row);
                col5.appendTo(row);
                col6.appendTo(row);

                co++;
                $("#user-content").append(row);
            })
            $('#tableImage').DataTable();
            },
            error: function(data) {

            }        
    });
}


$(document).ready(function(){
    load_data();
});

</script>


</body>
</html>