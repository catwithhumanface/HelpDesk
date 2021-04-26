<?php require_once 'shared/header.php' ?>
<?php
if(isset($_SESSION['page'])){
    $page = $_SESSION['page'];
}else{
    $page = 1;
}
if (isset($_SESSION['totalCount']) || isset($_SESSION['tickets_per_page'])) :
    if ($_SESSION['totalCount'] === 0){
        // no posts
    }else{
        $totalCount = $_SESSION['totalCount'];
        $tickets_per_page =$_SESSION['tickets_per_page'];
        $pageCount = (int)ceil($totalCount/$tickets_per_page);
        if($page > $pageCount) {
            // error to user, set page to 1
            $page = 1;
        }
    }
endif;
if(isset($_SESSION['post_username'])){
    $post_username = $_SESSION['post_username'];
}
if(isset($_SESSION['type_user'])){
    $type_user = $_SESSION['type_user'];
}else{
    $type_user = "etudiant";
}
?>
    <div class="details">
        <div class="container">
            <div class="h2_content">
                <h2><?=htmlspecialchars($this->post->title)?></h2>
                <h3>Statut : <?=htmlspecialchars($this->post->status)?></h3>
            </div>
            <div class="det_text">
                <p><?=nl2br(htmlspecialchars($this->post->content))?></p>
            </div>
            <ul class="links">
                <li><i class="date"> </i><span class="icon_text"><?=$this->post->creation_date?></span></li>
                <li><a href="#"><i class="admin"> </i><span class="icon_text"><?=$post_username?></span></a></li>
                <?php if ($this->post->status=="en cours" && $type_user!=="etudiant"):?>
                    <li><a href = "<?=ROOT_URL?>?p=blogController&amp;a=repondre&amp;id=<?=$this->post->id?>" class="link"> Repondre</a ></li>
                <?php endif?>
            </ul>
            <br/><br/>
            <!-- If user is not logged in -->
            <?php if(!empty($_SESSION['active'])) : ?>
                <?php
                $email = $_SESSION['active'];
                $id_user =  $_SESSION['id_user'];
                $username = $_SESSION['username'];

                if($id_user==$this->post->id_user) {?>
                    <a href = "<?=ROOT_URL?>?p=blogController&amp;a=edit&amp;id=<?=$this->post->id?>" class="link" > Edit</a >
                    <form name="delete" action="<?=ROOT_URL?>?p=blogController&amp;a=delete&amp;id=<?=$this->post->id?>" method="post" class="link">
                        <button type="submit" name="delete" value="1" class="bold">
                            Delete
                        </button>
                    </form>
                <?php  } ?>

            <?php elseif (empty($_SESSION['active'])) : ?>
                <p class="addFirstPost">Please <a href="<?=ROOT_URL?>?p=blogController&amp;a=login">login</a> to add/edit/delete.</p>
            <?php endif ?>

        </div>
    </div>

<?php require_once 'shared/footer.php' ?>