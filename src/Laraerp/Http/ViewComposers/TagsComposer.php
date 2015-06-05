<?php namespace Laraerp\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Laraerp\Tag;

class TagsComposer {

    /**
     * Create a new Tags composer.
     *
     * @param  \Laraerp\Tag  $users
     * @return void
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        /*
         * Listando Tags
         */
        $view->with('tags', $this->tag->distinct()->get(['nome']));
    }

}