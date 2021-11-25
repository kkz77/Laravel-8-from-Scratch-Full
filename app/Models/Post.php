<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use Illuminate\Support\Facades\File;
    use Spatie\YamlFrontMatter\YamlFrontMatter;

    class Post {

        public $title;
        public $date;
        public $slug;
        public $excerpt;
        public $body;

        public function __construct($title, $excerpt, $slug, $date, $body) {
            $this->title = $title;
            $this->excerpt = $excerpt;
            $this->slug = $slug;
            $this->date = $date;
            $this->body = $body;
        }

        /**
         * @throws \Exception
         */
        public static function find($slug) {
            $post = static::all();
            return $post->firstWhere('slug', $slug);
        }

        public static function findOrFail($slug){
            $post = static::find($slug);
            if(!$post){
                throw new ModelNotFoundException();
            }
            return $post;
        }

        /**
         * @throws \Exception
         */
        public static function all() {
            return cache()->rememberForever('posts.all', function () {
                return collect(File::files(resource_path("/posts/")))->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })->map(function ($document) {
                    return new Post($document->title, $document->excerpt, $document->slug, $document->date, $document->body());
                })->sortByDesc('date');
            });
        }

    }
