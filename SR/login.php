<?php
  include_once 'header.php'
 ?>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h3 class="mb-5"><em>Sign in to your Account</em></h3>
                <form class="form-control col-form-label" id="login_form" action="includes/login.inc.php" style="width: 80%;" method="post">
                  <input class="input-group-text" type="text" id="name" name="name" placeholder="Username/Email">
                  <input class="input-group-text" type="password" id="pwd" name="pwd" placeholder="Password">
                  <br>
                  <button class="btn btn-primary" type="submit" name="submit">Login!</button>
                  <?php
                    if (isset($_GET["error"])) {
                      if ($_GET["error"] == "emptyinput") {
                        echo "<p>Please fill out all fields!</p>";
                      }
                      elseif ($_GET["error"] == "wronglogin") {
                        echo "<p>Login is incorrect!</p>";
                      }
                    }
                   ?>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </header>
<?php
  include_once 'footer.php'
?>
