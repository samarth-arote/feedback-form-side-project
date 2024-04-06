<?php
$servername="localhost";
$username="root";
$password="";
$dbname="madhura";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    echo "CONNECTION FAILED...!" .$conn->connection_error;
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $first= $_POST["first-name"];
    $last= $_POST["last-name"];
    $dob= $_POST["dob"];
    $email= $_POST["email"];
    $mobile= $_POST["mobile"];
    $gender= $_POST["gender"];
    $dept= $_POST["department"];
    $year= $_POST["year"];
    $sem= $_POST["sem"];
    $address= $_POST["address"];
    $city= $_POST["city"];
    $pin= $_POST["pin-code"];
    $state= $_POST["state"];
    $first = $_POST["first-name"];
    $last = $_POST["last-name"];
    $infra = $_POST["collegeinfra"];
    $clean = $_POST["clean"];
    $office = $_POST["officestaff"];
    $library = $_POST["library"];
    $nonteaching = $_POST["non-teaching"];
    $teaching = $_POST["teaching"];
    $canteen = $_POST["canteen"];



    $check_sql = "SELECT * FROM info WHERE first_name='$first' AND last_name='$last'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<!DOCTYPE html>
        <html>
        
        <head>
            <title>Feedback Already Submitted</title>
        </head>
        
        <body>
            <div class='container'>
                <h2>You Already Registered.....!</h2>
                <p>You cannot fill form again.</p>
                <button onclick='home()'>Go Back to Home</button>
            </div>
            <script>
            function home() {
                window.location.href = 'index.html';
            }
            </script>
        </body>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .container {
            max-width: 600px;
            margin: 100px auto;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #ff0000; /* Red color for emphasis */
        }
        
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        </style>
        </html>
        `";
    }else{
    $sql= "INSERT INTO info (
        first_name,
        last_name,
        dob,
        email,
        mobile,
        dept,
        year,
        sem,
        address,
        city,
        pin,
        state,
        infra, 
        clean, 
        office, 
        library, 
        nonteaching, 
        teaching, 
        canteen
    ) VALUES (
        '$first',
        '$last',
        '$dob',
        '$email',
        '$mobile',
        '$dept',
        '$year',
        '$sem',
        '$address',
        '$city',
        '$pin',
        '$state',
        '$infra', 
        '$clean', 
        '$office', 
        '$library', 
        '$nonteaching', 
        '$teaching', 
        '$canteen'
    );";
    
    if($conn->query($sql)===TRUE){
        header("Location:home.html");
    }
    else{
        echo "ERROR: ".$sql."<br>" .$conn->error;

    }
   }
}



$conn->close();


 ?>