<?php require 'shared/header.php' ?>

<?php if (empty($this->post)): ?>
    <p class="error">No blog post found.</p>
<?php else: ?>

    <article>
        <time datetime="<?=$this->post->date?>" pubdate="pubdate"></time>

        <h1>Title : <?=htmlspecialchars($this->post->title)?></h1>
		
		<p>Small description : <?=nl2br(htmlspecialchars($this->post->small_desc))?></p>
        <p>Content : <br/> <?=nl2br(htmlspecialchars($this->post->content))?></p>
		
        <p class="left small italic">Posted on <?=$this->post->date?> by <?=$this->post->author?></p>

        <?php
            $post = $this->post;
            require 'shared/crud_buttons.php'
        ?>
    </article>

<?php endif ?>

<?php require 'shared/footer.php' ?>