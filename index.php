<?php 
session_start();
if (isset($_SESSION['admin'])) {
    include "database.php";
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Courses
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="general-course.php">Course List</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1">Join Seminar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="reg.php" tabindex="-1">Register Now</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="adminlogin.php" tabindex="-1">Admin Login</a>
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

    <div class="all3-card">
      <div class="card3">
          <div class="container">
            <p><b>Graphics Design</b></p> 
          </div>
      </div>
      
      <div class="card3">
        <div class="container">
          <p><b>Web Development</b></p> 
        </div>
      </div>
  
      <div class="card3">
        <div class="container">
          <p><b>App Development</b></p> 
        </div>
      </div>
  
      <div class="card3">
        <div class="container">
          <p><b>Machine Learning</b></p> 
        </div>
      </div>
  
      <div class="card3">
        <div class="container">
          <p><b>Data Science</b></p> 
        </div>
      </div>
  
      <div class="card3">
        <div class="container">
          <p><b>AI & IOT</b></p> 
        </div>
      </div> 
  </div>

    <div class="all-card">
        <div class="card">
            <img src="./img/1.webp" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Machine Learning</b></h4> 
              <p>From Scratch to Imtermediate </p> 
              <h5>Course Fee : 5000Tk</h5>
            </div>
          </div>
          <div class="card">
            <img src="./img/2.webp" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>Data Science</b></h4> 
              <p>From Scratch to Imtermediate </p> 
              <h5>Course Fee : 5000Tk</h5>
            </div>
          </div>
          <div class="card">
            <img src="./img/3.png" alt="Avatar" style="width:100%">
            <div class="container">
              <h4><b>MERN Stack</b></h4> 
              <p>From Scratch to Imtermediate </p> 
              <h5>Course Fee : 5000Tk</h5>
            </div>
          </div>
    </div>

    <div class="container text-center"> <!-- Use Bootstrap's text-center class to center align -->
      <a href="enroll.php"><button type="button" class="btn btn-primary btn-lg btn-block mt-3">Enroll a course now</button></a>
    </div>

    <hr>
    <div class="description">
        <h3>Why Dot Learn !</h3>
        <p><div class="mottoline">Become an IT Pro & Rule the Digital World </div>With a vision to turn manpower into assets, Dot Learn Institute Institute is ready to enhance your learning experience with skilled mentors and updated curriculum. Pick your desired course from more than <b>100+</b> trendy options. We have designed our courses with the most demanding professional skills. The knowledge, experience, and expertise gained through the program will ensure your desired job in the global market. From the list below you can enroll to any online or offline courses at any time.</p>
    </div>

    <hr>
    
    <div class="all2-card">
      <div class="card2">
          <div class="container">
            <h4><b>World-Renowned IT Expert Making Organization</b></h4> 
            <p>Dot Learning has been working with a vision to create IT experts for the past 14 years. In a fast pacing world, where every sector relies on technology, you need to develop IT skills to secure a better future. With the utmost dedication, we have been able to make more than 50,000 IT experts who are currently working in different sectors.</p>
          </div>
        </div>
       
  </div>

  


<hr>

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