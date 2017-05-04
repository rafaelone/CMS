<?php ob_start();  ?>
<?php include "includes/header.php"; ?>
<?php include "../includes/functions.php"; ?>
<div id="wrapper">
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<div id="page-wrapper">
   <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">
               Bem vindo
               <small>Rafael </small>
            </h1>
            <?php 
              if (isset($_POST['adicionar'])){
                $post_nome = $_POST['post_nome'];
                $post_autor = $_POST['post_autor'];
                $post_data = date( 'd-m-Y' );
                $post_conteudo = $_POST['post_conteudo'];

                $post_imagem = $_FILES['post_imagem']['name'];
                $post_imagem_temp = $_FILES['post_imagem']['tmp_name'];

                $post_tags = $_POST['post_tags'];
                $post_status = $_POST['post_status'];

                move_uploaded_file($post_imagem_temp, "../images/$post_imagem");

                $query = "INSERT INTO posts (post_nome, post_autor, post_data, post_conteudo, post_imagem, post_tags, post_status ) VALUES ('$post_nome', '$post_autor', now(), '$post_conteudo', '$post_imagem', '$post_tags', '$post_status')";

                $resultado = mysqli_query($connection, $query);

                if (!$resultado){
                  die("erro ao cadastrar post");
                }else{
                  echo "Post cadastrado com sucesso";
                }

              }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="post_nome">Titulo do post</label>
                  <input type="text" name="post_nome" placeholder="Titulo do post" class="form-control">
              </div>
              <div class="form-group">
                <label for="post_autor">Nome do autor</label>
                  <input type="text" name="post_autor" placeholder="Nome do autor" class="form-control">
              </div>
              <div class="form-group" >
                
                  <input type="hidden" name="post_data" placeholder="Data do post do post" class="form-control">
              </div>
              <div class="form-group">
                <label for="post_conteudo">Conteudo do post</label>
                  <textarea name="post_conteudo" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="post_imagem">Imagem do post: </label>
                  <input type="file" name="post_imagem" class="form-control">
              </div>
              <div class="form-group">
                <label for="post_tags">Tags do post</label>
                  <input type="text" name="post_tags" placeholder="Tags do post" class="form-control">
              </div>
              <div class="form-group">
                <label for="post_status">Status do post</label>
                  <input type="text" name="post_status" placeholder="Status do post" class="form-control">
              </div>
              <div class="form-group">
              <input type="submit" name="adicionar" value="Cadastrar Post" class="btn btn-success">
              </div>

            </form>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/header.php"; ?>