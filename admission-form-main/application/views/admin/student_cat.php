<!DOCTYPE html>
<html>
<head>
	<title>Student Category</title>
</head>
<body>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="simpletable"	class="table table-striped table-bordered nowrap">
	<thead>
	<tr>
		<th>Sl.No</th>
		<th>Student Category</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	foreach ($data as $key) {
	$i++;
		?>
		<tr>
			<th><?php echo $i;?></th>
			<th><?php echo $key->student_category;?></th>
			<th><button><a href="<?php echo base_url();?>Admin/student_cat_delete/<?php echo $key->id;?>">Delete</a></button></th>
		</tr>
	<?php
}
	?>
	</tbody>
</table>
<script>
						$(document).ready(function() {
                            $('#simpletable').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            } );
                        } );
</script>	
<br><br><br>
<h3>Add Category</h3>
<form method="post" action="<?php echo base_url();?>Admin/student_cat_add">
	Student Category<input type="text" name="category" id="category">
	<input type="submit" name="Add">
</form>
</body>
</html>