<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit; // Add exit to stop execution if user is not logged in
}

include "database.php"; // Include database.php after session check

// Retrieve user information from the session
if(isset($_SESSION["users"]["id"])) {
    $id = $_SESSION["users"]["id"];

    // Query to fetch user data from the database
    $sql = "SELECT name AS full_name, email FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $users_data = $result->fetch_assoc();
        $full_name = $users_data["full_name"];
        $email = $users_data["email"];
    } else {
        // Handle if user data is not found
        $full_name = "Unknown";
        $email = "Unknown";
    }
} else {
    // Handle if user ID is not set in session
    $full_name = "Unknown";
    $email = "Unknown";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <!-- Navigation bar content -->
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
        <h2>Welcome to Student Dashboard, <?php echo $full_name; ?></h2>
        <p>Email: <?php echo $email; ?></p>
        <a href="logout.php" class="btn btn-warning">Logout</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
