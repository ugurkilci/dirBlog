<?php
    include 'dirBlog.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=markdown(dirBlog(), "title")?></title>

    <meta name="description" content="<?=markdown(dirBlog(), "description")?>"/>
    <meta name="keywords" content="<?=markdown(dirBlog(), "keywords")?>" />
    <meta property="og:image" content="<?=markdown(dirBlog(), "image")?>" />
</head>
<body>
    <?=markdown(dirBlog())?>
</body>
</html>
