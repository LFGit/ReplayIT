<?php
if(isset($_REQUEST['id'])){

	require_once("Php_scripts/Connection.php");

	if(connect_to_db()){

	$id = mysql_real_escape_string($_REQUEST['id']);
	$result = mysql_query("SELECT content,filename,filesize,filetype FROM uploads WHERE id='".$id."'") or die(mysql_error());

	if(!result){

		echo "invalid download link";

	}else{

		ob_clean();
	  	ob_end_clean();
		$res = mysql_fetch_assoc($result);
		$bytes = $res['content'];
		$file_name = $res['filename'];
		$file_name = str_replace(" ", "_", $file_name);

		header('Content-Type: '.$res['filetype'].'');
	  	header('Content-length: '.$res['filesize'].'');
	  	header('Content-disposition: attachment; filename='.$file_name.'');

	  	print $bytes;

	}

}

}
else{

	echo "Invalid download link";
}


?>