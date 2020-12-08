<html>
    <button id="display" name="display" onclick="display()">Display</button>
    <button id="update" name="update" onclick="update()">Update</button>    
</html>

<script type="text/javascript">
 
   
</script>

<?php
	include 'conn.php';
    $conn = connectDB();
	$stmt = $conn->prepare("SELECT * FROM USER_LIT");
    $stmt->execute();
?>

<?php    echo "<table style='border: solid 1px black;'>";
 	echo "<tr>
 		<th>Id</th>
 		<th>Username</th>
 		<th>Password</th>
 		<th>Role</th>
 		<th>Pname</th>
 		<th>Email</th>
 		<th>PhonesN</th>
 		</tr>";
    class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }




?>