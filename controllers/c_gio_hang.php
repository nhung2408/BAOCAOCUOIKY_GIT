<?php

@session_start();
class C_gio_hang
{
    function xem_gio_hang()
    {
        $gio_hang = $this->layGioHang();
        if ($gio_hang){ //Nếu có giỏ hàng
                $gio_hang_san_pham = array();
                foreach ($gio_hang as $key => $value){
                  $gio_hang_san_pham[$key] = $value;
                }
                if ($gio_hang_san_pham){ //Nếu có chọn món
                    
                        $_SESSION['gio_hang_san_pham'] = $gio_hang_san_pham;
                        //lay_thong_tin_mon_an
                        $ds_mon_an=$this->lay_thong_tin_san_pham($gio_hang_san_pham);
                    }
        }
        // Gọi views
        include("views/gio_hang/v_gio_hang.php");
    }
    function layGioHang()
    {
        if (isset($_SESSION['gioHang']))
            return $_SESSION['gioHang'];
        else
            return false;
    }
    function thong_tin_gio_hang(){
        if (!isset($_SESSION['gioHang']))
            return null;
        $gio_hang = $_SESSION['gioHang'];
        $dsMatHangTrongGioHang = $this->lay_thong_tin_san_pham($gio_hang);
        return$dsMatHangTrongGioHang;
    }
    function lay_thong_tin_san_pham($sanpham)
    {
        $masp = array();
        foreach ($sanpham as $key => $value) {
                $masp[] = $key;
            }
        $masp = implode(",", $masp);
        include_once('models/m_san_pham.php');
        $m_san_pham = new M_San_Pham();
        $ds_san_pham = $m_san_pham->lay_san_pham_cho_gio_hang($masp);
        $ds_san_pham_gio_hang = array(); //Ðua số lượng vào $ds_sanPham
        foreach ($ds_san_pham as $item) {
                $item->so_luong = $sanpham[$item->masp];
                $ds_san_pham_gio_hang[] = $item;
            }
        return $ds_san_pham_gio_hang;
    }
    function themGioHang($maSP, $so_luong, $donGia)
    {
        if ($so_luong > 0) {
			
            if (isset($_SESSION['gioHang'][$maSP])) {
                $_SESSION['thanh_tien'] -= @$_SESSION['gioHang'][$maSP] * $donGia;
                $_SESSION['so_luong'] -= @$_SESSION['gioHang'][$maSP];
				$so_luong +=$_SESSION['gioHang'][$maSP];
            }

            $_SESSION['gioHang'][$maSP] = $so_luong;

            if (isset($_SESSION['thanh_tien'])) {
                    $_SESSION['thanh_tien'] = @$_SESSION['thanh_tien'] + $so_luong * $donGia;
                    $_SESSION['so_luong'] = @$_SESSION['so_luong'] + $so_luong;
                } else {
                    $_SESSION['thanh_tien'] = $so_luong * $donGia;
                    $_SESSION['so_luong'] = $so_luong;
                }
        } elseif ($so_luong == 0) {
                xoaMatHang($maSP, $donGia);
            }
    }
    function xoaMatHang($maSP, $donGia)
    {
        $gioHang = $this->layGioHang();
        $gioHangMoi = array();
        foreach ($gioHang as $key => $value) {
                if ($key != $maSP)
                    $gioHangMoi[$key] = $value;
                else {
                        $_SESSION['thanh_tien'] -= $gioHang[$maSP] * $donGia;
                        $_SESSION['so_luong'] -= $gioHang[$maSP];
                    }
            }
        if (!empty($gioHangMoi)) {
            $_SESSION['gioHang'] = $gioHangMoi;
        } else {
            $this->xoaGioHang();
        }
    }
    function xoaGioHang()
    {
        unset($_SESSION['gioHang']);
        unset($_SESSION['thanh_tien']);
        unset($_SESSION['so_luong']);
    }
    function thanh_tien()
    {
        if (isset($_SESSION['thanh_tien']))
            return $_SESSION['thanh_tien'];
        else
            return 0;
    }
    function so_luong()
    {
        if (isset($_SESSION['so_luong']))
            return $_SESSION['so_luong'];
        else
            return 0;
    }
    function tongSoMatHang()
    {
        if (isset($_SESSION['so_luong']))
            return $_SESSION['so_luong'];
        else
            return 0;
    }

    function capNhatGioHang($maSP, $so_luong, $donGia)
    {
        if (!is_numeric($so_luong))
            return false;
        $so_luong = (int)$so_luong;
        if ($so_luong > 0) {

                $_SESSION['thanh_tien'] -= @$_SESSION['gioHang'][$maSP] * $donGia;
                $_SESSION['thanh_tien'] += $so_luong * $donGia;

                $_SESSION['so_luong'] -= @$_SESSION['gioHang'][$maSP];
                $_SESSION['so_luong'] += $so_luong;

                $_SESSION['gioHang'][$maSP] = $so_luong;

                return false;
            }
        if ($so_luong == 0)
            $this->xoaMatHang($maSP, $donGia);
        return false;
    }
}
?>