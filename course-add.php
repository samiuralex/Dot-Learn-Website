<?php 
session_start();
if (isset($_SESSION['admin'])) {
    include "database.php";
    include "data/course.php";
   
} else {
    header("Location: adminlogin.php");
    exit;
}

$course_name = '';
$course_price = '';
$teacher_fee = ''; // Define $teacher_fee variable

if (isset($_POST['course_name'])) $course_name = $_POST['course_name'];
if (isset($_POST['course_price'])) $course_price = $_POST['course_price'];
if (isset($_POST['teacher_fee'])) $teacher_fee = $_POST['teacher_fee']; // Assign value to $teacher_fee

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission and insert data into the database
    if (!empty($_POST['pass'])) {
        $pass = $_POST['pass']; // Assuming the password is sent via POST
        
        // Prepare and execute the SQL statement to insert data into the database
        $sql = "INSERT INTO courses (course_name, course_price, teacher_fee) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die('Error in preparing SQL statement: ' . $conn->error);
        }
        $stmt->bind_param("sss", $course_name, $course_price, $teacher_fee);
        if (!$stmt->execute()) {
            die('Error in executing SQL statement: ' . $stmt->error);
        }
        
        // Redirect to a success page or display a success message
        header("Location: admin-course.php");
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
    <title>Admin - Add Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="teacher.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dot Learn</a>
         
        </div>
    </nav>

   
    <div class="container mt-5">
        <a href="admin-course.php" class="btn btn-dark">Go Back</a>
        <form method="post" class="shadow p-3 mt-5 form-w" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h3>Add New Course</h3>
            <hr>
            <!-- Display error or success message here if needed -->
            <div class="mb-3">
                <label class="form-label">Course name</label>
                <input type="text" class="form-control" value="<?= $course_name ?>" name="course_name">
            </div>
            <div class="mb-3">
                <label class="form-label">Course Price</label>
                <input type="text" class="form-control" value="<?= $course_price ?>" name="course_price">
            </div>
            <div class="mb-3">
                <label class="form-label">Teacher Fee</label>
                <input type="text" class="form-control" value="<?= $teacher_fee ?>" name="teacher_fee"> <!-- Corrected the name attribute -->
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="pass" id="passInput">
                    <button class="btn btn-primary" type="button" id="randomPassword">Random</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
