<?php
$title = "Post Your Blog";
$css = "post-blog.css";
$js = "postblog.js";

include ("header.php");
include ("../includes/config.php");

$stmt = $db->prepare("SELECT * FROM blog_category");
$stmt->execute();
$stmt->store_result();
$row_count = $stmt->num_rows;

?>
<main class="main">
  <section class="grid-container">
    <?php include 'sidebar.php';
    
    if (isset($_GET['destination'])){
      //Define switch cases for different pages

      $destination = $_GET['destination'];

      switch ($destination){

          case 'trending':
              echo '<script>window.location.href = "blog-home.php?destination=trending"; </script>';
          
          case 'category':
              echo '<script>window.location.href = "blog-home.php?destination=category"; </script>';

          case 'recent':
              echo '<script>window.location.href = "blog-home.php?destination=recent"; </script>';

          default:
              echo '<script>window.location.href = "blog-home.php"; </script>';

      };
  };
    ?>
    <div class="content-container">
      <div class="input-container">
        <h1>
          Create a post
        </h1>
        <form class="input-form" action="../admin/upload-post.php" method="post" enctype="multipart/form-data">
          <div class="btitle">
            <input type="text" name="title" class="word__input shaded" autocomplete="off" placeholder=" " required>
            <label for="title" class="word__label">Blog Title</label>
          </div>

          <div class="bcategory shaded">
          <label for="category">Blog Category: </label>
            <select name="category" required>
              <option value="">Please Select:</option>
            <?php
              // Check if results are returned
              if ($row_count > 0){
                $stmt->bind_result($id, $name);

                while ($stmt->fetch()){
                  printf ('<option value="%s">%s</option>', $id, $name);
                };
              };
            
            ?>
            </select>
          </div>

          <div class="bcontent">
            <textarea name="content" class="word__input shaded" placeholder=" " required></textarea>
            <label for="content" class="word__label">Blog content</label>
          </div>

          <div class="bimage shaded">
            <span>Upload your picture here:</span></br>
            <img id="display_image"></br>
            <input type="file" name="pic" id="input_image" accept="image/jpeg, image/png, image/jpg">
          </div>

          <div class="text-right">
            <input class="submit-button" type="submit" value="Submit">
          </div>
        </form>
      </div>

    </div>
  </section>
</main>
<?php
include ("footer.php");
?>