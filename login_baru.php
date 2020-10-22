<?php
isset($_REQUEST['error']) ? $error = $_REQUEST['error'] : $error = "";

// clean up error code to avoid XSS
$error = strip_tags(htmlspecialchars($error));
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">


<head>

    <script src="library/javascript/pages_common.js" type="text/javascript"></script>
    <title>daloRADIUS</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/1.css" type="text/css" media="screen,projection" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body onLoad="document.login.operator_user.focus()">
    <?php
    include_once("lang/main.php");
    ?>


    <div id="header">
        <h1><a href="index.php"> <img src="images/daloradius_small.png" border=0 /></a></h1>

        <h2>

            <?php echo t('all', 'copyright1');
            ?>
        </h2>
        <br />

        <ul id="subnav">
            <li><?php echo t('all', 'daloRADIUS')
                ?></li>
        </ul>
    </div>

    <div class="limiter">
        <center>
            <div>
                <a href="#" onclick="javascript:toggleShowDiv('helpPage')">
                    <h2><?php echo t('Intro', 'login.php')
                        ?></h2>
                </a>
                <div id="helpPage" style="display:none;visibility:visible">
                    <?php echo t('helpPage', 'login')
                    ?>
                </div>

                <?php
                if ($error) {
                    echo $error;
                    echo t('messages', 'loginerror');
                }
                ?>
            </div>
        </center>
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image:
						url(assets/images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        <h2><?php echo t('text', 'LoginRequired') ?></h2>

                        <h3><?php echo t('text', 'LoginPlease') ?></h3>
                    </span>
                </div>

                <form class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username
							is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" name="operator_user" value="administrator" type="text" tabindex=1 />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password
							is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" name="operator_pass" placeholder="Enter password" value=""
                            type="password" tabindex=2 />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="input-group m-b-18">
                        <span class="label-input100">Location</span>
                        <select name="location" tabindex=3 class="generic">
                            <?php
                            if (
                                isset($configValues['CONFIG_LOCATIONS']) &&
                                is_array($configValues['CONFIG_LOCATIONS']) &&
                                count($configValues['CONFIG_LOCATIONS']) > 0
                            ) {
                                foreach ($configValues['CONFIG_LOCATIONS'] as $locations => $val)
                                    echo "<option value='$locations'>$locations</option>";
                            } else {
                                echo "<option value='default'>Default</option>";
                            }
                            ?>
                        </select>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div id="footer">
            <center>
                <?php
                include 'page-footer.php';
                ?>
            </center>

        </div>
    </div>

    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>