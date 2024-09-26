
<?php
    include 'db_conn.php';
    error_reporting(E_ALL);
ini_set('display_errors', 1);


    if (isset($_POST['email']) && isset($_POST['password'])) {


        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $userid = $row['id'];
            $location = 'imp.html?id=' . $userid;
            header("Location: $location");
        } else {
            // Log the error to console
            echo "<script>alert('Invalid email or password.');</script>";
        }
    } else {
        // Log the error to console
        echo "<script>console.error('Please enter both email and password.');</script>";
    }
?>
