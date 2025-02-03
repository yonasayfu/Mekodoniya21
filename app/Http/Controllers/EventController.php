<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Catering;
use App\Models\Event;
use App\Models\Facility;
use App\Models\Staff;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    // Display a list of events
    public function index(Request $request)
    {
        $category = $request->input('category');
        $events = Event::query()
            ->when($category, function ($query, $category) {
                $query->where('category', $category);
            })
            ->with(['facility', 'staff', 'catering'])
            ->get();

        $categories = [
            "Wedding",
            "Birthday",
            "Death Rember",
            "Graduations",
            "Nika",
        ];

        return Inertia::render('Events/Index', [
            'events' => $events,
            'availableCategories' => $categories,
        ]);
    }

    // Show the form for creating a new event
    public function create()
    {
        return Inertia::render('Events/Create', [
            'facilities' => Facility::select('id', 'name')->get(),
            'staff' => Staff::select('id', 'name')->get(),
            'caterings' => Catering::select('id', 'name')->get(),
            'categories' => [
                "Wedding",
                "Birthday",
                "Death Rember",
                "Graduations",
                "Nika",
            ],
            'eventTypes' => [
                'Wedding' => 'wedding ceremony',
                'Birthday' => 'birthday party',
                'Death Rember' => 'memorial service',
                'Graduations' => 'graduation ceremony',
                'Nika' => 'religious ceremony',
            ],
        ]);
    }


    // Store a newly created event in the database
    public function store(StoreEventRequest $request)
    {
        $validated = $request->validated();

       // Fix: Calculate status properly
        $eventDate = \Carbon\Carbon::parse($validated['date']);
        $now = \Carbon\Carbon::now();

        $validated['status'] = $eventDate->isPast()
            ? 'done'
            : 'upcoming';
        
        // Fix: Consistent type mapping
        $typeMapping = [
            'Wedding' => 'wedding ceremony',
            'Birthday' => 'birthday party',
            'Death Rember' => 'memorial service', // Match your category spelling
            'Graduations' => 'graduation ceremony',
            'Nika' => 'religious ceremony',
        ];

        $validated['type'] = $typeMapping[$validated['category']];
        
        Event::create($validated);

        // Add success message
        return redirect()->route('events.index')
            ->with('success', 'Event created successfully!');
    }


    // Display the specified event
    public function show(Event $event)
    {
        return Inertia::render('Events/Show', ['event' => $event]);
    }
}