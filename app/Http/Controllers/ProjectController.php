<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type_id' => 'nullable|exists:types,id'
    ]);

    $project = new \App\Models\Project($request->all());
    $project->save();

    return redirect()->route('projects.index');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type_id' => 'nullable|exists:types,id'
    ]);

    $project = \App\Models\Project::findOrFail($id);
    $project->update($request->all());

    return redirect()->route('projects.index');
}

