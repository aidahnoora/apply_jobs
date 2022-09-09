<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index() {
        $skills = Skill::orderBy('created_at', 'DESC')->get();

        return view('skill.index', compact('skills'));
    }

    public function create()
    {
        return view('skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Skill::create([
            'name' => $request->name
        ]);

        return redirect('skill')->with('success', 'Berhasil!');
    }

    public function edit($id)
    {
        $skills = Skill::findorfail($id);

        return view('skill.edit', compact('skills'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Skill::findorfail($id);

        $post_data = [
            'name' => $request->name,
        ];

        $post->update($post_data);

        return redirect('skill')->with('success', 'Berhasil!');
    }

    public function destroy(Request $request, $id)
    {
        $skills = Skill::find($id);
        $skills->delete();

        return redirect('skill')->with('success', 'Berhasil!');
    }
}
