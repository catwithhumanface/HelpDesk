<?php require_once 'shared/header.php' ?>

    <!-- content -->
    <div class="content">
        <div class="container">
            <div class="load_more">
                <div class="row">

                    <div class="col-lg-8 col-lg-offset-2">

                        <h1>Mon compte</h1>

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


                        <?php if ($type_user =="admin") :?>

                            <li style="margin-left : 100px;">
                                <a href="<?=ROOT_URL?>?p=blogController&amp;a=analyse">analyse</a>
                            </li>
    <?php endif ?>

                        <table class="table">
                            <thead>

                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Nom</th>
                                <td><?php echo $username?></td>
                            </tr>
                            <tr>
                                <th scope="row">Type utilisateur</th>
                                <td><?php echo  $_SESSION['type_user']?></td>
                            </tr>
                            <tr>
                                <th scope="row">Adresse email</th>
                                <td><?php echo $_SESSION['active']?></td>
                            </tr>
                            </tbody>
                        </table>



                        <?php  ?>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- content -->

<?php require_once 'shared/footer.php' ?>