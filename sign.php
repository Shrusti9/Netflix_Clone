<?php

	include 'db_conn.php';


session_start();

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $fname = validate_input($_POST["fname"]);
    $lname = validate_input($_POST["lname"]);
    $email = validate_input($P_OlST["email"]);
    $password = validate_input($_POST["password"]);

    // Insert data into the database
    $sql = "INSERT INTO register (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

    if ($conn->query($sql) === TRUE){ 
        // Set session variable for successful sign up
        $_SESSION["signup_success"] = true;
        header("Location: index.htm"l); // Redirect to success page
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
