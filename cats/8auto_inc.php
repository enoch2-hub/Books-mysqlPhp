<!-- Using AUTO_INCREMENT -->

<?php

    require_once 'login.php';

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    // $query  = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
    // $result = $pdo->query($query);
        
    // echo "The Insert ID was: " . $pdo->lastInsertId();
    
// Using Insert ID's

    $query   = "INSERT INTO cats VALUES(NULL, 'Puppy', 'Woof', 2)";
    $result  = $pdo->query($query);
    $insertID = $pdo->lastInsertId();

    $query   = "INSERT INTO owners VALUES($insertID, 'Sally', 'Kip')";
    $result  = $pdo->query($query);

    echo "Inserted $query"
?>


