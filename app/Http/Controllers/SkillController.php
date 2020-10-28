<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function listSkill()
    {
      $res = DB::select('select * from skills');
      return response()->json($res);
    }

}
