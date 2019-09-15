<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Simple CRUD in JSON File</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    	<h1 class="page-header text-center">Read/Append/Delete Data to JSON File</h1>
    	<div class="row">
    		<div class="col-sm-3 col-sm-offset-1">
    			<form method="POST" action="add.php">
    				<div class="form-group">
    					<label>ID</label>
    					<input type="text" class="form-control" name="id">
    				</div>
    				<div class="form-group">
    					<label>Firstname</label>
    					<input type="text" class="form-control" name="firstname">
    				</div>
    				<div class="form-group">
    					<label>Lastname</label>
    					<input type="text" class="form-control" name="lastname">
    				</div>
    				<div class="form-group">
    					<label>Address</label>
    					<input type="text" class="form-control" name="address">
    				</div>
    				<div class="form-group">
    					<label>Gender</label>
    					<input type="text" class="form-control" name="gender">
    				</div>
    				<button type="submit" class="btn btn-primary" name="add">Add</button>
    			</form>
                <?php 
                session_start();
                if(isset($_SESSION['message'])):?>
                    <div class="alert alert-info text-center" style="margin-top: 20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>                    

                    <?php unset($_SESSION['message']); endif; ?>

                </div>
                <div class="col-sm-7">
                 <table class="table table-bordered table-striped">
                    <thead>
                       <th>ID</th>
                       <th>Firstname</th>
                       <th>Lastname</th>
                       <th>Address</th>
                       <th>Gender</th>
                       <th>Options</th>
                   </thead>
                   <tbody>
                    <?php $data = file_get_contents('users.json');
                    $data = json_decode($data);
                    foreach($data as $row):?>
                        <tr>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->firstname ?></td>
                            <td><?php echo $row->lastname ?></td>
                            <td><?php echo $row->address ?></td>
                            <td><?php echo $row->gender ?></td>
                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row->id?>">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
