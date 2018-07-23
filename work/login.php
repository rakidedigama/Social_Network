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
				<div class="login-box">
					<h3>LOGIN FORM</h3>
					<form>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="userName">User Name</label>
								<input type="text" id="userName" class="form-control" placeholder="User Name">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 ">
								<label for="pass">Password</label>
								<input type="password" id="pass" class="form-control" placeholder="User Name">
							</div>
						</div>
						<div class="checkbox checkbox-danger">
              <input id="checkbox4" type="checkbox" >
              <label for="checkbox4">
                  Keep me signed in
              </label>
            </div>
            <div class="row form-group">
            	<div class="col-md-12 btn-center">
            		<button class="btn btn-login">SIGN IN</button>
            	</div>
            </div>
            <div class="row form-group">
            	<div class="col-md-6">
            		<a href="#" class="forget-pas">Forget Password?</a>
            	</div>
            	<div class="col-md-6">
            		<a href="#" class="creat-Ac">Creat new Account</a>
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