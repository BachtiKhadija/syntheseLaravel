<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

class CourseCategoryController extends Controller
{
    //
    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('courses.categories', compact(
            'course',
            'categories'
        ));
    }

     public function update(Request $request, Course $course)
    {
        $request->validate([
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // sync ajoute/supprime automatiquement
        $course->categories()->sync(
            $request->categories ?? []
        );

        return redirect()
            ->route('courses.index')
            ->with('success', 'Catégories mises à jour avec succès');
    }


}
