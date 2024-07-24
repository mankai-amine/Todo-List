<?php echo $this->render('includes/header.html',NULL,get_defined_vars(),0); ?>

	<main class="col-md-9 col-lg-10">
        <div class="pageContent">
            <h2>LOG IN</h2>

            <form class="col-8 col-sm-7 col-md-5" action="" method="post">
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input id="email" name="email" type="text" required="required" class="form-control" value="<?= ($item['email']) ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" name="password" type="text" required="required" class="form-control" value="<?= ($item['password']) ?>">
                </div>

                <div class="form-group">
                    <button name="btnSubtmit" type="submit" class="signup-btn mt-2">Login</button>
                </div>
                <div class="form-group">
                    <a href="<?= ($BASE) ?><?= (Base::instance()->alias('signup')) ?>">Or create a new account</a>
                </div>
            </form>

            <div class="errors">
                <?php if ($errors): ?>
                    <p><?= (implode("<br>", $errors)) ?></p>
                <?php endif; ?>
            </div>
             
        </div>
    </main>

</body>

</html>

