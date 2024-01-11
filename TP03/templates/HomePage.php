<!DOCTYPE html>
<html> <head>
 <meta charset="utf-8" />
 <title>Les visiteurs</title>
</head><body>
 <h1 align="center">Les informations des visiteurs</h1>
 <?php
 foreach ($posts as $post) {
 ?>
 <div class="news">
 <h3>
    <table align="center" border=1 width="800px">
        <tr><td>Nom</td><td>Prenom</td><td>Date</td><td>Commentaire</td></tr>
    <tr><td>
 <?php echo htmlspecialchars($post['firstname']);?></td>;
 <td><?php echo nl2br(htmlspecialchars($post['lastname'])); ?></td>
 <td><em>le <?php echo $post['french_visite_date']; ?></em></td>

 </h3>
 <p> <br /> 
 <td><em><a href="?action=commentaires">Commentaires</a></em></td>
 </tr>

 
 </table>
  </p>
 </div>
 <?php } 
 ?>
</body></html>