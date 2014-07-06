    
        <div class="container well">
            
            <center><h2><img src="images/6edff7c1.kalash.jpg" width="40" height="45"> &nbsp;Register &nbsp;<img src="images/6edff7c1.kalash.jpg" width="40" height="45"></h2></center>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="col-md-6 vertical-line">
                    <div class="field">                        
                        <input type="text" class="form-control" placeholder="Fullname" name="fullname" id="fullname" value="<?php echo (Input::get('fullname') !== null) ? Input::get('fullname') : '' ;?>"  autocomplete="off"/>
                        <?php echo (isset($errors['fullname'])) ? '<p class="alert alert-danger form-error">' . $errors['fullname'] . '</p>' : '' ;?>
                    </div>

                    <div class="field">
                        
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?php echo (Input::get('username') !== null) ? Input::get('username') : '' ;?>"  autocomplete="off"/>
                        <?php echo (isset($errors['username'])) ? '<p class="alert alert-danger form-error">' . $errors['username'] . '</p>' : '' ;?>
                    </div>

                    <div class="field">
                        <label for="gender">Gender  </label><br>
                        <input type="radio" name="gender" id="gender" value="male" <?php echo (Input::get('gender') !== null && Input::get('gender') === 'male')? 'checked' : '' ;?> > Male &nbsp;&nbsp;
                        <input type="radio" name="gender" id="gender" value="female" <?php echo (Input::get('gender') !== null && Input::get('gender') === 'female')? 'checked' : '' ;?> > Female
                    </div>
                    <?php echo (isset($errors['gender'])) ? '<p class="alert alert-danger form-error">' . $errors['gender'] . '</p>' : '' ;?> 

                    <?php
                        $marital_status = FormElement::maritalStatus();
                    ?>
                    <div class="field">
                        <label for="marital_status">Marital Status  </label>
                        <select name="marital_status" class="form-control" id="marital_status" > 
                            <option value="select">Select</option>
                        <?php
                            foreach ($marital_status as $status) {
                        ?>
                            <option value="<?php echo strtolower($status); ?>"><?php echo $status; ?></option> 
                        <?php
                            }
                        ?>                            
                        </select>
                        <?php echo (isset($errors['marital_status'])) ? '<p class="alert alert-danger form-error">' . $errors['marital_status'] . '</p>' : '' ;?> 
                    </div>
                    

                    <div class="field">
                        
                        <input type="text" name="age" class="form-control" placeholder="Age (in yrs.)" id="age" value="<?php echo (Input::get('age') !== null) ? Input::get('age') : '' ;?>"  autocomplete="off"/>
                        <?php echo (isset($errors['age'])) ? '<p class="alert alert-danger form-error">' . $errors['age'] . '</p>' : '' ;?> 
                    </div>
                    

                    <div class="field">
                        <div class="input-group date" id="dp3" data-date="12-02-1988" data-date-format="dd-mm-yyyy">
                            <input type="text" name="dob" size="16" class="form-control" value="<?php echo (Input::get('dob') !== null) ? Input::get('dob') : '' ;?>" placeholder="Date of Birth">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        <?php echo (isset($errors['dob'])) ? '<p class="alert alert-danger form-error">' . $errors['dob'] . '</p>' : '' ;?>
                    </div>
                     

                    <div class="field">
                        
                        <input type="text" name="tob" class="form-control" value="<?php echo (Input::get('tob') !== null) ? Input::get('tob') : '' ;?>" placeholder="Time of Birth" id="tob" autocomplete="off"/>
                        <?php echo (isset($errors['tob'])) ? '<p class="alert alert-danger form-error">' . $errors['tob'] . '</p>' : '' ;?> 
                    </div>
                    

                    <div class="field">
                       
                        <input type="text" name="height" class="form-control" value="<?php echo (Input::get('height') !== null) ? Input::get('height') : '' ;?>" placeholder="Height (in feet)" id="height"  autocomplete="off"/>
                        <?php echo (isset($errors['height'])) ? '<p class="alert alert-danger form-error">' . $errors['height'] . '</p>' : '' ;?>
                    </div>                     

                    <div class="field">
                        
                        <input type="text" name="weight" class="form-control" value="<?php echo (Input::get('weight') !== null) ? Input::get('weight') : '' ;?>" placeholder="Weight (in kgs.)" id="weight"  autocomplete="off"/>
                        <?php echo (isset($errors['weight'])) ? '<p class="alert alert-danger form-error">' . $errors['weight'] . '</p>' : '' ;?> 
                    </div>                    

                </div>

                <div class="col-md-6">

                    <div class="field">
                        
                        <input type="text" name="edu" class="form-control" value="<?php echo (Input::get('edu') !== null) ? Input::get('edu') : '' ;?>" placeholder="Education" id="edu"  autocomplete="off"/>
                        <?php echo (isset($errors['edu'])) ? '<p class="alert alert-danger form-error">' . $errors['edu'] . '</p>' : '' ;?> 
                    </div>                    

                    <div class="field">
                        
                        <input type="text" name="occupation" class="form-control" value="<?php echo (Input::get('occupation') !== null) ? Input::get('occupation') : '' ;?>" placeholder="Occupation" autocomplete="off"/>
                        <?php echo (isset($errors['occupation'])) ? '<p class="alert alert-danger form-error">' . $errors['occupation'] . '</p>' : '' ;?> 
                    </div>                    

                    <div class="field">
                        
                        <input type="text" name="employed" class="form-control" value="<?php echo (Input::get('employed') !== null) ? Input::get('employed') : '' ;?>" placeholder="Employed In" id="employed"  autocomplete="off"/>
                        <?php echo (isset($errors['employed'])) ? '<p class="alert alert-danger form-error">' . $errors['employed'] . '</p>' : '' ;?>
                    </div>                     

                    <div class="field">
                        
                        <input type="text" name="annual_income" class="form-control" value="<?php echo (Input::get('annual_income') !== null) ? Input::get('annual_income') : '' ;?>" placeholder="Personal Annual Salary" id="annual_income"  autocomplete="off"/>
                        <?php echo (isset($errors['annual_income'])) ? '<p class="alert alert-danger form-error">' . $errors['annual_income'] . '</p>' : '' ;?> 
                    </div> 

                    <div class="field">
                        
                        <input type="text" name="color" class="form-control" value="<?php echo (Input::get('color') !== null) ? Input::get('color') : '' ;?>" placeholder="Color" id="color"  autocomplete="off"/>
                        <?php echo (isset($errors['color'])) ? '<p class="alert alert-danger form-error">' . $errors['color'] . '</p>' : '' ;?> 
                    </div>                      

                    <div class="field">
                        
                        <input type="text" name="blood_group" class="form-control" value="<?php echo (Input::get('blood_group') !== null) ? Input::get('blood_group') : '' ;?>" placeholder="Blood Group" id="blood_group"  autocomplete="off"/>
                        <?php echo (isset($errors['blood_group'])) ? '<p class="alert alert-danger form-error">' . $errors['blood_group'] . '</p>' : '' ;?> 
                    </div>                    

                    <div class="field">
                        <label for="manglik">Manglik  </label><br>
                        <input type="radio" name="manglik" id="manglik" value="yes" <?php echo (Input::get('manglik') !== null && Input::get('manglik') === 'yes')? 'checked' : '' ;?> > Yes
                        <input type="radio" name="manglik" value="no" <?php echo (Input::get('manglik') !== null && Input::get('manglik') === 'no')? 'checked' : '' ;?> > No
                    </div>
                    <?php echo (isset($errors['manglik'])) ? '<p class="alert alert-danger form-error">' . $errors['manglik'] . '</p>' : '' ;?> 

                    <div class="field">
                        <label for="image">Upload Image  </label><br>
                        <input type="file" name="image" id="image">
                        <?php echo (isset($errors['image'])) ? '<p class="alert alert-danger form-error">' . $errors['image'] . '</p>' : '' ;?> 
                    </div>

                    <div class="field">
                        
                        <input type="password" name="password" class="form-control"  placeholder="Password" id="password" value=""  autocomplete="off"/>
                        <?php echo (isset($errors['password'])) ? '<p class="alert alert-danger form-error">' . $errors['password'] . '</p>' : '' ;?>
                    </div>                     

                    <div class="field">
                        
                        <input type="password" name="password_again" class="form-control"  placeholder="Enter Password Again" id="password_again" value=""  autocomplete="off"/>
                        <?php echo (isset($errors['password_again'])) ? '<p class="alert alert-danger form-error">' . $errors['password_again'] . '</p>' : '' ;?> 
                    </div>
                    
                    <br>
                    <input type="hidden" name="token" value="<?php echo  Token::generate(); ?>" />
                    <input type="submit" class="btn btn-success form-control" value="Register" />
                </div>
            </form>
            
        </div>
        <br>