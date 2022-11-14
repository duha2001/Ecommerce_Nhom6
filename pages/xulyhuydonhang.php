<?php 
include('./mail/sendmail.php');
if (isset($_GET['huy'])) {
    $code = $_GET['huy'];
    $update = "UPDATE `tbl_cart` SET `cart_status` = '4' WHERE `tbl_cart`.`code_cart` = $code";
    $sql = mysqli_query($conn, $update);
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND tbl_cart_details.code_cart='" . $code . "' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($conn, $sql_lietke_dh);
    $id_khachhang = $_SESSION['id_dangky'];

    $sql_layten = "SELECT ten FROM tbl_dangky WHERE id_dangky = $id_khachhang";
    $query_layten = mysqli_query($conn, $sql_layten);
    $layten = mysqli_fetch_assoc($query_layten);
    $tenkhachhang = $layten['ten'];

    $sql_kiemtra = "SELECT tbl_cart.code_cart, tbl_cart.cart_date, tbl_cart.cart_payment FROM tbl_cart where tbl_cart.cart_shipping = tbl_cart.id_khachhang AND code_cart = $code";
    $query_kiemtra = mysqli_query($conn, $sql_kiemtra);
    $kiemtra = mysqli_fetch_assoc($query_kiemtra);
    
    if ($kiemtra['cart_payment'] == 'tienmat') {
    $tieude = "Đơn hàng $code của Quý Khách: $tenkhachhang được huỷ thành công";
    $noidung = '';
    $noidung .= "<p>Đơn hàng $code đã nhận được yêu cầu huỷ tại website Smart Mobile</p>";
    $noidung .= '<table style="font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;">
                        <thead>
                            <tr>
                            <th style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;" scope="col">STT</th>
                            <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">HÌNH ẢNH</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÔNG TIN SẢN PHẨM</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">ĐƠN GIÁ</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">SỐ LƯỢNG</th>
                                <th style="border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;" scope="col">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>';
                        $i = 0;
                        $tongtien = 0;
                        while ($row = mysqli_fetch_array($query_lietke_dh)) {
                            $i++;
                            $thanhtien = $row['giakhuyenmai'] * $row['soluongmua'];
                            $tongtien += $thanhtien;
                        

        $noidung .= '<tr>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">' . $i . ' </td>
        <td style="border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;">                        <center>
        <img src="' . $row['img_avatar'] . '" width="150px">
    </center></td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $row['tensanpham'] . ' </td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($row['giakhuyenmai'], 0, ',', '.') . ' VNĐ' . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . $row['soluongmua'] . '</td>
                            <td style="border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;">' . number_format($thanhtien) . ' VNĐ' . '</td>
                            </tr>';
    }

    $noidung .= '<tr>
    <td colspan="3" style="border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;color: green;">Đơn hàng của bạn được Miễn phí
ship</td>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="2">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>

       

                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px; color: red;" colspan="1">' . number_format($tongtien) . ' VNĐ' . '</td>
            </tr>
        </tbody>
    </table>';
    $noidung .= "<br/>";
    $noidung.= "<p>Trân trọng cảm ơn Quý khách đã sử dụng dịch vụ mua hàng trực tuyến tại shop Smart Store!</p>";
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang);
    } else {
        if($kiemtra['cart_payment'] == 'chuyenkhoan'){
            $tieude = "Đơn hàng $code của Quý Khách: $tenkhachhang được huỷ thành công";
            $noidung = '';
            $noidung .= "<p>Đơn hàng $code đã nhận được yêu cầu huỷ tại website Smart Store</p><br/>";
            $noidung .= "Nếu quý khách đã chuyển khoản thanh toán đơn hàng thì quá trình hoàn trả số tiền của quý khách sẽ được xử lý sau 24h làm việc";
            $noidung .= '<table style="font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;" scope="col">STT</th>
                                    <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">HÌNH ẢNH</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">THÔNG TIN SẢN PHẨM</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">ĐƠN GIÁ</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">SỐ LƯỢNG</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">THÀNH TIỀN</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $i = 0;
                                $tongtien = 0;
                                while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                    $i++;
                                    $thanhtien = $row['giakhuyenmai'] * $row['soluongmua'];
                                    $tongtien += $thanhtien;
                                
        
                $noidung .= '<tr>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">' . $i . ' </td>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">                        <center>
                <img src="' . $row['img_avatar'] . '" width="150px">
            </center></td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . $row['tensanpham'] . ' </td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . number_format($row['giakhuyenmai'], 0, ',', '.') . ' VNĐ' . '</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . $row['soluongmua'] . '</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . number_format($thanhtien) . ' VNĐ' . '</td>
                                    </tr>';
            }
        
            $noidung .= '<tr>
            <td colspan="3" style="border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;color: green;">Đơn hàng của bạn được Miễn phí
        ship</td>
                        <td style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px; color: red;" colspan="2">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>
        
               
        
                        <td style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px; color: red;" colspan="1">' . number_format($tongtien) . ' VNĐ' . '</td>
                    </tr>
                </tbody>
            </table>';
            $noidung .= "<br/>";
            $noidung.= "<p>Trân trọng cảm ơn Quý khách đã sử dụng dịch vụ mua hàng trực tuyến tại shop Smart Store!</p>";
            $maildathang = $_SESSION['email'];
            $mail = new Mailer();
            $mail->dathangmail($tieude, $noidung, $maildathang);
        }else{
            $tieude = "Đơn hàng $code của Quý Khách: $tenkhachhang được huỷ thành công";
            $noidung = '';
            $noidung .= "<p>Đơn hàng $code đã nhận được yêu cầu huỷ tại website Smart Store</p><br/>";
            $noidung .= "Số tiền quý khách đã thanh toán sẽ được hoàn trả qua tài khoản ngân hàng của quý khách khi thanh toán sao 24h làm việc";
            $noidung .= '<table style="font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;" scope="col">STT</th>
                                    <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">HÌNH ẢNH</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">THÔNG TIN SẢN PHẨM</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">ĐƠN GIÁ</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">SỐ LƯỢNG</th>
                                        <th style="border: 1px solid #dddddd;
                                        text-align: left;
                                        padding: 8px;" scope="col">THÀNH TIỀN</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                $i = 0;
                                $tongtien = 0;
                                while ($row = mysqli_fetch_array($query_lietke_dh)) {
                                    $i++;
                                    $thanhtien = $row['giakhuyenmai'] * $row['soluongmua'];
                                    $tongtien += $thanhtien;
                                
        
                $noidung .= '<tr>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">' . $i . ' </td>
                <td style="border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;">                        <center>
                <img src="' . $row['img_avatar'] . '" width="150px">
            </center></td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . $row['tensanpham'] . ' </td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . number_format($row['giakhuyenmai'], 0, ',', '.') . ' VNĐ' . '</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . $row['soluongmua'] . '</td>
                                    <td style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">' . number_format($thanhtien) . ' VNĐ' . '</td>
                                    </tr>';
            }
        
            $noidung .= '<tr>
            <td colspan="3" style="border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;color: green;">Đơn hàng của bạn được Miễn phí
        ship</td>
                        <td style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px; color: red;" colspan="2">TỔNG GIÁ TRỊ HOÁ ĐƠN</td>
        
               
        
                        <td style="border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px; color: red;" colspan="1">' . number_format($tongtien) . ' VNĐ' . '</td>
                    </tr>
                </tbody>
            </table>';
            $noidung .= "<br/>";
            $noidung.= "<p>Trân trọng cảm ơn Quý khách đã sử dụng dịch vụ mua hàng trực tuyến tại shop Smart Store!";
            $maildathang = $_SESSION['email'];
            $mail = new Mailer();
            $mail->dathangmail($tieude, $noidung, $maildathang);
        }
    }
    


    
}
if ($sql) {
    echo '<script>setTimeout("window.location=\'index.php?quanly=donhangcuaban\'",1);</script>';
}
?>