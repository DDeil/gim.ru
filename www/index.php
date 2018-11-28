<?php 


$act = isset($_GET['act']) ? $_GET['act'] : 'main';

$mysqli = new mysqli('127.0.0.1','root','') or die('Can/t connect to database');
if(mysqli_connect_errno()){
	echo ("not conect db");
}

$mysqli->select_db('blog')or die('can/t select database');



switch ($act){
	case 'main':
		$records = array();
		$select_from_DB = $mysqli->query('SELECT articles.*, COUNT(coments.id) AS comments
				FROM articles
				LEFT JOIN coments ON articles.id = coments.id_articles
				GROUP BY articles.id');
		while($row = $select_from_DB->fetch_assoc()){
			
			if(strlen($row['Text'])>150){
				$row['Text']=substr(strip_tags($row['Text']),0,147)."...";
			}
			
			$row['Text'] = htmlspecialchars($row['Text'], ENT_QUOTES);
			$row['Title'] = htmlspecialchars($row['Title'], ENT_QUOTES);
			
			$row['Text'] = nl2br($row['Text']);
			$row['date'] = date('Y-m-d H:i:s',$row['date']);
			$records[] = $row;
			
				
		}
		require('core/main.php');
		break;
	case 'view':
		if(!isset($_GET['id'])) die ('Missing parametr');
		$id = intval($_GET['id']);
		$row = $mysqli->query('SELECT * FROM articles WHERE ID = '.$id)->fetch_assoc();
		
		if(!$row)die('Dont find data.');
		$row['Text'] = nl2br($row['Text']);
		$row['date'] = date('Y-m-d H:i:s',$row['date']);
		
		$comment = array();
		$select_from_DB = $mysqli-> query('SELECT * FROM coments WHERE id_articles = '. $id);
		
		while($rowcoment = $select_from_DB->fetch_assoc() ){
			$rowcoment['coment'] = nl2br($rowcoment['coment']);
			$rowcoment['date'] = date('Y-m-d H:i:s', $rowcoment['date']);
		
			$comment[] = $rowcoment;
		}
		
		
		require('core/view.php');
		break;
	case 'coment':
		if(!isset($_GET['id'])) die ('Missing parametr');
		
		$records = array();
		
		$id = intval($_GET['id']);
		$select_from_DB = $mysqli-> query('SELECT * FROM coments WHERE id_articles = '. $id);
		
		while($row = $select_from_DB->fetch_assoc() ){
			$row['coment'] = nl2br($row['coment']);
			$row['date'] = date('Y-m-d H:i:s', $row['date']);
		
			$records[] = $row;
		}

		require ('core/coment.php');
		break;
}
?>