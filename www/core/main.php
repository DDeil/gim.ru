<?php require('header.php');?>

<link href="main.css" rel="stylesheet">

<?php foreach($records as $row):?>
	<h4><a href='?act=view&id=<?=$row['ID']?>'><?=$row['Title']?></a></h4>
	<div class="privtext">
		
		<div class='well'>
			
			<p class="text"><?=$row['Text']?></p>
		
			<div class='articleinfo'>
				<span class="date"><?=$row['date']?></span>
				<span class="author"> | </span>
				<span class="author"><?=$row['author']?></span>
				<span class="author"> | </span>
				<a href='?act=coment&id=<?=$row['ID']?>'>Coments <?=$row['comments']?></a>
			</div>
		</div>
	</div>
<?php endforeach;

 require('footer.php')?>