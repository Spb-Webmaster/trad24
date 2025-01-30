<?php

namespace Domain\CalendarEvent\ViewModels;

use App\Models\CalendarEvent;
use App\Models\Info;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CalendarEventViewModel
{
    use Makeable;

    public function event($slug)
    {

        $event = CalendarEvent::query()
            ->where('slug', $slug)
            ->where('published', true)
            ->first();

        return $event;

    }

    public function events()
    {
        $events = CalendarEvent::query()
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(config('site.constants.paginate'));
        return $events;
    }
    public function events20()
    {
        $events = CalendarEvent::query()
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return $events;
    }

    public function array_events()
    {
        $events = CalendarEvent::query()
            ->select('created_at')
            ->where('published', true)
            ->get();
        if($events) {
            $len = count($events);

            $a = '[';
            foreach ($events as $key => $date) {

                $a .= '[';
                $a .= ($date->created_at->format('n'));
                $a .=',';
                $a .= ($date->created_at->format('j'));
                $a .=',';
                $a .= ($date->created_at->format('Y'));

                if ($key == $len - 1) {
                    $a .=']';

                }else {
                    $a .='],';
                }


            }
            $a .=']';



            return $a;
        }
        return  [];
    }

    public function array_events_title()
    {
        $events = CalendarEvent::query()
            ->select('title', 'teaser')
            ->where('published', true)
            ->get();
        if($events) {
            $len = count($events);

            $a = '[';
            foreach ($events as $key => $item) {
                $a .='"';
                if($item->teaser) {
                    $text = trim($item->teaser);
                } else {
                    $text = trim($item->title);
                }

                $a .= htmlspecialchars($text);

                if ($key == $len - 1) {
                    $a .='"';

                }else {
                    $a .='",';
                }


            }
            $a .=']';



            return $a;
        }
        return  [];
    }






 public function array_events_link()
    {
        $events = CalendarEvent::query()
            ->select( 'slug')
            ->where('published', true)
            ->get();
        if($events) {
            $len = count($events);

            $a = '[';
            foreach ($events as $key => $item) {
                $a .='"';

                    $a .= route('calendarEvent', ['slug' => trim($item->slug)]);




                if ($key == $len - 1) {
                    $a .='"';

                }else {
                    $a .='",';
                }


            }
            $a .=']';



            return $a;
        }
        return  [];
    }


}
