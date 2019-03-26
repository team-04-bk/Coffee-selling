<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">\
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" type="text/css" href="../css/duc.css">
    <title>Sign up</title>

    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body style="overflow: hidden;">
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Name<span>Coffee</span></div>
    </div>
    <br>
    <div class="signin">
        <h1>Sign up</h1>
        <form action="signup-process.php" method="POST" id="form">
            <input type="text" placeholder="fullname" id="name" name="name"><br>
                <label id="errName" class="cyellow bold"></label>
                <br>
            <input type="text" placeholder="username" id="user" name="username"><br>
                <label id="errUser" class="cyellow bold"></label>
                <br>

            <input type="password" placeholder="password" name="password" id="password"><br>
                <label id="errPassword" class="cyellow bold"></label>
                <br>

            <input type="password" placeholder="re-password" id="re-password"><br>
                <label id="errRePassword" class="cyellow bold"></label>
                <br>
            <input type="button" value="Sign up" onclick="validate()">
            <input type="button" value="Log in">
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript">
        function validate()
        {
            var nameLength = document.getElementById('name').value.length;
            var userLength = document.getElementById('user').value.length;
            var passwordLength = document.getElementById('password').value;
            var rePasswordLength = document.getElementById('re-password').value;

            if (nameLength == 0) {
                document.getElementById('errName').innerHTML = "Vui lòng điền tên của bạn";
            }
            else {
                document.getElementById('errName').innerHTML = "";
            }

            if (userLength == 0) {
                document.getElementById('errUser').innerHTML = "Vui lòng điền tên đăng nhập";
            }
            else {
                document.getElementById('errUser').innerHTML = "";
            }

            if(passwordLength.length == 0){
                document.getElementById('errPassword').innerHTML = "Vui lòng điền mật khẩu";
            }
            else {
                document.getElementById('errPassword').innerHTML = "";
            }

            if(rePasswordLength.length == 0){
                document.getElementById('errRePassword').innerHTML = "Vui lòng điền lại mật khẩu";
            }
            else {
                var check = false;
                if (passwordLength != rePasswordLength) {
                    document.getElementById('errRePassword').innerHTML = "Mật khẩu không khớp";
                    check = false;
                }
                else {
                    document.getElementById('errRePassword').innerHTML = "";
                    check = true;
                }
            }
            if (passwordLength != 0 && userLength != 0 && nameLength != 0 && check) {
                document.getElementById('form').submit();
            }
        }
    </script>
</body>
</html>