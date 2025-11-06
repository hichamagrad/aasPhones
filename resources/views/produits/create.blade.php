<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" action="{{route('product.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="file" name="image" placeholder="image">
        <input type="text" name="prix" placeholder="prix">
        <input type="text" name="discription" placeholder="description">
        <select name="category_id" id="">
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach 
        </select>
        <input type="submit" value="cree_produit">
    </form>
</body>
</html>