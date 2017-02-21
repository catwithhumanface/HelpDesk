<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
	 <div class="load_more">
		<div class="row">

            <div class="col-lg-8 col-lg-offset-2">

                <h1>Add a new blog post</h1>

                <?php if (!empty($this->msgError)): ?>
					<p class="help-block with-errors"><?=$this->msgError?></p>
				<?php endif ?>

				<?php if (!empty($this->msgSuccess)): ?>
					<p class="help-block with-errors"><?=$this->msgSuccess?></p>
				<?php endif ?>


                <form id="contact-form" method="post" action="" role="form">

                    <div class="messages"></div>

                    <div class="controls">
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title * </label>
                                    <input id="title" type="text" name="title" class="form-control" placeholder="Please enter the post's title *" required="required" data-error="The title is required.">
                                    <div class="help-block with-errors"></div>
									<small> Title needs to be a maximum of 50 characters</small>
                                </div>
                            </div>
						</div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="author">Author *</label>
                                    <input id="author" type="text" name="author" class="form-control" placeholder="Please enter your name *" required="required" data-error="Author is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="small_desc">Small description *</label>
                                    <textarea id="small_desc" name="small_desc" class="form-control" placeholder="Write here a small description of your post that'll appear in the Blog page. Make it short and on point. *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content *</label>
                                    <textarea id="content" name="content" class="form-control" placeholder="Content of your post *" rows="4" required="required" data-error="Kindly write your post's content"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="add_submit" class="btn btn-success btn-send" value="Add">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
	 </div>
	</div>
</div>
<!-- content -->

<?php require_once 'shared/footer.php' ?>