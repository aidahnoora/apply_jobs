<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Skill;
use PhpParser\Node\Stmt\TryCatch;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = Job::get();
        $skills = Skill::get();

        return view('register.index', compact(['jobs', 'skills']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required',
        ]);

        try {
            $post = Candidate::create([
                'job_id' => $request->job_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'year' => $request->year,
            ]);

            $post->skill()->attach($request->skill_id);

            return redirect('/')->with('success', 'Berhasil!');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Terjadi Kesalahan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
