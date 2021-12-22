<?php

include('./models/m_san_pham.php');

class San_Pham
{

    public function Danh_sach_san_pham()
    {
        $ma_sp = new M_San_Pham();
        $gttim = '';
        if (isset($_POST['GTTim'])) {
            $gttim = $_POST['GTTim'];
            $dssp = $ma_sp->doc_danh_sach_theo_gia_tri_tim($gttim);
        } else
        $dssp = $ma_sp->Doc_cac_san_pham();
        $dsbanner = $ma_sp->Doc_cac_banner();
        $dstenloai = $ma_sp->Doc_cac_loai_san_pham();


        include("./views/trang_chu/v_trang_chu.php");
    }
    
    public function chi_tiet_san_pham()
    {   

         $m_sp = new M_San_Pham();
        $masanpham = $_GET['masp'];
        $sanpham = $m_sp->Doc_san_pham_theo_ma_san_pham($masanpham);
        $gttim = '';
        if (isset($_POST['GTTim'])) {
            $gttim = $_POST['GTTim'];
            $dssp_lien_quan = $m_sp->doc_danh_sach_theo_gia_tri_tim($gttim);
        } else
        $dssp_lien_quan = $m_sp->Doc_san_pham_lien_quan($sanpham->maloai, $masanpham);
        $dsbanner = $m_sp->Doc_cac_banner();
        //$dssp_lien_quan = $m_sp->Doc_san_pham_lien_quan($sanpham->maloai, $masanpham);
        $dstenloai = $m_sp->Doc_cac_loai_san_pham();

        include('./views/chitietsanpham/v_chi_tiet_san_pham.php');
    }
    
    public function danh_sach_san_pham_theo_loai()
    {

         $m_loai = new M_San_Pham();
         $maloai = $_GET['maloai'];
         $gttim = '';
        if (isset($_POST['GTTim'])) {
            $gttim = $_POST['GTTim'];
            $sanpham = $m_loai->doc_danh_sach_theo_gia_tri_tim($gttim);
        } else
        $sanpham = $m_loai->Danh_sach_san_pham_theo_loai($maloai);
        $dsbanner = $m_loai->Doc_cac_banner();
        $dstenloai = $m_loai->Doc_cac_loai_san_pham();
        
     include('./views/danh_sach_theo_loai/v_danh_sach_theo_loai.php');


}
    


}
