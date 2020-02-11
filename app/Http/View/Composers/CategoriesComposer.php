<?php

namespace App\Http\View\Composers;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $category;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Category $category)
    {
        // Dependencies automatically resolved by service container...
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(['categories'=>  Category::with('articles')->take(5)->get(), 'articles' => ArticleView::mostPopularArticles(3)]);
    }
}
