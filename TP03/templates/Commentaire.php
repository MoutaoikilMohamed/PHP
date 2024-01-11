<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Les visiteurs</title>
</head>
<body>
    <h1>Commentaire</h1>
    <p></p>
    <?php
    foreach ($Comment as $comment) {
    ?>
        <div class="news">
            <h3>
                <?php
                echo htmlspecialchars($comment['firstname']);echo "<br><br>";
                echo nl2br(htmlspecialchars($comment['comment']));echo "<br><br>";
                ?>
                <em>le <?php echo $comment['comment_date']; ?></em>
            </h3>
            <p><br /></p>
        </div>
    <?php
    }
    ?>
</body>
</html>