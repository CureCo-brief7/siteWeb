<?php
$noNavbarAdmin = '';
include_once APPROOT . '/views/inc/header.inc.php';
?>

<section id="contact">
	<div class="sectionheader">	<h1>CONTACT</h1></div>
	<article>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni laudantium qui delectus ullam aliquid dolorem tempore maxime neque illum, recusandae sunt modi magnam ipsum nihil reprehenderit perferendis omnis.</p>
		
			<label for="checkcontact" class="contactbutton"><div class="mail"></div></label><input id="checkcontact" type="checkbox">
	
			<form action="" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="contact_nom" value=""  id ="contact_nom"><label for="contact_nom">NAME</label></p>
				<p class="input_wrapper"><input type="text" name="contact_email" value=""  id ="contact_email"><label for="contact_email">EMAIL</label></p>
				<p class="input_wrapper"><input type="text" name="contact_sujet" value=""  id ="contact_sujet"><label for="contact_sujet">SUBJECT</label></p>
				<p class="textarea_wrapper"><textarea name="contact_message" id="contact_message"></textarea></p>
				<p class="submit_wrapper"><input type="submit" value="ENVOYER"></p>			
			</form>
	</article>
</section>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>