<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('storeMedia')) {
    function storeMedia($file, string $path = 'avatar', $random = true) {
        $defaultUploadDir = 'uploads'; // Default base directory
        $destinationPath = public_path("{$defaultUploadDir}/{$path}");

        try {
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $fileName = generateUniqueFileName($file, $destinationPath, $random);
            $file->move($destinationPath, $fileName);

            return "{$defaultUploadDir}/{$path}/{$fileName}";

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

if (!function_exists('updateMedia')) {
    function updateMedia($newFile, ?string $oldFilePath, string $path = 'avatar', $random = true) {

        try {
            if (!empty($oldFilePath)) {
                $fullOldFilePath = public_path($oldFilePath);

                if (file_exists($fullOldFilePath)) {
                    unlink($fullOldFilePath);
                }
            }

            return storeMedia($newFile, $path, $random);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

if (!function_exists('deleteMedia')) {
    function deleteMedia(?string $filePath) {
        try {
            if (!empty($filePath)) {
                $fullFilePath = public_path($filePath);

                if (file_exists($fullFilePath)) {
                    unlink($fullFilePath);
                    return true;
                }
            }
            
            return false;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}


if (!function_exists('generateUniqueFileName')) {
    function generateUniqueFileName($file, $destinationPath, $random = true) {
        $extension = $file->getClientOriginalExtension();
        $baseName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        if ($random) {
            do {
                $uniqueId = Str::random(8);
                $fileName = Carbon::now()->format('Y-m-d') . "-{$uniqueId}.{$extension}";
            } while (file_exists("{$destinationPath}/{$fileName}"));
        } else {
            $fileName = "{$baseName}.{$extension}";

            $counter = 1;
            while (file_exists("{$destinationPath}/{$fileName}")) {
                $fileName = "{$baseName}_{$counter}.{$extension}";
                $counter++;
            }
        }

        return $fileName;
    }
}