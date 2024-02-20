<?php 
session_start();
if (isset($_SESSION['admin'])) {
    include "database.php";
   
} else {
    header("Location: adminlogin.php");
    exit;
}

$fname = '';
$uname = '';
$subject = '';

if (isset($_POST['fname'])) $fname = $_POST['fname'];
if (isset($_POST['username'])) $uname = $_POST['username'];
if (isset($_POST['subject'])) $subject = $_POST['subject'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission and insert data into the database
    if (!empty($_POST['pass'])) {
        $pass = $_POST['pass']; // Assuming the password is sent via POST
        
        // Prepare and execute the SQL statement to insert data into the database
        $sql = "INSERT INTO teachers (fname, username,subject, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die('Error in preparing SQL statement: ' . $conn->error);
        }
        $stmt->bind_param("ssss", $fname, $uname,$subject, $pass);
        if (!$stmt->execute()) {
            die('Error in executing SQL statement: ' . $stmt->error);
        }
        
        // Redirect to a success page or display a success message
        header("Location: teacher.php");
        exit;
    } else {
        // Handle the case where the password is empty
        // You can display an error message or take any other appropriate action
        echo "Error: Password field cannot be empty.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Teacher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="teacher.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dot Learn</a>
          <!-- Include your navigation links here -->
        </div>
    </nav>

    <div class="container mt-5">
        <a href="teacher.php" class="btn btn-dark">Go Back</a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3>Add New Teacher</h3>
            <hr>
            <div class="mb-3">
                <label class="form-label">First name</label>
                <input type="text" class="form-control" value="<?= $fname ?>" name="fname">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" value="<?= $uname ?>" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" value="<?= $subject ?>" name="subject">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pass" id="passInput">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
