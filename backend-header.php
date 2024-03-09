<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates" />
    <meta name="keywords" content="ecommerce website templates, online store," />
    <title>Wutdychonburi.com เว็บ วุดดี้ชลบุรี ซื้อขายพระเครื่องของวุดดี้ชลบุรี</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet" />
    <!-- owl-carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet" />
    <link href="css/owl.theme.default.css" rel="stylesheet" />
    <!-- FontAwesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet" />
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            margin: 0 5px;
            border: 1px solid white;
            border-radius: 5px;
            background-color: #007bff;
            transition: background-color 0.3s;
        }

        .pagination a:hover {
            background-color: #0056b3;
        }


        td {
            position: relative;
        }

        .table-bordered td {
            padding: 5px;
            /* ปรับความระหว่างรอบ 5px */
        }

        .table-bordered td img {
            max-width: 100%;
            /* ปรับให้รูปภาพของ td ไม่เกินขอบ */
        }

        .product-image {
            max-width: 100%;
            /* ปรับให้รูปภาพของ product-image ไม่เกินขอบ */
        }

        .badge-gif {
            max-width: 100%;
            /* ปรับให้รูปภาพของ badge-gif ไม่เกินขอบ */
        }

        .badge-gif {
            position: absolute;
            top: 10;
            left: 10;
            max-width: 30px;
            /* ปรับขนาดตามต้องการ */
            max-height: 30px;
            /* ปรับขนาดตามต้องการ */
        }

        .product-image {
            max-width: 115px;
            /* ปรับขนาดตามต้องการ */
        }

        /* body {
        background-image: url('./pic/bg_gradient_short.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 1;
    } */

        /* body {
            position: relative;
            margin: 0;
            padding: 0;
        }

        body::before,
        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.2;
        }

        body::before {
            background-image: url('./pic/bg_gradient_short.jpg');
        }

        body::after {
            content: none;
        } */
    </style>
</head>

<body>
    <!-- navigation -->
    <div class="navigation">
        <div class="container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                <div>
                    <a href="index.php"><img src="./pic/wutdy_logo.png" alt="" style="width: 50%" />
                    </a>
                </div>
            </div>
            <!-- /.logo -->
            <div id="navigation">
                <ul>
                    <li class="active"><a href="admin_product.php">จัดการข้อมูลพระ</a></li>
                    <li class="active"><a href="admin_add.php">เพิ่มข้อมูลพระ</a></li>
                    <li class="active"><a href="admin_rule.php">จัดการกฎกติกา</a></li>
                    <li class="active"><a href="admin_slide.php">จัดการรูปภาพสไลด์</a></li>
                    <li class="active"><a href="admin_badge.php">จัดการ GIF (Badge)</a></li>
                    <li class="active"><a href="admin_product_random.php">จัดการ Random Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- navigation -->