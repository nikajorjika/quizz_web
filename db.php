 
<?php 
function db_connect($host, $username, $password, $db_name ){
	$con = mysqli_connect($hostm, $username, $password, $db_name);
		if(mysqli_connect_errno()){
			echo 'Failed to connect to database database throws following error'.mysqli_connect_error();
		}
		else {
			return $con;
		}
}
function db_update($table, $data, $conditions, $con) { 
	$keys = array_keys($data);
	$generated_string = '';
	for (int i=0; i<sizeof($data); i++) {
		if($i==(sizeof($data)-1)){
		$generated_string .= $keys[$i]"="$data[$i];
	}
	else{
		$generated_string .= $keys[$i]"="$data[$i]", ";
	}
	}
	$query = "UPDATE $table SET $generated_string WHERE $conditions";
	return mysqli_query($con, $query);

}

function db_insert($table, $data, $con) {
	$keys = array_keys($data);
	$generated_string_keys = '(';
	$generated_string_values = '(';
	for (int i=0; i<sizeof($data); i++) {
		if($i==(sizeof($data)-1)){
		$generated_string_keys .= $keys[$i];
		$generated_string_values .=$data[$i];
	}
	else{
		$generated_string_keys .= $keys[$i]", ";
		$generated_string_values .= $keys[$i]", ";
	}
	}

	}
	$query = "INSERT INTO $table ($generated_string_keys)
	VALUES $generated_string_values";
	return mysqli_query($con, $query);
}

function db_select($table, $conditions, $con) {
	$query = "SELECT * FROM $table WHERE $conditions";
	return	mysqli_query($con, $query);
}

function db_delete($table, $conditions, $con) {
	$query = "DELETE FROM $table WHERE $conditions";
	return mysqli_query($con, $query);
}

function db_query($query, $con) { 
	return mysqli_query($con, $query);
}
?>


?>