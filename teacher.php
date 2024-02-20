<?php 
session_start();
if (isset($_SESSION['admin'])) {
  include "database.php";
  include "data/teacher.php";
  $teachers = getAllTeachers($conn);
 
} else {
  header("Location: admin_dash.php");
  exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Teachers</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="teacher.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "adminnav.php";
        if ($teachers != 0) {
     ?>
     <div class="heading">
      <h1>Welcome to Dot Learning Institute</h1>
      <p>An Ideal Platform for Your Journey</p>
    </div>



    <div class="motto">
      <p>Become a Technology Pro & Rule the Digital Wordl </p>
    </div>

<hr>
     <div class="container mt-5">
        <a href="teacher-add.php"
           class="btn btn-dark">Add New Teacher</a>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Department</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($teachers as $teacher ) { ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><?=$teacher['id']?></td>
                    <td><?=$teacher['fname']?></td>
                    <td><?=$teacher['username']?></td>
                    <td><?=$teacher['password']?></td>
                    <td><?=$teacher['subject']?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>

<footer>
  <div class="heading">
      <h3>Admission Is Going On</h3>
      <p>Enroll to any online or offline course now, take one step ahead towards a competent career</p>
  </div>

  <div class="buttons">
    <div class="button">
      <button>Join Seminar</button> <button>Browse Course</button>
    </div>
  </div>

  <div class="credit">
    <p>Design and Developed by Samiur Rabbi Alex</p>
  </div>
  

</footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
  crossorigin="anonymous"></script>

</body>
</html>
