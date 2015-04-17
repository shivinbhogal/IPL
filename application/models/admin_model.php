<?php

class Admin_model extends CI_Model {

	public function upload_file($fileName = NULL)
	{
		if($fileName == NULL)
		{
			return array('status' => false, 'error' => 'Filename not specified');
		}

		else if($fileName == 'persons.csv')
		{
			$query = "load data infile '/srv/www/htdocs/uploads/".$fileName."' into table persons fields terminated by ',' (f_name, l_name, nationality, dob, photo_url)";
		}
		else
		{
			$query = "load data infile '/srv/www/htdocs/uploads/".$fileName."' into table venues fields terminated by ',' (name, location, capacity)";
		}

		$query = $this->db->query($query);
	}
}


?>
