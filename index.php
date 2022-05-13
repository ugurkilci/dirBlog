<?php
  include 'dirBlog.php'; // Function codes

  // You can use meta tags in Markdown style.
  //It will be deleted when used inside the page.
  /*
    @return
    Site Title or Meta Title Tag
    <title><?=markdown(dirBlog(), "title")?> 
    ;t Site Title;
  */
  markdown(dirBlog(), "title");

  /* 
    Meta Description Tag
    <title><?=markdown(dirBlog(), "description")?> 
    ;d Site Description;
  */
  markdown(dirBlog(), "description");

  /* 
    Meta Keywords Tag
    <title><?=markdown(dirBlog(), "keywords")?> 
    ;k Site Keywords;
  */
  markdown(dirBlog(), "keywords");

  /* 
    Meta Image Tag
    <title><?=markdown(dirBlog(), "image")?> 
    ;i Site Image;
  */
  markdown(dirBlog(), "image");

  // ---

  /*
    If you paste this on the homepage, the post will automatically print to the screen.
    Each file used under the .txt under the "posts" folder is counted as a post.
    If the page is incorrect, it will redirect you to the 404 page.
    ?q=page123     ~     page123.txt
  */
  <?=markdown(dirBlog())?>


?>
