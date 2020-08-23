<?php


class edit_data{
	private $ip;
	private $username;
	private $password;
	private $domain;
	private $file;
	private $filename;
	private $all_data;
	function __construct()
	{
		$this->filename = $_POST['filename'];
		$this->data = htmlspecialchars_decode($_POST['data']);
		$this->file = fopen("../tmp/".$this->filename, "w");
		if(fwrite($this->file, $this->data))
		{
			$this->ip = base64_decode($_COOKIE['_aip_']);
			$this->username = base64_decode($_COOKIE['_aus_']);
			$this->password = base64_decode($_COOKIE['_ap_']);
			$this->domain = ftp_connect($this->ip);
			if(ftp_login($this->domain, $this->username, $this->password))
			{
				ftp_pasv($this->domain, true);
				$this->file = fopen("../tmp/".$this->filename, "r");
				if(ftp_fput($this->domain, $this->filename, $this->file, FTP_BINARY))
				{
					echo "success";
				}
				else
				{
					echo "failed";
				}
			}
			else
			{
				echo "failed";
			}
		}
		else
		{
			echo "failed";
		}
		
	}
}

new edit_data();

?>