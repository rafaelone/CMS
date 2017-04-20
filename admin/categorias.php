<?php include "includes/header.php" ?>
<?php include  "../includes/db.php" ?>




<?php 
function verCategorias (){

            global $connection;
                            $query = "select * from categorias";
             $resultado = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($resultado)) {
                                 
             $nome = $row['cat_nome'];
             $id = $row['cat_id'];
              echo "<tr><td>$id</td><td>$nome</td></tr>";
        }
}

?>

    <div id="wrapper">


<?php 
    if(isset($_POST['cadastrar'])){

        global $connection;

        $cat_nome = $_POST['cat_nome'];

        if (strlen($cat_nome) < 1){
            echo "<div class='alert alert-danger'>Informe uma categoria correta</div>";
        }else{

        $query = "INSERT INTO categorias (cat_nome) VALUES ('$cat_nome')";
        $resultado = mysqli_query($connection, $query);
        if (!$resultado){
            die("Não deu certo" .mysqli_error());
        }else{
            echo "alert alert-sucess'>Categoria cadastrada com sucesso";
        }
    }
    }
?>

    

        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bem vindo
                            <small>Rafael</small>
                        </h1>
                        
                        <div class="col-sm-6">
                            <form method="post" action="categorias.php">
                                <div class="form-group">
                                    <label for="cat_nome">Adicionar categoria</label>
                                    <input type="text" name="cat_nome" id="cat_nome" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="cadastrar" value="cadastrar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                         <div class="col-sm-6">
                      
                          <table class="table table-bordered">
                            <thead>
                              <td>Id</td>
                              <td>Nome</td>
                            </thead>
                                <tbody>
                                    <?php  verCategorias(); ?>
                                </tbody>
                          </table>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>
