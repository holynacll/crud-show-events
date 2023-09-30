<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowEventResource;
use App\Models\ShowEvent;
use Illuminate\Http\Request;
use App\Http\Requests\ShowEventRequest;

class ShowEventController extends Controller
{
    public function index()
    {
        return ShowEventResource::collection(ShowEvent::orderBy('updated_at', 'desc')->paginate(5));
    }

    public function store(ShowEventRequest $request)
    {
        $showEvent = ShowEvent::create($request->validated());
        return new ShowEventResource($showEvent);
    }

    public function show(ShowEvent $showEvent)
    {
        return new ShowEventResource($showEvent);
    }

    public function update(ShowEventRequest $request, ShowEvent $showEvent)
    {
        $showEvent->update($request->validated());
        return new ShowEventResource($showEvent);
    }

    public function destroy(ShowEvent $showEvent)
    {
        $showEvent->delete();
        return response()->noContent();
    }
}
