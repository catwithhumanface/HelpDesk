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


																			<li><h1>Mes réponses</h1></li>

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

					                           
					                                <li><a href="<?=ROOT_URL?>?p=blogController&amp;a=analyse">analyse</a>
					                            </li>
					    <?php endif ?>

				<?php  ?>

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
					<?php if (empty($this->mesReponses)): ?>
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
						<?php else :?>

							<?php foreach ($this->mesReponses as $po): ?>
							<h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts&amp;id=<?=$po->id?>"><?=htmlspecialchars($po->title)?></a></h2>
							<br/>
							<p class="adm">Statut : <?=$po->statusT?> </p>
							<p class="adm">Catégorie : <?=$po->category?> </p>
							<p class="adm">Ma réponse: <?=$po->content?> </p>
							<a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts&amp;id=<?=$po->id?>" class="link">Voir plus</a>

						<?php endforeach ?>
					<?php endif ?>

				</ul>
		 </div>

		</div>
	</div>
	<!-- content -->
</div>
<!-- content -->

<?php require_once 'shared/footer.php' ?>
