<?php
if (!isset($_SESSION['dangnhap_home'])) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=khongtimthaytrang\'",100);</script>';
} else {
?>
<section class="bread-crumb">
    <div class="container">
        <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li class="home" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                    <meta itemprop="position" content="1" />
                </a>
            </li>

            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <strong itemprop="name">Đặt hàng</strong>
                <meta itemprop="position" content="2" />
            </li>

        </ul>
    </div>
</section>
<?php
    if (isset($_SESSION['dangnhap_home'])) {
    ?>
<style>
.arrow-steps .step {
    font-size: 14px;
    text-align: center;
    color: #777;
    cursor: default;
    margin: 0 1px 0 0;
    padding: 10px 0px 10px 0px;
    width: 15%;
    float: left;
    position: relative;
    background-color: #ddd;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.arrow-steps .step a {
    color: #777;
    text-decoration: none;
}

.arrow-steps .step:after,
.arrow-steps .step:before {
    content: "";
    position: absolute;
    top: 0;
    right: -17px;
    width: 0;
    height: 0;
    border-top: 19px solid transparent;
    border-bottom: 17px solid transparent;
    border-left: 17px solid #ddd;
    z-index: 2;
}

.arrow-steps .step:before {
    right: auto;
    left: 0;
    border-left: 17px solid #fff;
    z-index: 0;
}

.arrow-steps .step:first-child:before {
    border: none;
}

.arrow-steps .step:last-child:after {
    border: none;
}

.arrow-steps .step:first-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.arrow-steps .step:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

.arrow-steps .step span {
    position: relative;
}

*.arrow-steps .step.done span:before {
    opacity: 1;
    content: "";
    position: absolute;
    top: -2px;
    left: -10px;
    font-size: 11px;
    line-height: 21px;
}

.arrow-steps .step.current {
    color: #fff;
    background-color: #5599e5;
}

.arrow-steps .step.current a {
    color: #fff;
    text-decoration: none;
}

.arrow-steps .step.current:after {
    border-left: 17px solid #5599e5;
}

.arrow-steps .step.done {
    color: #173352;
    background-color: #2f69aa;
}

.arrow-steps .step.done a {
    color: #173352;
    text-decoration: none;
}

.arrow-steps .step.done:after {
    border-left: 17px solid #2f69aa;
}
</style>

<div class="container">
    <!-- Responsive Arrow Progress Bar -->
    <div class="arrow-steps clearfix">
        <div class="step current"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=vanchuyen">Đặt hàng</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a><span> </div>
        <div class="step"> <a href="index.php?quanly=vanchuyen">Hoàn tất mua hàng</a></div>
    </div>

    <div class="container contact page-contacts">
        <div class="shadow-sm">
            <div class="row contact-padding">
                <?php
                        include 'connection.php';
                        if (isset($_POST['themvanchuyen'])) {
                            $error = array();
                            $success = array();
                            $showMess = false;

                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email =  $_SESSION['email'];
                            $address = $_POST['address'];
                            $note = $_POST['note'];
                            $tam = $_SESSION['id_dangky'];
                            $id_dangky = $tam;

                            if (empty($_POST['name']))
                            $error['name'] = 'Vui lòng nhập<b> Họ và tên</b>';
                                            
                            if (empty($_POST['phone']))
                            $error['phone'] = 'Vui lòng nhập<b> Số điện thoại</b>';

                            if (empty($_POST['address']))
                            $error['address'] = 'Vui lòng nhập<b> Địa chỉ nhận hàng</b>';


                
                            if (empty($_POST['note'])){
                                $note = "Không có ghi chú";
                            }
                
                
                            if (!$error) {
                                $showMess = true;
                                $themdiachi = "INSERT INTO tbl_shipping(name,phone,email,address,note,id_dangky) VALUES('$name','$phone','$email','$address','$note','$id_dangky')";
                                $sql_them_vanchuyen = mysqli_query($conn, $themdiachi);

                                $success['success'] = 'Thêm địa chỉ nhận hàng thành công';
                                echo '<script>setTimeout("window.location=\'index.php?quanly=vanchuyen\'",1000);</script>';
                            }
                        } elseif (isset($_POST['capnhatvanchuyen'])) {
                            $error = array();
                            $success = array();
                            $showMess = false;

                            $name = $_POST['name'];
                            $phone = $_POST['phone'];
                            $email =  $_SESSION['email'];
                            $address = $_POST['address'];
                            $note = $_POST['note'];
                            $id_dangky = $_SESSION['id_dangky'];
                            
                            if (empty($_POST['name']))
                            $error['name'] = 'Vui lòng nhập<b> Họ và tên</b>';
                                            
                            if (empty($_POST['phone']))
                            $error['phone'] = 'Vui lòng nhập<b> Số điện thoại</b>';


                            if (empty($_POST['address']))
                            $error['address'] = 'Vui lòng nhập<b> Địa chỉ nhận hàng</b>';

            if (empty($_POST['note'])){
                $note = "Không có ghi chú";
            }


            if (!$error) {
                $showMess = true;
                // insert record
                $sql_update_vanchuyen = mysqli_query($conn, "UPDATE tbl_shipping SET name='$name',phone='$phone',email='$email',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
                // add image to folder
                $success['success'] = 'Cập nhật địa chỉ nhận hàng thành công';
                echo '<script>setTimeout("window.location=\'index.php?quanly=vanchuyen\'",1000);</script>';
            }
                        }
                        ?>

                <?php
                        $id_dangky = $_SESSION['id_dangky'];
                        $sql_get_vanchuyen = mysqli_query($conn, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
                        $count = mysqli_num_rows($sql_get_vanchuyen);
                        if ($count > 0) {
                            $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
                            $name = $row_get_vanchuyen['name'];
                            $phone = $row_get_vanchuyen['phone'];
                            $address = $row_get_vanchuyen['address'];
                            $note = $row_get_vanchuyen['note'];
                        } else {

                            $name = '';
                            $phone = '';
                            $address = '';
                            $note = '';
                        }
                        ?>





                <div class="col-md-12">
                    <h4>Thông tin nhận hàng</h4>
                    <?php
                            // show error
                            if (isset($error)) {
                                if ($showMess == false) {
                                    echo "<div class='alert alert-danger alert-dismissible'>";
                                    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                    echo "<h4><i class='icon fa fa-ban'></i> Không xong rồi đại vương ơi!</h4>";
                                    foreach ($error as $err) {
                                        echo $err . "<br/>";
                                    }
                                    echo "</div>";
                                }
                            }
                            ?>

                        <?php
                            // show success
                            if (isset($success)) {
                                if ($showMess == true) {
                                    echo "<div class='alert alert-success alert-dismissible'>";
                                    echo "<h4><i class='icon fa fa-check'></i> Thành công!</h4>";
                                    foreach ($success as $suc) {
                                        echo $suc . "<br/>";
                                    }
                                    echo "</div>";
                                }
                            }
                            ?>
                    <form action="" autocomplete="off" method="POST">
                        <div class="form-group">
                            <label for="email">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name ?>"
                                placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Phone</label>
                            <input type="tel" name="phone" class="form-control" value="<?php echo $phone ?>"
                                placeholder="...">
                        </div>
                        <div class="form-group">
                            <label for="email">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address ?>"
                                placeholder="...">
                        </div>

                        <div class="form-group">
                            <label for="email">Ghi chú</label>
                            <input type="text" name="note" class="form-control" value="<?php echo $note ?>"
                                placeholder="...">
                        </div>
                        <?php
                                if ($name == '' && $phone == '') {
                                ?>
                        <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm địa chỉ giao
                            hàng</button>
                        <?php
                                } elseif ($name != '' && $phone != '') {
                                ?>
                        <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật địa
                            chỉ</button>
                        <?php
                                }
                                ?>
                    </form>
                </div>

                <!--------Giỏ hàng------------------>
                <div class="container contact page-contacts">
                    <div class="shadow-sm">
                        <div class="row contact-padding">
                            <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
                                <tr>
                                    <!-- <th>STT</th>
                    <th>ID SP</th> -->
                                    <th>
                                        <center>THÔNG TIN SẢN PHẨM</center>
                                    </th>
                                    <th>
                                        <center>ĐƠN GIÁ</center>
                                    </th>
                                    <th>
                                        <center>SỐ LƯỢNG</center>
                                    </th>
                                    <th>
                                        <center>THÀNH TIỀN</center>
                                    </th>

                                </tr>
                                <?php
                                        if (isset($_SESSION['cart'])) {
                                            $i = 0;
                                            $tongtien = 0;
                                            foreach ($_SESSION['cart'] as $cart_item) {
                                                $thanhtien = $cart_item['soluong'] * $cart_item['giakhuyenmai'];
                                                $tongtien += $thanhtien;
                                                $i++;
                                        ?>
                                <tr>
                                    <td>
                                        <center>
                                            <img src="<?php echo $cart_item['img_avatar']; ?>" width="150px">
                                        </center>

                                        <center>
                                            <a class="btn bg-danger"
                                                href="pages/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                        </center>
                                        <hr>
                                        <center>
                                            <?php echo $cart_item['tensanpham']; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php echo number_format($cart_item['giakhuyenmai'], 0, ',', '.') . 'vnđ'; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="pages/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i
                                                    class="fa fa-plus fa-style" aria-hidden="true"></i></a>
                                            <?php echo $cart_item['soluong']; ?>
                                            <a href="pages/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i
                                                    class="fa fa-minus fa-style" aria-hidden="true"></i></a>
                                        </center>

                                    </td>
                                    <td>
                                        <center>
                                            <?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                            }
                                            ?>
                                <tr>
                                    <td colspan="8">
                                        <p style="float: right; color: red;">TỔNG TIỀN:
                                            <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?>

                                        <p style="float: left;"><a class="btn btn-light"
                                                href="pages/themgiohang.php?xoatatca=1"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> Clear</a></p>
                                        <div style="clear: both;"></div>
                                        <?php
                                                    if (isset($_SESSION['dangnhap_home'])) {
                                                    ?>
                                        <center>
                                            <p><a class="btn btn-primary" href="index.php?quanly=thongtinthanhtoan">Đến
                                                    hình
                                                    thức thanh toán</a>
                                            </p>
                                        </center>
                                        <?php
                                                    } else {
                                                    ?>
                                        <p style="float: right;"><a class="btn btn-primary"
                                                href="index.php?quanly=register">Đăng kí
                                                đặt
                                                hàng</a>
                                            <?php
                                                    }
                                                        ?>
                                    </td>
                                </tr>
                                <?php
                                        } else {
                                        ?>
                                <tr>
                                    <td colspan="8">
                                        <section class="content">
                                            <div class="callout callout-info">
                                                <h3>Thông báo!</h3>

                                                <h5>Hiện không có sản phẩm nào trong giỏ hàng của bạn! <a href="/">Nhấn
                                                        vào đây để tiếp
                                                        tục mua hàng</a></h5>
                                            </div>
                                        </section>
                                    </td>
                                </tr>
                                <?php
                                        }
                                        ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
    }
    ?>
<?php
}
?>