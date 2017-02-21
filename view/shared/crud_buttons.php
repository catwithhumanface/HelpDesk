<button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=edit&amp;id=<?=$post->id?>'" class="bold">
	Edit
</button> |
<form action="<?=ROOT_URL?>?p=blogController&amp;a=delete&amp;id=<?=$post->id?>" method="post" class="inline">
	<button type="submit" name="delete" value="1" class="bold">
		Delete
	</button>
</form> |
<button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold">
	Add New Post
</button>