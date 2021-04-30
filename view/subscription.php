<?php require_once 'shared/header.php' ?>

    <!-- content -->
    <div class="content">
        <div class="container">
            <div class="load_more">
                <div class="row">

                    <div class="col-lg-8 col-lg-offset-2">

                        <h1>S'inscrire</h1>

                        <?php if (!empty($this->msgError)): ?>
                            <p class="msg"><?=$this->msgError?></p>
                        <?php endif ?>

                        <?php if (!empty($this->msgSuccess)): ?>
                            <b><p class="msg"><?=$this->msgSuccess?></p></b>
                        <?php endif ?>


                            <form method="post" action="" role="form">

                                <div class="messages"></div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="statut">  Statut* </label><br/>
                                                <select name="typeuser" id="typeuser" class="form-control">
                                                    <option value="etudiant" >Etudiant</option>
                                                    <option value="professeur">Professeur</option>
                                                    <option value="admin">Personnel Administratif</option>
                                                </select>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email* </label><br/>
                                                <small> </small>
                                                <input id="email" type="text" name="email" class="form-control" placeholder="Veuillez entrer votre email" required="required" data-error="L'email est obligatoire">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Nom * </label><br/>
                                                <small></small>
                                                <input id="username" type="text" name="username" class="form-control"placeholder="Veuillez entrer votre nom" required="required" data-error="Username is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Mot de passe *</label><br/>
                                                <input id="password" type="password" name="password" class="form-control" placeholder="Choississez un mot de passe." required="required" data-error="Author is required.">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <input type="submit" name="add_submit" class="btn btn-success btn-send" value="S'incrire">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted"><strong>*</strong>Ces champs sont obligatoires</p>
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
