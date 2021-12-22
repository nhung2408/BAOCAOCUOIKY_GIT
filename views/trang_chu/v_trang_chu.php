<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    .dropdown-toggle {
      text-decoration: none;

    }

    .justify-content-center {
      background-color: gray;

    }

    ul li a {

      color: white;

    }

    .card {
      margin-top: 1.5em;
      margin-left: 1px;
    }

    img {
      height: 300px;
      width: 18rem;
    }
  </style>
  <title>Đồ Công Nghệ giá tốt nhất chất lượng cao </title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php foreach ($dsbanner as $banner) {
            ?>
              <div class="carousel-item active">
                <img src="./images/banner/<?php echo $banner->tenbaner ?>" class="d-block w-100" alt="...">
              </div>
            <?php
            }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <br>


  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form class="form-inline " method="POST">
          <input class="form-control" type="search" name="GTTim" value="<?php echo $gttim ?>">
          <button class="btn btn-outline-success  " type="submit"> Tìm Kiếm </button>
        </form>
      </div>
      <div class="col-md-6">
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-success  mr-sm-2" type="submit">Đăng Nhập </button>
          <button class="btn btn-danger my-2 my-sm-0" type="submit">Đăng Ký</button>
        </form>
      </div>
    </div>
  </div>
  <br>
  <div class="container-fliud">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav justify-content-center">
          <?php foreach ($dstenloai as $loai) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="danh_sach_san_pham_theo_loai.php?maloai=<?php echo $loai->maloai ?>"><?php echo $loai->tenloai ?></a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>


  <br>
  <div class="container">
    <div class="row">
      <?php

      foreach ($dssp as $item) {
      ?>
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
              <div class="card-body">
              <form method="POST" action="them_vao_gio_hang.php">
                          <img src="./images/san_pham/<?php echo $item->hinh ?>" class="card-img-top" alt="..." />
                            <h3><?php echo $item->tensp ?></h3>
                            <h3>Giá<?php echo number_format($item->gia) ?></h3>
                            <input type="hidden" name="masp" value="<?php echo $item->masp ?>"/>
                            <input type="hidden" name="dongia" value="<?php echo $item->gia ?>"/>
                            <div class="form-inline my-2 my-lg-0">                    
                            <input type="number" class="form-control" name="soluong" value="1" style="width: 90;text-align: center;">
                            <input type="submit" value="Thêm vào giỏ hàng" name="btnThem" class="btn btn-primary mr-sm-1"/>
                            <a href="chi_tiet_san_pham.php?masp=<?php echo $item->masp ?>" class="btn btn-primary ">Chi tiet</a>
                            </div>
                 </form>
            </div>
          </div>
        </div>
      <?php

      }

      ?>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>