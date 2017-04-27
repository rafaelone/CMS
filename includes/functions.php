  <?php include "db.php" ?>
  <?php
    function menu(){
      global $connection;



      $query = "SELECT * FROM categorias";
      $resultado = mysqli_query($connection, $query);


      while ($row = mysqli_fetch_assoc($resultado)) {
        $categories = $row['cat_nome'];
        echo "<li><a href='#'>$categories </a></li>";
      }
    }
    function addCat(){
      global $connection;

            if (isset($_POST['enviar'])) {


      $cat_nome = $_POST['cat_nome'];

      $query = "INSERT INTO categorias (cat_nome) VALUES ('$cat_nome')";
      if ( !empty( $cat_nome )) {
        $resultado = mysqli_query($connection, $query);
        if (!$resultado) {
          die ( "ERRO ao adicionar categoria" .mysqli_error());
        }
      } else {
        echo "ERRO ao adicionar categoria";
      }
    }
    }
    function updateCat(){
      global $connection;

       if (isset($_POST['atualizar'])) {


      $cat_nome = $_POST['cat_nome'];
      $cat_id = $_POST['cat_id'];

      $query = "UPDATE categorias SET cat_nome='$cat_nome' WHERE cat_id=$cat_id";
      if ( !empty( $cat_nome )) {
        $resultado = mysqli_query($connection, $query);
        if (!$resultado) {
          die ( "ERRO ao adicionar categoria" .mysqli_error());
        }
      } else {
        echo "ERRO ao adicionar categoria";
      }
    }
    function deleteCat(){
      global $connection;
if (isset($_GET['delete'])){

      $cat_id = $_GET['delete'];

      $query = "DELETE FROM categorias WHERE cat_id = $cat_id";
      $resultado = mysqli_query($connection, $query);
      header("Location: categorias.php");
    }
  }
}

function verCategorias(){
  global $connection;
   $query = "SELECT * from categorias";
  $select_categorias = mysqli_query($connection, $query);

         while($row = mysqli_fetch_assoc($select_categorias)){
                                      $cat_id = $row['cat_id'];
                                      $cat_nome = $row['cat_nome'];

                                      echo "<tr>";
                                      echo "<td>" . $cat_id . "</td>";
                                      echo "<td>" . $cat_nome . "</td>";
                                      echo "<td><a href='categorias.php?delete={$cat_id}'> APAGAR </a></td>";
                                      echo "<td><a href='categorias.php?edit={$cat_id}'> EDIT </a></td>";
                                      echo "</tr>";
                                    }
}

   ?>
    
                           