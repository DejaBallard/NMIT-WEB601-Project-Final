<?php

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top nav-text">
	<a class="navbar-brand" href="?cmd=home">
	<img src="Images/FoldedLogo2.png">
	</a>
	<button aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarTogglerDemo02" data-toggle="collapse" type="button">
	<span class="navbar-toggler-icon"></span></button>
	<div id="navbarTogglerDemo02" class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item"><a class="nav-link" href="?cmd=guides">Guides</a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link " id="nav-space"> | </a></li>
            <li class="nav-item"><a class="nav-link" href="?cmd=comp">Competitions</a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" id="nav-space"> | </a></li>
			<li class="nav-item"><a class="nav-link" href="?cmd=images">Images</a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" id="nav-space"> | </a></li>
			<li class="nav-item"><a class="nav-link" href="?cmd=upload">Upload</a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" id="nav-space"> | </a></li>
            <!-- If User is logged in --!>
            <?php if(isset($_SESSION['LoggedIn'])&& $_SESSION['LoggedIn'] == true): ?>
            <li class="nav-item"><a class="nav-link" href="?cmd=profile">Profile</a>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="?cmd=login">Log In</a>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" id="nav-space"> | </a></li>
            <li class="nav-item"><a class="nav-link" id="nav-signup" href="?cmd=signup">Sign Up</a>
            <?php endif; ?>
<!-- Replace items when logged in: https://stackoverflow.com/questions/31799843/how-to-replace-login-with-logout-when-a-user-is-logged-in/31799936 -->
		</ul>
	</div>
</nav>
<br>
<br>
<br>
<br>
<br>

             