<?php
// 1. Get user data from form
$roll = $_POST['roll_number'];
$dob = $_POST['dob'];

// 2. Database connection
$conn = new mysqli("localhost", "root", "", "jee_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Check student data
$sql = "SELECT * FROM students WHERE roll_number='$roll' AND dob='$dob'";
$result = $conn->query($sql);

// 4. If student found → display result
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Percentile calculation (optional simple logic)
    $percentile = ($data['marks'] / 300) * 100;

    // Qualification check
    $qualified = ($percentile >= 60) ? "✅ Qualified for JEE Advanced" : "❌ Not Qualified";

    echo "
    <div style='font-family: Arial; text-align:center; margin-top:50px;'>
      <h2>🎓 JEE Main 2025 Result</h2>
      <p><b>Name:</b> {$data['name']}</p>
      <p><b>Roll Number:</b> {$data['roll_number']}</p>
      <p><b>Category:</b> {$data['category']}</p>
      <p><b>Marks:</b> {$data['marks']} / 300</p>
      <p><b>Percentile:</b> " . number_format($percentile, 2) . "%</p>
      <p><b>Rank:</b> {$data['rank']}</p>
      <h3 style='color: " . (($percentile >= 60) ? "green" : "red") . ";'>$qualified</h3>
      <br><a href='index.html'>🔙 Back to Login</a>
    </div>";
} else {
    echo "<h3 style='color:red; text-align:center;'>❌ Invalid Roll Number or Date of Birth</h3>";
    echo "<center><a href='index.html'>🔙 Try Again</a></center>";
}
$conn->close();
?>
