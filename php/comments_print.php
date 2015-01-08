<?php
			$sqlCommentsResult = mysql_query("SELECT * FROM comments WHERE postID = '$postID' order by commentID desc");
			while($commentsData = mysql_fetch_assoc($sqlCommentsResult))
			{	
			?>
		  <div id="postBox">
  					<div class="PostBoxTitles"> 
						<?php echo $commentsData['commentdate']; ?> 
        			</div>
  					<div class="PostBoxTitles"> 
						<?php echo $commentsData['username']; ?> 
        			</div>
  					<div class="lineDecorationBlack" style="left: 174px; top: 476px;"> 
        			</div>
  					<div id="postBoxContent">
    					<p>
             				<?php echo $commentsData['comment']; ?>
           				</p>
  					</div>
				</div>
<?php
			}
?>