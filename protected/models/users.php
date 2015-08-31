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
			$id = $row['id'];
			$email = $row['email'];
			$username = $row['username'];
			$brand_name = $row['brand_name'];
			$date_created = $row['date_created'];
			//$password = $row['password'];	
			$id = $row['id'];
			$role = $row['is_admin'];

	
			if ($role == '1') {
			    $role = 'Admin';
			} else {
			    $role = 'Brand';
			}

			$data .= "<tr>";
			$data .= "<td class='userEmail'><input type='hidden' data-id='".$id."' value='".$email."' id='#email'>" . $email . "</td>";
			$data .= "<td class='userName'> <input type='hidden' value='".$username."' id='#email'>" . $username . "</td>";
			$data .= "<td class='userBrandName'>" . $brand_name . "</td>";
			$data .= "<td class='userRole'>" . $role . "</td>";
			$data .= "<td>
				<a href='#' data-id='".$id."' class='editBtn btn btn-sm btn-danger' type='button'><i class='fa fa-pencil'></i>Edit</a>
				<a href='#' data-id='".$id."' class='resetBtn btn btn-sm btn-warning' type='button'><i class='fa fa-refresh'></i>Reset Password</a>																	
			</td>";
			$data .= "</tr>";
    	}
		
		return $data;
	
	}

	public function getUsersDetail($userid, $connect){
	
		$db = new db_config();

		$data = '';	
				
		$sql = "SELECT * FROM tbl_users WHERE id = '".$userid."'";
		$result = mysqli_query($connect, $sql);
		//$num = $db->numrows($sql);
		
		//echo $sql;
		$counter = 1;
		while ($row = mysqli_fetch_array($result)) {

			$id = $row['id'];
			$email = $row['email'];
			$username = $row['username'];
			$brand_name = $row['brand_name'];
			$date_created = $row['date_created'];
			$role = $row['is_admin'];
			
			$data .= "<input style='display:none;' class='form-control' id='id' name='id' value='".$id."'>";
			$data .= "<div class='form-group'>";
			$data .= "<label>Email</label><br />";
			$data .= "<input class='form-control' name='email' value='".$email."'  required=''>";
			$data .= "</div>";

			$data .= "<div class='form-group'>";
			$data .= "<label>Username</label><br />";
			$data .= "<input class='form-control' name='username' value='".$username."'  minlength='2' required=''>";
			$data .= "</div>";

			$data .= "<div class='form-group'>";
			$data .= "<label>Brand name</label><br />";
			$data .= "<input class='form-control' name='brandname' value='".$brand_name."' minlength='2' required=''>";
			$data .= "</div>";

			
			$data .= "<label>Is admin?</label><br />";
			$data .= "<input type='checkbox' id='isAdmin' name='isAdmin' value='".$role."' >";
	

			$data .= "";
    	}
		
		return $data;
	
	}

	public function passwordReset($userid, $connect){

		$db = new db_config();
				
		$sql = "UPDATE tbl_users SET password = backup_password WHERE id = '".$userid."'";

		$result = mysqli_query($connect, $sql);

	}

}?>