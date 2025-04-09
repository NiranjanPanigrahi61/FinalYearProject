<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add A Product</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Image</label> <br>
        <input type="file" name="image" required> <br><br>
        <input type="submit" value="Add" name="submit">
    </form>
</body>

</html>