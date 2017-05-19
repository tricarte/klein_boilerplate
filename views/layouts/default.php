<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?= $this->escape($this->pageTitle); ?></title>
  <meta name="description" content="Site description">
  <meta name="author" content="Author">

  <link rel="stylesheet" href="static/components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="static/css/styles.css">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
  <?= $this->yieldView(); ?>
  <p><a href="/api">Rest api link example</a></p>
  <script src="static/components/jquery/dist/jquery.js"></script>
  <script src="static/components/bootstrap/dist/js/bootstrap.js"></script>
  <script src="static/js/scripts.js"></script>
</body>
</html>


