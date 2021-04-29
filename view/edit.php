<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
	 <div class="load_more">
		<div class="row">

            <div class="col-lg-8 col-lg-offset-2">

                <h1>Modifier mon ticket</h1>

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

				<?php if (empty($this->post)): ?>
					<p class="msg">This post has no data... Which is kinda impossible. Stop trying to break the website please >.<  </p>
				<?php else: ?>


                <form  method="post" action="" role="form">

                    <div class="messages"></div>

                    <div class="controls">
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title * </label>
                                    <input id="title" type="text" name="title" class="form-control" value='<?=$this->post->title?>' required="required" data-error="Le titre est demandé">
                                    <div class="help-block with-errors"></div>
									<small> Titre ne doit pas contenir plus de 50 charactères.</small>
                                </div>
                            </div>
						</div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category">Categorie *</label>
                                    <?php if ($this->post->category =="Administratif") : ?>
                                        <select name="category" id="category">
                                            <option value="Administratif" selected>Administratif</option>
                                            <option value="Pédagogique">Pédagogique</option>
                                            <option value="Etc">Etc</option>
                                        </select>
                                    <?php elseif ($this->post->category =="Pédagogique"): ?>
                                        <select name="category" id="category">
                                            <option value="Administratif" >Administratif</option>
                                            <option value="Pédagogique" selected>Pédagogique</option>
                                            <option value="Etc">Etc</option>
                                        </select>
                                    <?php elseif ($this->post->category =="Etc"): ?>
                                        <select name="category" id="category">
                                            <option value="Administratif" >Administratif</option>
                                            <option value="Pédagogique" >Pédagogique</option>
                                            <option value="Etc" selected>Etc</option>
                                        </select>
                                    <?php else : ?>
                                        <select name="category" id="category">
                                            <option value="Administratif" >Administratif</option>
                                            <option value="Pédagogique" >Pédagogique</option>
                                            <option value="Etc">Etc</option>
                                        </select>
                                    <?php endif ?>

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input id="id_user" type="hidden" name="id_user" class="form-control" placeholder="<?php echo $id_user ; ?>">
                                    <input id="username" type="text" name="$username" class="form-control" placeholder="<?php echo $username ; ?>" readonly>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Contenu *</label>
                                    <textarea id="content" name="content" class="form-control" rows="4" required="required" data-error="Kindly write your post's content"><?=$this->post->content?></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="edit_submit" class="btn btn-success btn-send" value="Update">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> Les champs sont obligatoires.</p>
                            </div>
                        </div>
                    </div>

                </form>
						
				<?php endif ?>

            </div>

        </div>
	 </div>
	</div>
</div>
<!-- content -->	

<?php require_once 'shared/footer.php' ?>