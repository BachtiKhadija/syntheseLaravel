<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses=Course::paginate(5);
        return view('Courses.index',compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Courses.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // Upload image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        // Sauvegarde
        Course::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null,
        ]);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->authorize('update', $course);

    $course->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
    ]);

    return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         $this->authorize('delete', $course);

    $course->delete();

    return redirect()->route('courses.index');
}
    }

