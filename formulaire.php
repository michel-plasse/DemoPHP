<?php

/** Exemple of a form sent to the same url */
// Error messages
$messages = array();
switch ($_SERVER["REQUEST_METHOD"]) {
  case "GET":
    display_form();
    break;
  case "POST":
    do_post();
    break;
  default:
    die("Not implemented");
}

function display_form() {
  // Use global variable $messages
  global $messages;
  // Get input value if any
  $dish = ($_SERVER["REQUEST_METHOD"] == "GET") ? "" : $_POST["dish"];
  if (!array_key_exists("dish", $messages)) {
    $messages["dish"] = "";
  }
  else {
    $messages["dish"] = "<span style='color: red;'>$messages[dish]</span>";
  }
  // Print the form
?>
  <form method="POST">
    Your favorite dish:
    <input type="text" name="dish" value="<?= $dish ?>"/>
    <?= $messages["dish"]?>
    <br/>
    <button type="submit">Submit</button>
  </form>
<?php
}

function do_post() {
  global $messages;
  $dish = (empty($_POST["dish"])) ? "" : (trim($_POST["dish"]));
  if ($dish == "") {
    $messages["dish"] = "Dish must be set";
    display_form();
  }
  else if (strlen($dish) < 3) {
    $messages["dish"] = "Dish must have at least 3 characters";
    display_form();
  }
  else {
    // Some processing (register in DB for example)
    print "Your choice <em>$dish</em> has been saved";
  }
}
