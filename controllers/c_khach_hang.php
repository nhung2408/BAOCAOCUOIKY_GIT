<?php

include('./models/m_khach_hang.php');
include('./controllers/c_gio_hang.php');
class Khach_hang{

    public function them_khach_hang(){
        if(isset($_POST['btn-them'])){
            $hoten=$_POST['hotenkh'];
            $diachi=$_POST['diachi'];
            $email=$_POST['email'];
            $sodienthoai=$_POST['dienthoai'];
            $m_khach_hang=new M_khachhang();
            $makh=$m_khach_hang->them_khach_hang($hoten,$diachi,$email,$sodienthoai);

            //them_hoa_don
             $ngayban=date('Y-m-d');
             $mahoadon=$m_khach_hang->them_hoa_don($makh,$ngayban);

            //them_chi_tiet_hoa_don
            $c_gio_hang=new C_gio_hang();
            $ttGH=$c_gio_hang->thong_tin_gio_hang();
            $m_khach_hang->them_ct_hoa_don($mahoadon,$ttGH);
            $c_gio_hang->xoaGioHang();
            var_dump($ttGH);
    }
    else 
    include('./views/khach_hang/v_them_khach_hang.php');
}

}
?>