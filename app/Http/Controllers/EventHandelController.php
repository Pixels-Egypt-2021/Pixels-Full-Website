<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Traits\GeneralTrait;


class EventHandelController extends Controller
{
    use GeneralTrait ;

    public function index() {
        $events = Event::all();
        return $this->returnData("events",$events,"data reseved");
    }
}
