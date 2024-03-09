<!-- header-section-->
<?php include 'backend-header.php'; ?>
<!-- /. header-section-->
<style>
    @media (max-width: 991px) {
        .responsive>thead th {
            display: none;
        }

        .responsive>tbody td,
        .responsive>tbody th {
            display: block;
        }

        .responsive>tbody>tr:nth-child(even) td,
        .responsive>tbody>tr:nth-child(even) th {
            background-color: #eee;
        }

        [row-header] {
            position: relative;
            width: 50%;
            vertical-align: middle;
        }

        [row-header]:before {
            content: attr(row-header);
            display: inline-block;
            vertical-align: middle;
            text-align: left;
            width: 50%;
            padding-right: 30px;
        }
    }
</style>
<div class="container" style="background-color: #ffffff;">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">

                <div class="grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h2>เพิ่มพระใหม่</h2>
                            </div>
                            <div>
                                <form action="add_product.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description" name="description" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <input type="text" class="form-control" id="type" name="type" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sku">SKU</label>
                                                <input type="text" class="form-control" id="sku" name="sku" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="badge">Badge</label>
                                                <input type="text" class="form-control" id="badge" name="badge" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="newImageFile">Upload Picture File:</label>
                                                <input type="file" class="form-control-file" name="newImageFile" id="newImageFile" accept="image/*" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" class="btn btn-primary" value="Add Product">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- /.footer -->