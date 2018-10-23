<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<?php ob_start(); ?>
<?php //session_start() ?>
<?php
	/*if(isset($_SESSION['user_role']))
	{
	}
	else
	{
		header("location: ../index.php");
	}*/ 
?>
  <div id="main">
  <?php 

  if(isset($_GET['movie_id']))
  {
		$query = "SELECT * FROM movie_list WHERE movie_id = ".$_GET['movie_id'];
		$select_full_list_query = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($select_full_list_query)
	  ?>		
		<div id="content" align="center">
			<br/>
			<caption><?php echo (string)$row['movie_title']?></caption>
		</div>
		<div id="content" align="center">
			<br/>
			<script type="text/javascript" src="//cdn.jwplayer.com/players/nPripu9l-ALJ3XQCI.js"></script>
		</div>
		<div id="content" align="center">
		<br/>
		<br/>
		<table width="720">
			<tr>
				<td>	
					<div class="rating">			  	
						<p>RATING</p>
					</div>
				</td>
				<td>
				  <div class="rating">
						<div class="stars">
						  <div class="stars-in"></div>
						</div>
					</div>
				</td>
			</tr> 
			<tr>
				<td>				  	
					<div class="rating">
							<p>PLOT</p>
						</div>
				</td>
				<td><?php echo $row['movie_plot'] ?> </td>
			</tr> 
			<tr>
				<td>				  	
					<div class="rating">
							<p>CAST</p>
						</div>
				</td>
				<td><?php echo $row['cast'] ?> </td>
			</tr> 
		</table>
		<br/>
		<br/>
 <?php } 
	else
	{
		//header("location: index.php");
	}
 ?>
 
	</div>
<?php include "includes/footer.php" ?>