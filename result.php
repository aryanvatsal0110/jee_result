<?php
session_start();

// Agar session me student data nahi hai → wapas login page pe bhej do
if(!isset($_SESSION['student'])){
    header("Location: index.html");
    exit();
}

// Session se student ka data le lo
$student = $_SESSION['student'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JEE Mains Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00c6ff, #007bff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .result-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }
        a:hover {
            background: #0056b3;
        }
        @keyframes fadeIn {
            from {opacity: 0;
