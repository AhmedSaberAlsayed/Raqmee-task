<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="flex items-center justify-center w-full h-full">
        <form class="p-5 w-1/2 flex flex-col items-center bg-gray-200 rounded-lg shadow-md"
              action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="p-3 mb-4 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   type="text" name="title" placeholder="Enter your title">
            @error('title')
                <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
            @enderror

            <input class="p-3 mb-4 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   type="text" name="body" placeholder="Enter your content">
            @error('body')
                <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
            @enderror

            <input class="p-3 mb-4 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   type="file" name="image">
            @error('image')
                <div class="text-red-500 text-sm mb-4">{{ $message }}</div>
            @enderror

            <button class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg w-1/4" type="submit">
                Add Post
            </button>
        </form>
    </div>
</body>
</html>
