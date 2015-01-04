<?php
// $tblName1="users";
$tbl1A = "ID";				// int, AUTO_INCREMENT
$tbl1B = "username";		// text
$tbl1C = "userpwd";			// text
$tbl1D = "useremail";		// text
$tbl1E = "sessionID";		// text

// $tblName2="posts";
$tbl2A="postID";			// int, AUTO_INCREMENT
$tbl2B="username";			// text
$tbl2C="content";			// text
$tbl2D="postdate";			// timestamp, CURRENT_TIMESTAMP

// $tblName3="comments";
$tbl3A="commentID";			// int, AUTO_INCREMENT
$tbl3B="postID";			// int
$tbl3C="username";			// text
$tbl3D="comment";			// text
$tbl3E="commentdate";		// timestamp, CURRENT_TIMESTAMP
?>