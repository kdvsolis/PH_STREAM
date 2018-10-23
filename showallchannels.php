<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

  <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>LIVESTREAM CHANNELS</h2>
          <br/>
          <br/>
        </div>
<?php 
			$query = "SELECT * FROM livestream_list LIMIT 5";
			$select_channel_query = mysqli_query($connection, $query);
			$index = 0;
			while($row = mysqli_fetch_assoc($select_channel_query))
			{?> 
				<?php 
				if ($index == 5)
				{ 
				  echo "<div class='movie last'>";
				} 
				else
				{ 
				  echo "<div class='movie' style='margin-right:12px;'>";
				} ?>
				  <div class="movie-image"><a href="livestream.php?channel_id=<?php echo (string)$row['channel_id']?>"><span class="play playlive"><span class="name"><?php echo (string)$row['channel_name'] ?></span></span><img src="css/images/live<?php echo $row['channel_id'] ?>.jpg" style="width:152px;height:214px;" alt="" /></a> </div>
				</div>
		<?php 
			$index++;
			} 
			?>
        <div class="cl">&nbsp;</div>
      </div>
    </div>
<?php include "includes/footer.php" ?>