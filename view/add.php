<?php require 'shared/header.php' ?>

<?php if (!empty($this->msgError)): ?>
    <p class="error"><?=$this->msgError?></p>
<?php endif ?>

<?php if (!empty($this->msgSuccess)): ?>
    <p class="success"><?=$this->msgSuccess?></p>
<?php endif ?>

<form action="" method="post">

    <p><label for="title">Title:*</label><br />
        <input type="text" name="title" id="title" required="required" />
		<small>Title needs to be a maximum of 50 characters</small>
	</p>

	
	<p><label for="small_desc">Small description:*</label><br />
        <textarea name="small_desc" id="small_desc" rows="5" cols="35" required="required"></textarea>
    </p>

    <p><label for="content">Content:*</label><br />
        <textarea name="content" id="content" rows="5" cols="35" required="required"></textarea>
    </p>
	
	<p><label for="author">Author:*</label><br />
        <input type="text" name="author" id="author" required="required" />
    </p>

    <p><input type="submit" name="add_submit" value="Add" /></p>
</form>

<?php require 'shared/footer.php' ?>