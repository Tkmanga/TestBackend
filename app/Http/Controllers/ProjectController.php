<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project; 
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::paginate(3)->all();

        return $projects; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $project = new Project(); 
        $project->name = $request->name; 
        $project->description = $request->description; 
        $project->status = $request->status; 
        $project->save();
        $project->users()->attach($request->users);

        return $project;
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
        $project = Project::find($id);
        
        foreach($project->users as $user){
            return $project;
        }
        return 'no match';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
    public function update(Request $request)
    {
        //
        $project = Project::findOrFail($request->id); 
        $project->name = $request->name; 
        $project->description = $request->description; 
        $project->status = $request->status; 
        $project->save();
        $project->users()->sync($request->users);
        return $project; 
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $project = Project::destroy($request->id);
        return $project;
    }

}