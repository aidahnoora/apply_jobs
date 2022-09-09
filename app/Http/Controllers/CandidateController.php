<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Skill;

class CandidateController extends Controller
{
    public function index() {
        $candidates = Candidate::with('job')->with('skill')->orderBy('created_at', 'DESC')->get();

        return view('candidate.index', compact('candidates'));
    }

    public function create()
    {
        $jobs = Job::get();
        $skills = Skill::get();

        return view('candidate.create', compact(['jobs', 'skills']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required',
        ]);

        $post = Candidate::create([
            'job_id' => $request->job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'year' => $request->year,
        ]);

        $post->skill()->attach($request->skill_id);

        return redirect('candidate')->with('success', 'Berhasil!');
    }

    public function edit($id)
    {
        $candidates = Candidate::findorfail($id);
        $jobs = Job::get();
        $skills = Skill::get();

        return view('candidate.edit', compact(['candidates', 'jobs', 'skills']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required'
        ]);

        $post = Candidate::findorfail($id);

        $post_data = [
            'job_id' => $request->job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'year' => $request->year,
        ];

        $post->skill()->sync($request->skill_id);
        $post->update($post_data);

        return redirect('candidate')->with('success', 'Berhasil!');
    }

    public function destroy(Request $request, $id)
    {
        $candidates = Candidate::find($id);
        $candidates->delete();

        return redirect('candidate')->with('success', 'Berhasil!');

    }
}
