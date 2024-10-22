<?php

namespace Y0f\ImageToAscii\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Y0f\ImageToAscii\ImageToAsciiConverter;
use Exception;

class AsciiController extends Controller
{
    /**
     * Show the ASCII image generated from the uploaded image.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showAsciiImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png|max:2048',
            'characters' => 'nullable|string|max:255',
            'font_size' => 'nullable|integer|min:1|max:100',
            'new_width' => 'nullable|integer|min:1|max:1000',
            'new_height' => 'nullable|integer|min:1|max:1000',
            'line_height' => 'nullable|integer|min:1|max:100',
            'letter_spacing' => 'nullable|numeric|min:0|max:10',
            'background_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/'
        ]);

        try {
            $imagePath = $validatedData['image']->path();
            
            // Options for ASCII conversion
            $options = [
                'characters' => $validatedData['characters'] ?? '#$%0=',
                'font_size' => $validatedData['font_size'] ?? 8,
                'new_width' => $validatedData['new_width'] ?? 100,
                'new_height' => $validatedData['new_height'] ?? 100,
                'line_height' => $validatedData['line_height'] ?? 7,
                'letter_spacing' => $validatedData['letter_spacing'] ?? 3.0,
                'background_color' => $validatedData['background_color'] ?? '#000000'
            ];

            $converter = new ImageToAsciiConverter();
            $asciiArt = $converter->convertToAsciiArt($imagePath, ...array_values($options));

            return view('image-to-ascii::view_image', compact('asciiArt'));
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Failed to generate ASCII art: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form to upload an image.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('image-to-ascii::upload_image');
    }
}

