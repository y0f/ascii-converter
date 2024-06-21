<!DOCTYPE html>
<html>

<head>
    <title>Upload Image</title>
    <!-- dependency -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-8">

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Upload Image to Convert to ASCII Art</h1>

        <form action="/ascii-image" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Select image:</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </div>

            <div class="mb-4">
                <label for="characters" class="block text-sm font-medium text-gray-700">Characters (default:
                    abcdef):</label>
                <input type="text" name="characters" id="characters"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div class="grid grid-cols-2 gap-x-4">
                <div class="mb-4">
                    <label for="font_size" class="block text-sm font-medium text-gray-700">Font Size (default:
                        8):</label>
                    <input type="number" name="font_size" id="font_size" value="8"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="new_width" class="block text-sm font-medium text-gray-700">New Width (default:
                        100):</label>
                    <input type="number" name="new_width" id="new_width" value="100"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-x-4">
                <div class="mb-4">
                    <label for="line_height" class="block text-sm font-medium text-gray-700">Line Height (default:
                        7):</label>
                    <input type="number" name="line_height" id="line_height" value="7"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="letter_spacing" class="block text-sm font-medium text-gray-700">Letter Spacing (default:
                        3.0):</label>
                    <input type="number" step="0.1" name="letter_spacing" id="letter_spacing" value="3.0"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <div class="mb-4">
                <label for="background_color" class="block text-sm font-medium text-gray-700">Background Color (default:
                    #000000):</label>
                <input type="color" name="background_color" id="background_color" value="#000000"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:ring-opacity-50">Convert
                    to ASCII Art</button>
            </div>
        </form>
    </div>

</body>

</html>
