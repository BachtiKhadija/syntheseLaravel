<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseController extends Controller
{
      use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
   {
    $modules = Module::all();
    $courses = Course::with('module');
    if ($request->module_id) {
        $courses = $courses->where('module_id', $request->module_id);
    }
    $courses = $courses->paginate(10);
 return view('courses.index', compact('courses', 'modules'));
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
    public function destroy(Course $course)
    {
        //
    

    $course->delete();

    return redirect()->route('courses.index');
    }

    //gérer la corbeille
    public function trash()
    {
    $courses = Course::onlyTrashed()->get();
    return view('courses.trash',compact('courses'));
    }
    public function restore($id)
     {
    $course = Course::onlyTrashed()->findOrFail($id);
    $course->restore();
    return redirect()->route('courses.trash')->with('success', 'Cours restauré');
    }
    public function forceDelete($id)
    {
    $course = Course::onlyTrashed()->findOrFail($id);
    $course->forceDelete();
    return redirect()->route('courses.trash')->with('success', 'Cours supprimé définitivement');
   }

}

