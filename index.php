<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BuilderMail</title>

  
</head>
<body>

  <h2>Carica il file .zip</h2>
  <form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
    <p>Non caricare ZIP troppo grandi!</p>
    <input type="file" name="my_file" />
    <input type="submit" name="submit" value="Carica"/>
  </form>

</body>
<script src="app.js"></script>

<script>
  window.onload = () => {
    document.querySelector('.file');
  }
</script>
</html>