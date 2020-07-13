<?php
	
?>
<html>
<head>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="969555137157-hmrvpkr9ho0th1u2469r41mgi8v67att.apps.googleusercontent.com.apps.googleusercontent.com">
</head>
<body>

	<div class="g-signin2" data-onsuccess="onSignIn"></div>
</body>
<script>
	function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	console.log('Name: ' + profile.getName());
	console.log('Image URL: ' + profile.getImageUrl());
	console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	}
</script>
</html>
