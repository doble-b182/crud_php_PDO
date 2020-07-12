<?php require 'db.php'; ?>

<?php require 'includes/header.php'; ?>


<!-- crear la tabla  -->
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!-- alerta de guardado -->
    <?php if(isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
</div>
    <?php session_unset(); endif; ?>
        <!-- tarjeta  -->
        <div class="card card-body">
        <h2>Insert Task</h2>
        <form action="save_task.php" method='POST'>
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="task title" autofocus>
        </div>
        <div class="form-group">
        <textarea name="description" id=""  rows="2" class="form-control" placeholder="Task description"></textarea>
        </div>
        <input type="submit" class="btn btn-success btn-block " name="save_task" value="Save" >
        </form>
        </div>
        </div>
        <!-- tabla para mostrar los datos -->
        <div class="col-md-8">
            <table class='table table-bordered'>
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
            </thead>
        <tbody>
        <?php 
        $resul_task = $conexion->query('SELECT * FROM task');
        foreach($resul_task as $fila){ ?>
            <tr>
                <td><?php echo $fila['title'] ?></td>
                <td><?php echo $fila['description'] ?></td>
                <td><?php echo $fila['created_at'] ?></td>
                <td>
                <a href="edit_task.php?id=<?php echo $fila['id']?>" class="btn btn-secondary">
                <i class="fa fa-pencil"></i></a>
                <a href="delete_task.php?id=<?php echo $fila['id'] ?>" class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php }?>
        

        </tbody>
            </table>
        
        </div>
    </div>
</div>










<?php require 'includes/footer.php'; ?>


