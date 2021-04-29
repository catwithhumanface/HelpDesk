<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
	 <div class="load_more">
		<div class="row">

            <div class="col-lg-8 col-lg-offset-2">



                <?php if (!empty($this->msgError)): ?>
					<p class="msg"><?=$this->msgError?></p>
				<?php endif ?>

				<?php if (!empty($this->msgSuccess)): ?>
					<b><p class="msg"><?=$this->msgSuccess?></p></b>
				<?php endif ?>

                <?php if (isset($_SESSION['active']))
                    $email = $_SESSION['active'];
                ?>

                <?php if (isset($_SESSION['id_user']))
                    $id_user = $_SESSION['id_user'];
                ?>

                <?php if (isset($_SESSION['username']))
                    $username = $_SESSION['username'];
                ?>
								<?php if (isset($_SESSION['type_user']))
                            $type_user = $_SESSION['type_user'];
                  ?>


				<?php ?>
				<?php if ($type_user =="admin") :?>

																		<li style="margin-left : 100px;">
																			<h1>Mes réponses</h1></li>

							<?php
							elseif ($type_user =="etudiant") :?>
								<h1>Mes tickets</h1>
									<?php
								elseif ($type_user =="professeur") :?>
									<h1>Mes réponses</h1>
						<?php endif ?>

					<table class="table">
					  <thead>

					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">Nom</th>
					      <td><?php echo $_SESSION['username']?></td>
					    </tr>
					    <tr>
					      <th scope="row">Statut</th>
					      <td><?php echo $_SESSION['type_user']?></td>
					    </tr>
							<tr>
					      <th scope="row">Adresse email</th>
					      <td><?php echo $_SESSION['active']?></td>
					    </tr>
					  </tbody>
					</table>

					<?php if ($type_user =="admin") :?>

					                            <li style="margin-left : 100px;">
					                                <button href="<?=ROOT_URL?>?p=blogController&amp;a=analyse">analyse</a>
					                            </li>
					    <?php endif ?>

				<?php  ?>

            </div>

        </div>
	 </div>
	</div>
	<?php
	$pageCount =1;
	if(isset($_SESSION['currentPage'])){
	    $page = $_SESSION['currentPage'];
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
											<h2>&iexcl;&iexcl; No Tickets found !!</h2>
											<br/>
	                                        <?php if(!empty($_SESSION['active'])) : ?>
											    <h2><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold addFirstPost">Add your first blog post here.</button></h2>

	                                        <?php endif ?>
	                                    </div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
					<?php else: ?>
						<?php if ($type_user =="etudiant") :?>
						<?php foreach ($this->post as $post): ?>
							 <?php if ($post->id_user == $id_user): ?>
							<li>
	                            <div class="l_g">
	                                <div class="col-md-12 praesent">
	                                    <div class="l_g_r">
	                                        <div class="dapibus">
	                                            <h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"><?=htmlspecialchars($post->title)?></a></h2>
	                                            <br/>
	                                            <p class="adm">Category : <?=$post->category?> | <?=$post->creation_date?></p>
	                                            <a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>" class="link">Read More</a>
	                                            <!-- If user is not logged in -->

	                                            <?php if ($post->id_user == $id_user): ?>
	                                                <a href="<?=ROOT_URL?>?p=blogController&amp;a=edit&amp;id=<?=$post->id?>" class="link">Edit</a>
	                                                <form name="delete" action="<?=ROOT_URL?>?p=blogController&amp;a=delete&amp;id=<?=$post->id?>" method="post" class="link">
	                                                    <button type="submit" name="delete" value="1" class="bold">
	                                                        Delete
	                                                    </button>
	                                                </form>
																								<?php elseif(empty($_SESSION['active'])) : ?>
																										<p class="addFirstPost">Please <a href="<?=ROOT_URL?>?p=blogController&amp;a=login">login</a> to edit/delete.</p>

	                                            <?php endif ?>

												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
							</li>
						<?php elseif ($type_user =="admin") :?>
							<h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>"></a></h2>
							<br/>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				<?php endif ?>
				</ul>
		 </div>

		</div>
	</div>
	<!-- content -->
</div>
<!-- content -->

<?php require_once 'shared/footer.php' ?>
