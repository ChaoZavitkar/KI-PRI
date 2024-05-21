<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Character sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold mb-4 text-center">Main Page</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-white shadow-md p-4 rounded">
                <h2 class="text-xl font-bold mb-2">Seznam Charakterů</h2>
                <a href="xml/characters.xml" class="text-blue-500 hover:underline">View</a>
            </div>
            <div class="bg-white shadow-md p-4 rounded">
                <h2 class="text-xl font-bold mb-2">Nahrát charakter</h2>
                <a href="uploadChar.php" class="text-blue-500 hover:underline">Upload</a>
            </div>
            <div class="bg-white shadow-md p-4 rounded">
                <h2 class="text-xl font-bold mb-2">Vytvořit charakter</h2>
                <a href="createChar.php" class="text-blue-500 hover:underline">Create</a>
            </div>
        </div>
    </div>
</body>

</html>