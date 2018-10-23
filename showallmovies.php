<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>

  <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>Movie List</h2>
          <br/>
          <br/>
        </div><?php 
		
			if (isset($_GET['pageno'])) 
			{
				$pageno = $_GET['pageno'];
			} 
			else 
			{
				$pageno = 1;
			}
			$no_of_records_per_page = 5;
			$offset = ($pageno-1) * $no_of_records_per_page;
			$total_pages_sql = "SELECT COUNT(*) FROM movie_list";
			$result = mysqli_query($connection, $total_pages_sql);
			$total_rows = mysqli_fetch_array($result)[0];
			$total_pages = ceil($total_rows / $no_of_records_per_page);
			
			$query = "SELECT * FROM movie_list LIMIT $offset, $no_of_records_per_page";
			$select_new_upload_query = mysqli_query($connection, $query);
			$index = 0;
			?>
			<table width="750" border="1">
			<?php
			while($row = mysqli_fetch_assoc($select_new_upload_query))
			{?> 
				<tr class="separator">
					<td>
					  <div class='movie'>
					  <div class="movie-image"> <a href="moviestream.php?movie_id=<?php echo (string)$row['movie_id']?>"><span class="play"><span class="name"><?php echo (string)$row['movie_title'] ?></span></span> <img src="css/images/movie<?php echo (string)$row['movie_id']?>.jpg" alt="" /></a> </div>
					  <div class="rating">
						<p>RATING</p>
						<div class="stars">
						  <div class="stars-in"></div>
						</div>
						<span class="comments">0</span> </div>
					  </div>
					  <br/>
					 </td>
					 <td>
					  <strong>PLOT:</strong>
					  <p><?php echo $row['movie_plot'] ?> </p>
					  <br/>
					  <strong>CAST:</strong>
					  <p><?php echo $row['cast'] ?> </p>
					 </td>
				</tr>
		<?php 
			$index++;
			} 
			?>
			</table>
			<div align="center">
				<ul class="pagination">
					<li><a href="?pageno=1">First</a></li>
					<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
						<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
					</li>
					<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
						<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
					</li>
					<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
				</ul>
			</div>
        <div class="cl">&nbsp;</div>
      </div>
      </div>
 
    </div>
<?php include "includes/footer.php" ?>