<?
function tb2arr($tb, $arg){
	if (isset($arg)) { $arg = ' WHERE ' . $arg;}
	$query = sprintf("SELECT * FROM %s %s", $tb, $arg);
	//echo $query;
	$result = mysql_query($query);
	while($array = mysql_fetch_array($result)){
		$output[$array[0]] = $array;
	}
	return $output;
}

//------------------------------------------------------------------------------>
function tb_get_row($tb, $arg){
	if (isset($arg)) { $arg = ' WHERE ' . $arg;}
	$query = sprintf("SELECT * FROM %s %s", $tb, $arg);
	//echo $query;
	$result = mysql_query($query);
	if (!$result) {
		echo 'Could not run query: ' . mysql_error();
		exit;
	}
	$array = mysql_fetch_array($result);
	return $array;
}

//------------------------------------------------------------------------------>
function get_tb_names($table){
$fields = mysql_list_fields($db_name, $table);
$columns = mysql_num_fields($fields);
for ($i=0; $i++; i<=$columns){
	$array[] = mysql_field_name($fields, $i);
}
return $array;
}

//------------------------------------------------------------------------------>
function arr2li($data, $depth = 0){
	if (!is_array($data)) { echo "Что-то не так с входным массивом... \n"; return; }
	
	if(!is_array(current($data))) { //  конечный 
		echo str_repeat("\t", $depth), "<ul> \n";
		foreach($data as $key => $value) {
			echo str_repeat("\t", $depth), "<li>$key - $value</li> \n";
		}
		echo str_repeat("\t", $depth), "</ul> \n";
	}
	if(is_array(current($data))) {  //  промежуточный
		echo str_repeat("\t", $depth), "<ul>\n";
		foreach($data as $key => $value) {
			echo str_repeat("\t", $depth), "<li> $key\n";
			arr2li($value, $depth+1);
			echo str_repeat("\t", $depth), "</li> \n";
		}
		echo str_repeat("\t", $depth), "</ul>\n";
		
	}
}
?>