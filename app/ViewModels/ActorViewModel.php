<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Exception;
use Illuminate\Testing\Fluent\Concerns\Has;
use Intervention\Image\Facades\Image;
use Spatie\ViewModels\ViewModel;
use Rackbeat\UIAvatars\HasAvatar;

class ActorViewModel extends ViewModel
{
    public $popularActors;
    public $page;

    public function __construct($popularActors, $page)
    {
        $this->popularActors = $popularActors;
        $this->page = $page;
    }


    public function popularActors()
    {

        return collect($this->popularActors)->map(function ($actor) {

            return collect($actor)->merge([
                'profile_path' => $actor['profile_path']
                    ? 'https://image.tmdb.org/t/p/w235_and_h235_face' . $actor['profile_path']
                    : 'https://ui-avatars.com/api/?size=235&name=' . $actor['name'],
                'known_for' => collect($actor['known_for'])
                    ->where('media_type', 'movie')
                    ->pluck('title')->union(
                        collect($actor['known_for'])->where('media_type', 'tv')
                            ->pluck('name'))->implode(', ')
            ])->only([
                'name', 'id', 'profile_path', 'known_for',
            ]);
        });


    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }


    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
    /**
     * @throws Exception
     */
//    public function getAvatar($name): void
//    {
//        $image = Image::canvas(235, 235, '#f2f2f2');
//        $avatarPath = public_path('avatars/' . $name . '.png');
//        $image->text($name, 100, 100, function ($font) {
//            $font->file(public_path('avatars/' . $this->name . '.png'));
//            $font->size(24);
//            $font->align('center');
//        });
//        $image->save($avatarPath);

}
