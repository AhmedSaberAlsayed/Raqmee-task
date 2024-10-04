<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class=" d-flex m-0 g-3 align-items-center justify-content-center  " style="height: 100vh">
        <form class="p-5 w-50 g-3 flex-column d-flex justify-content-center align-items-center" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" style="background-color: rgb(235, 232, 232);border-radius:1rem;box-shadow:0 0 15px 1px rgb(152, 149, 149)" >
            @csrf
            <input class="form-control p-3  mb-4" type="text" name="title" placeholder="Enter your title">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input class="form-control p-3 mb-4" type="text"  name="body" placeholder="Enter your content">
        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <input class="form-control p-3 mb-4" type="file" name="image">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <button class="btn  btn-secondary w-25" type="submit">Add post</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
