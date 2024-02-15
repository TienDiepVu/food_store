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
                <li><a href="admin.php" class="nav-link px-2 link-success">Trang chủ</a></li>
                <li><a href="category.php" class="nav-link px-2 link-dark">Quản lý danh mục</a></li>
                <li><a href="food.php" class="nav-link px-2 link-dark">Quản lý sản phẩm</a></li>
            </ul>

            <div class="col-md-4 text-end d-flex">
                <a href="#"><?php echo $_SESSION['email'] ?></a>
                <a href="logout.php" class="btn btn-success mx-2">Đăng xuất</a>
            </div>

        </header>
        <div class="categories-menu">
            <div class="categories col-lg-2 ">
                <div class="categories__all">
                    <i class="fa fa-bars"></i>
                    <span>DANH MỤC SẢN PHẨM</span>
                </div>
                <ul>
                    <li><a href="#fastfood">Đồ ăn nhanh</a></li>
                    <li><a href="#noodle">Bún, Phở</a></li>
                    <li><a href="#rice">Cơm rang</a></li>
                    <li><a href="#">Đồ uống</a></li>
                    <li><a href="#">Hải sản</a></li>
                    <li><a href="#">Sữa</a></li>
                    <li><a href="#">Đồ sấy khô</a></li>
                </ul>
            </div>
            <div class="banner col-lg-10">
            </div>
        </div>
        <section class="products pt-5">
            <div id="fastfood">
                <div class="products-title text-center">
                    <h2>Fastfood</h2>
                </div>
                <div class="products-show row d-flex flex-wrap">
                    <?php
                    $display_food = "SELECT * FROM food WHERE cat_id = 1";

                    
                    $result_food = mysqli_query($conn, $display_food);
                    
                    if (mysqli_num_rows($result_food) > 0) {
                        for ($i = 0; $i < mysqli_num_rows($result_food); $i++) {
                            $row = mysqli_fetch_assoc($result_food);

                    ?>
                            <div class="product_item col-sm-3">
                                <div class="product_item_pic">
                                    <img src="<?php echo $row['thumnail'] ?>" alt="" height="300px" width="100%">
                                </div>
                                <div class="product_item_text">
                                    <h6><a href="#"><?php echo $row['food_name'] ?></a></h6>
                                    <h5><?php echo $row['price'] ?> $</h5>
                                    <button class="btn btn-success" style="width: 100%"><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></button>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>


            <div id="noodle" class=" pt-5 mt-5">
                <div class="products-title text-center">
                    <h2>Bún Phở</h2>
                </div>
                <div class="products-show row d-flex flex-wrap">
                    <?php
                    $display_food = "SELECT * FROM food WHERE cat_id = 2";
                    $result_food = mysqli_query($conn, $display_food);
                    if (mysqli_num_rows($result_food) > 0) {
                        for ($i = 0; $i < mysqli_num_rows($result_food); $i++) {
                            $row = mysqli_fetch_assoc($result_food);

                    ?>
                            <div class="product_item col-sm-3">
                                <div class="product_item_pic">
                                    <img src="<?php echo $row['thumnail'] ?>" alt="" height="300px" width="100%">
                                </div>
                                <div class="product_item_text text-center pt-2">
                                    <h6><a href="#"><?php echo $row['food_name'] ?></a></h6>
                                    <h5><?php echo $row['price'] ?> $</h5>
                                    <button class="btn btn-success" style="width: 100%"><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></button>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>

            <div id="rice" class="pt-5 mt-5">
                <div class="products-title text-center">
                    <h2>Cơm rang</h2>
                </div>
                <div class="products-show row d-flex flex-wrap">
                    <?php
                    $display_food = "SELECT * FROM food WHERE cat_id = 3";

                    $result_food = mysqli_query($conn, $display_food);
                    if (mysqli_num_rows($result_food) > 0) {
                        for ($i = 0; $i < mysqli_num_rows($result_food); $i++) {
                            $row = mysqli_fetch_assoc($result_food);

                    ?>
                            <div class="product_item col-sm-3">
                                <div class="product_item_pic">
                                    <img src="<?php echo $row['thumnail'] ?>" alt="" height="300px" width="100%">
                                </div>
                                <div class="product_item_text text-center pt-2">
                                    <h6><a href="#"><?php echo $row['food_name'] ?></a></h6>
                                    <h5><?php echo $row['price'] ?> $</h5>
                                    <button class="btn btn-success" style="width: 100%"><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></button>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>
        </section>
    </div>
    <div class="container-fluid bg-success mt-5">
        <footer class="container py-5 ">
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