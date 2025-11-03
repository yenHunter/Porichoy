<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $source = public_path('static');
        $destination = storage_path('app/public/static');

        // Ensure the destination directory exists
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        // Copy all files and subfolders from public/static to storage/app/public/static
        File::copyDirectory($source, $destination);

        $this->command->info('Static files copied to storage/app/public/static');
        // Delete the source directory after copying
        // File::deleteDirectory($source);
    }
}
