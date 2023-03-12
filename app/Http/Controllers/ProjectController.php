<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminator\Support\Facades\Validator;
use Illuminator\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index')
        ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
        ->with('category', null)
        ->with('tag', null);
    }

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects)
        ->with('category', $category->name)
        ->with('tag', null);
    }

    public function listByTag(Tag $tag)
    {
        return view('projects.index')
        ->with('projects', $tag->projects)
        ->with('category', null)
        ->with('tag', $tag->name);
    }

    public function show(Project $project)
    {
        return view('projects.project', ['project' => $project]);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())
        ->with('project', null);
    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function store(Project $project, Request $request) {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);

        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $project = Project::create($attributes);

        $project->tags()->attach($request['tags']);

        session()->flash('success','Project Created Successfully');

        return redirect('/admin');
    }

    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        /* $formValues = $request->all();
        dd($formValues); */

        $checkboxValue = $request->input('deleteimage');
        if ($checkboxValue === "on") {
            $attributes['image'] = "";
        }
        else {
            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
                $attributes['image'] = $image_path;
            }
        }

        $checkboxValue = $request->input('deletethumb');
        if ($checkboxValue === "on") {
            $attributes['thumb'] = "";
        }
        else {
            if ($request->hasFile('thumb')) {
                $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
                $attributes['thumb'] = $thumb_path;
            }
        }

        $project->update($attributes);

        $project->tags()->sync($request['tags']);

        session()->flash('success','Project Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }
}
