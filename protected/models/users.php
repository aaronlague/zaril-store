<?php
class UsersModel {
	public function getUsers($connect){
	
		$db = new db_config();

		$data = '';	
				
		$sql = "SELECT * FROM tbl_users ORDER BY date_created DESC";
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		
		
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$email = $row['email'];
			$username = $row['username'];
			$brand_name = $row['brand_name'];
			$date_created = $row['date_created'];
			//$password = $row['password'];	
			$role = $row['is_admin'];

	
			if ($role == '0') {
			    $role = 'Admin';
			} else {
			    $role = 'Brand';
			}

			$data .= "<tr>";
			$data .= "<td>" . $email . "</td>";
			$data .= "<td>" . $username . "</td>";
			$data .= "<td>" . $brand_name . "</td>";
			//$data .= "<td>" . md5($password) . "</td>";
			$data .= "<td>" . $role . "</td>";
			$data .= "<td>
				<a href='#' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>
				<a href='#' target='blank' class='btn btn-sm btn-warning' type='button'><i class='fa fa-refresh'></i>Reset Password</a>																	
			</td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}
}?>