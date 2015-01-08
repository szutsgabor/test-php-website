<?php
			$sqlPostsResult = mysql_query("SELECT * FROM posts order by postID desc");
			while($postsData = mysql_fetch_assoc($sqlPostsResult))
			{
				$sqlCommentsResult = mysql_query("SELECT * FROM comments WHERE postID='$postsData[postID]'");
				$commentsNum = mysql_num_rows($sqlCommentsResult);	
			?>
		  <div id="postBox">
  					<div class="PostBoxTitles"> 
						<?php echo $postsData['postdate']; ?> 
        			</div>
  					<div class="PostBoxTitles"> 
						<?php echo $postsData['username']; ?> 
        			</div>
  					<div class="PostBoxTitles"> 
        				<a href="comments.php?postID=<?php echo"$postsData[postID]"; ?>"><?php echo"$commentsNum hozzászólás"; ?></a>
        			</div>
  					<div class="lineDecorationBlack" style="left: 174px; top: 476px;"> 
        			</div>
  					<div id="postBoxContent">
    					<p>
             				<?php echo $postsData['content']; ?>
           				</p>
  					</div>
				</div>
<?php
			}
?>