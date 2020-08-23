<?php


class download_data{
	private $ip;
	private $username;
	private $password;
	private $domain;
	private $file;
	private $filename;
	function __construct()
	{
		$this->ip = base64_decode($_COOKIE['_aip_']);
		$this->username = base64_decode($_COOKIE['_aus_']);
		$this->password = base64_decode($_COOKIE['_ap_']);
		$this->filename = $_POST['filename'];
		$this->domain = ftp_connect($this->ip);
		if(ftp_login($this->domain, $this->username, $this->password))
		{
			$this->file = fopen("../downloads/".$this->filename, "w");
			ftp_pasv($this->domain, true);
			if(ftp_fget($this->domain, $this->file, $this->filename, FTP_BINARY))
			{
				echo "success";
			}
			else
			{
				echo "download faild";
			}
		}
		else
		{
			echo "connection faild please try again later";
		}
	}
}

new download_data();

?>