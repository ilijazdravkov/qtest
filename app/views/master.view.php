<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<?php
$headerLink;
$headerLabel;
switch (\Core\Httpd\Request::uri()){
    case 'register':
        $headerLink = '<li class="nav-item"><a href="/login" class="nav-link icon d-flex align-items-center"><i class="ion-ios-people mr-2"></i> Login</a></li>';
        $headerLabel = "REGISTER";
        break;
    case 'login':
        $headerLink = '<li class="nav-item"><a href="/register" class="nav-link icon d-flex align-items-center"><i class="ion-ios-people mr-2"></i> Register</a></li>';
        $headerLabel = "LOGIN";
        break;
    default:
        break;
}
?>
<div class="main-section">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="">
                <?php
                if(isset($headerLabel)) {
                    echo $headerLabel;
                }
                ?>
            </a>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if(isset($headerLink)){
                        echo $headerLink;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php require $view; ?>
</div>


</body>
</html>