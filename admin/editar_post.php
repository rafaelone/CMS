<?php include "includes/header.php"; ?>
<?php ob_start(); ?>
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
               <small>Gustavo</small>
            </h1>
            <?php
               if(isset($_GET['edit'])){
                 $the_post_id = $_GET['edit'];
               }
               $query = "SELECT * from posts WHERE post_id = $the_post_id";
               $select_posts_id = mysqli_query($connection, $query);
               
               while($row = mysqli_fetch_assoc($select_posts_id)){
               $post_id = $row['post_id'];
               $post_nome = $row['post_nome'];
               $post_autor = $row['post_autor'];
               $post_status = $row['post_status'];
               $post_imagem = $row['post_imagem'];
               $post_tags = $row['post_tags'];
               $post_conteudo = $row['post_conteudo'];
               }
               
             if (isset($_POST['update'])) {
                            $post_nome = $_POST['post_nome'];
                            $post_autor = $_POST['post_autor'];
                            $post_status = $_POST['post_status'];

                            $post_imagem = $_FILES['post_imagem']['name'];
                            $post_imagem_temp = $_FILES['post_imagem']['tmp_name'];

                            $post_data = date('d-m-y');

                            $post_tags = $_POST['post_tags'];
                            $post_conteudo = $_POST['post_conteudo'];

                            move_uploaded_file($post_imagem_temp, "../images/$post_imagem");

                            if (empty($post_imagem)) {
                              $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                              $select_imagem = mysqli_query($connection, $query);

                              while ($row = mysqli_fetch_assoc($select_imagem)) {
                                $post_imagem = $row['post_imagem'];
                              }
                            }

                            $query = "UPDATE posts SET ";
                            $query .= "post_nome = '{$post_nome}', ";
                            $query .= "post_autor = '{$post_autor}', ";
                            $query .= "post_status = '{$post_status}', ";
                            $query .= "post_imagem = '{$post_imagem}', ";
                            $query .= "post_tags = '{$post_tags}', ";
                            $query .= "post_conteudo = '{$post_conteudo}', ";
                            $query .= "post_data = now() ";
                            $query .= "WHERE post_id = '{$the_post_id}' ";

                            $update_post = mysqli_query($connection, $query);

                            echo "<p class='bg-sucess'> POST ATUALIZADO.
                            <a href='../admin/editar_post.php?edit={$the_post_id}'>
                            VER POST</a> ou <a href='post.php'> EDITAR MAIS POSTS</a>
                            </p>
                            ";

                            if (!$update_post) {
                              die("Não deu certo " . mysqli_error($connection));
                            }else {
                              echo "Atualizado com sucesso";
                            }
                          }
               ?>
            <form action="" method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label for="post_nome">Titulo do Post:</label>
                  <input type="text" class="form-control" name="post_nome" value="<?php echo  $post_nome; ?>">
               </div>
               <div class="form-group">
                  <label for="post_autor">Autor:</label>
                  <input type="text" class="form-control" name="post_autor" value="<?= $post_autor ?>"
               </div>
               <div class="form-group">
                  <label for="post_status">Status do Post</label>
                  <input type="text" class="form-control" name="post_status" value="<?= $post_status ?>"
               </div>
               <div class="form-group">
                  <label for="post_imagem">Imagem do Post</label>
                  <img src="../images/<?= $post_imagem ?>" width="250px">
                  <input type="file" name="post_imagem">
               </div>
               <div class="form-group">
                  <label for="post_tags">Tags do Post</label>
                  <input type="text" class="form-control" name="post_tags" value="<?= $post_tags ?>">
               </div>
               <div class="form-group">
                  <label for="post_conteudo">Conteúdo do Post</label>
                  <textarea class="form-control" name="post_conteudo" cols="30" rows="10" 
                     ><?= $post_conteudo ?></textarea>
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-primary"
                     name="update" value="ATUALIZAR">
               </div>
            </form>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>