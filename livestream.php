<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

  <div id="main">
  <?php 

  if(isset($_GET['channel_id']))
  {
		$query = "SELECT * FROM livestream_list WHERE channel_id = ".$_GET['channel_id'];
		$select_full_list_query = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($select_full_list_query)
	  ?>		
		<div id="content" align="center">
			<br/>
			<caption><?php echo (string)$row['channel_name']?></caption>
		</div>
		<div id="content" align="center">
			<br/>
			<script type="text/javascript" src="//cdn.jwplayer.com/players/nPripu9l-ALJ3XQCI.js"></script>
		</div>
		<div id="content" align="center">
		<br/>
		<br/>
 <?php } 
	else
	{
		header("location: index.php");
	}
 ?>
<?php include "includes/footer.php" ?>