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

				<?php if (!$type_user =="etudiant") :?>
                    <h1>Mes réponses</h1>
                <?php endif ?>
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
											<h2>&iexcl;&iexcl; Vous n'avez pas de réponse créé !!</h2>
											<br/>
	                                    </div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<?php else :?>

							<?php foreach ($this->mesReponses as $po): ?>
                    <div class="l_g">
                        <div class="col-md-12 praesent">
                            <div class="l_g_r">
                                <div class="dapibus">
                                    <p style="color:darkblue; font-size:14pt">
                                        TITRE : <a href="<?=ROOT_URL?>?p=blogController&amp;a=blogPosts&amp;id=<?=$po->id?>"><?=htmlspecialchars($po->title)?></a>
							<br/>
                                        <span style="font-size:11pt;">Statut : <?=$po->statusT?>  | Catégorie : <?=$po->category?> </span></br>
							<span style="color:black; font-size:12pt;" >Ma réponse : <?=$po->content?> </span>
							 </p>
							<a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$po->id?>" class="link">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
