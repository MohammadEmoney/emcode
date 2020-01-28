<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;
use Vinkla\Instagram\Instagram;

class InstagramComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $instagram = new Instagram('1621403388.1677ed0.b9f2eff851714dec9e4c20b4f3de7910');
        // $view->with(['instagram'=>  $instagram->media(['count' => 4])]);
    }
}
