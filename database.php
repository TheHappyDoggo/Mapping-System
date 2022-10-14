<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body class="bg-dark text-white">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "mapping";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database_name);

    // // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";

    if (isset($_POST['submit'])) {
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $info = $_POST['info'];

        $sql_query = "INSERT INTO inputs (latitude,longitude,info)
	 VALUES ('$latitude','$longitude','$info')";

    //     if (mysqli_query($conn, $sql_query)) {
    //         echo "New Details Entry inserted successfully !";
    //     } else {
    //         echo "Error: " . $sql . "" . mysqli_error($conn);
    //     }
    //     mysqli_close($conn);
    }
    ?>


</body>

</html>