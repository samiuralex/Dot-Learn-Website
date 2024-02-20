<?php
session_start();
if (!isset($_SESSION["admin"])) {
   header("Location: adminlogin.php");
   exit;
}

include "database.php";


$sqlUsers = "SELECT COUNT(*) as total_users FROM users";
$resultUsers = $conn->query($sqlUsers);
$totalUsers = ($resultUsers->num_rows > 0) ? $resultUsers->fetch_assoc()['total_users'] : 0;

$sqlTeachers = "SELECT COUNT(*) as total_teachers FROM teachers";
$resultTeachers = $conn->query($sqlTeachers);
$totalTeachers = ($resultTeachers->num_rows > 0) ? $resultTeachers->fetch_assoc()['total_teachers'] : 0;

$sqlCourses = "SELECT COUNT(*) as total_courses FROM courses";
$resultCourses = $conn->query($sqlCourses);
$totalCourses = ($resultCourses->num_rows > 0) ? $resultCourses->fetch_assoc()['total_courses'] : 0;

$sqlEnrollments = "SELECT COUNT(*) as total_enrollments FROM enroll";
$resultEnrollments = $conn->query($sqlEnrollments);
$totalEnrollments = ($resultEnrollments->num_rows > 0) ? $resultEnrollments->fetch_assoc()['total_enrollments'] : 0;

$sqlAdmins = "SELECT COUNT(*) as total_admins FROM admin";
$resultAdmins = $conn->query($sqlAdmins);
$totalAdmins = ($resultAdmins->num_rows > 0) ? $resultAdmins->fetch_assoc()['total_admins'] : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_dash.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard</title>
</head>
<body>
  <?php 
    include "adminnav.php";
    ?>
   
      <div class="heading">
        <h1>Welcome to Dot Learning Institute</h1>
        <p>An Ideal Platform for Your Journey</p>
      </div>

      <div class="motto">
        <p>Become a Technology Pro & Rule the Digital Wordl </p>
      </div>

<div class="container mt-5">
  <div class="container text-center mt-5"> 
      <h2>Admin Dashboard</h2>
      <hr>
        <div class="container mt-7">
          <div class="row">
              <div class="col">
                  <h4>Total Users: <?php echo $totalUsers; ?></h4>
              </div>
              <div class="col">
                  <h4>Total Teachers: <?php echo $totalTeachers; ?></h4>
              </div>
              <div class="col">
                  <h4>Total Courses: <?php echo $totalCourses; ?></h4>
              </div>
              <div class="col">
                  <h4>Total Enrollments: <?php echo $totalEnrollments; ?></h4>
              </div>
              <div class="col">
                  <h4>Total Admins: <?php echo $totalAdmins; ?></h4>
              </div>
          </div>
      </div>
      <hr>
      
      <div class="row row-cols-5 justify-content-center">
          <a href="teacher.php" class="col btn btn-dark m-3 py-3">
              <i class="fa fa-user-md fs-1" aria-hidden="true"></i><br>
              Teachers
          </a> 
          <a href="admin-student.php" class="col btn btn-dark m-3 py-3">
              <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
              Students
          </a> 
          <a href="admin-course.php" class="col btn btn-dark m-3 py-3">
              <i class="fa fa-pencil-square fs-1" aria-hidden="true"></i><br>
              Courses
          </a> 
          <a href="logout.php" class="col btn btn-danger m-2 py-4 col-8">
              <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
              Logout
          </a> 
      </div>
      <hr>
  </div>
</div>  

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
       $(document).ready(function(){
            $("#navLinks li:nth-child(1) a").addClass('active');
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
