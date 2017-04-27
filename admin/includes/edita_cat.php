<?php

  if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];

    $query = "SELECT * FROM categorias WHERE cat_id = $cat_id";
    $select_categorias = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categorias)){
        $cat_id = $row['cat_id'];
        $cat_nome = $row['cat_nome'];
        ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="cat_nome">Editar Categorias</label>


          <input type="text" value = "<?php if(isset($cat_nome)) {echo $cat_nome;} ?>" class="form-control" name="cat_nome">
        </div>

        <div class="form-group">
          <input type="hidden" name="cat_id" value="<?= $cat_id; ?>">
        <input type="submit" class="btn btn-primary"
        name="atualizar" value="Adicionar">
        </div>


      </form>
      <?php
}
}
?>
