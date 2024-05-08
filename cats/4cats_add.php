<!-- Adding data -->

<?php

    require_once 'login.php';

    try{
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        // throw new PDOException($e->getMessage(), (int)$e->getCode());
        echo "Connection failed" . $e->getMessage();
        exit();
    }


    $data = [
        ['Cougar', 'Growler', 2],
        ['Cheetah', 'Charly', 3]
    ];      

    foreach($data as $row) {
        try {
            // use prepared statement to prevent SQL injection
            $stmt = $pdo->prepare('INSERT INTO cats VALUES (NULL, ?, ?, ?)');
            $stmt->execute($row);
        } catch(PDOException $e) {
            echo 'Error' . $e->getMessage() . '<br>';
        }
    }

    // $query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";
    // $result= $pdo->query($query);


    $pdo = null;
?>