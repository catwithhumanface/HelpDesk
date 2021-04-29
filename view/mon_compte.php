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


					<h1>Mon compte</h1>

					<table class="table">
					  <tbody>
					    <tr>
					      <th scope="row">Nom</th>
					      <td><?php echo $_SESSION['username']?></td>
					    </tr>

					    <tr>
					      <th scope="row">Statut</th>
					      <td>
                              <?php if ($type_user =="admin") {
                                  echo "Personnel administratif";}
                              else{
                                  echo $type_user ;
                              }?>
                          </td>
					    </tr>
							<tr>
					      <th scope="row">Adresse email</th>
					      <td><?php echo $_SESSION['active']?></td>
					    </tr>
					  </tbody>
					</table>

            </div>
        </div>
	 </div>
	</div>

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
						<?php endif ?>
					<?php endforeach ?>
				        <?php elseif ($type_user =="admin"or $type_user =="professeur")   :?>
                            <?php if ($type_user =="admin") :?>
                                <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=analyse" class="link">Analyse</a></li>
                            <?php endif ?>
							    <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=mon_compte_mesreponses&amp;>" class="link">Voir mes Réponses</a></li
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
