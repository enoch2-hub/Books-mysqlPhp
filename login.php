<?php

    $host   = "localhost";
    $db     = "publications";
    $user   = "jim";
    $pass   = "password";
    $chrs   = "utf8mb4";
    $attr   = "mysql:host=$host;dbname=$db;charset=$chrs";
    $opts   =  
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

    // $opts =
    //     [
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //         PDO::ATTR_EMULATE_PREPARES => false,
    //     ];



?>





<?php

// $host   = "localhost";
// $db     = "publications";
// $user   = "jim";
// $pass   = "password";
// $chrs   = "utf8mb4";
// $conn   = new mysqli($host, $user, $pass, $db);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Set character set
// if (!$conn->set_charset($chrs)) {
//     printf("Error loading character set utf8mb4: %s\n", $conn->error);
//     exit();
// }

?>



