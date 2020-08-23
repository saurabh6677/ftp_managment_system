<?php

class upload{
	private $ip;
	private $username;
	private $password;
	private $domain;
	private $file;
	private $filename;
	private $filereader;
	function __construct()
	{
		$this->ip = base64_decode($_COOKIE['_aip_']);
		$this->username = base64_decode($_COOKIE['_aus_']);
		$this->password = base64_decode($_COOKIE['_ap_']);
		$this->domain = ftp_connect($this->ip);
		if(ftp_login($this->domain, $this->username, $this->password))
		{
			ftp_pasv($this->domain, true);
			$this->file = $_FILES['data'];
			$this->filename = $this->file['name'];
			$this->location = $this->file['tmp_name'];
			$this->filereader = fopen($this->location, 'r');
			if(ftp_fput($this->domain, $this->filename, $this->filereader,FTP_BINARY))
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
}

new upload();
?>