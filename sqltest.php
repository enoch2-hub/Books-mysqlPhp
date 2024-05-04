<?php

//get the login file for connecction with mysql db
    require_once 'login.php';

//pdo connection- to connect php with mysql
    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException ($e->getMessage(), (int)$e->getCode());
    }

//Delete functionality
    if(isset($_POST['delete']) && isset($_POST['isbn'])) {
        $isbn   = get_post($pdo, 'isbn');
        $query  = "DELETE FROM classics WHERE isbn=$isbn";
        $result = $pdo->query($query);
    }

//Add functionality
    if (isset($POST['author']) &&
        isset($POST['title']) &&
        isset($POST['type']) &&
        isset($POST['year']) &&
        isset($POST['id']))

    {
        $author     = get_post($pdo, 'author');
        $title      = get_post($pdo, 'title');
        $type       = get_post($pdo, 'type');
        $year       = get_post($pdo, 'year');
        $id         = get_post($pdo, 'id');

        $query  = "INSERT INTO classics VALUES" . 
            "($author, $title, $type, $year, $id )";
        $result = $pdo->query($query);
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

    <form action='sqltest.php' method='post'>
        <input type='hidden'>
    </form>

    _END;
    }


?>