<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait HandleImagesUploadTrait
{
    /**
     * Upload an image to a specific directory.
     *
     * @param UploadedFile|null $image
     * @param string $directory Path inside the 'public' disk
     * @return string|null The unique image name or null if no image provided
     */
    public function uploadImage(?UploadedFile $image, string $directory)
    {
        if (!$image) {
            return null;
        }

        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs($directory, $imageName, 'public');

        return $imageName;
    }

    /**
     * Upload a new image and delete the old one if it exists.
     *
     * @param string|null $oldImageName Name of the existing image file
     * @param UploadedFile|null $newImage
     * @param string $directory Path inside the 'public' disk
     * @return string|null The new unique image name or the old one if no new image provided
     */
    public function uploadImageAndDeleteOld(?string $oldImageName, ?UploadedFile $newImage, string $directory)
    {
        if (!$newImage) {
            return $oldImageName;
        }

        $this->deleteImageFile($oldImageName, $directory);

        return $this->uploadImage($newImage, $directory);
    }

    /**
     * Delete an image file from storage.
     *
     * @param string|null $imageName
     * @param string $directory Path inside the 'public' disk
     * @return bool
     */
    public function deleteImageFile(?string $imageName, string $directory)
    {
        if ($imageName && Storage::disk('public')->exists($directory . '/' . $imageName)) {
            return Storage::disk('public')->delete($directory . '/' . $imageName);
        }

        return false;
    }
}