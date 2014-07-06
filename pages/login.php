
        <div class="container">

            <div class="row marketing">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-4 well">
                    <center><h2>Login</h2></center>
                    <hr>
                    <form method="post" action="">
                        <div class="field">
                            <input type="text"  name="username" class="form-control" id="username" placeholder="Username"/>
                            <?php echo (isset($errors['username'])) ? '<p class="alert alert-danger form-error">' . $errors['username'] . '</p>' : '' ;?>
                        </div>

                        <div class="field">
                            <input type="text" name="password" class="form-control" id="password" placeholder="Password"/>
                            <?php echo (isset($errors['password'])) ? '<p class="alert alert-danger form-error">' . $errors['password'] . '</p>' : '' ;?>
                        </div>

                        <div class="field">
                            <input type="checkbox" id="remember" name="remember"/> Remember Me <a href="#" class="pull-right">Forgot Password?</a>
                        </div>

                        <input type="hidden" name="token" value="<?php echo  Token::generate(); ?>" />
                        <input type="submit" class="btn btn-primary form-control" value="Login">
                    </form>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>