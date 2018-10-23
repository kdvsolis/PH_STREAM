<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

  <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>NEW UPLOADS</h2>
          <br/>
          <br/>
        </div><?php 
			$query = "SELECT * FROM movie_list ORDER BY `movie_list`.`upload_date` ASC LIMIT 6 ";
			$select_new_upload_query = mysqli_query($connection, $query);
			$index = 0;
			while($row = mysqli_fetch_assoc($select_new_upload_query))
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
				  <div class="movie-image" > <a href="moviestream.php?movie_id=<?php echo (string)$row['movie_id']?>"><span class="play"><span class="name"><?php echo (string)$row['movie_title'] ?></span></span> <img src="css/images/movie<?php echo (string)$row['movie_id']?>.jpg" alt="" /></a> </div>
				  <div class="rating">
					<p>RATING</p>
					<div class="stars">
					  <div class="stars-in"></div>
					</div></div>
				</div>
		<?php 
			$index++;
			} 
			?>
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>MOVIE LIST</h2>
          <p class="text-right"><a href="showallmovies.php">See all</a></p>
          <br/>
        </div><?php 
			$query = "SELECT * FROM movie_list ORDER BY `movie_list`.`movie_title` ASC LIMIT 6 ";
			$select_full_list_query = mysqli_query($connection, $query);
			$index = 0;
			while($row = mysqli_fetch_assoc($select_full_list_query))
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
				  <div class="movie-image"> <a href="moviestream.php?movie_id=<?php echo (string)$row['movie_id']?>"> <span class="play"><span class="name"><?php echo (string)$row['movie_title'] ?></span></span> <img src="css/images/movie<?php echo (string)$row['movie_id']?>.jpg" alt="" /></a> </div>
				  <div class="rating">
					<p>RATING</p>
					<div class="stars">
					  <div class="stars-in"></div>
					</div>
					<span class="comments"> </span> </div>
				</div>
		<?php 
			$index++;
			} 
			?>
        <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>LIVESTREAM CHANNELS</h2>
          <p class="text-right"><a href="showallchannels.php">See all</a></p>
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