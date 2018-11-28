<?php require('header.php')?>
<link href="main.css" rel="stylesheet">

<?php foreach($records as $row):?>
 
 <p class="text"><?=$row['coment']?></p>

<?php endforeach;

 require('footer.php')?>