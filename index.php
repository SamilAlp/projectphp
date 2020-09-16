<!DOCTYPE html>
<html>
  <head>
	   <title></title>
  </head>
    <body>
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Username</label>
             <input type="username" class="form-control" id="exampleInputUsername1" placeholder="Username">
          </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
             <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <form action="lostpw.php">
      	   <input type="submit" value="Wachtwoord vergeten?">
        </form>

   	    <form action="signup.php">
    	     <input style="margin-top: 20px;" type="submit" value="Registreer hier">
   	    </form>
    </body>
</html>




