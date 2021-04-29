<?php require_once 'shared/header.php' ?>
<?php
$pageCount =1;
if(isset($_SESSION['currentPage'])){
    $page = $_SESSION['currentPage'];
}else{
    $page = 1;
}

if (isset($_SESSION['category'])) :
    $category = $_SESSION['category'];
endif;
if (isset($_SESSION['active'])) :
    $category = $_SESSION['category'];
endif;

 if(!empty($_SESSION['active'])) :
    $email = $_SESSION['active'];
    $id_user =  $_SESSION['id_user'];
    $username = $_SESSION['username'];
    endif;

if(isset($_SESSION['type_user'])){
    $type_user = $_SESSION['type_user'];
}else{
    $type_user = "etudiant";
}



?>
<!-- content -->
<div class="content">

	<div class="container">
	 <div class="load_more">
			<ul id="myList">
				<!-- If no blog posts are found we ask the user to create his first post -->
				<?php if (empty($this->post)): ?>
					<li>
						<div class="l_g">
							<div class="col-md-12 praesent">
								<div class="l_g_r">
									<div class="dapibus">
										<h2>&iexcl;&iexcl; No Reponse found !!</h2>
										<br/>
                                        <?php if(!empty($_SESSION['active'])) : ?>
										    <h2><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold addFirstPost">Add your first blog post here.</button></h2>
                                        <?php elseif(empty($_SESSION['active'])) : ?>
                                            <h2 class="addFirstPost">Please <a href="<?=ROOT_URL?>?p=blogController&amp;a=login">login</a> to add a post.</h2>
                                        <?php endif ?>
                                    </div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
				<?php else: ?>

					<?php foreach ($this->post as $post): ?>
						<li>
                            <div class="l_g">
                                <div class="col-md-12 praesent">
                                    <div class="l_g_r">
                                        <div class="dapibus">
                                            <h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"><?=htmlspecialchars($post->content)?></a></h2>
                                            <h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"><?=htmlspecialchars($post->username)?></a></h2>
                                            <br/>
                                            <h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"><?=htmlspecialchars($post->creation_date)?></a></h2>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
						</li>
					<?php endforeach ?>
				<?php endif ?>
			</ul>
	 </div>
        <ul class ="pagination" style="margin-left:50%;">
        <?php for ($i=1; $i<= $pageCount; $i++) {?>
            <li class="page-item <?= ($page == $i) ? "active" : "" ?>">
                <a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts&amp;cp=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php } ?>
        </ul>
	</div>
</div>
<!-- content -->

<?php require_once 'shared/footer.php' ?>
