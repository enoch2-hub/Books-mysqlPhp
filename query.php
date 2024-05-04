<?php

    require_once    'login.php';

    try{
        $pdo = new PDO($attr, $user, $pass, $opts);
    } 
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    
    $query = "SELECT * FROM classics";
    $result = $pdo->query($query);
    
    while ($row = $result->fetch())
    {
        echo 'Author:   ' . htmlspecialchars($row['author']) . "<br>";
        echo 'Title:    ' . htmlspecialchars($row['title']) . "<br>";
        echo 'Category:  ' . htmlspecialchars($row['type']) . "<br>";
        echo 'Year:      ' . htmlspecialchars($row['year']) . "<br>";
        echo 'ISBN:     ' . htmlspecialchars($row['id']) . "<br><br>";
    }

    
    
    
    // // Connect to the database
    // $mysqli = new mysqli($host, $user, $pass, $db);

    // // Check for connection errors
    // if ($mysqli->connect_error) {
    //     die("Connection failed: " . $mysqli->connect_error);
    // }



    //     // Your query and result retrieval code
    // $query = "SELECT * FROM classics";
    // $result = $mysqli->query($query);

    // // Check for errors manually
    // if (!$result) {
    //     // Handle query error
    //     echo "Query failed: " . $mysqli->error;
    //     exit();
    // }

    // while ($row = $result->fetch_assoc()) {
    //     echo 'Author:   ' . htmlspecialchars($row['author']) . "<br>";
    //     echo 'Title:    ' . htmlspecialchars($row['title']) . "<br>";
    //     echo 'Category  ' . htmlspecialchars($row['type']) . "<br>";
    //     echo 'Year      ' . htmlspecialchars($row['year']) . "<br>";
    //     echo 'ISBN      ' . htmlspecialchars($row['id']) . "<br><br>";
    // }

    // // Close the connection
    // $mysqli->close();
    
?>