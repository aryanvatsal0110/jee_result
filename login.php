<?php
$servername = "sql103.infinityfree.com";  // your InfinityFree server
$username = "if0_40385131";                 // your username
$password = "DFkQPd5PkYioO";               // your password
$database = "if0_40385131_jee_db";          // your database name

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$roll = $_POST['roll_number'];
$dob = $_POST['dob'];

$sql = "SELECT * FROM students WHERE roll_number='$roll' AND dob='$dob'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['student'] = $row;
    header("Location: result.php");
    exit();
} else {
    echo "<center><h2 style='color:red;'>Invalid Roll Number or Date of Birth ❌</h2>";
    echo "<a href='index.html'>Try Again</a></center>";
}

mysqli_close($conn);
?>
