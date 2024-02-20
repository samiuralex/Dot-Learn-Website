<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="enroll.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Dot Learn </title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dot Learn</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="index.php">Home</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="heading">
        <h1>Welcome to Dot Learning Institute</h1>
        <p>An Ideal Platform for Your Journey</p>
      </div>



      <div class="motto">
        <p>Become a Technology Pro & Rule the Digital Wordl </p>
      </div>

<hr>


<div class="container">
    <?php
    if (isset($_POST["submit"])) {
       $fname = $_POST["fname"];
       $email = $_POST["email"];
       $course_name = $_POST["course_name"];
       

       $errors = array();
       
       if (empty($fname) OR empty($email) OR empty($course_name) ) {
        array_push($errors,"All fields are required");
       }
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
       }
       
       require_once "database.php";
      
       if (count($errors)>0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
       }else{
        
        $sql = "INSERT INTO enroll (fname, email, course_name) VALUES ( ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sss",$fname, $email, $course_name);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are enrolled successfully.</div>";
        }
       }
    }
    ?>

    
    <form action="enroll.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="fname" placeholder="Full Name:">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="course_name" placeholder="Course Name:">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email:">
        </div>
        
      
        
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Enroll Now" name="submit">
            <a class="btn btn-primary" href="student.php" role="button">Dashboard</a>
        </div>
    </form>
    <div>
  </div>
</div>


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
