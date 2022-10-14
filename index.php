<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <style>
        #map {
            height: 700px;
            width: 100%;
        }

        .center {
            width: 50%;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                </svg> Farang Map</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Go to a location" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="col mt-5 ml-2">

        <div class="row">

            <div class="center" style="width: 60%">

                <div class="col">
                    <div id="map"></div>
                </div>
            </div>

            <div class="row" style="width: 30vw; align-items:left">
                <div class="col">
                    <form action="index.php" method="post">
                        <input class="form-control" id="latitude" name="latitude" type="text" placeholder="Latitude" aria-label="default input example">
                        <input class="form-control mt-2 mb-2" id="longitude" name="longitude" type="text" placeholder="Longitude" aria-label="default input example">
                        <input class="form-control mt-2 mb-2" id="info" name="info" type="text" placeholder="info" aria-label="default input example">
                        <button type="submit" class="btn btn-primary" name="submit" onclick="setMarker()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg> Mark
                        </button>
                    </form>
                    <div class="col">

                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database_name = "mapping";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $database_name);

                        // // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        echo "Connected successfully<br>";

                        if (isset($_POST['submit'])) {
                            $latitude = $_POST['latitude'];
                            $longitude = $_POST['longitude'];
                            $info = $_POST['info'];

                            $sql_query = "INSERT INTO inputs (latitude,longitude,info)
	 VALUES ('$latitude','$longitude','$info')";

                            if (mysqli_query($conn, $sql_query)) {
                                echo "New Details Entry inserted successfully !";
                            } else {
                                echo "Error: " . $sql . "" . mysqli_error($conn);
                            }
                            mysqli_close($conn);
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="index.js"></script>
</body>

</html>