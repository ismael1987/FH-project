<!DOCTYPE html>
<?php
session_start();
if (!isset( $_SESSION['user_id'])){
    header("location:login-4.html");
};
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Rehomes - Real Estate HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/reant_cars/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>

<!-- **** Header Area Start **** -->
<header class="header-area">
    <?php
    include_once('data.php');
    $sql = "SELECT * FROM `car` where `Car_id`=" . $_GET['id'] . "";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);


    $sql_2 = "SELECT * FROM `location` where `Location_id`=" . $row['Location_id'] . "";
    $result_2 = $conn->query($sql_2);
    $row_2 = mysqli_fetch_array($result_2);
    ?>

    <!-- Main Header Start -->
    <div class="main-header-area animated">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="rehomesNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="rent.php">Rent</a></li>
                                <li><a href="return.php">Return</a></li>
                                <!--                                <li><a href="properties-details.php">- Property Details</a></li>-->
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- **** Header Area End **** -->
<div class="cars"></div>

<!-- **** Properties Hero Area Start **** -->
<script src="/reant_cars/js/jquery.min.js"></script>

<script>
    $.getJSON('http://localhost:8080/v1/cars/<?=$_GET['id']?>', function (data) {
       var user_id=<?= $_SESSION['user_id']?>;
        $(".cars").append(`<div class="properties-hero-area d-flex flex-wrap align-items-center mb-80">
    <div class="properties-slide">
            <div id="property-thumb-silde" class="carousel slide wow fadeInUp" data-wow-delay="200ms" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="data:image/jpeg;base64,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"
            class="d-block w-100" alt="...">
            </div>
            </div>
            </div>
            </div>
           <div class="properties-content-area wow fadeInUp" data-wow-delay="200ms">
            <div class="properties-content-info">
            <h2>${data.make}</h2>
            <div class="properties-location">
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> ${data.location_id}</p>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>  ${data.location_id}</p>
            </div>
            <div class="row">
            <div class="col-4"><h4 class="properties-rate">$   <span style=" font-size: 30px; color: #92c800; margin-bottom: 30px;" id='rate'>${data.rateUSD}</span> <span>/ hour</span></h4></div>
            <div class="col-8">
            <div class="col-4">
            <select  onchange="getval(this);">
            <option value="">choose currency</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="TRY">TRY</option>
            <option value="JPY">JPY</option>
            <option value="KRW">South Korea Won</option>
            <option value="ZAR">South Africa Rand</option>
            <option value="SGD">Singapore Dollars</option>
            <option value="NOK">Norway Kroner</option>
            <option value="BRL"> Brazilian real </option>

            </select>
            </div>

            </div>
            <div class="col-8"><h4 class="properties-rate"><span style=" font-size: 30px; color: #92c800; margin-bottom: 30px;" id='rate_2'></span> <span>/ hour</span></h4></div>

            </div>

          <div class='row'>
            <div class="col-6">
            <label>from</label>
            <br>
            <input type="date" name="start_date" >
            </div><div class="col-6">
            <label>to</label>
            <br>
            <input type="date" name="end_date" >
            </div>

            </div>
  <p>Number Plate :${data.numberPlate} <br>
               Color :${data.color} <br>
               Category :${data.category} <br>
               Model :${data.model} <br>
               Year :${data.year} <br>
            </p>
            <button style="
            margin-bottom: 0;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 35%;
            flex: 0 0 35%;
            max-width: 35%;
            width: 19%;
            text-align: center;
            background-color: #1bb1e8;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            padding: 9px 0;
            border-radius: 0 0 0 5px;
            "onclick="rent(${data.car_id},${user_id});">rent!
            </button>
            </div>
            </div>
            </div>
            `);
    });

    function getval(sel) {
        if (sel.value!='') {
            $('#rate').html();
            $.getJSON(`https://api.exchangeratesapi.io/latest?base=USD&symbols=${sel.value}`, function (data) {

                $('#rate_2').html( sel.value+' ' + (parseInt($('#rate').html()) * Number(data.rates[`${sel.value}`])).toFixed(3));
            })
        }else{
            $('#rate_2').html('');
        }


    }
    function rent(id,user_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "test.php",
                    type: "post",
                    data: {id:id,user_id:user_id} ,
                    success: function (response) {
                        Swal.fire(
                            'Rent!',
                            '',
                            'success'
                        )

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });

            }
        })


    }
</script>
<!-- Popper -->
<script src="/reant_cars/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="/reant_cars/js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="/reant_cars/js/rehomes.bundle.js"></script>
<!-- Active -->
<script src="/reant_cars/js/default-assets/active.js"></script>

</body>

</html>