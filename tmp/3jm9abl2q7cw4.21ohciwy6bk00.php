<?php echo $this->render('includes/loggedHeader.html',NULL,get_defined_vars(),0); ?>

  <main class="col-5 p-4">
    <h2>YOUR ACCOUNT</h2>
    <hr class="custom-hr">


    <form id="accountForm" action="" method="post">
      <label for="name">name</label>
      <div class="d-flex mb-3">
        <input class="form-input"  id="name" name="name" placeholder="your name" disabled required value="<?= ($item['name']) ?>">
        <button class="signup-btn changeButton">change</button>
      </div>

      <label for="email">email</label>
      <div class="d-flex mb-3">
        <input class="form-input" type="email"  id="email" name="email" placeholder="your email" disabled required value="<?= ($item['email']) ?>">
        <button class="signup-btn changeButton">change</button>
      </div>

      <label for="password ">password</label>
      <div class="d-flex mb-3">
        <input class="form-input"  id="password" name="password" placeholder="********" disabled required value="<?= ($item['password']) ?>">
        <button class="signup-btn changeButton">change</button>
      </div>



      <div class="row p-3">
        <button class="signup-btn" type="submit">Save Changes</button>
      </div>
      
    </form>
    
    <div class="errors">
      <?php if ($errors): ?>
          <p><?= (implode("<br>", $errors)) ?></p>
      <?php endif; ?>
    </div>

  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../public/js/script.js"></script>
</body>
</html>