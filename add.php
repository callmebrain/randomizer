<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Randomizer</title>
  <meta name="description" content="Random">
  <meta name="author" content="Random">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body onLoad="document.entry.name.focus()">
  <div class="container">
    <img class="logo" src="images/logo-callmebrain.png">
    <?php
    $message = NULL;
    $input = '@rmacarandang';

    if(isset($_POST['SubmitButton'])){ //check if form was submitted
      $input = $_POST['name']; //get input text
    }

    $str = file_get_contents('list.json');
    $json = json_decode($str, true);
    $total = 0;
    unset($str);

    $duplicate = false;

    foreach ($json as $key => $val) {
      if($input == $val['name'] || empty($input)) {
        $duplicate = true;
      }
    }

    if(!$duplicate) {
      $json[] = array('name' => $input);
      $message = "<br><strong>" . $input . "</strong> has been added<br>";
      $result = json_encode($json);
      file_put_contents('list.json', $result);
      unset($result);
    }
    ?>

    <form action="" method="post" name="entry">

      Name: <input type="text" name="name" autocomplete="off">
      <input type="submit" name="SubmitButton">
      <br><br>
      <div class="names">
        <?php
        echo $message;

        foreach ($json as $key => $val) {
          $total++;
          echo $val['name'] . ", ";
        }
        echo '<br><br>Total Entries: ' . $total;
        ?>

      </div>

    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
  <script src="js/script.js"></script>
</body>
</html>