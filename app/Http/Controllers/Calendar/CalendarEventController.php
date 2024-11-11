<?php

namespace App\Http\Controllers\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Religion;
use Domain\CalendarEvent\ViewModels\CalendarEventViewModel;

class CalendarEventController extends Controller
{

    /**
     * Вывод страницы Event
     */
    public function calendarEvent($slug)
    {

        $item = CalendarEventViewModel::make()->event($slug);
        $items = CalendarEventViewModel::make()->events();
        $array_events = CalendarEventViewModel::make()->array_events();
        $array_events_title = CalendarEventViewModel::make()->array_events_title();
        $array_events_link = CalendarEventViewModel::make()->array_events_link();

        return view('pages.event.event',
            [
                'item' => $item,
                'items' => $items,
                'array_events' => $array_events,
                'array_events_title' => $array_events_title,
                'array_events_link' => $array_events_link,
            ]);
    }


    /**
     * Вывод списка Events события в календаре
     */
    public function calendarEvents()
    {

        $items = CalendarEventViewModel::make()->events();
        $array_events = CalendarEventViewModel::make()->array_events();
        $array_events_title = CalendarEventViewModel::make()->array_events_title();
        $array_events_link = CalendarEventViewModel::make()->array_events_link();


        return view('pages.event.events',
            [
                'items' => $items,
                'array_events' => $array_events,
                'array_events_title' => $array_events_title,
                'array_events_link' => $array_events_link,
            ]);
    }




}
