<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Task extends Model
{

    protected $guarded = [];

    public function projects()
    {
      return $this->belongTo(Project::class);
    }

    public function complete($completed=true)
    {
      $this->update(compact('completed'));
    }


}
