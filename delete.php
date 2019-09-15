<?php 

function search($id,$array){
	foreach ($array as $key => $value) {
		if($array[$key]->id===$id){
			return $key;
		}
	}
	return -1;
}
	
$id = isset($_GET['id'])?$_GET['id']:false;



if($id){
	$data = file_get_contents('users.json');
	$data_array = json_decode($data);

	$index = search($id,$data_array);
	if($index!==-1){
		unset($data_array[$index]);
	}

	$data_array = json_encode($data_array,JSON_PRETTY_PRINT);
	file_put_contents('users.json', $data_array);
}

header('Location:index.php');
