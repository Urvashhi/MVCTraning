


<h2>Update Employee Record</h2>
  
  <form action="<?php echo BASEURL; ?>/profile/updateEmp" method="POST">

    <div class="form-group">
	<label>FirstName:</label>
    <input type="text" name="first_name" class="form-control" placeholder="FirstName..." value="<?php echo $data['data']->first_name; ?>">
    <div class="error">
        <?php if(!empty($data['first_NameError'])): echo $data['first_NameError']; endif; ?>
    </div>
	</div>
	<!-- Close form-group -->
	<div class="form-group">
	<label>LastName:</label>
    <input type="text" name="last_name" class="form-control" placeholder="LastName..." value="<?php echo $data['data']->last_name; ?>">
    <div class="error">
        <?php if(!empty($data['last_NameError'])): echo $data['last_NameError']; endif; ?>
    </div>
	</div>
    <!-- Close form-group -->
    <div class="form-group">
	<label>Email:</label>
    <input type="email" name="email" class="form-control" placeholder="Email..." value="<?php echo $data['data']->email; ?>">
    <div class="error">
        <?php if(!empty($data['emailError'])): echo $data['emailError']; endif; ?>
    </div>
    </div>
    <!-- Close form-group -->
    <div class="form-group">
	<label>Password:</label>
    <input type="password" name="password" class="form-control" placeholder="Create new password..." value="<?php echo $data['data']->password; ?>">
    <div class="error">
        <?php if(!empty($data['passwordError'])): echo $data['passwordError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	<!--<div class="form-group">
	<label>Birthdate:</label>
    <input type="text" name="birthdate" class="form-control" placeholder="Birthdate..." value="<?php if(!empty($data['birthdate'])): echo $data['birthdate']; endif; ?>">
    <div class="error">
        <?php //if(!empty($data['birthdateError'])): echo $data['birthdateError']; endif; ?>
    </div>
    </div>
	-->
	
	<div>
       <label> Birthdate:</label> <input type="text" name="birthdate" class="disableFuturedate"  value="<?php echo $data['data']->birthdate; ?>">
<script>
   $(document).ready(function () {
      var currentDate = new Date();
      $('.disableFuturedate').datepicker({
      format: 'dd/mm/yyyy',
      autoclose:true,
      endDate: "currentDate",
      maxDate: currentDate
      }).on('changeDate', function (ev) {
         $(this).datepicker('hide');
      });
      $('.disableFuturedate').keyup(function () {
         if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9^-]/g, '');
         }
      });
   });
</script>
<div class="error">
        <?php if(!empty($data['birthdateError'])): echo $data['birthdateError']; endif; ?>
    </div>
