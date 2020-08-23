<?php

class ftp_login{
	private $ip;
	private $username;
	private $password;
	private $domain;
	private $all_data;
	private $data;
	private $folder_list = [];
	private $file_list = [];
	private $response = [];
	function __construct(){
		$this->ip = $_POST['ip'];
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];
		error_reporting(0);
		$this->domain = ftp_connect($this->ip);
		if(ftp_login($this->domain, $this->username, $this->password))
		{

			//set cokies 

			setcookie('_aip_',base64_encode($this->ip),time()+(60*60*24*360));
			setcookie('_aus_',base64_encode($this->username),time()+(60*60*24*360));
			setcookie('_ap_',base64_encode($this->password),time()+(60*60*24*360));

			ftp_pasv($this->domain, true);
			$this->all_data = ftp_nlist($this->domain, ".");
			foreach($this->all_data AS $this->data)
			{
				
				if(ftp_size($this->domain, $this->data) == -1)
				{
					array_push($this->folder_list, $this->data);
				}
				else
				{
					array_push($this->file_list, $this->data);
				}
			}

			array_push($this->response, $this->folder_list);
			array_push($this->response, $this->file_list);
			echo json_encode($this->response);
		}
		else
		{
			echo "Login failed";
		}
		

	}

}


new ftp_login();




?>