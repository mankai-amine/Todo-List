<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($pageTitle) ?></title>
    <base href="<?= ($BASE) ?>/public/">
    <link rel="stylesheet" href="styles/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="row">
    <div class="navbar col-2">
        <ul>
            <li><a href="<?= ($BASE) ?><?= (Base::instance()->alias('home')) ?>">Home</a>
            <li><a href="<?= ($BASE) ?><?= (Base::instance()->alias('account')) ?>">Account</a> 
            <li><a href="<?= ($BASE) ?><?= (Base::instance()->alias('contact')) ?>">Contact</a>
        </ul>
    </div>
    <div class="content col-5">
        <h2>WELCOME</h2>
        <hr class="custom-hr">
        <ul class="features-list">
            <li>Manage Tasks</li>
            <li>Complete Deadlines</li>
            <li>Free to use</li>
        </ul>
        <hr class="custom-hr">
        <h2>MAIN FEATURES</h2>
        <ul class="features-list">
            <li>Task categorization</li>
            <li>Deadline reminders</li>
            <li>Intuitive interface</li>
        </ul>
        <hr class="custom-hr">
        <h2>GET STARTED</h2>
        <button class="signup-btn">Sign Up</button>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>