<div class="navigation-wrapper">
    <div class="secondary-navigation-wrapper">
        <div class="container">
            <div class="navigation-contact pull-left">Call Us:  <span class="opacity-70">+32 (0)2 737 65 05</span></div>
             <ul class="secondary-navigation list-unstyled pull-right">
			 <?php /*if(isset($_SESSION['user'])||(isset($_SESSION['employe']))){?> href="profil.php" <?php }else{ ?> href="#" <?php } */?>
                <li><a <?php if(isset($_SESSION['user'])||(isset($_SESSION['employe']))){?> href="profil.php" <?php }else{ ?> href="register-sign-in.php" <?php } ?> ><i class="fa fa-user"></i><?php if(isset($_SESSION['user'])||(isset($_SESSION['employe']))){ echo $_SESSION['nom']; }else{ echo "Sign in";  }?></a></li>
                <li><a href="managers/deconnecter.php">Log Out</a></li>
            </ul>
            <div class="search">
                <div class="input-group">
                    
                </div><!-- /.input-group -->
            </div>
         
        </div>
    </div><!-- /.secondary-navigation -->
    <div class="primary-navigation-wrapper">
        <header class="navbar" id="top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="index.php"><img src="assets/img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">Home</a>
                         
                        </li>
                        <li>
                            <a href="#" class=" has-child no-link">Courses</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="/at/gmat/">GMAT</a></li>
                                <li><a href="/at/TOEFL">TOEFL</a></li>
                                <li><a href="/at/IELTS">IELTS</a></li>
                                <li><a href="/at/SAT">SAT</a></li>
                                <li><a href="/at/SOLVAY">Solvay Test</a></li>
                                <li><a href="/at/VBAT">Vlerick test</a></li>
                                <li><a href="/at/toeic/">TOEIC</a></li>
                                <li><a href="/at/tage-mage/">Tage-Mage</a></li>
                                <li><a href="/at/GRE">GRE</a></li>
                                <li><a href="/at/IEGAT">IEGAT</a></li>
                            </ul>
                         <li>
                            <a href="#" class="has-child no-link">Admissions Consulting</a>
                            <ul class="list-unstyled child-navigation">
                            
                                <li><a href="college.php"href="register-sign-in.html">College</a></li>
                                <li><a href="business_school.php">Business School</a></li>
                                <li><a href="graduate.php">Graduate School</a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-child no-link">Events</a>
                            <ul class="list-unstyled child-navigation">
                                <li><a href="calendar.php">Calendar</a></li>
                                <li><a href="event-listing.php">Courses Listing</a></li>
                               
                            </ul>
                        
                        <li><a href="shop.php">Library</a></li>
                         <li>
                                                                       
                            <a href="contact-us.php">Contact Us</a>
                        </li>
                    </ul>
                </nav><!-- /.navbar collapse-->
            </div><!-- /.container -->
        </header><!-- /.navbar -->
    </div><!-- /.primary-navigation -->
    <div class="background">
        <img src="assets/img/background-city.png"  alt="background">
    </div>
</div>