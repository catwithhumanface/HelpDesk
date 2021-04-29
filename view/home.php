<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
	 <div class="load_more">	
				<h3></h3>
				 
				<div class="biography">
					<div class="biographys">
						<div class="col-md-4 biography-info">
							<img src="content/images/logoUt1.png" class="img-responsive" alt=""/>
						</div>
						<div class="col-md-8 biography-into" style="padding-top:50px;">
							<h4>Help Desk</h4>
							<p style="font-size:13pt;">L’Université Toulouse 1 souhaite mettre en place un logiciel de gestion des services<br/> d’assistance
                                pour les étudiants dans le but d’améliorer la communication entre les <br/>étudiants, le corps enseignant et l’administration de l'université.
                                Ce site représente<br/> un <strong>produit Minimum Viable</strong> de l’application intranet. <br/>
                                <br/>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				
				<div class="contact-down">
					<div class="contact-right">
						<div class="col-md-6 contact-left">
							<h5>CONTACT</h5>
								<p>Si vous avez le moindre question concernant le projet, n'hésitez pas à nous contacter en remplissant le formulaire qui se trouve à droite.</p>
							 	<address>
									<strong>Dallac Program<br/>
									2 Rue du Doyen Gabriel Marty<br/> 31000 Toulouse<br/>
									</strong><br/><br/>
									Telephone: +33 06 51 38 85 60<br/>
									E-mail: joohyun.ann@ut-capitole.fr<br>
								</address>
						</div>
						<div class="col-md-6 contact-info">
							<form action="content/contact_me.php" method="post" name="contact_form">
								<div class="form-group">
								  <label class="col-md-12 control-label" for="text">Nom</label>
								  <div class="col-md-12">
									<input id="name" name="name" type="text" placeholder="Veuillez entrer votre nom." class="form-control input-md" required="">
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-12 control-label" for="email">Email</label>  
								  <div class="col-md-12">
								  <input id="email" name="email" type="email" placeholder="Veuillez enter votre adresse mail." class="form-control input-md" required="">
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-12 control-label" for="message">Message</label>  
								  <div class="col-md-12">
								  <textarea id="message" name="message" placeholder="Veuillez mettre votre message." class="form-control input-md" required=""></textarea>
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-12 control-label" for="singlebutton"></label>
								  <div class="col-md-12">
									<button id="singlebutton" name="singlebutton" class="btn btn-default" type="submit">Send</button>
								  </div>
								</div>	
								<div class="clearfix"> </div>
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
			</div>
			
	 </div>
	</div>
</div>
<!-- content -->	

<?php require_once 'shared/footer.php' ?>