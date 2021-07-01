<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<select id="comboA" onchange="getComboA(this)">
  <option value="">Select combo</option>
  <option value="Value1">Text1</option>
  <option value="Value2">Text2</option>
  <option value="Value3">Text3</option>
</select>
<script>
function getComboA(selectObject) {
  var value = selectObject.value;  
  console.log(value);
}

</script>
</body>
</html>