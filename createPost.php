<?php
require_once 'header.php';

if(isset($_POST['submit'])) {

	$title = $_POST['title'];
	$contents = $_POST['contents'];
	$isPublic = ($_POST['private'] != "private") ? "yes" : "no";
	$entryDate = $_POST['entryDate'];

	if($title == "" || $entryDate == "" || $contents == "") {
		$error .= "<p class='error-msg'>Àll fields are required!</p>";
	}

	if($error != ""){
		showForm($error);
		exit;
	}


	if(createPost($_SESSION['id'], $entryDate, $title, $contents, $isPublic)){
		showForm("Post created succesfully.");
	} else {
		showForm("<p class='error-msg'>Failed to create post...</p>");
	}
} else {
	showForm("");
}

function showForm($message){
?>
	<h2>Create Journal Entry</h2>
	<?php echo $message; ?>
	<form action='' method='post'>
     	<input type='text' name='entryDate' placeholder='yyyy/mm/dd'> What date would you like to associate with the post?<br>
     	<input type='text' name='title' placeholder='Title of the post'><br>
     	<input type='textarea' name='contents' placeholder='The contents of your post'><br>
     	<input type='checkbox' name='private' value='private'> Post privately <br>
     	<input type='submit' name='submit' value='Post Story'> <br>
	</form>
<?php
}

require_once 'footer.php';
?>