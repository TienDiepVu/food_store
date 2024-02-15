<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: login.html");
}

require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-4 border-bottom">
            <a href="index.php" class="d-flex align-items-center col-md-2 mb-2">
                <img src="./img/logo.png" alt="logo" height="">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="admin.php" class="nav-link px-2 link-dark">Trang chủ</a></li>
                <li><a href="category.php" class="nav-link px-2 link-dark">Quản lý danh mục</a></li>
                <li><a href="food.php" class="nav-link px-2 link-success">Quản lý sản phẩm</a></li>
            </ul>

            <div class="col-md-5 text-end">
                <form method="post" class="d-flex" action="search.php">
                    <input type="search" name="search" id="" class="form-control mx-1">
                    <input type="submit" name="submit" id="" value="Tìm kiếm" class="btn btn-success">
                </form>
            </div>
        </header>
    </div>


    <!-- Quản lý danh mục -->

    <div class="container" id="category">
        <h1 class="text-center my-3">
            Quản lý sản phẩm
        </h1>
        <table class="table container">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Món ăn</th>
                    <th>Danh mục</th>
                    <th>Hình Ảnh</th>
                    <th>Giá bán</th>
                    <th>Nguồn gốc</th>
                    <th style="max-width: 300px">Ghi chú</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('connect.php');
                $display_food_sql = "SELECT * FROM food";
                $result = mysqli_query($conn, $display_food_sql);
                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $row = mysqli_fetch_assoc($result);
                ?>
                        <tr>
                            <td>
                                <?php echo $row['food_id'] ?>
                            </td>
                            <td>
                                <?php echo $row['food_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['cat_id'] ?>
                            </td>
                            <td>
                                <img src="<?php echo $row['thumnail'] ?>" alt="" width="150px" height="100px">
                            </td>
                            <td>
                                <?php echo $row['price'] ?>$
                            </td>
                            <td>
                                <?php echo $row['origin'] ?>
                            </td>
                            <td style="max-width: 300px">
                                <?php echo $row['note'] ?>
                            </td>
                            <td>
                                <a href="edit_food.php?sid=<?php echo $row['food_id'] ?>" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return confirm('Xóa món này?')" ; href="delete.php?sid=<?php echo $row['food_id'] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <h1 class=" text-center">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                Thêm Món mới
            </button>
        </h1>


        <div class=" modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Món mới</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="add_food.php" method="post">
                            <div class="form-group">
                                <label for="food_name">Món ăn</label>
                                <input type="text" class="form-control" name="food_name" id="food_name" required>
                            </div>
                            <div class="form-group">
                                <label for="cat_id">Danh mục</label>
                                <select name="cat_id" id="cat_id" class="form-control" required>
                                    <option value="">--Select</option>
                                    <?php
                                    $display_cat_sql = "SELECT * FROM category";
                                    $result_cat = mysqli_query($conn, $display_cat_sql);
                                    if (mysqli_num_rows($result_cat) > 0) {
                                        for ($i = 0; $i < mysqli_num_rows($result_cat); $i++) {
                                            $row_cat = mysqli_fetch_assoc($result_cat);
                                    ?>
                                            <option value="<?php echo $row_cat['id'] ?>"><?php echo $row_cat['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thumnail">Hình ảnh</label>
                                <input type="file" class="form-control" name="thumnail" id="thumnail" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá bán</label>
                                <input type="number" class="form-control" name="price" id="price" required>
                            </div>
                            <div class="form-group">
                                <label for="origin">Nguồn gốc</label>
                                <input type="text" class="form-control" name="origin" id="origin" required>
                            </div>
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <input type="text" class="form-control" name="note" id="note">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-success mt-5">
        <footer class="container pt-5 ">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2022 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram"></use>
                            </svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook"></use>
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>