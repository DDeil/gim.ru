<?php require('header.php')?>
<link href="main.css" rel="stylesheet">

	<h2><?=$row['Title']?></h2>
	
	<div class='well'>
		<p class="text"><?=$row['Text']?></p>
	</div>		
		
	<div class='articleinfo'>
		<span class="date"><?=$row['date']?></span>
		<span class="author"><?=$row['author']?></span>
	</div>
	
	<div>
	
		<h4>Comments:</h4>
		
		<?php foreach ($comment as $cometrow):?>
		
		<div class='coment_head'>
			<span class='authorcom'><?=$cometrow['author']?></span>
		 	<span class='datecom'><?=$cometrow['date']?></span>
		</div>
		
		<div class="well well-small">
			 <span class='coment_text'><?=$cometrow['coment']?></span>
		</div>		 
		
		<?php 	endforeach;?>
	</div>
<?php require('footer.php')?>