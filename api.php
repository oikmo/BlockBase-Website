<?php
	session_start();
	include('dbcon.php');
	
	if(isset($_POST['register_btn'])) {
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];
		
		//sanitize to prevent SQL injection
		$stmt = $con->prepare('SELECT * FROM users WHERE email = ?');
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		
		//get number of rows associated with email
		$emails = $stmt->num_rows;
		
		//sanitize to prevent SQL injection
		$stmt = $con->prepare('SELECT * FROM users WHERE username = ?');
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		
		//get number of rows associated with name
		$usernames = $stmt->num_rows;
		
		$errormsg = "";
		
		$errorcheck = false;
		
		if(!preg_match('/^\S*$/u', $username)) {
			$errorcheck = true;
			$errormsg .= "Username is not valid!\n";
		}
		
		if($usernames > 0) {
			$errorcheck = true;
			$errormsg .= "Username already exists!\n";
		}
		
		if(strlen($username) > 16) {
			$errorcheck = true;
			$errormsg .= "Username was too long! (16 max)\n";
		}
		if(strlen($username) < 3) {
			$errorcheck = true;
			$errormsg .= "Username was too short (3 min)!\n";
		}
		
		if(empty($username) == true) {
			$errorcheck = true;
			$errormsg .= "Username field was empty!\n";
		}
		
		if(empty($password1) == true) {
			$errorcheck = true;
			$errormsg .= "Password field was empty!\n";
		}
		
		if(strlen($password1) < 7) {
			$errorcheck = true;
			$errormsg .= "Password was too short (7 min)!\n";
		}
		
		if($password1 != $password2) {
			$errorcheck = true;
			$errormsg .= "Password was not equal!\n";
		}
		
		if(empty($email) == true) {
			$errorcheck = true;
			$errormsg .= "Email field was empty!\n";
		}
		
		if(!filter_var($email , FILTER_VALIDATE_EMAIL) ){
			$errorcheck = true;
			$errormsg .= "Email was not valid!\n";
		}
		
		if($emails > 0) {
			$errorcheck = true;
			$errormsg .= "Email is already in use!\n";
		} 

		if($errorcheck == false) {
			//encypts password with default crypt library
			$password = password_hash($password1, PASSWORD_DEFAULT);
			
			//sanitize to prevent SQL injection (inserts user into database)
			$stmt = $con -> prepare('INSERT INTO users (username, email, password) VALUES (?,?,?)');
			$stmt -> bind_param('sss', $username, $email, $password);
			
			if($stmt -> execute()) {
				$_SESSION['status'] = "Registration successful!'$username'";
				$_SESSION['authenticated'] = TRUE;
				$_SESSION['auth_user'] = [
					'username' => $username,
					'email' => $email,
				];
				if (!is_dir("C:/inetpub/wwwroot/users/$username")) {
					mkdir("C:/inetpub/wwwroot/users/$username", 0777, true);
				}
				header("Location: register.php");
			} else {
				$_SESSION['status'] = "Registration failed.";
				header("Location: register.php");
			}
		} else {
			$_SESSION['status'] = $errormsg;
			header("Location: register.php");
		}
	}

	else if(isset($_POST['login_now_btn'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty(trim($username)) && !empty(trim($password))) {
			
			//sanitize
			$stmt = $con->prepare('SELECT * FROM users WHERE username LIKE ?');
			$stmt -> bind_param('s', $username);
			$stmt -> execute();
			
			
			$stmt_result = $stmt->get_result();
			$result = $stmt_result->num_rows;
			
			$name = "";
			$pw = "";
			$email = "";
			
			while($row_data = $stmt_result->fetch_assoc()) {
				$name = $row_data['username'];
				$pw = $row_data['password'];
				$email = $row_data['password'];
			}
			
			if($result > 0 && password_verify($password, $pw) == true) {
				$_SESSION['authenticated'] = TRUE;
				$_SESSION['auth_user'] = [
					'username' => $name,
					'email' => $email,
				];
				header("Location: index.php");
				exit(0);
			} else {
				$higher = $result > 0;
				$pw_verify = password_verify($password, $pw) == true;
				$_SESSION['status'] = "Invalid username or password (or user doesn't exist)!";
				header("Location: login.php");
				exit(0);
			}
		} else {
			$_SESSION['status'] = "All fields are mandatory :P";
			header("Location: login.php");
			exit(0);
		}
		
	}
	
	if(isset($_POST['upload_btn'])) {
		
		$upload_path = 'C:/inetpub/wwwroot/users'; 
		$upload_path = $upload_path.'/'.$_SESSION['auth_user']['username'].'/skin_'.$_SESSION['auth_user']['username'].'.png';
		
		$image = getimagesize($_FILES['skin']['tmp_name']);
		
		if ($image == null) {
			$_SESSION['status'] = ($_FILES['skin']!=null)."That was not a valid image!";
			header("Location: profile.php");
			exit(0);
		} else {
			list($width, $height, $type, $attr) = $image; 
			if($width == $height && $width == 64 && $type == IMAGETYPE_PNG) {
				
				if(move_uploaded_file($_FILES['skin']['tmp_name'],$upload_path)){
					$_SESSION['status'] = "Image uploaded successfully!";
					header("Location: profile.php");
					exit(0);
				}
			} else {
				$errortext = "Error! : ";
				
				if($width != 64) {
					$errortext .= "That was not a valid image size!";
				}
				
				if($type != IMAGETYPE_PNG) {
					$errortext .= "That was not a valid image (png)!";
				}
				
				$_SESSION['status'] = $errortext;
				header("Location: profile.php");
				exit(0);
			}
			
		}
	}

	if(isset($_GET['username']) || isset($_GET['password'])) {
		$username = $_GET['username'];
		$password = $_GET['password'];
		
		if(isset($_GET['username']) && isset($_GET['password'])) {
			if(!empty(trim($username)) && !empty(trim($password))) {
				
				$stmt = $con->prepare('SELECT * FROM users WHERE username LIKE ?');
				$stmt -> bind_param('s', $username);
				$stmt -> execute();
				
				$stmt_result = $stmt->get_result();
				$result = 0;
				$result = $stmt_result->num_rows;
				
				$name = "";
				$pw = "";
				$email = "";
				
				while($row_data = $stmt_result->fetch_assoc()) {
					$name = $row_data['username'];
					$pw = $row_data['password'];
					$email = $row_data['password'];
				}
				
				if($result > 0 && password_verify($password, $pw) == true) {
					$_SESSION['authenticated'] = TRUE;
					$_SESSION['auth_user'] = [
						'username' => $name,
						'email' => $email,
					];
					
					echo json_encode([
						'result' => true,
						'reason' => "Success!",
						'username' => $name,
					]);
					exit(0);
				} else {
					echo json_encode([
						'result' => false,
						'reason' => "Invalid username or password (or user doesn't exist)!",
						'username' => null,
					]);
					exit(0);
				}
			} else {
				echo json_encode([
					'result' => false,
					'reason' => "All fields are mandatory :P",
					'username' => null,
				]);
				exit(0);
			}
		} else {
			echo json_encode([
				'result' => false,
				'reason' => "All fields are mandatory :P",
				'username' => null,
			]);
			exit(0);
		}
	}
	
?>