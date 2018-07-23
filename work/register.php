<?php 
include 'header.php';
?>
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<?php 
		include 'nav.php';
		?>
	<div id="fh5co-counter" class="fh5co-counters fh5co-bg-section" style="background-image: url(images/BoysWithPhone.jpg);">
		<div class="container">
			<div class="row">
				<div class="login-box sign-box">
					<h3>REGISTRATION FORM</h3>
					<form>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="userName">User Name</label>
								<input type="text" id="userName" class="form-control" placeholder="UserName">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="firstName">First Name</label>
								<input type="text" id="firstName" class="form-control" placeholder="Jhon">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="lasttName">Last Name</label>
								<input type="text" id="lasttName" class="form-control" placeholder="Jhon">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="Password">Password</label>
								<input type="password" id="Password" class="form-control" placeholder="***********">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="Cpassword">Confirm Password</label>
								<input type="password" id="Cpassword" class="form-control" placeholder="***********">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="email">Email</label>
								<input type="email" id="email" class="form-control" placeholder="Your email here">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-6 ">
								<label for="country">Country</label>
								<input type="text" id="country" class="form-control" placeholder="Your Country">
							</div>
							<div class="col-md-6 ">
								<label for="city">City/Town</label>
								<input type="text" id="city" class="form-control" placeholder="Your City / Town">
							</div>
						</div>
						<ul>
							<li><label>Gender</label></li>
							<li>
								<div class="radio checkbox-danger">
		              <input id="Male" type="radio" name="gender">
		              <label for="Male">
		                  Male
		              </label>
		            </div>
							</li>
							<li><label>OR</label></li>
							<li>
								<div class="radio checkbox-danger">
		              <input id="female" type="radio" name="gender">
		              <label for="female">
		                  Female
		              </label>
		            </div>
							</li>
						</ul>
						<div class="checkbox checkbox-danger">
              <input id="agreeTrem" type="checkbox">
              <label for="agreeTrem">
                  I accepted terms and conditions
              </label>
            </div>
            <div class="row form-group">
            	<div class="col-md-12 btn-center">
            		<button class="btn btn-login">REGISTER</button>
            	</div>
            </div>
					</form>
				</div>		
		</div>
	</div>

	</div>
<?php 
include 'footer.php';
?>