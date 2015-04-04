<?php if(!isset($_SESSION)) session_start();
		
?>
<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Theme Starz">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/vanillabox/vanillabox.css" type="text/css">

    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
	

    <title>MBA CENTER EUROPE</title>

</head>
<body class="page-sub-page page-register-sign-in">

<div id="fb-root"></div>
<script>
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<?php include('header.php'); ?>
<!-- end Header -->

<!-- Breadcrumb -->
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Register or Sign in</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div id="page-main">
                <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1">
                    <div class="row">
                        <div class="col-md-6">
                            <section id="account-register" class="account-block">
                                <header><h2>Create New Account</h2></header>
                                <form role="form" id="form_signin" class="clearfix" ><!--action="course-joined.html"-->
                                    <div class="form-group">
                                        <label for="new-account-name">Full Name</label>
                                        <input type="text" class="form-control" id="new-account-name" name="new_account_name" placeholder="Your Name">
										<label id="name_error_required">This field is required.</label>
									</div>
                                    <div class="form-group">
                                        <label for="new-account-email">Email address</label>
                                        <input type="email" class="form-control" id="new-account-email" name="new_account_email" placeholder="Enter email">
										<label id="email_error_use">This email is already use.</label>
										<label id="email_error_format">This email is already use.</label>
										<label id="email_error_required">This field is required.</label>
								   </div>
								   <div class="form-group">
                                        <label for="new-account-phone">Cellular</label>
                                        <input type="text" class="form-control" id="new-account-phone" name="new_account_cellular" placeholder="Cellular">
										<label id="phone_error">This field is required.</label>
										<label id="phone_format">The phone number must be only numeric.</label>
									</div>
                                    <div class="form-group">
                                        <label for="new-account-password">Password</label>
                                        <input type="password" class="form-control" id="new-account-password" name="new_account_password" placeholder="Password">
										<label id="password_error">This field is required.</label>
										<label id="password_size">The password must be at least of 6 characters.</label>
										<label id="password_repeat">The password must be at least of 6 characters.</label>
									</div>
                                    <div class="form-group">
                                        <label for="new-account-repeat-password">Repeat Password</label>
                                        <input type="password" class="form-control" id="new-account-repeat-password" name="new_account_repeat_password" placeholder="Repeat Password">
										<label id="repeat_password_required">This field is required.</label>
										<label id="repeat_password_match">These two passwords doesn't match.</label>
								   </div>
								   <hr>

                                    <div class="checkbox">
                                        <label>
                                            <input id="condition" type="checkbox" onchange="verifCheck();">I Understand <a href="#">Terms & Conditions</a>
											<label id="condition_message">You must be agree with general condition.</label>
                                        </label>
                                    </div>
									<div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="employe">I'm an employe, the boss will confirm my subscription 
                                        </label>
                                    </div>

                                    <hr>
                                    <button type="button" id="btn_signin" class="btn pull-right">Create New Account</button>
                                </form>
                            </section><!-- /#account-block -->
                        </div><!-- /.col-md-6 -->
                        <div class="col-md-6">
                            <section id="account-sign-in" class="account-block">
                                <header><h2>Have an Account?</h2></header>
                                <form role="form" id="form_connection" class="clearfix" ><!--action="course-joined.html"-->
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name='email' placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"  name='password' placeholder="Password">
                                    </div>
                                    <button type="button" id="btn_connection" class="btn pull-right">Sign In</button>
									<label id="connexion_error">The password or the email is not correct.</label>
                                </form>
                                <hr>
                                <!--
                                      Below we include the Login Button social plugin. This button uses
                                      the JavaScript SDK to present a graphical Login button that triggers
                                      the FB.login() function when clicked.
                                    -->
                                <div class="fbLogin">
                                    <label>Login using Facebook credentials:</label>
                                    <table>
                                        <tr>
                                            <td><img id="fbLoginButton" src="/assets/img/facebook-logo.jpg" style="cursor: pointer;" height="15%" width="75%"></td>
                                            <td><div id="facebooklogin" class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" onlogin="javascript:CallAfterLogin();" scope="email,public_profile"></div></td>
                                        </tr>
                                    </table>
                                </div>

                                <div id="status">
                                </div>
                                <hr>


                                <p></p>
								<?php /*if(isset($_SESSION))
									  {
										if(isset($_SESSION['id_employe']))
										{
											echo " nom employe : ".$_SESSION['nom'];
										}
										if(isset($_SESSION['id_user']))
										{
											echo " nom user : ".$_SESSION['nom'];
										}
									  }
									  else
									  {
										echo "pas de session";
									  }*/
								?>
                            </section><!-- /#account-block -->
                        </div><!-- /.col-md-6 -->
                    </div><!-- /.row -->
                </div><!-- /.col-md-10 -->
            </div><!-- /#page-main -->

            <!-- end SIDEBAR Content-->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->

<!-- Footer -->
<?php include('footer.php'); ?>
<!-- end Footer -->

</div>
<!-- end Wrapper -->

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/selectize.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="assets/js/jQuery.equalHeights.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>

<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/send_form.js"></script>
<script type="text/javascript" src="assets/js/facebook_api.js"></script>


</body>
</html>