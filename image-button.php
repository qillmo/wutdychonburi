<style>
    .img-container {
        position: relative;
        transform: scale(2);
        margin-top: 15vw;
    }

    .position-absolute {
        position: absolute;
        left: 55%;
        transform: translate(-50%, -100%);
        z-index: 2;
    }

    .position-absolute .btn-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    .position-absolute button {
        padding: 0.5vw;
        font-size: 1.2vw;
        min-width: 10vw;
        border-radius: 20px;
        width: 130%;
        margin-bottom: 4px;
        font-family: "Kanit", sans-serif;
            font-weight: 700;
            font-style: normal;
    }

    .image-button-container {
        /* max-width: 1300px; */
        margin: 0 auto;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .image-button-container img {
        width: 100%;
    }

    @media only screen and (max-width: 1000px) {
        .position-absolute button {
            padding: 0.8vw;
            font-size: 2vw;
            min-width: 20vw;
            border-radius: 20px;
            margin-bottom: 2px;
            font-family: "Kanit", sans-serif;
            font-weight: 700;
            font-style: normal;
        }

        .position-absolute {
            position: absolute;
            left: 55%;
            transform: translate(-60%, -100%);
            z-index: 2;
        }
    }
</style>

<?php
// Set your image path based on the device type
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)) {
    // For mobile devices
    $imagePath = './pic/wutdy_bannerweb4.jpg';
} else {
    // For desktop or other devices
    $imagePath = './pic/wutdy_bannerweb2.jpg';
}

$gifFilePath = "./pic/hot.gif"; // Replace with the actual path to your GIF file
?>

<div class="image-button-container">
    <img src="<?php echo $imagePath; ?>" alt="Your Image" />
    <div class="position-absolute">
        <div class="btn-container">
            <!-- <div class="gif-and-btn">
                <img src="<?php echo $gifFilePath; ?>" style="max-width: 20px;margin-left:-20px;" alt="Hot GIF">
                <button class="btn btn-danger">
                    <span>พระยอดนิยม</span>
                </button>
            </div> -->
            <button class="btn btn-danger">
                พระยอดนิยม
            </button>
            <button class="btn btn-light">พระหลักแสน</button>
            <button class="btn btn-light">พระหลักหมื่น</button>
            <button class="btn btn-light">พระหลักพัน</button>
            <button class="btn btn-light">เครื่องราง ของขลัง</button>
            <button class="btn btn-light">พระบูชา</button>
            <button class="btn btn-light">พระทั้งหมด</button>
            <button class="btn btn-warning">วิธีการเช่าพระ</button>
            <button class="btn btn-warning">กฎกติกา</button>
            <button class="btn btn-warning">ตรวจสอบพัสดุ</button>
        </div>
    </div>
</div>