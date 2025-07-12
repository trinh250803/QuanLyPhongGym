<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gymnast - Payment Status Update</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Gym website template" name="keywords">
    <meta content="Gym website template" name="description">

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

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="" class="navbar-brand">
                <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">Gymnast</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="../index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About Us</a>
                    <a href="feature.php" class="nav-item nav-link">Our Features</a>
                    <a href="class.php" class="nav-item nav-link">Classes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="blog.php" class="dropdown-item">Blog Grid</a>
                            <a href="single.php" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h4 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase font-weight-bold">Quản Lý Hóa Đơn</h4>
            <div class="d-inline-flex">
                <p class="m-0 text-white"><a class="text-white" href="../index.php">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Kế Toán</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Search form -->
    <menu>
        <form action="" method="POST" style="float:right; width:30%;">
            <input type="text" name="txtTK" placeholder="Tìm kiếm hóa đơn..." required>
            <input type="submit" name="btnTK" value="Tìm kiếm">
        </form>
    </menu>

    <!-- Header section -->
    <aside>
        <h2>QUẢN LÝ HÓA ĐƠN</h2>
    </aside>

    <!-- Invoice list section -->
    <section>
        <?php
        echo '<div style="display: flex; flex-wrap: wrap; float: left; width: 100%;">';

        // $obj = new model();

        // SQL query condition based on search or category
        if ($cate) {
            $sql = "SELECT * FROM hoadon WHERE IDHoaDon='$cate'";
        } elseif (isset($_POST['btnTK'])) {
            $name = $_POST["txtTK"];
            $sql = "SELECT * FROM hoadon WHERE IDHoaDon LIKE N'%$name%'";
        } else {
            $sql = 'SELECT * FROM hoadon';
        }

        //$invoices = $obj->xuatdulieu($sql);

        if ($invoices) {
            foreach ($invoices as $invoice) {
                echo '
            <div class="sp">
                <div class="IDHoaDon">ID Hóa Đơn: ' . htmlspecialchars(number_format($invoice['IDHoaDon'])) . '</div>
                <div class="SoTien">Số Tiền: ' . htmlspecialchars(number_format($invoice['SoTien'])) . ' VND</div>
                <div class="HinhThucThanhToan">Hình Thức Thanh Toán: ' . htmlspecialchars($invoice['HinhThucThanhToan']) . '</div>
                <a href="index.php?page=chitiethoadon&ID=' . urlencode($invoice['IDHoaDon']) . '">Xem chi tiết hóa đơn</a>
                <a href="index.php?page=capnhattrangthai&ID=' . urlencode($invoice['IDHoaDon']) . '">Cập nhật trạng thái thanh toán</a>
            </div>';
            }
        } else {
            echo '<div style="width: 100%; text-align: center; color: red;">Không có hóa đơn nào</div>';
        }

        echo '</div>';
        ?>
    </section>
    </div>
    </div>

    <!-- Footer Start -->
    <div class="footer container-fluid mt-5 py-5 px-sm-3 px-md-5 text-white">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-primary mb-4">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 40px; height: 40px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <!-- Additional Footer Content -->
        </div>
        <div class="container border-top border-dark pt-5">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-white font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by
                <a class="text-white font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
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
    <script src="../assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="../assets/mail/contact.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>