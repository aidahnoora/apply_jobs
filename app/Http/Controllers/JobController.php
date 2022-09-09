<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::orderBy('created_at', 'DESC')->get();

        return view('job.index', compact('jobs'));
    }

    public function create()
    {
        return view('job.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Job::create([
            'name' => $request->name
        ]);

        return redirect('job')->with('success', 'Berhasil!');
    }

    public function edit($id)
    {
        $jobs = Job::findorfail($id);

        return view('job.edit', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Job::findorfail($id);

        $post_data = [
            'name' => $request->name,
        ];

        $post->update($post_data);

        return redirect('job')->with('success', 'Berhasil!');
    }

    public function destroy(Request $request, $id)
    {
        $jobs = Job::find($id);
        $jobs->delete();

        return redirect('job')->with('success', 'Berhasil!');
    }
}
