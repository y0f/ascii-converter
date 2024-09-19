<?php

namespace Y0f\ImageToAscii;

use Exception;
/**
 * A class for converting images into an ASCII representation.
 * Made by github.com/y0f
 */
class ImageToAsciiConverter
{
    private $image;
    private $width;
    private $height;

    /**
     * Loads the image from the given path.
     *
     * @param string $imagePath Path to the image file.
     * @throws Exception
     */
    public function loadImage(string $imagePath): void
    {
        $type = exif_imagetype($imagePath);
        switch ($type) {
            case IMAGETYPE_PNG:
                $this->image = imagecreatefrompng($imagePath);
                break;
            case IMAGETYPE_JPEG:
                $this->image = imagecreatefromjpeg($imagePath);
                break;
            default:
                throw new Exception('Invalid image type');
        }

        $this->width = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    /**
     * Resizes the loaded image to specified width and height while maintaining aspect ratio.
     *
     * @param int|null $newWidth New width for the resized image.
     * @param int|null $newHeight New height for the resized image.
     * @return \GdImage The resized image resource.
     * @throws Exception
     */
    public function resizeImage(?int $newWidth, ?int $newHeight): \GdImage
    {
        if ($newWidth === null && $newHeight === null) {
            $newWidth = $this->width;
            $newHeight = $this->height;
        } elseif ($newWidth === null) {
            $aspectRatio = $this->width / $this->height;
            $newWidth = (int)($newHeight * $aspectRatio);
        } elseif ($newHeight === null) {
            $aspectRatio = $this->height / $this->width;
            $newHeight = (int)($newWidth * $aspectRatio);
        }

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        if (!$resizedImage) {
            throw new Exception('Error creating image');
        }

        imagecopyresampled($resizedImage, $this->image, 0, 0, 0, 0, $newWidth, $newHeight, $this->width, $this->height);
        imagefilter($resizedImage, IMG_FILTER_CONTRAST, 10);

        return $resizedImage;
    }

    /**
     * Converts the resized image to its ASCII representation.
     *
     * @param \GdImage $resizedImage The resized image resource.
     * @param string $characters Set of characters to use for the ASCII conversion.
     * @return string HTML representation of ASCII art.
     */
    public function convertToAscii(\GdImage $resizedImage, string $characters): string
    {
        $width = imagesx($resizedImage);
        $height = imagesy($resizedImage);
        $asciiHtml = '';

        for ($h = 0; $h < $height; $h++) {
            for ($w = 0; $w < $width; $w++) {
                $asciiHtml .= $this->getPixelAsAscii($resizedImage, $w, $h, $characters);
            }
            $asciiHtml .= "\n";
        }

        return $asciiHtml;
    }

    /**
     * Returns a pixel from the resized image as an ASCII character.
     *
     * @param \GdImage $resizedImage The resized image resource.
     * @param int $w X-coordinate of the pixel.
     * @param int $h Y-coordinate of the pixel.
     * @param string $characters Set of characters to use for the ASCII conversion.
     * @return string HTML span element for ASCII character.
     */
    public function getPixelAsAscii(\GdImage $resizedImage, int $w, int $h, string $characters): string
    {
        $rgb = ImageColorAt($resizedImage, $w, $h);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        if ($r > 240 && $g > 240 && $b > 240) {
            return '&nbsp;';
        } else {
            $hex = sprintf("#%02x%02x%02x", $r, $g, $b);
            return '<span style="color:' . $hex . ';">' . $characters[rand(0, strlen($characters) - 1)] . '</span>';
        }
    }

    /**
     * Constructs the ASCII art representation of the image.
     *
     * @param string $characters Set of characters to use for the ASCII conversion.
     * @param int $fontSize Font size for the ASCII representation.
     * @param int|null $newWidth New width for the resized image.
     * @param int|null $newHeight New height for the resized image.
     * @param int $lineHeight Line height for the ASCII representation.
     * @param float $letterSpacing Letter spacing for the ASCII representation.
     * @param string $backgroundColor Background color for the ASCII representation.
     * @return string Complete HTML representation of the ASCII art.
     */
    public function convertImageToAscii(
        string $characters, 
        int $fontSize, 
        ?int $newWidth,
        ?int $newHeight,
        int $lineHeight = 7, 
        float $letterSpacing = 3.0,
        string $backgroundColor = "#000000"
    ): string
    {
        $resizedImage = $this->resizeImage($newWidth, $newHeight);
        $asciiArt = $this->convertToAscii($resizedImage, $characters);

        $styles = "line-height: {$lineHeight}px; letter-spacing: {$letterSpacing}px;";

        return "<div style=\"display: flex; justify-content: center; align-items: center; background-color: {$backgroundColor};\">"
            . "<pre style=\"font-size: {$fontSize}px; font-weight: bold; padding: 0px; {$styles}\">"
            . $asciiArt
            . '</pre></div>';
    }

    /**
     * Converts the loaded image to ASCII using specified parameters.
     *
     * @param string $imagePath Path to the image file.
     * @param string $characters Set of characters to use for the ASCII conversion.
     * @param int $fontSize Font size for the ASCII representation.
     * @param int|null $newWidth New width for the resized image.
     * @param int|null $newHeight New height for the resized image.
     * @param int $lineHeight Line height for the ASCII representation.
     * @param float $letterSpacing Letter spacing for the ASCII representation.
     * @param string $backgroundColor Background color for the ASCII representation.
     * @return string HTML representation of ASCII art.
     * @throws Exception
     */
    public function convertToAsciiArt(
        string $imagePath, 
        string $characters = "y0f", 
        int $fontSize = 8, 
        ?int $newWidth = null,
        ?int $newHeight = null,
        int $lineHeight = 7, 
        float $letterSpacing = 3.0,
        string $backgroundColor = "#000000"
    ): string
    {
        $this->loadImage($imagePath);
        return $this->convertImageToAscii($characters, $fontSize, $newWidth, $newHeight, $lineHeight, $letterSpacing, $backgroundColor);
    }
}

