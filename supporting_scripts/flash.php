<?php
	
	if(Session::exists('home')) {
		$message =  Session::flash('home');
	}

?>
<?php
	if(isset($message)) {
?>
<div class="container">
	<div class="alert alert-success">
		<p><?php echo $message; ?></p>
	</div>
</div>
<?php
	}
?>