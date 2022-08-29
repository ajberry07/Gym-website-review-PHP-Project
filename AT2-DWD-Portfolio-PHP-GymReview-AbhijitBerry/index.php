 <!-- HEADER.PHP -->
 <?php
  require "templates/header.php"
  ?>

 <div id="join-us">
   Welcome to Melbourne Gym Reviews, please click
   <a href="signup.php" class="btn btn-primary">Signup</a> to Sign Up

   or if you are a member, please click
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login-modal">
     Login
   </button>

 </div>

 <div class="container mt-3" style="width: 1200px">
   <!-- 1. CONDITIONAL Logged In/Logged Out Alerts -->
   <?php
    // Checks the $_SESSION for user variable
    if (isset($_SESSION['userId'])) {
      echo '<div class="alert alert-success" role="alert">You are logged in!</div>';
    } else {
      echo '<div class="alert alert-warning" role="alert">You are not logged in</div>';
    }
    ?>
 </div>



 <!-- carousel slideshow -->
 <div class="container">
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
       <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
       <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     </ol>
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img class="d-block w-100" src="images/bruce-mars-gJtDg6WfMlQ-unsplash.jpg" alt="First slide">
         <div class="carousel-caption">
           <h3>#Determined</h3>
           <p>Make a difference</p>
         </div>

       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="images/karsten-winegeart-eGSBVVtVCCw-unsplash.jpg" alt="Second slide">
         <div class="carousel-caption">
           <h3>#Industrious</h3>
           <p>Make a difference</p>
         </div>

       </div>


       <div class="carousel-item">
         <img class="d-block w-100" src="images/sven-mieke-optBC2FxCfc-unsplash.jpg" alt="Third slide">
         <div class="carousel-caption">
           <h3>#Brave</h3>
           <p>Make a difference</p>
         </div>

       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="images/anastase-maragos-HyvE5SiKMUs-unsplash.jpg" alt="Fourth slide">
         <div class="carousel-caption">
           <h3>#Focussed</h3>
           <p>Make a difference</p>
         </div>
       </div>

     </div>

     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Back</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
 </div>



 <!-- FOOTER.PHP -->
 <?php
  require "templates/footer.php"
  ?>