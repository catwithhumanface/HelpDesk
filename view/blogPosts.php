<?php require 'shared/header.php' ?>

<!-- If no blog posts are found we ask the user to create his first post -->
<?php if (empty($this->posts)): ?>
    <p class="bold">No blog posts found.</p>
    <p><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold">Add your first blog post here.</button></p>
<?php else: ?>
	
    <?php foreach ($this->posts as $post): ?>
		<!-- We use htmlspecialchars to make sure that the text is indeed, this this method convert certain HTML into their respective symbols. -->
        <h1><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"><?=htmlspecialchars($post->title)?></a></h1>

		<!-- mb_strimwidth : only uses the first 100 letters and then uses dots (more testing needed) -->
        <p><?=nl2br(htmlspecialchars(mb_strimwidth($post->small_desc, 0, 100, '...')))?> <a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>">read more</a></p>
        <p class="left small italic">Posted on <?=$post->date?></p>

        <?php require 'shared/crud_buttons.php' ?>
        <hr class="clear" /><br />
    <?php endforeach ?>

<?php endif ?>

<?php require 'shared/footer.php' ?>