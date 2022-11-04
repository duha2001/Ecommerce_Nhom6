<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
</head>

<body>
    <center>
        <h1>Vui lòng xác thực mật khẩu cấp 2</h1>
    <div id="gesturepwd"></div>
</center>
</body>
<script src="../dist/js/matkhaucap2/jquery-2.1.4.min.js"></script>
<script src="../dist/js/matkhaucap2/jquery.gesture.password.js"></script>

<script>
    $("#gesturepwd").GesturePasswd({
        backgroundColor: "#252736",
        color: "#FFFFFF",
        roundRadii: 25,
        pointRadii: 6,
        space: 30,
        width: 240,
        height: 240,
        lineColor: "#00aec7",
        zindex: 100
    });
    $("#gesturepwd").on("hasPasswd", function(e, passwd) {
        var result;

        if (passwd == "1235789") {

            result = true;
        } else {
            result = false;
        }



        if (result == true) {
            $("#gesturepwd").trigger("passwdRight");
            setTimeout(function() {
                login();
            }, 500);
        } else {
            $("#gesturepwd").trigger("passwdWrong");
            logout();
        }
        function login(){
    question = confirm("Mật khẩu cấp 2 xác thực chính xác nhấn ok để tiếp tục")
    if (question !="0"){
        top.location = "index.php?p=index&a=statistic"
    }
}

function logout(){
    question = confirm("Sai mật khẩu")
        top.location = "dang-xuat.php"

}
    });
</script>

</html>