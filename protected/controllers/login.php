<?php
class LoginController {

	public function loginPage($username, $password, $connect) {

		$db = new db_config();

		$sql = "SELECT * FROM tbl_users WHERE username = '" . $username . "' AND password = '" . $password . "'";

		$result = mysqli_query($connect, $sql);

		$num = $db->numrows($result);

		$row = $db->fetcharray($result);

		if($num == 0){

			echo "user not existing";
		
		} else {

			$data = '';

			$username = $row['username'];
			$is_admin = $row['is_admin'];
			$brand_name = $row['brand_name'];
			$id = $row['id'];


			//
			

			if ($is_admin == 1){
				session_start();
                $_SESSION['session_userid']  = $username;
                $_SESSION['session_is_admin'] = $is_admin;
                $_SESSION['brand_name'] = $brand_name;
                $_SESSION['id'] = $id;
               

                session_write_close();
				
				header("Location: index.php");	
			
			} else if ($is_admin == 0) {
				session_start();
                $_SESSION['session_userid']  = $username;
                $_SESSION['session_is_admin'] = $is_admin;
                $_SESSION['brand_name'] = $brand_name;
                $_SESSION['id'] = $id;
                session_write_close();

				header("Location: /user/index.php");	
					
			}
			

		}

		return $data;

	}

}?>