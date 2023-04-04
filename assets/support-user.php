<?php
$title = "Support Page";
$css = "support-user.css";
$js = "";

include("header.php");
?>
<!-- Support Form -->
<main class="container">
   <div class="title">
      <h1 class="title letter-spacing">Contact Us</h1>
   </div>
   <form action="../admin/upload-feedback.php" method="post">
      <input type="hidden" name="status" value="registered"/>
      <div class="form-box">
         <div class="user-details">
            <section class="sec1">
               <label for="contact">Your Contact Number*</label>
               <input type="text" id="contact" name="contact" placeholder="E.g. 012-5070061" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required/>
               <label for="subject">Your Subject*</label>
               <input type="text" id="subject" name="subject" required/>
            </section>
            <section class="sec2">
               <label for="desc">Description*</label>
               <textarea name="desc" id="desc" maxlength="1000" placeholder="Write Something Here..." required></textarea>
            </section>
         </div>
         <div class="submit-button">
            <input type="submit" value="Submit" class="submit" />
         </div>
      </div>
   </form>
</main>
<?php
include("footer.php");
?>