<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./ssqltest.css">
</head>
<body>
    

<?php

//get the login file for connecction with mysql db
    require_once 'login.php';

//pdo connection- to connect php with mysql
    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException ($e->getMessage(), (int)$e->getCode());
    }


// To prevent SQL injection
    // function get_post($pdo, $var) {
    //     return $pdo->quote($_POST[$var]);
    // }
// 

    // The PDO::quote() method adds quotes around a string, 
    // making it safe for use in SQL queries. 
    // But when you're using PDO::quote() with an integer value, 
    // it adds quotes unnecessarily, which can cause issues in SQL queries.
    // SO, a below is a modified get_post() function:

//----------modified get_post() function:        
    function get_post($pdo, $var) {
        return $pdo->quote($_POST[$var]) ?? null;
    }
    

//Delete functionality
    // if(isset($_POST['delete']) && isset($_POST['id'])) {
    //     $id     = get_post($pdo, 'id');
    //     $query  = "DELETE FROM classics WHERE id=$id";
    //     $result = $pdo->query($query);
    // }

//------Modified delete functionality
    if(isset($_POST['delete']) && isset($_POST['id'])) {
        $id   = get_post($pdo, 'id');
        if ($id !== null) {
            $query  = "DELETE FROM classics WHERE id=$id";
            $result = $pdo->query($query);
        }
    }

    
//Add functionality
    if (isset($_POST['author']) &&
        isset($_POST['title']) &&
        isset($_POST['type']) &&
        isset($_POST['year']) &&
        isset($_POST['id']))

    {
        $author     = get_post($pdo, 'author');
        $title      = get_post($pdo, 'title');
        $type       = get_post($pdo, 'type');
        $year       = get_post($pdo, 'year');
        $id         = get_post($pdo, 'id');       

        // $query  = "INSERT INTO classics VALUES" . 
        //     "($author, $title, $type, $year, $id)";
        // $result = $pdo->query($query);

        //------Modified if conditional for the add functionality
        if ($author !== null && $title !== null && $type !== null && $year !== null && $id !== null) {
            $query  = "INSERT INTO classics VALUES" . 
                "($author, $title, $type, $year, $id )";
            $result = $pdo->query($query);
        }
    }



// Form for the user to enter new data
    echo <<<_END
        <form action="sqltest.php" method="post">
            <pre>
                Author      <input type="text" name="author">
                Title       <input type="text" name="title">
                Category    <input type="text" name="type">
                Year        <input type="text" name="year">
                ISBN        <input type="text" name="id">
                            <input type="submit" value="ADD RECORD">
            </pre>
        </form>
        _END;
        
        
        // Display existing data in the db
        $query  = "SELECT * FROM classics";
        $result = $pdo->query($query);
        
        while ($row = $result->fetch())
        {
            $r0 = htmlspecialchars($row['author']);
        $r1 = htmlspecialchars($row['title']);
        $r2 = htmlspecialchars($row['type']);
        $r3 = htmlspecialchars($row['year']);
        $r4 = htmlspecialchars($row['id']);
        
        echo <<<_END
            <pre>
                Author      $r0
                Title       $r1
                Category    $r2
                Year        $r3
                ISBN        $r4
            </pre>
            
            <form class='form2' action='sqltest.php' method='post'>
                <input type='hidden' name='delete' value='yes'>
                <input type='hidden' name='id' value='$r4'>
                <input type='submit' value='DELTE RECORD'>
            </form>
        
    _END;
    }


?>











</body>
</html>