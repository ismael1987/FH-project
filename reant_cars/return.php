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
    <link href="css/datetimepicker.css" rel="stylesheet" type="text/css"/>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.png">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.min.css" id="theme-styles">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<?php
include_once('data.php');
?>
<body>
<!-- Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- **** Header Area Start **** -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area animated">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="rehomesNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo-3.png" alt=""></a>

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
                                <!--                                    <li><a href="properties-details.php"> Property Details</a></li>-->
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
<div class="breadcrumb-area-two mt-50 wow fadeInUp" data-wow-delay="200ms">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content-two">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Return</li>
                        </ol>
                    </nav>
                    <h2 class="page-title">For Return</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- **** Breadcrumb Area End **** -->

<!-- **** Sale area Start **** -->
<section class="rehome-house-sale-area section-padding-80">
    <div class="container">
        <div class="row cars">

        </div>
        <!--
                    <div class="row">
                         Pagination and Page Counter Area
            <div class="col-12">
                <div class="rehomes-pagination-counter mt-15 d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="200ms">
                    <nav class="rehomes-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>

                    <div class="page-counter">
                        <p>Page <span>1</span> of <span>60</span> results</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</section>
<!-- **** Sale Area End **** -->

<!-- **** Footer Area Start **** -->
<!--    <footer class="footer-area bg-img bg-overlay-2 ">-->
<!--        &lt;!&ndash; Main Footer Area &ndash;&gt;-->

<!--        &lt;!&ndash; Copywrite Area &ndash;&gt;-->
<!--        <div class="copywrite-content">-->
<!--            <div class="container">-->
<!--                <div class="row align-items-center">-->
<!--                    &lt;!&ndash; Copywrite Text &ndash;&gt;-->
<!--                    <div class="col-12 col-sm-6">-->
<!--                        <div class="copywrite-text">-->
<!--&lt;!&ndash;                            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </p>&ndash;&gt;-->
<!--                        </div>-->
<!--                    </div>-->

<!--                 -->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->
<!-- **** Footer Area End **** -->
<script src="js/jquery.min.js"></script>
<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<!-- Popper -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="js/rehomes.bundle.js"></script>
<!-- Active -->
<script src="js/default-assets/active.js"></script>

<script type="text/javascript" src="js/datetimepicker.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>

<script type="text/javascript">
    $.getJSON('/reant_cars/cars.php', function (data) {
        $.each(data, function(i, e) {
            $(".cars").append(`<div class="col-12 col-md-6 col-lg-4">
            <div class="single-property-area wow fadeInUp" data-wow-delay="200ms">
            <div class="property-thumb">
            <img src="data:image/jpeg;base64,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" alt="">
            </div>
            <div class="property-desc-area">
            <div class="property-title-Models d-flex justify-content-between">
            <div class="property-title">
            <h6>${e.model}</h6>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i> ${e.location_id}</p>
            </div>
            <div class="property-Models">
            <p>Make:</p>
            <h6>${e.make}</h6>
            </div>
            </div>
            </div>
            <div class="property-price">
            <a  class="badge-rent" onclick="return_car(${e.car_id},<?=$_SESSION['user_id']?>)" href="#">Return</a>
            <p class="price">$ ${e.rateUSD}/hour</p>
            </div>
            </div>
            </div>`);
        });
    });
    function return_car(car_id,user_id) {
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
                    url: "return.php",
                    type: "post",
                    data: {id:car_id  , user_id:user_id} ,
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
</body>

</html>