</div>
<div id="rightpanel">
<div style="clear:both"></div>

<?php if (!empty($_SESSION['userid'])):?>
	<div class="userlogin">
		<div style="float:left"><img src="http://www.gravatar.com/avatar/<?php echo md5(trim(strtolower($_SESSION['name'])));?>?d=monsterid&s=70" style="border:1px solid #ccc"></div><div style="float:left;padding-left:10px;"><h3 style="padding-left:0px"><?php echo $_SESSION['name'];?> | <?php echo $_SESSION['points'];?></h3>
		<a href="<?php echo basePath();?>/users/edit">Edit Profile</a><br/>
		<a href="<?php echo basePath();?>/users/logout">Logout</a></div>
		<div style="clear:both"></div>
	</div>
<?php else:?>
	<?php if (empty($loginpage)):?>
	<div class="userlogin">
		<form action="<?php echo generateLink("users","validate");?>" method="post">
		<h3>Username</h3>
		<input type="textbox" class="textbox" name="name" style="width:215px;"/>
		<h3>Password</h3>
		<input type="password" class="textbox" name="password" style="width:215px;"/>
		<input type="hidden" name="returnurl" value="<?php echo getLink();?>">
		<div style="padding-top:10px"><input type="submit" value="Login" class="button"> or <a class="button" href="<?php echo basePath();?>/users/register">Register</a>
		</form>
	</div>
	<?php endif;?>
<?php endif;?>
</div>
<div style="clear:both"></div>
</div>
<div style="clear:both">&nbsp;</div>
<div class="footer">
</div>
</body>
</html>
