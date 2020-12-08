<?php
include 'conn.php';
/**
 * Class UserClass
 */
if (isset($_POST['password'])){
	$password=trim($_POST['password']);	
	
}
if (isset($_POST['username'])){
	$username=trim($_POST['username']);
	
}
$conn = connectDB();
$query = 'SELECT * FROM USER_LIT WHERE username = :u AND password_u = :p';
$stmt = $conn->prepare($query); // prepare
$stmt->bindParam(':u', $username);
$stmt->bindValue(':p', $password);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_OBJ);
if ($data){	
	$role = $data -> ROLE_U;
	switch ($role) {
	 	case '1':
	 		header("Refresh:0; url=stud.php");
	 		break;
	 	case '2':
	 		header("Refresh:0; url=teacher.php");
	 		break;
	 	case '3':
	 		header("Refresh:0; url=guess.php");
	 		break;
	 	case '4':
	 		header("Refresh:0; url=admin.php");
	 		break;	 	
	} 	

}
else{
	?>
	<script type="text/javascript">
		alert("Sai thông tin đăng nhập");
	</script>
	<?php	
	header("Refresh:0; url=index.php");
}

?>


