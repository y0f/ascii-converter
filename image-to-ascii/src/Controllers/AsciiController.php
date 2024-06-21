<?php

namespace Y0f\ImageToAscii\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Y0f\ImageToAscii\ImageToAsciiTrait;

class AsciiController extends Controller
{
    use ImageToAsciiTrait;

    public function showAsciiImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'characters' => 'nullable|string|max:255',
            'font_size' => 'nullable|integer|min:1|max:100',
            'new_width' => 'nullable|integer|min:1|max:1000',
            'line_height' => 'nullable|integer|min:1|max:100',
            'letter_spacing' => 'nullable|numeric|min:0|max:10',
            'background_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/'
        ]);
    
        $imagePath = $request->file('image')->path();
        $characters = $request->input('characters', 'abcdef');
        $fontSize = $request->input('font_size', 8);
        $newWidth = $request->input('new_width', 100);
        $lineHeight = $request->input('line_height', 7);
        $letterSpacing = $request->input('letter_spacing', 3.0);
        $backgroundColor = $request->input('background_color', '#000000');
    
        $asciiArt = $this->convertToAsciiArt(
            $imagePath, 
            $characters, 
            $fontSize, 
            $newWidth, 
            $lineHeight, 
            $letterSpacing, 
            $backgroundColor
        );
    
        return view('image-to-ascii::view_image', compact('asciiArt'));
    }
    

    public function showForm()
    {
        return view('image-to-ascii::upload_image');
    }
}