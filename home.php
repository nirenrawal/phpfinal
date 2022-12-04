<?php 
include('header.php'); 
require_once('db.php');
if(!isset($_SESSION['email'])){
    header('locaiton:login-form.php');
}

$email = $_SESSION['email'];
$q=$db->prepare("SELECT * FROM students where email = :email");
$q->bindValue(':email', $email);
$q->execute();
$data = $q->fetchAll();


//CALCULATE AGE FROM DATE
$dob = new DateTime($data[0]->dob);
$today   = new DateTime('today');
$year = $dob->diff($today)->y;

?>




<div class="main-content">
    <div class="container mt-7">
      <!-- Table -->
      <h2 class="mb-5">Profile Card</h2>
      <div class="row">
        <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="profile_pictures/<?php echo $data[0]->picture; ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                    <?php echo $data[0]->name ?>
                  <span class="font-weight-light">, <?php echo $year ?></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $data[0]->address ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
                <hr class="my-4">
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Show more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  






<?php include('footer.php'); ?>
