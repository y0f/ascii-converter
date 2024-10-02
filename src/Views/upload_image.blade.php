<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body class="bg-gray-900 text-gray-200 font-sans p-8">

    <div class="max-w-md mx-auto p-6 bg-gray-800 rounded-lg shadow-lg space-y-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-purple-400">Upload Image to Convert to ASCII Art</h1>

        <form action="/ascii-image" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="image" class="block text-sm font-medium mb-2 text-gray-300">Select image:</label>
                <input type="file" name="image" id="image"
                    class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                    required accept="image/*">
            </div>

            <div>
                <label for="characters" class="block text-sm font-medium mb-2 text-gray-300">Characters (default: abcdef):</label>
                <input type="text" name="characters" id="characters"
                    class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                    maxlength="255">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="font_size" class="block text-sm font-medium mb-2 text-gray-300">Font Size (default: 8):</label>
                    <input type="number" name="font_size" id="font_size" value="8"
                        class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                        min="1" max="100" required>
                </div>

                <div>
                    <label for="new_width" class="block text-sm font-medium mb-2 text-gray-300">New Width (default: 100):</label>
                    <input type="number" name="new_width" id="new_width" value="100"
                        class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                        min="1" max="1000" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="new_height" class="block text-sm font-medium mb-2 text-gray-300">New Height (default: 100):</label>
                    <input type="number" name="new_height" id="new_height" value="100"
                        class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                        min="1" max="1000" required>
                </div>

                <div>
                    <label for="line_height" class="block text-sm font-medium mb-2 text-gray-300">Line Height (default: 7):</label>
                    <input type="number" name="line_height" id="line_height" value="7"
                        class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                        min="1" max="100" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="letter_spacing" class="block text-sm font-medium mb-2 text-gray-300">Letter Spacing (default: 3.0):</label>
                    <input type="number" step="0.1" name="letter_spacing" id="letter_spacing" value="3.0"
                        class="block w-full bg-gray-700 border border-gray-600 text-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50 p-2"
                        min="0" max="10" required>
                </div>

                <div>
                    <label for="background_color" class="block text-sm font-medium mb-2 text-gray-300">Background Color (default: #000000):</label>
                    <input type="color" name="background_color" id="background_color" value="#000000"
                        class="p-1 h-10 w-14 block bg-gray-700 border border-gray-600 cursor-pointer rounded-lg focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                </div>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-600 to-indigo-500 hover:from-purple-700 hover:to-indigo-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                    Convert to ASCII Art
                </button>
            </div>
        </form>
    </div>

</body>

</html>
