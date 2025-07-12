<?php
include_once('../model/mThanhVien.php');

class cThanhVien
{
    public function get1ThanhVien($taikhoan, $matkhau)
    {
        $p = new mThanhVien();
        $matkhau = md5($matkhau);
        $con = $p->select1ThanhVien($taikhoan, $matkhau);
        if ($con === false) {
            echo "Lỗi truy vấn: " . mysqli_error($p->$con); // Kiểm tra lỗi của truy vấn
        } else {
            if (mysqli_num_rows($con)) {
                while ($r = mysqli_fetch_assoc($con)) {
                    session_start();
                    $_SESSION["dn"] = $r["SoDienThoai"];
                    $_SESSION["id"] = $r["IDThanhVien"];
                }
                echo "<script>alert('Đăng nhập thành công');</script>";
                // Sau khi hiện alert, chuyển hướng người dùng
                echo "<script>window.location.href = '../index.php';</script>";

                exit();  // Kết thúc script sau khi chuyển hướng
            } else {
                echo "<script>alert('Đăng nhập thất bại');</script>";
                // Sau khi hiện alert, chuyển hướng người dùng về trang đăng nhập
                echo "<script>window.location.href = 'dangnhap-tv.php';</script>";
                exit();  // Kết thúc script sau khi chuyển hướng
            }
        }
    }
    public function KTDangKi($sdt)
    {
        $p = new mThanhVien();

        $kq = $p->ktdk($sdt);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function Query1TV($idtv)
    {
        $p = new mThanhVien();

        $kq = $p->queryTV($idtv);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function getAllTV()
    {
        $p = new mThanhVien();

        $kq = $p->SelectAllTV();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }

    public function CapNhat($idtv, $tentv, $sdt, $email, $diachi)
    {
        $p = new mThanhVien();
        $kq = $p->CapNhatTT($idtv, $tentv, $sdt, $email, $diachi);
        return $kq;
    }
    public function XoaTV($idtv)
    {
        $p = new mThanhVien();
        $kq = $p->deletetv($idtv);
        return $kq;
    }
    public function GhiDanh($date, $idtv)
    {
        $p = new mThanhVien();


        $kq = $p->createGhiDanh($idtv, $date);
        return $kq;
    }
    public function registerTK($tentv, $sdt, $diachi, $email, $ngaythamgia, $password)
    {
        $p = new mThanhVien();
        $password = md5($password);
        $kq = $p->DangKyTV($tentv, $sdt, $diachi, $email, $ngaythamgia, $password);
        return $kq;
    }
    public function TaoTK_GT($idtv, $idgt, $ngaybatdau, $ngayketthuc)
    {
        $p = new mThanhVien();

        $kq = $p->TKGT($idtv, $idgt, $ngaybatdau, $ngayketthuc);
        return $kq;
    }

    public function getDanhgia()
    {
        $p = new mThanhVien();

        $kq = $p->xemdanhgia();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function xemlslt($idtv)
    {
        $p = new mThanhVien();

        $kq = $p->xemlichsutap($idtv);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function xemthoigiantap($idtv)
    {
        $p = new mThanhVien();

        $kq = $p->thoigiantap($idtv);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
    public function timkiemtv($timkiem)
    {
        $p = new mThanhVien();

        $kq = $p->searchTV($timkiem);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }
}
