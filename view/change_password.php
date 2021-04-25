<?php require_once 'shared/header.php' ?>

    <!-- content -->
    <div class="content">
        <div class="container">
            <div class="load_more">
                <div class="row">

                    <div class="col-lg-8 col-lg-offset-2">

                        <h1>Changer de mot de passe</h1>

                        <?php if (!empty($this->msgError)): ?>
                            <p class="msg"><?=$this->msgError?></p>
                        <?php endif ?>

                        <?php if (!empty($this->msgSuccess)): ?>
                            <p class="msg"><?=$this->msgSuccess?></p>
                        <?php endif ?>


                        <form method="post" action="" role="form">

                            <div class="messages"></div>

                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="newPassword">Nouveu mot de passe* </label><br/>
                                            <input id="newPassword" type="text" name="newPassword" class="form-control" placeholder="Entrer votre nouveau mot de passe." required="required" data-error="New password is required.">
                                            <div class="help-block with-errors"></div>
                                            <small> Le nouveau mot de passe doit avoir au minimum 10 caractères.</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" name="change_submit" class="btn btn-success btn-send" value="Update password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-muted"><strong>*</strong> Ces champs sont obligatoires.</p>
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
