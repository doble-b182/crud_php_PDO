<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
$statement = $conexion->prepare("SELECT * FROM task WHERE id = :id");
$statement->execute(array(':id'=>$id));
$resultado = $statement->fetchall();

    if($resultado){
       foreach($resultado as $show_at){
        $title= $show_at['title'];
        $description = $show_at['description'];
       }
    }

    if(isset($_POST['update'])){
        // echo 'updating';
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $statement = $conexion->prepare('UPDATE task SET title=:title, description = :description WHERE id = :id ');
    $resultado= $statement->execute(array(
        ':title'=> $title,
        ':description' => $description,
        ':id' => $id)) ;   

        $_SESSION['message']= 'Task Updated Successfully';
        $_SESSION['message_type']='warning';
        header('Location: index.php');

    }


}
?>


<?php require'includes/header.php'?>
<div class="container p-4">
    <div class="row">
    <div class="col-md-4 mx-auto">
    <div class="card card-body">
    <form action="edit_task.php?id=<?php echo $_GET['id'];?>" method="POST">
    <div class="form-group">
    <input type="text" name='title' value='<?php echo $title; ?>' class='form-control' placeholder='Update Title'> 
    </div>
    <div class="form-group">
    <textarea name="description" id="" rows="2" class="form-control" placeholder='Update Description'><?php echo $description; ?></textarea>
    </div>
    <button class='btn btn-success' name='update'>
    Update
    </button>
    </form>
    </div>
    </div>
    </div>
</div>
<?php require'includes/footer.php'?>
