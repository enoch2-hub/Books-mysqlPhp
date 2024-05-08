<!-- Describing a table -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

    require_once 'login.php';

    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

    $query = "DESCRIBE cats";
    $result = $pdo->query($query);

    echo "
        <table>
            <tr>
                <th>Column</th> 
                <th>Type</th>   
                <th>Null</th>
                <th>Key</th>
            </tr>
    ";

    while($row = $result->fetch(PDO::FETCH_NUM)) {
        echo "<tr>";
        for($k = 0; $k < 5; ++$k)
            echo "<td>" . htmlspecialchars($row[$k]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

?>



</body>
</html>

