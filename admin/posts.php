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
            <table class ="table table-bordered table-hover">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Autor</th>
                     <th>Nome</th>
                     <th>Status</th>
                     <th>Imagem</th>
                     <th>Data</th>
                     <th>Tags</th>
                     <th>Conteudo</th>
                  </tr>
               </thead>
               <?php
                  $query = "SELECT * FROM posts";
                  $select_todos_posts = mysqli_query($connection, $query);
                  
                  while($row = mysqli_fetch_assoc($select_todos_posts)):
                    $post_id = $row ['post_id'];
                    $post_nome = $row['post_nome'];
                    $post_autor = $row['post_autor'];
                    $post_status = $row['post_status'];
                    $post_imagem = $row['post_imagem'];
                    $post_data = $row['post_data'];
                    $post_tags = $row ['post_tags'];
                  
                    $post_conteudo = $row['post_conteudo'];
                  
                  
                    $post_data = date('d-m-Y', strtotime($post_data));
                  
                  ?>
               <tbody>
                  <tr>
                     <td><?= $post_id ?></td>
                     <td><?= $post_autor ?></td>
                     <td><?= $post_nome ?></td>
                     <td><?= $post_status ?></td>
                     <td><img class="img-responsive" src="../images/<?php echo $post_imagem;?>" alt=""></td>
                     <td><?= $post_data ?></td>
                     <td><?= $post_tags ?></td>
                     <td><?= $post_conteudo?></td>
                  </tr>
               </tbody>
               <?php endwhile; ?>
            </table>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php include "includes/header.php"; ?>