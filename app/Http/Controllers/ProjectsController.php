<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
  public function index()//一覧
  {
    //$projects = Project::all();
    $projects = Project::latest()->paginate(10);
    //これで、個人のやつと、全員のやつ区別できる。all()。
    // auth()->id();
    // auth()->user();
    // auth()->check();
    // auth()->guest();



    return view('projects.index',compact('projects'));

  }

  public function show(Project $project)//個別表示
  {


    //他の人のを見れないように
//$this->autthorize('update',$project);
//$this->autthorize('view',$project);
//VIEW,update()はpolicyってところに書くらしい。
    return view('projects.show',compact('project'));
  }

  public function create()//のblade表示
  {
    $user = Auth::user();
    return view('projects.create',compact('user'));
  }

  public function store()//登録処理
  {
    /*  explanations
      request()->all();←guardの時にこれだと、
      予期しないIDとかの部分が変えられてしまう
      request(['title','description'])
      request('title','description')

      Project::create([
      'title' => request('title'),
      'description' =>  request('description')
    ]);
    */

    /* old one
    $project = new Project;
    $project->title = request('title');
    $project->description = request('description');
    $project->save();
    */



    $attributes = request()->validate([
      'title' => 'required',
      'description' => 'required',
      'username' =>'required',
    //  'password' => ['required','confirmed']
    ]);


    //Project::create([request('title'), request('description')]);
    //↑こうやって一列にまとめてもいい。
    //ここでMODELを使う↑　fillable,guard
    Project::create($attributes + ['owner_id' => auth()->id()]);
    return redirect('/projects');

  }

  public function edit(Project $project)//の表示
  {
        return view('projects.edit', compact('project'));
  }

  public function update(Project $project)//前は$id　　更新処理
  {
    //dd('hello');
    //dd(request()->all());
    /*
    $project = project::find('id')
    $project->title = request('title');
    $project->description = request('description');
    $project->save();
    */
        if (auth()->id() == $project->owner_id) {
        $project->update(request(['title','description']));
        return redirect('/projects');
         }
         else {
           $message = "投稿者のみ編集できます";
           return view('projects.edit', compact('project','message'));
         }
    }

  public function destroy(Project $project)//削除処理
  {
     if (auth()->id() == $project->owner_id) {
       Project::findOrFail(request('id'))->delete();
       return redirect('/projects');
     }
      else {
        $message = "投稿者のみ削除できます";
        return view('projects.edit', compact('project','message'));
      }
  }

}
