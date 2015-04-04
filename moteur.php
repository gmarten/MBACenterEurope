<?php if(!isset($_SESSION)) session_start();
define('DOCROOT', realpath(dirname(__FILE__)).'/');

//if(file_exists(DOCROOT . "managers/userManager.php")) echo "existe user"; else echo "existe_pas user";
//if(file_exists(DOCROOT . "managers/coursManager.php")) echo "existe cours"; else echo "existe_pas cours";


require_once(DOCROOT . "managers/userManager.php");  //  ok fonctionne
require_once(DOCROOT . "managers/coursManager.php");

if(!isset($_SESSION['employe']))
{
	header('Location: http://mbacentereurope.eu/index.php');
	//header('Location: http://localhost/mbacenter/mbacenter/index.php');
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Theme Starz">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="/DataTables-1.10.5/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/DataTables-1.10.5/media/css/jquery.dataTables_themeroller.css">

    <title>MBA center Europe Events</title>

</head>

<body class="page-sub-page page-events-listing">
<!-- Wrapper -->
<div class="wrapper">
<!-- Header -->
<?php //include('header.php'); ?>
<!-- end Header -->

<!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section class="events" id="events">
                       <!-- Page Content -->
<div id="page-content">
    <div class="container">
        <div class="row">
            <!--MAIN Content-->
            <div class="col-md-12">
                <div id="page-main">
                    <section id="members">
                        <header><h1>Members</h1></header>
						<section id="our-students">
							<section id="our-speakers">
							<?php  
								$userManager = new UserManager(); 
								$result=$userManager->selectAll();			  
								
							?>	
							<section id="data_moteur">
							
								<table id='data_table_moteur' class="display"> 
									<thead>
										<tr>
											<th> Name </th>
											<th> Subscription Date </th>
											<th> Origin </th>
											<th> Service to Propose </th>
											<th> Email </th>
											<th> Phone </th>
											<th> Comments </th>
											<th> Done </th>
											<th> Type </th>
											<th> Full Profile </th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th> Name </th>
											<th> Subscription Date </th>
											<th> Origin </th>
											<th> Service to Propose </th>
											<th> Email </th>
											<th> Phone </th>
											<th> Comments </th>
											<th> Done </th>
											<th> Type </th>
											<th> Full Profile </th>
										</tr>
									</tfoot>
									<tbody>
									<?php 
																	
									for($i=0;$i<count($result);$i++)
									{
									?>
										<tr>
											<td> <?php echo $result[$i]['nom']; ?> </td>
											<td> <?php echo "ajouter date inscription"; ?> </td>
											<td> <?php echo "ajouter origine"; ?> </td>
											<td> 
											</td>
											<td> <?php echo $result[$i]['email']; ?> </td>
											<td> <?php echo $result[$i]['gsm']; ?> </td>
											<td> <?php echo $result[$i]['comments']; ?> </td>
											<td> <?php echo "ajouter fait"; ?> </td>
											<td> <?php echo $result[$i]['type']; ?> </td>
											<td> <a href="http://mbacentereurope.eu/profil.php?id_user=<?php echo $result[$i]['id_user'];?>">Full Profile</a></td>
										</tr>
									<?php
									} 
									?>
									</tbody>
								</table>
							</section>								
							</section><!-- /#our-speakers -->
						</section>
				  </section>
                </div><!-- /#page-main -->
                <div class="center">
				<div id="nb_pages">
                        <ul class="pagination" id="page_num">
							
                        </ul>
                </div>
				</div>
            </div><!-- /.col-md-8 --><!-- end Page Content -->
        </div></div></div></section></div></div></div></div></div>

<!-- Footer -->
<?php //include('footer.php'); ?>
<!-- end Footer -->
</div>
<!-- end Wrapper -->

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" charset="utf8" src="/DataTables-1.10.5/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/js/traitement_moteur.js"></script>

</body>
</html>