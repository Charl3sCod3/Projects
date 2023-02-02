
      	<div class="row" style="position: relative;">
                  <img src="images/loginbanner.jpg" style="width: 100%;height: 500px;position: absolute;top:10px;bottom: 10px;left: 10px;">    
      		<div class="col-md-8" style="margin-top: 5em;">
                  <div style="width: 100%;height: 500px;">
                        <div style="margin: auto;width: 60%;height: 400px;display: flex;justify-content: center; align-items: center;">
                              <div class="card" style="margin-top: 25%;background-color:#ffffff9c;">
                                    <div class="card-body">
                                          <p style="font-size:20px;">
                                                Become one of our business partners <br> Sign up here!
                                          </p>
                                          <div style="display: flex;justify-content: center;align-items: center;">
                                                <button onclick="window.location.href='?q=becomepartner'" style="margin:auto;text-align: center;" class="btn btn-danger btn-lg"><i class="fa fa-users"></i> Become Our Partner</button>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>      
                  </div>
      		<div class="col-md-4">
      			<form id="loginForm" method="post" action="includes/queries.php">
      			<div class="card" style="margin-top: 3em;background-color: #424a44c2;color: white;">
      				<div class="card-header bg-green">
      					<h4 class="card-title">LOGIN HERE</h4>
      				</div>
      				<div class="card-body">
      					<p style="width: 100%;text-align: center;vertical-align: middle;">Sign in to start session.</p>
      					<div class="form-group px-4 py-2">
      						<input required="" type="text" name="username" id="username" class="form-control" placeholder="Ex. Johndoe" autocomplete="off"> 
      					</div>
      					<div class="form-group px-4 py-2">
      						<input required="" type="password" name="password" id="password" class="form-control" placeholder="Ex.********">
      					</div>
                                    <div id="otpcont"></div>
                                    <input type="hidden" name="loginuser" id="loginuser" value="true">
      					<div class="form-group  py-2">
      						<button type="submit" name="loginuser" class="btn btn-md bg-cyan float-right"><i class="fa fa-signin"></i> LOGIN</button>
      					</div>
      				</div>
      				<div class="card-footer">
      					<h4 class="card-title">Does not have an account? Register here!</h4>
      					<a href="?q=register" class="btn bg-cyan btn-md float-right" style="margin-top: 1em;">REGISTER</a>
      				</div>
      			</div>
      		</form>
      		</div>
      	</div>