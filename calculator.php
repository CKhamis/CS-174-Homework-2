<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Homework 2</title>
<style>
label {
    margin-left: 16px;
}
label.left {
    float: left;
    margin-left: 0;
    margin-right: 16px;
}
p#error {
    color: red;
}
</style>
<script type="application/javascript">
	function validateForm() {
        var val;
        val = document.getElementById("textfield1").value;
        if (val == "" || isNaN(val)) {
		  document.getElementById("error").innerHTML = "Input 1 is missing or not a valid number";
		  return false;
        }
        return true;
	}
</script>
</head>
<body>
<h1>Calculator</h1>
<form action="calculator.php" onsubmit="return validateForm();" method="post">
  <p>
    <input type="text" name="textfield1" id="textfield1"/>
    <label for="textfield1" class="left">Input 1:</label>
  </p>
  <p>
    <select name="select" id="select">
      <option value="none">Operator</option>
      <option value="plus">+</option>
      <option value="minus">-</option>
      <option value="multiply">*</option>
      <option value="divide">/</option>
    </select>
    <label for="select" class="left">Operation:</label>
  </p>
  <p>
    <input type="text" name="textfield2" id="textfield2"/>
    <label for="textfield2" class="left">Input 2:</label>
  </p>
  <p>
    <input type="submit" value="Calculate">
    </input>
  </p>
</form>
<p id="error"></p>
<?php
if ( !empty( $_POST ) ) {
  $textbox1 = $_POST[ "textfield1" ];
  $textbox2 = $_POST[ "textfield2" ];
  $operator = $_POST[ "select" ];
  $answer = 0;

  if ( empty( $textbox2 ) || !is_numeric( $textbox2 ) ) {
    echo '<p style="color: red">Input 2 is missing or not a valid number</p>';
    exit();
  }

  switch ( $operator ) {
    case "none":
      echo '<p style="color: red">Operator not selected</p>';
      break;
    case "plus":
      $answer = $textbox1 + $textbox2;
      echo( "Answer: $answer" );
      break;
    case "minus":
      $answer = $textbox1 - $textbox2;
      echo( "Answer: $answer" );
      break;
    case "multiply":
      $answer = $textbox1 * $textbox2;
      echo( "Answer: $answer" );
      break;
    case "divide":
      $answer = $textbox1 / $textbox2;
      echo( "Answer: $answer" );
      break;
  }
}
?>
</body>
</html>