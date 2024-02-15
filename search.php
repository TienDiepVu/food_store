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
                session_start();
                require_once 'connect.php';
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $search_now = "SELECT * FROM food WHERE food_id LIKE '%$search%' OR LOWER(food_name) LIKE '%$search%' OR LOWER(origin) LIKE '%$search%'";
                    $result_search = mysqli_query($conn, $search_now);
                    if (mysqli_num_rows($result_search) > 0) {
                        for ($i = 0; $i < mysqli_num_rows($result_search); $i++) {
                            $row = mysqli_fetch_array($result_search); ?>
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
                }
                ?>
            </tbody>
        </table>