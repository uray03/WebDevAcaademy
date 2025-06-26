<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('admin.modules.create', compact('course'));
    }

    public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|string',
        ]);

        Module::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.courses.show', $courseId)->with('success', 'Modul berhasil ditambahkan.');
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.modules.show', compact('module'));
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.modules.edit', compact('module'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|string',
        ]);

        $module = Module::findOrFail($id);
        $module->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.courses.show', $module->course_id)->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('admin.courses.show', $module->course_id)->with('success', 'Modul berhasil dihapus.');
    }
}
