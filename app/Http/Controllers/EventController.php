<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * show list of event
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $events = Event::query()
            ->orderBy('EVENT_ID', 'DESC')
            ->where('VALID_YN', 'Y')
            ->where('EVENT_TYPE','002')
            ->paginate(12, ['event_id', 'image', 'summary', 'title']);

        return view('event.index', compact('events'));
    }

    /**
     * show detail event
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::query()->findOrFail($id);

        if ($event->content_id == null){
            abort(404);
        }

        $otherEvent = Event::query()->whereKeyNot($id)->limit(10)->orderBy('EVENT_ID', 'DESC')->get();
        $event->content = $this->readContent($event->content_id);

        return view('event.detail', compact('otherEvent', 'event'));
    }

    /**
     * recursive content of event
     *
     * @param $contentID
     * @return mixed|string
     */
    private function readContent($contentID)
    {
        $content = Content::query()->find($contentID);
        $contentData = $content->content;

        if ($content->next) {
            $contentData .= $this->readContent($content->next);
        }

        return $contentData;
    }
}
