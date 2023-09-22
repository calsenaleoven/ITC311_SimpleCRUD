<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    // Function to populate the dropdown with options
    function populateDropdown() {
        const dropdown = document.getElementById('ProductCategory');
        dropdown.innerHTML = '';

        <?php if(isset($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
                const option = document.createElement('option');
                option.value = '<?= $category['ProductCategory']; ?>';
                option.textContent = '<?= $category['ProductCategory']; ?>';
                dropdown.appendChild(option);
            <?php endforeach; ?>
        <?php endif; ?>
    }

    populateDropdown();
</script>

<style media="screen">
    body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
    max-width:1540px
    }
    .table-responsive {
    margin: 30px 0;
    }
    .table-wrapper {
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    min-width: 1000px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
    padding-bottom: 15px;
    background: #0397d6;
    color: #fff;
    padding: 16px 30px;
    min-width: 100%;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
    }
    .table-title .btn-group {
    float: right;
    }
    .table-title .btn {
    color: #fff;
    float: right;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
    }
    .table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
    }
    .table-title .btn span {
    float: left;
    margin-top: 2px;
    }
    table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
    }
    table.table tr th:first-child {
    width: 60px;
    }
    table.table tr th:last-child {
    width: 100px;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
    }
    table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
    }
    table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
    }
    table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
    }
    table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
    outline: none !important;
    }
    table.table td a:hover {
    color: #2196F3;
    }
    table.table td a.edit {
    color: #FFC107;
    }
    table.table td a.delete {
    color: #F44336;
    }
    table.table td i {
    font-size: 19px;
    }
    table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
    }

    /* Modal styles */
    .modal .modal-dialog {
    max-width: 400px;
    }
    .modal .modal-header, .modal .modal-body, .modal .modal-footer {
    padding: 20px 30px;
    }
    .modal .modal-content {
    border-radius: 3px;
    font-size: 14px;
    }
    .modal .modal-footer {
    background: #ecf0f1;
    border-radius: 0 0 3px 3px;
    }
    .modal .modal-title {
    display: inline-block;
    }
    .modal .form-control {
    border-radius: 2px;
    box-shadow: none;
    border-color: #dddddd;
    }
    .modal textarea.form-control {
    resize: vertical;
    }
    .modal .btn {
    border-radius: 2px;
    min-width: 100px;
    }
    .modal form label {
    font-weight: normal;
    }
</style>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage<b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add Product</span></a>

                    </div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Category</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($products as $prod) { ?>
                    <tr>
                        <td><?= $prod['ProductName']?></td>
                        <td><?= $prod['ProductDescription']?></td>
                        <td><?= $prod['ProductCategory']?></td>
                        <td><?= $prod['ProductQuantity']?></td>
                        <td><?= $prod['ProductPrice']?></td>
                        <td>
                            <a href="#editProductModal"   data-id="<?=$prod['id']?>"class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></a>
                            <a href="#deleteProductModal" data-delete_id="<?=$prod['id']?>"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" action="<?= site_url('/add-product') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ProductName">Product Name</label>
                        <input type="text" name="ProductName" id="ProductName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ProductDescription">Product Description</label>
                        <input type="text" name="ProductDescription" id="ProductDescription" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ProductCategory">Product Category</label>
                        <select id="ProductCategory" class="form-control" required>
                            <?php if(isset($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['ProductCategory']; ?>"><?= $category['ProductCategory']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ProductQuantity">Product Quantity</label>
                        <input type="number" name="ProductQuantity" id="ProductQuantity" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ProductPrice">Product Price</label>
                        <input type="text" name="ProductPrice" id="ProductPrice" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?= site_url('/update-product') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_ProductName">Product Name</label>
                        <input type="text" name="ProductName" id="edit_ProductName" value="<?= isset($prod['ProductName']) ? $prod['ProductName'] : '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_ProductDescription">Product Description</label>
                        <input type="text" name="ProductDescription" id="edit_ProductDescription" value="<?= isset($prod['ProductDescription']) ? $prod['ProductDescription'] : '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ProductCategory">Product Category</label>
                        <select name="ProductCategory" id="ProductCategory" class="form-control">
                            <?php if(isset($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category['ProductCategory']; ?>" <?= isset($prod['ProductCategory']) && $prod['ProductCategory'] === $category['ProductCategory'] ? 'selected' : '' ?>>
                                        <?= $category['ProductCategory']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_ProductQuantity">Product Quantity</label>
                        <input type="text" name="ProductQuantity" id="edit_ProductQuantity" value="<?= isset($prod['ProductQuantity']) ? $prod['ProductQuantity'] : '' ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_ProductPrice">Product Price</label>
                        <input type="text" name="ProductPrice" id="edit_ProductPrice" value="<?= isset($prod['ProductPrice']) ? $prod['ProductPrice'] : '' ?>" class="form-control">
                        <input type="hidden" name="id" id="edit_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Delete Modal HTML -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" action="<?= site_url('/delete-product') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                    <input type="hidden" id="delete_id" name="delete_id">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
