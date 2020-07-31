<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pragyanand Tiwari IT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/button.css" rel="stylesheet">

 
</head>



<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <h1 class="logo mr-auto" style="font-weight:normal;"><a href="">Pragyanand Tiwari</a></h1>

          
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				 <div class="carousel-container" style="margin-bottom: -500px">
              		<div class="container">


              			<form action="ConvertPdfToImg.php" enctype="multipart/form-data" method="post" name="f1" >
                    <div class="row">
	          				<div class = "align-label">
								<label for = "file" value="pdf" > Choose a PDF </label>
		          			    <input type = "file" id = "file" name = "file" accept = "pdf/application"> 
		          			    </div>
                      </div>

		          			    <div class = "row"
		          			    style="margin-top: 100px">
		          			    	<div class = "col-lg12">&nbsp;</div>
		          			    	<div class = "col-lg-12">&nbsp;</div>
		          			    	<div class = "col-lg-12">&nbsp;</div>
		          			    </div>

		          			    <div class = "row" style="margin-top: -50px">
		          			    	<div class = "col-lg12"></div>
		          			    	<div class = "col-lg-12"></div>
		          			    	<div class = "col-lg-12 filename" style="font-family: montserrat; color: white"></div>
		          			    </div>

		          		<div class="row">	
									<div class = "convert-label" >
										<label for = "convert">Convert To Image</label>
				          			    <input type = "submit" id = "convert" name="convert" class="btn btn-primary" style="opacity: 0; margin-top:-120px" value="submit"> 
		          					</div>
                      </div>
		          				
		          				  <div class="row"> 
			          				<div class = "encrypt-label" style="float:left;">
										        <label for = "encrypt">Encrypt</label>
				          			    <input type = "submit" id = "encrypt" name="encrypt" class="btn btn-primary" style="opacity: 0; margin-top:-120px;" formaction="encrypt.php">
                        </div>
                      
                         <div class="form-group" style="float:left;">
                          <label for="exampleInputPassword1"></label>
                          <input type="password" class="form-control passwordField" placeholder="Password"  autocomplete="new-password" maxlength=10 name="password">
                        </div>
                      </div>


                      <?php 
                      //echo "
                     // <div class=\"row\"> 
                      //  <div class = \"convert-label\" style=\"margin-top: 100px; width: 200px; border-color: rgb(66, 236, 245);\" >
                        //  <a name=\"download\" href = \"Towel Card 200617_images.zip\" style=\"color: white\">Download</a>        
                           //   </div>
                      //</div>";
                     
                      ?>
              	</form>
					</div>
           		 </div>
        	</div>
	 </div>
    	</div>
  </section><!-- End Intro Section -->



  
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          

          

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> +919950682019<br>
              <strong>Email:</strong> tiwaripragyanand@yahoo.in<br>
            </p>

            <div class="social-links">
              
              <a href="https://www.linkedin.com/in/pragyanand/" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>


        </div>
      </div>
    </div>

    <div class="container">
      
    </div>
  </footer><!-- End Footer -->



  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

   <!--//script to show file name-->
  <script>
	$(function()
	{
		$("#file").change(function(event) {
			var x = event.target.files[0].name
			$(".filename").text(x)
		});
	})
</script>

<!--//script to disable enter key-->
<script>

      $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
  

</body>

</html>