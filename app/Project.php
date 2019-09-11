<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Project extends Model
{
    protected $fillable = [
      'title','description','owner_id','username'
    ];

  public function tasks()
  {
    return $this -> hasMany(Task::class);
  }

  public function addTask($request)
  {
    //$this->tasks()->create(compact('body'));

    Task::create([

        'project_id' => $request['project_id'],
        'body' => $request['body']
      //  'password' => ['required','confirmed']

    ]);
  }
}
