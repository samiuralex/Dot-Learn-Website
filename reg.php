<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="reg.css">
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
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Courses
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Free Courses</a></li>
                  <li><a class="dropdown-item" href="#">Premium Courses</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Course List</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1">Join Seminar</a>
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
       $fullName = $_POST["fullname"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       $passwordRepeat = $_POST["repeat_password"];
       
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);

       $errors = array();
       
       if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors,"All fields are required");
       }
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
       }
       if (strlen($password)<8) {
        array_push($errors,"Password must be at least 8 charactes long");
       }
       if ($password!==$passwordRepeat) {
        array_push($errors,"Password does not match");
       }
       require_once "database.php";
       $sql = "SELECT * FROM users WHERE email = '$email'";
       $result = mysqli_query($conn, $sql);
       $rowCount = mysqli_num_rows($result);
       if ($rowCount>0) {
        array_push($errors,"Email already exists!");
       }
       if (count($errors)>0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
       }else{
        
        $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        }else{
            die("Something went wrong");
        }
       }
      

    }
    ?>
    <form action="reg.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email:">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password:">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
    </form>
    <div>
    <div class="already">
        <p>Already Registered <a href="login.php">Login Here</a></p>
    </div>
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