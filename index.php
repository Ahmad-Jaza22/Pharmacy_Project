
<!DOCTYPE html>
<html lang="en">
<head>
<title>PharmacyManagementSystem</title>
<link rel="shortcut icon" type="image/x-icon" href="assets/uploads/settings/login_image-324.png">
 <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    
    <!-- css files -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //css files -->
    
    <!-- google fonts -->
    <link href="assets/fonts/Raleway/static/Raleway-Light.ttf" rel="stylesheet">
    <!-- //google fonts -->
    <style>

        .alert-warning {
    border-color: #FF9149!important;
    background-color: #FFBC90!important;
    color: #963B00!important;
}
        #change {
            color: white;
            background: #0A0E45;
        }

.alert {
    position: relative;
}
.mb-2, .my-2 {
    margin-bottom: 1.5rem!important;
}
.alert {
    padding: .75rem 1rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
        .change-image{
            border-radius: 15px;
            box-shadow: 0px 0px 20px white;
            width: 400px;
        }
    </style>
</head>
<body id="change">

<div class="signupform">
    <div class="container">
        <!-- main content -->
        <div class="agile_info">
            <div class="w3l_form">
                <div class="left_grid_info">
                    <h1  style=" font-size: 30px;margin-bottom: 10%" id="change">Pharmacy Managment </h1>
                        <img class="change-image" src="assets/uploads/settings/login_image-324.png" alt="" />
                </div>
            </div>
            <div class="w3_info">
                <h2 id="change" style="margin-bottom: 5%">Login to your Account</h2>
                <form  action="assets/app/auth.php" method="POST" >
                    <div class="input-group" style="border-radius:30px">
                        <span class="fa fa-envelope" aria-hidden="true"></span>
                        <input  style="height: 5vh;outline-color:transparent;border-color:transparent;" type="text" name="name" placeholder="Enter Your name" required="">
                    </div>
                    <div class="input-group" style="border-radius:30px">
                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="Enter Password" required="">
                    </div>
                    <div text-align="center">
                        <button  style="border-radius:30px;" class="btn btn-danger btn-block" type="submit">Login</button >
                    </div>
                </form>
            </div>
        </div>
        <!-- //main content -->
    </div>
    <!-- footer -->
    <div class="footer">
        
    </div>
    <!-- footer -->
</div>
    
</body>
</html>