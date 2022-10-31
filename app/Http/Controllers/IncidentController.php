<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIncidentRequest;
use App\Models\Race;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class IncidentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Incident::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incidents.index', ['incidents' => Incident::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('incidents.create', [
            'incident' => new Incident(),
            'races' => Race::protestable()->get(),
            'drivers' => User::whereHas('series')->orderBy('number')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncidentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncidentRequest $request)
    {
        $incident = Incident::create($request->validated());

        return redirect(route('incidents.show', $incident));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        return view('incidents.show', [
            'incident' => $incident,
            'race' => $incident->race()->first(),
            'series' => $incident->race()->first()->series()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Incident $incident)
    {
        return view('incidents.edit', [
            'incident' => $incident,
            'races' => Race::protestable()->get(),
            'drivers' => User::whereHas('series')->orderBy('number')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncidentRequest  $request
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIncidentRequest $request, Incident $incident)
    {
        $incident->update($request->validated());

        return redirect(route('incidents.show', $incident));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
            $incident->deleteOrFail();

            return redirect(route('incidents.index'));
    }
}
