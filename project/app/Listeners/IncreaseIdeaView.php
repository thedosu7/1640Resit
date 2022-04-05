<?php

namespace App\Listeners;

use App\Events\ViewIdeaEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class IncreaseIdeaView
{
    private $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ViewIdeaEvent  $event
     * @return void
     */
    public function handle(ViewIdeaEvent $event)
    {
        $idea = $event->idea;
        //Auto increase without session
        $idea->increment('view_count');
        //If the user did not view the idea
        if(!$this->isViewedBefore($idea)) {
            //Mark this idea is viewed by the user
            $this->markIdeaIsViewed($idea);
            //Increase view count
            $idea->increment('view_count');
        }
        /* Other way:
        $ideaKey = 'idea_' . $idea->id;
        if(!Session::has($ideaKey)) {
            $idea->increment('view_count');
            Session::put($ideaKey, 1);
        }
        */
    }

    //Check if the user did view the idea
    private function isViewedBefore(Idea $idea)
    {
        //Get viewed_ideas from the session
        $viewedIdeas = $this->session->get('viewed_ideas', []);
        //Check if the given key (id) exists in the array (viewedIdeas)
        return in_array($idea->id, $viewedIdeas);
    }

    //Mark this idea is viewed by the user
    public function markIdeaIsViewed(Idea $idea)
    {
        //Save (put) a key/value pair in the session
        $this->session->push('viewed_ideas', $idea->id);
    }
}
