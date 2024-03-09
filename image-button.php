<style>
    .img-container {
        position: relative;
        transform: scale(2);
        margin-top: 15vw;
    }

    .position-absolute {
        position: absolute;
        top: 90%;
        /* Adjusted the top position to move the button container down */
        left: 55%;
        transform: translate(-60%, -90%);
        z-index: 2;
    }

    /* Adjusted button styles using relative units */
    .position-absolute .btn-container {
        display: flex;
        flex-direction: column;
        /* Set flex direction to column */
        align-items: center;
        /* Align items to the center horizontally */
        margin-top: 50px;
        /* Added margin to move the button container down */
    }

    .position-absolute button {
        padding: 0.4vw;
        /* Adjust the padding as needed */
        font-size: 0.5vw;
        /* Adjust the font size as needed */
        min-width: 7vw;
        /* Set the maximum width for the button */
        border-radius: 20px;
        width: 100%;
        /* Ensure the button takes full width within its container */
        margin-bottom: 2px;
        /* Adjusted margin to create consistent spacing between buttons */
    }
</style>

<?php
// Set your image path
$imagePath = './pic/wutdy_bannerweb2.jpg';
$gifFilePath = "./pic/hot.gif"; // Replace with the actual path to your GIF file
?>
<div class="container mt-5">
    <div class="text-center img-container">
        <img src="<?php echo $imagePath; ?>" alt="Your Image" class="img-fluid" style="max-width: 100%; height: auto;">
        <div class="position-absolute">
            <div class="btn-container">
                <button class="btn btn-danger">
                    <img src="<?php echo $gifFilePath; ?>" style="max-height: 1vw;margin-left:-1.5vw;" alt="Hot GIF">
                    <span>พระยอดนิยม</span>
                </button>
                <button class="btn">พระหลักแสน</button>
                <button class="btn">พระหลักหมื่น</button>
                <button class="btn">พระหลักพัน</button>
                <button class="btn">เครื่องราง ของขลัง</button>
                <button class="btn">พระบูชา</button>
                <button class="btn">พระทั้งหมด</button>
                <button class="btn btn-warning">วิธีการเช่าพระ</button>
                <button class="btn btn-warning">กฎกติกา</button>
                <button class="btn btn-warning">ตรวจสอบพัสดุ</button>
            </div>
        </div>
    </div>
</div>