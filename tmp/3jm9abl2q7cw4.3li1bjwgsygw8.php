<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= ($pageTitle) ?></title>
        <base href="<?= ($BASE) ?>/public/">
        <link rel="stylesheet" href="styles/style.css">
    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

<body class="row">

    <div class="navbar col-3 col-md-2">
        <ul>
          <li><a class="link" href="<?= ($BASE) ?><?= (Base::instance()->alias('account')) ?>">Home</a>
          <li><a class="link" href="<?= ($BASE) ?><?= (Base::instance()->alias('login')) ?>">Login</a>
          <li><a class="link" href="<?= ($BASE) ?><?= (Base::instance()->alias('contact')) ?>">Contact</a>
        </ul>
    </div>

	<main class="col-9 col-md-10">
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

