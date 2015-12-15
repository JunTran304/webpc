
<?php
	include ("../connect.php");
	if (
		(isset($_POST['hoten']) && $_POST['hoten'] != '')&&
		(isset($_POST['diachi']) && $_POST['diachi']!= '') && 
		(isset($_POST['email']) && $_POST['email'] != '')&& 
		(isset($_POST['sdt']) && $_POST['sdt'] != '')
	 ) {
		$hoten = $_POST['hoten'];
		$diachi = $_POST['diachi'];
		$email = $_POST['email'];
		$sdt = $_POST['sdt'];
		$fax = $_POST['fax'];
		$cty = $_POST['cty'];

		// cho cau lenh insert vao db o day
		// cau lenh inseeert thi minh tu viet nha
		//ua t biet r
		// phan lay du lieu ra thi cung tuong tu
		//ok
	} else {
		echo "[{status:error, msg:'chua du thong tin bat buoc'}]";
	}
	
	
?>