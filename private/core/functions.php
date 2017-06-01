<?php
	session_start();
	require_once 'config.php';
	$link = openConnection();

	function openConnection(){
		$link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if (!$link) {
			die('Sorry there was an error :'.mysqli_error($link));
		}
		return $link;
	}

	// function clean($input){
 //       $string = htmlentities($input,ENT_NOQUOTES,'UTF-8');
 //       $string = str_replace('&euro;',chr(128),$string);
 //       $string = html_entity_decode($string,ENT_NOQUOTES,'ISO-8859-15');
 //       return $string;
 //    }

	function formatDate($date){
        $format = date('l jS F, Y', $date);
        return $format;
    }

	function findAll($table){
		global $link;
		$data = array();

		$query = "SELECT * FROM {$table}  LIMIT 30";
		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		} else {
			$data[] = array('message'=>'Sorry, there are no records in the {$table} table');
		}
		return $data;
	}

	function findById($table, $id){
		global $link;
		$data = array();

		$query = "SELECT * FROM {$table} WHERE id = $id";
		$result = mysqli_query($link, $query);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)){
				$data = $row;
			}
		} else {
			$data[] = array('message'=>'Sorry, there are no records in the {$table} table');
		}
		return $data;
	}

	function countAll($table){
		global $link;
		$query = "SELECT * FROM $table";
		$result = mysqli_query($link, $query);
		$arr = array();
		while($rows = mysqli_fetch_assoc($result)){
			$arr[] = $rows;
		}
		return count($arr);
	}

	function clean($value){
		global $link;
		return mysqli_real_escape_string($link,$value);
	}

	function delete($table,$id){
		global $link;
		$query = "DELETE FROM $table WHERE id = $id LIMIT 1";
		$result = mysqli_query($link, $query);

		if (mysqli_affected_rows($link) == 1) {
			return true;
		}else{
			die('Error :'.mysqli_error($link));
		}
	}

	function upload($file){

	}


?>