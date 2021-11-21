<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Support\Facades\File;

    class Post {

        /**
         * @throws \Exception
         */
        public static function find($slug) {
            $path = resource_path("/posts/" . $slug . ".html");
            if (!file_exists($path)) {
                throw new ModelNotFoundException();
            }
            return cache()->remember("posts.{$slug}", 5, function () use ($path) {
                return file_get_contents($path);
            });
        }

        public static function all(): array {
            $files = File::files(resource_path("/posts/"));
            return array_map(function($file){
                return $file->getContents();
            },$files);
        }

    }
