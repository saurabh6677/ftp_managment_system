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
		$this->ip = base64_decode($_COOKIE['_aip_']);
		$this->username = base64_decode($_COOKIE['_aus_']);
		$this->password = base64_decode($_COOKIE['_ap_']);
		$this->filename = $_POST['filename'];
		$this->domain = ftp_connect($this->ip);
		if(ftp_login($this->domain, $this->username, $this->password))
		{
			$this->file = fopen("../tmp/".$this->filename, "w");
			ftp_pasv($this->domain, true);
			if(ftp_fget($this->domain, $this->file, $this->filename, FTP_BINARY))
			{
				$this->all_data = ["<pre>".htmlspecialchars(file_get_contents("../tmp/".$this->filename),ENT_QUOTES)."</pre>",$this->filename];
				echo json_encode($this->all_data);

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