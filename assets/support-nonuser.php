<html>

<head>
   <title>Support Page</title>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <script src="https://kit.fontawesome.com/5338b396e1.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="style/support-nonuser.css" />
</head>

<body>
   <!-- Support Form -->
   <main class="container">
   <div class="title">
      <h1 class="title">Contact Us</h1>
   </div>
   <form action="../admin/upload-feedback.php" method="post">
      <input type="hidden" name="status" value="unregistered"/>
      <div class="form-box">
         <div class="user-details">
            <section class="sec1">
               <label for="name">Your Name*</label>
               <input type="text" id="name" name="name" required/>
               <label for="email">Your Email*</label>
               <input type="email" id="email" name="email" required/>
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

</body>

</html>