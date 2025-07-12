<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gymnast - Gym Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
      <link href="../assets/img/logo.png" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="../assets/lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="login/css/qltb.css">
    <link rel="stylesheet" href="login/css/style.css">
    <link rel="stylesheet" href="../assets/css/icon-hover.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.min.css" rel="stylesheet">
</head>
<style>
    /* Căn chỉnh container chứa các item */
    .list-container {
        display: flex;
        /* Sử dụng Flexbox để hiển thị các item theo chiều ngang */
        flex-wrap: nowrap;
        /* Không cho phép xuống dòng */
        overflow-x: auto;
        /* Cho phép cuộn ngang nếu các mục quá dài */
        gap: 100px;
        /* Khoảng cách giữa các phần tử */
        padding: 10px;
        /* Khoảng cách giữa các item và viền container */
    }

    /* Căn chỉnh từng item hóa đơn */
    .list-item {
        flex-shrink: 0;
        /* Đảm bảo item không bị thu nhỏ */
        width: 100%;
        /* Đặt chiều rộng cho mỗi item */
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng khi hover */
    .list-item:hover {
        transform: scale(1.05);
    }

    .item-content {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .item-buttons {
        display: flex;
        gap: 10px;
    }

    .item-buttons button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .update-btn {
        background-color: #c62828;
        color: white;
    }

    .submit-btn {
        background-color: BLACK;
        color: white;
    }

    .update-btn:hover,
    .submit-btn:hover {
        opacity: 0.8;
    }

    /* Các thuộc tính cho các span (chữ) */
    .name,
    .id,
    .status {
        display: block;
        margin-bottom: 5px;
    }



    a:hover {
        text-decoration: underline;
    }
</style>

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="../index.php" class="navbar-brand">
                <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">Gymnast</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="../index.php" class="nav-item nav-link active">Trang chủ</a>
                    <a href="about.php" class="nav-item nav-link">Về chúng tôi</a>
                    <a href="feature.php" class="nav-item nav-link">Tin tức</a>
                    <a href="class.php" class="nav-item nav-link">Lớp học</a>

                    <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                    <?php
                    if (!isset($_SESSION['dn'])) {
                        echo '<a href="dieukien.php" class="nav-item nav-link">Đăng nhập</a>';
                        echo '<a href="dangkitapthu.php" class="nav-item nav-link">Đăng ký tập thử</a>';
                    } else {
                        if ($_SESSION['dn'] == 1 || $_SESSION['dn'] == 2 || $_SESSION['dn'] == 3) {
                            echo '<a href="thongtinchungnv.php" class="nav-item nav-link">Hồ sơ</a>';
                        } else {
                            echo '<a href="thongtinchungtv.php" class="nav-item nav-link">Hồ sơ</a>';
                        }
                        echo '<a href="dangxuat.php" class="nav-item nav-link">Đăng xuất</a>';
                    }
                    ?>


                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5"
            style="min-height: 400px">
            <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">Kế Toán</h4>
            <div class="d-inline-flex">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Quản lý hóa đơn</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container pt-5">
        <div class="left">
            <div class="sidebar">
                <div class="menu">
                    <p>Menu</p>
                    <ul>
                        <?php
                        if (!$_SESSION['dn']) {
                            echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
                            echo "<script>window.location.href = '../index.php';</script>";
                        }
                        echo '<li><a href="ThongTinchungNV.php">Thông tin chung</a></li>';
                        switch ($_SESSION['dn']) {
                            case 1: {
                                    echo ' <li><a href="QLNV.php">Quản lý nhân viên</a></li>';
                                    echo  '<li><a href="QLKM.php">Quản lý khuyến mãi</a></li>';
                                    echo  '<li><a href="QLLLV.php">Quản lý lịch làm việc</a></li>';
                                    echo  '<li><a href="QLGT.php">Quản lý Gói tập</a></li>';
                                    break;
                                }
                          case 2: {
                                    echo ' <li><a href="QLTV.php">Quản lý Thành viên</a></li>';
                                    echo  '<li><a href="QLTB.php">Quản lý thiết bị</a></li>';
                                    echo  '<li><a href="QLTBloi.php">Quản lý lỗi thiết bị</a></li>';
                                    break;
                                }
                                case 3: {
                                    echo ' <li><a href="QLHD.php">Quản lý hóa đơn</a></li>';
                                    
                                    break;
                                }
                        }




                         echo   '<li><a href="dangxuat.php">Đăng xuất</a></li>';

                        ?>
                    </ul>
                </div>
            </div>

        </div>
        <?php
        if ($_SESSION['dn'] != 3) {
            echo "<script>alert('Bạn không có quyền truy cập vào trang');</script>";
            echo "<script>window.location.href = 'ThongTinChungNV.php';</script>";
        }

        ?>
        <div class="right">
            <div class="qlhd">
                <h1 align="center">Quản lý Hóa đơn</h1>

                <?php
                include_once("../controller/cHoaDon.php");
                $p = new cHoaDon();

                // Kiểm tra nếu người dùng tìm kiếm
                if (isset($_POST['submit']) && !empty($_POST['search']) || isset($_POST['submit_status'])) {
                    $keyword = htmlspecialchars(strip_tags($_POST['search'])); // Bảo vệ đầu vào
                    $status = isset($_POST['status']) ? $_POST['status'] : ''; // Lấy trạng thái thanh toán nếu có
                    $result = $p->getHDByName($keyword, $status); // Tìm kiếm theo tên và trạng thái thanh toán
                } else {
                    $result = $p->selectallhd(); // Lấy tất cả hóa đơn nếu không tìm kiếm
                }
                ?>

                <!-- Form tìm kiếm -->
                <div class="search">
                <div class="search-bar">
                    <form method="POST" action="">
                        <input type="text" name="search"  placeholder="Nhập tên thành viên"
                            value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
                        
                        <select name="status" style="width:fit-content;height:50px;border-radius: 0 10px 10px 0">
                            <option class="search-select" value="">Chọn trạng thái thanh toán</option>
                            <option  value="Đã thanh toán"
                                <?php echo (isset($_POST['status']) && $_POST['status'] == 'Đã thanh toán') ? 'selected' : ''; ?>>
                                Đã thanh toán</option>
                            <option value="Chưa thanh toán"
                                <?php echo (isset($_POST['status']) && $_POST['status'] == 'Chưa thanh toán') ? 'selected' : ''; ?>>
                                Chưa thanh toán</option>
                            <option value="Chờ xác nhận"
                                <?php echo (isset($_POST['status']) && $_POST['status'] == 'Chờ xác nhận') ? 'selected' : ''; ?>>
                                Chờ xác nhận</option>
                        </select>
                        <button  class="search-btn" type="submit" name="submit_status">&#128269;</button>
                    </form>
                </div>
                </div>

                <!-- Hiển thị kết quả -->
                <?php
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='list-item'>
    <span class='name' style='margin-left:30px ; '>
        <a href='ChiTietHD.php?idnv={$row['IDThanhVien']}'>" . $row['TenThanhVien'] . "</a>
    </span>
    <span class='name'  style='text-align: center; display: block; margin: 0 auto;'> " . $row['TinhTrangThanhToan'] . "</span>
    <button class='update-btn' onclick=\"window.location.href='CapNhatTTTT.php?idhd={$row['IDHoaDon']}';\">Cập nhật tình trạng thanh toán</button>
    <button class='submit-btn' onclick=\"window.location.href='ChiTietHD.php?idhd={$row['IDHoaDon']}';\">Xem chi tiết</button>
</div>";
                        }
                    } else {
                        echo "<p>Không tìm thấy hóa đơn nào!</p>";
                    }
                } else {
                    echo "<p>Lỗi kết nối cơ sở dữ liệu!</p>";
                }
                ?>


                <div>
                    <div>
                        <!-- Form tìm kiếm -->

                    </div>
                    <div>



                    </div>

                </div>
            </div>


        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Gymnast</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>4 Nguyễn Văn Bảo, Gò Vấp, Thành phố Hồ Chí Minh</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
                        style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Liên kết</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="./index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                    <a class="text-white mb-2" href="./view/about.php"><i class="fa fa-angle-right mr-2"></i>Về chúng tôi</a>
                    <a class="text-white mb-2" href="./view/class.php"><i class="fa fa-angle-right mr-2"></i>Lớp học</a>
                    <a class="text-white" href="./view/contact.php"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Phổ biến</h4>
                <div class="d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="./index.php"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                    <a class="text-white mb-2" href="./view/about.php"><i class="fa fa-angle-right mr-2"></i>Về chúng tôi</a>
                    <a class="text-white mb-2" href="./view/class.php"><i class="fa fa-angle-right mr-2"></i>Lớp học</a>
                    <a class="text-white" href="./view/contact.php"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Giờ mở cửa</h4>
                <h5 class="text-white">Monday - Friday</h5>
                <p>8.00 AM - 8.00 PM</p>
                <h5 class="text-white">Saturday - Sunday</h5>
                <p>2.00 PM - 8.00 PM</p>
            </div>
        </div>

    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>