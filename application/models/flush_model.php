<?php


class Flush_model extends CI_Model {


	public function flush()
	{
		try {
			$this->db->empty_table("player_batting_stats");
			$this->db->empty_table("player_bowling_stats");
			$this->db->empty_table("player_fielding_stats");
			$this->db->empty_table("player_50s");
			$this->db->empty_table("player_100s");
			$this->db->empty_table("sixes");
			$this->db->empty_table("team_stats");
			$this->db->empty_table("player_roles");
			$this->db->empty_table("sponsors");
			$this->db->empty_table("auctions");
			$this->db->empty_table("matches");
			$this->db->empty_table("fixtures");
			$this->db->empty_table("venues");
			$this->db->empty_table("umpires");
			$this->db->empty_table("teams");
			$this->db->empty_table("players");
			$this->db->empty_table("coaches");
			$this->db->empty_table("owners");
			$this->db->empty_table("venues");
			$this->db->empty_table("wicketkeepers");
			$this->db->empty_table("persons");
		} catch (Exception $e) {
			echo $this->db->_error_message();
			echo "<br>";
			echo $e->getMessage();
		}
	}
}
?>