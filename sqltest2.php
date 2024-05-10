<!-- This program uses an initial query to the customers table to look up all the customers
and then, given the ISBNs of the books each customer purchased, makes a new query
to the classics table to find out the title and author for each -->


<!-- Joe Bloggs purchased ISBN 9780099533474:
 'The Old Curiosity Shop' by Charles Dicken -->


<?php

    require_once 'login.php';

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }


    $query = "SELECT * FROM customers";
    $result = $pdo->query($query);


    while($row = $result->fetch()) {
        $custname = htmlspecialchars($row['name']);
        $custisbn = htmlspecialchars($row['isbn']);

        echo "$custname puchased ISBN $custisbn: <br>";

        $subquery  = "SELECT * FROM classics WHERE isbn='$custisbn'";
        $subresult = $pdo->query($subquery);
        $subrow    = $subresult->fetch();

        $custbook = htmlspecialchars($subrow['title']);
        $custauth = htmlspecialchars($subrow['author']);

        echo "&nbsp;&nbsp; $custbook by $custauth <br><br>";
    }

?>

<!--below query can also use  be used to return the same infor.-->
<!-- SELECT name,isbn,title,author FROM customers
NATURAL JOIN classics; -->
