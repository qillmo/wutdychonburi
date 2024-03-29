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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- FontAwesome CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    .navigation {
        max-width: 1300px;
        background-color: #000;
        margin: 0 auto;
        position: relative;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .navigation-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
    }

    .navigation-item span {
        font-family: "Kanit", sans-serif;
        font-weight: 700;
        font-style: normal;
        font-size: 1.9rem;
    }

    .navigation-item span a {
        color: #fff;
        text-decoration: none;
    }

    .navigation-item span a:hover {
        color: red;
    }

    .navigation-item {
        align-self: center;
        text-align: center;
    }

    .navigation-contact img {
        width: 25px;
        padding: 1px;
        background-color: #fff;
    }

    @media only screen and (max-width: 1000px) {
        .navigation-item span {
            font-family: "Kanit", sans-serif;
            font-weight: 700;
            font-style: normal;
            font-size: 0.6rem;
        }
    }
</style>

<body>
    <!-- navigation -->
    <!-- <div class="navigation">
        <div class="container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                <div>
                    <a href="index.php"><img src="./pic/wutdy_logo.png" alt="" style="width: 50%" />
                    </a>
                </div>
            </div>
            <div id="navigation">
                <ul>
                    <li class="active"><a href="index.php">หน้าแรก</a></li>
                    <li class="active"><a href="rules.php" target="_blank">กฎกติกา</a></li>
                    <li class="active"><a href="howto-buy-amulets.php" target="_blank">วิธีการเช่าพระ</a></li>
                    <li class="active"><a href="check-parcel.php" target="_blank">ตรวจสอบพัสดุ</a></li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- navigation -->
    <div class="navigation">
        <div class="navigation-container">
            <div class="navigation-item">
                <a href="index.php"><img src="./pic/wutdy_logo.png" alt="" style="width: 80px" /></a>
            </div>
            <div class="navigation-item"><span><a href="index.php">หน้าแรก</a></span></div>
            <div class="navigation-item" style="margin-left: -10px;"><span><a href="rules.php" target="_blank">กฎกติกา</a></span></div>
            <div class="navigation-item"><span><a href="howto-buy-amulets.php" target="_blank">วิธีการเช่าพระ</a></span></div>
            <div class="navigation-item"><span><a href="check-parcel.php" target="_blank">ตรวจสอบพัสดุ</a></span></div>
            <div class="navigation-item">
                <div class="navigation-contact"><a href="index.php"><img src="./pic/line.png" alt="" /></a></div>
                <div class="navigation-contact"><a href="index.php"><img src="./pic/facebook.png" alt="" /></a></div>
                <div class="navigation-contact"><a href="index.php"><img src="./pic/tiktok.png" alt="" /></a></div>
            </div>
        </div>
    </div>