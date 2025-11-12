<?php
session_start();
if (!isset($_SESSION['student'])) {
    header("Location: index.html");
    exit();
}
$student = $_SESSION['student'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Result Page</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #edf2f7;
        text-align: center;
        padding-top: 80px;
    }
    .card {
        background: white;
        display: inline-block;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        width: 400px;
    }
    h2 { color: #2a5298; }
    table {
        width: 100%;
        margin-top: 15px;
    }
    td {
        padding: 10px;
        text-align: left;
    }
    .qualified {
        color: green;
        font-weight: bold;
    }
    .not-qualified {
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>
    <div class="card">
        <h2>JEE MAIN RESULT 2025</h2>
        <table>
            <tr><td><b>Roll Number:</b></td><td><?= $student['roll_number'] ?></td></tr>
            <tr><td><b>Name:</b></td><td><?= $student['name'] ?></td></tr>
            <tr><td><b>Date of Birth:</b></td><td><?= $student['dob'] ?></td></tr>
            <tr><td><b>Category:</b></td><td><?= $student['category'] ?></td></tr>
            <tr><td><b>Marks:</b></td><td><?= $student['marks'] ?></td></tr>
            <tr><td><b>Rank:</b></td><td><?= $student['rank'] ?></td></tr>
            <tr><td><b>Percentile:</b></td><td><?= $student['percentile'] ?>%</td></tr>
            <tr><td><b>Qualified:</b></td>
                <td class="<?= ($student['qualified'] == 'YES') ? 'qualified' : 'not-qualified' ?>">
                    <?= $student['qualified'] ?>
                </td></tr>
        </table>
        <br>
        <a href="index.html">Logout</a>
    </div>
</body>
</html>
