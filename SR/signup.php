<?php
  include_once 'header.php'
 ?>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h3 class="mb-5"><em>Create an Account</em></h3>
                <form class="form-control col-form-label" id="signup_form" action="includes/signup.inc.php" style="width: 80%;" method="post">
                  <input class="input-group-text" type="text" id="fname" name="fname" placeholder="First Name">
                  <input class="input-group-text" type="text" id="lname" name="lname" placeholder="Last Name">
                  <input class="input-group-text" type="text" id="uname" name="uname" placeholder="Username">
                  <input class="input-group-text" type="text" id="email" name="email" placeholder="E-Mail">
                  <input class="input-group-text" type="text" id="remail" name="remail" placeholder="Repeat E-Mail">
                  <input class="input-group-text" type="password" id="pwd" name="pwd" placeholder="Password">
                  <input class="input-group-text" type="password" id="rpwd" name="rpwd" placeholder="Repeat Password">
                  <br>
                  <button class="btn btn-primary" type="submit" name="submit">Sign Up!</button>
                  <?php
                    if (isset($_GET["error"])) {
                      if ($_GET["error"] == "emptyinput") {
                        echo "<p>Please fill out all fields!</p>";
                      }
                      elseif ($_GET["error"] == "invalidusername") {
                        echo "<p>Username is invalid!</p>";
                      }
                      elseif ($_GET["error"] == "invalidemail") {
                        echo "<p>Email is invalid!</p>";
                      }
                      elseif ($_GET["error"] == "emailsdontmatch") {
                        echo "<p>Emails don't match!</p>";
                      }
                      elseif ($_GET["error"] == "passwordsdontmatch") {
                        echo "<p>Passwords don't match!</p>";
                      }
                      elseif ($_GET["error"] == "userexists") {
                        echo "<p>User doesn't exit!</p>";
                      }
                      elseif ($_GET["error"] == "stmtfailed") {
                        echo "<p>Something went wrong, try again!</p>";
                      }
                      elseif ($_GET["error"] == "none") {
                        echo "<p>Successful signup!</p>";
                      }
                    }
                   ?>
                </form>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </header>
<?php
  include_once 'footer.php'
?>
