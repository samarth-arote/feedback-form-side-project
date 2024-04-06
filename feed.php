<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "madhura";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("CONNECTION FAILED...!" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    if ($result==TRUE) {
        $insert_sql = "INSERT INTO info (infra, clean, office, library, nonteaching, teaching, canteen)
        VALUES ( '$infra', '$clean', '$office', '$library', '$nonteaching', '$teaching', '$canteen')";

    if ($conn->query($insert_sql) === TRUE) {
        header("Location: home.html");
    } else {
        echo "ERROR: " . $insert_sql . "<br>" . $conn->error;
    }
    } 
}

$conn->close();
?>
