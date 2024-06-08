<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form enctype="multipart/form-data" action="{{route('category.store')}}" method="post">
       @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="type" placeholder="type">

        <input type="file" name="image">
    
        <input type="submit" value="cree">
    </form>
</body>
</html>