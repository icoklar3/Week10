<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "sql.njit.edu";
$username = "iac7";
$password = "curtsey94";
$dbname = "iac7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=iac7", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE id < 6;"); 
    $stmt->execute();


    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";


echo nl2br ("\n I got 6 lines <br>");
?>