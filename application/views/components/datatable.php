<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<table id="example" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>last Name</th>
                <th>Email</th>
				 <th>Birthdate</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
      <?php if(!empty($data)){?>

      <?php foreach($data as $emp){ ?>
	
      <tr>
	  
          <td><?php echo $emp->first_name; ?></td>
		   <td><?php echo $emp->last_name; ?></td>
		    <td><?php echo $emp->email; ?></td>
			<td><?php echo $emp->birthdate; ?></td>
          
          
          <td><a href="<?php echo BASEURL; ?>/profile/edit_emp/<?php echo $emp->id; ?>" class="btn btn-primary">Edit</a></td>
          <td><a href="<?php echo BASEURL; ?>/profile/delete/<?php echo $emp->id; ?>" class="btn btn-primary">Delete</a></td>
      </tr>

	  <?php } ?>

<?php } 
else 
{
	echo "No record found.";
}?> 

</tbody>
           
    </table>