</div>
    <!-- Close form-group -->
	<div>
     <label>Gender:</label>
  		<input type="radio" name="gender" value="Male" <?php if( $data['data']->gender == "Male"){ echo "checked"; } ?>>
  		<label for="male">Male</label><br>
  		<input type="radio" name="gender" value="Female" <?php if( $data['data']->gender == "Female"){ echo "checked"; } ?>>
  		<label for="female">Female</label><br>
		<div class="error">
        <?php if(!empty($data['genderError'])): echo $data['genderError']; endif; ?>
    </div>
	</div>

	
	 <!-- Close form-group -->
	 
	 <div class="form-group">
	 <label>Mobile code:</label>
    <input type="text" name="mobile_cc" class="form-control" placeholder="mobile_cc..." value="<?php echo $data['data']->mobile_cc; ?>">
    <div class="error">
        <?php if(!empty($data['mobile_ccError'])): echo $data['mobile_ccError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	 <div class="form-group">
	 <label>Mobile Number:</label>
    <input type="text" name="mobile_no" class="form-control" placeholder="mobile_no..." value="<?php echo $data['data']->mobile_no; ?>">
    <div class="error">
        <?php if(!empty($data['mobile_noError'])): echo $data['mobile_noError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	 <div class="form-group">
	 <label>Organization Name:</label>
    <input type="text" name="org_name" class="form-control" placeholder="Organization name..." value="<?php echo $data['data']->org_name; ?>">
    <div class="error">
        <?php if(!empty($data['org_nameError'])): echo $data['org_nameError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	<div class="form-group">
	<label>Website:</label>
    <input type="text" name="website" class="form-control" placeholder="website..." value="<?php echo $data['data']->website; ?>">
    <div class="error">
        <?php if(!empty($data['websiteError'])): echo $data['websiteError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	<div class="form-group">
	<label>Address:</label>
    <input type="text" name="address" class="form-control" placeholder="address..." value="<?php echo $data['data']->address; ?>">
    <div class="error">
        <?php if(!empty($data['addressError'])): echo $data['addressError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	 <div class="form-group">
	 <label>City:</label>
<select name="city" class="form-control">
   <option value="" >Select city:</option>
   <option value="Ahemedabad" <?php if( $data['data']->city == "Ahemedabad"){ echo "selected"; } ?> >Ahemedabad</option>
    <option value="Surat" <?php if( $data['data']->city == "Surat"){ echo "selected"; } ?> >Surat</option>
    <option value="Toronto" <?php if( $data['data']->city == "Toronto"){ echo "selected"; } ?> >Toronto</option>
    <option value="Ottava" <?php if( $data['data']->city == "Ottava"){ echo "selected"; } ?> >Ottava</option>
	 
</select>
<div class="error">
    <?php if($data['cityError']): echo $data['cityError']; endif;?>
</div>
</div>
 <!-- Close form-group -->
 <div class="form-group">
 <label>State:</label>
<select name="country" class="form-control" >
   <option value="" >Select State:</option>
    <option value="Gujarat" <?php if( $data['data']->country == "Gujarat"){ echo "selected"; } ?>  >Gujarat</option>
    <option value="Canada" <?php if( $data['data']->country == "Canada"){ echo "selected"; } ?> >Canada</option>
   
</select>
<div class="error">
    <?php if($data['countryError']): echo $data['countryError']; endif;?>
</div>
</div>
<!-- Close form-group -->
	<div class="form-group">
	<label>Post Code:</label>
    <input type="text" name="post_code" class="form-control" placeholder="post_code..." value="<?php echo $data['data']->post_code; ?>">
    <div class="error">
        <?php if(!empty($data['post_codeError'])): echo $data['post_codeError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	 <div class="form-group">
	 <label>Types of organization:</label>
    <input type="text" name="types_of_org" class="form-control" placeholder="types_of_org..." value="<?php echo $data['data']->types_of_org; ?>">
    <div class="error">
        <?php if(!empty($data['types_of_orgError'])): echo $data['types_of_orgError']; endif; ?>
    </div>
    </div>
	 <!-- Close form-group -->
	<div>
    	<label>Language Proficiency</label><br>
   <?php	$langn=explode(",", $lang);?>
    <input type="checkbox"  name="ch[]" value="PHP"  <?php foreach ($langn as $value){ if($data['data']->value == "PHP"){ echo "checked"; }} ?> >
    <label for="PHP">PHP</label>
  </div>
  <div>
    <input type="checkbox" name="ch[]" value="JAVA"  <?php foreach ($langn as $value){ if($data['data']->value == "JAVA"){ echo "checked"; }} ?> >
    <label for="JAVA">JAVA</label>
  </div>

  <div>
    <input type="checkbox" name="ch[]" value=".NET" <?php foreach ($langn as $value){ if($data['data']->value == ".NET"){ echo "checked"; }} ?> >
    <label for=".NET">.NET</label>
  </div>
    <div>
    <input type="checkbox" name="ch[]" value="Python" <?php foreach ($langn as $value){ if($data['data']->value == "Python"){ echo "checked"; }} ?>  >
    <label for="Python">Python</label>
  </div>
  <div>
    <input type="checkbox" name="ch[]" value="Other" <?php foreach ($langn as $value){ if($data['data']->langn == "Other"){ echo "checked"; }} ?>  >
    <label for="Other">Other</label>
</div>
 <div class="error">
        <?php if(!empty($data['langError'])): echo $data['langError']; endif; ?>
    </div>
<!-- Close form-group -->
<div>

 	Profile picture:
	<!--<image src="upload/<?php //echo $image;?>" height="70px" >-->
   <input type="file" name="image" class="file" value="<?php echo $data['data']->image; ?>" >
	
</div>
 <div class="error">
        <?php if(!empty($data['imageError'])): echo $data['imageError']; endif; ?>
    </div>
<!-- Close form-group -->	
	
	
	<input type="hidden" name="hiddenId" value="<?php echo $data['data']->id; ?>">
	
	
	
	
	
    <div class="form-group">
    <input type="submit" name="singupBtn" class="btn btn-primary" value="Update">
    <br>
	</div>
    <!-- Close form-group -->
	<br>
    </form>
	