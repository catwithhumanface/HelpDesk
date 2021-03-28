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
						<div class="col-md-8 biography-into">
							<h4>Help Desk</h4>
							<p>I love writing code and I am really passionate about it. <br/> 
								 This blog was created by Islam Elshobokshy using the MVC architecture of the OOP PHP and Bootstrap for a nice and clean code all the way to the front-end. <br/> 
								 As for the theme, I used the elegant theme MINIMA. <br/> 
								 The code of the website is on GitHub as an opensource project. <br/>
								 You can check my CV here : <a href="http://islamelshobokshy.info/Islam_Elshobokshy_CV.pdf">Islam ELSHOBOKSHY's Curriculum Vitae</a><br/>
								<center> <a href="https://github.com/elshobokshy" target='_blank'><i class="fa fa-github fa-4x"></i></a> &emsp; 
										 <a href="https://www.linkedin.com/in/islam-elshobokshy/" target='_blank'><i class="fa fa-linkedin-square fa-4x"></i></a> &emsp; 
										<a href="https://www.facebook.com/IslamElshobokshy" target='_blank'><i class="fa fa-facebook-square fa-4x"></i></a> 
								</center>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				
				<div class="contact-down">
					<div class="contact-right">
						<div class="col-md-6 contact-left">
							<h5>CONTACT</h5>
								<p>If you have got any concerns about the blog, questions, information or just want to say hi then don't hesitate to contact me using this form.</p>
							 	<address>
									<strong>The Company Name Inc.<br/>
									Adresse here<br/>
									Postal code</strong><br/><br/>
									Telephone: +33 01 23 45 67 89<br/>
									E-mail: islam20088@hotmail.com<br>
								</address>
						</div>
						<div class="col-md-6 contact-info">
							<form action="content/contact_me.php" method="post" name="contact_form">
								<div class="form-group">
								  <label class="col-md-12 control-label" for="text">Name</label>  
								  <div class="col-md-12">
									<input id="name" name="name" type="text" placeholder="Please enter your name." class="form-control input-md" required="">
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-12 control-label" for="email">Email</label>  
								  <div class="col-md-12">
								  <input id="email" name="email" type="email" placeholder="Please enter your email adress." class="form-control input-md" required="">
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-12 control-label" for="message">Message</label>  
								  <div class="col-md-12">
								  <textarea id="message" name="message" placeholder="Please enter your message" class="form-control input-md" required=""></textarea>
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