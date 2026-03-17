<?php

namespace App\Traits;

trait FileTrait
{
    private function deleteFolderAndFiles($dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        foreach (scandir($dir) as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $dir . '/' . $item;

            if (is_dir($path)) {
                $this->deleteFolderAndFiles($path);
            } else {
                unlink($path);
            }
        }

        rmdir($dir);
    }


    private function deleteDemoFiles()
    {
        $this->deleteFolderAndFiles(public_path('uploads/web'));
        $this->deleteFolderAndFiles(public_path('uploads/avatar'));
        $this->deleteFolderAndFiles(public_path('uploads/blog'));
        $this->deleteFolderAndFiles(public_path('uploads/brand'));
        $this->deleteFolderAndFiles(public_path('uploads/portfolios'));
        $this->deleteFolderAndFiles(public_path('uploads/pricing'));
        $this->deleteFolderAndFiles(public_path('uploads/services'));
        $this->deleteFolderAndFiles(public_path('uploads/team'));
        $this->deleteFolderAndFiles(public_path('uploads/testimonials'));
    }

}
