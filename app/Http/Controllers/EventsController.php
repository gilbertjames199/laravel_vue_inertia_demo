<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EventsController extends Controller
{
    public function show(Event $event)
    {
        return inertia('Welcome');

    }
}
