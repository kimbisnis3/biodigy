<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function listActivity()
    {
      $res = DB::select('select * from activity');
      return response()->json($res);
    }

    public function createActivity()
    {
      $skill      = $request->input('skill');
      $title      = $request->input('title');
      $description= $request->input('description');
      $startdate  = $request->input('startdate');
      $enddate    = $request->input('enddate');
      $participants= $request->input('participants');
      $result     = DB::insert('INSERT INTO activity (skill, title, description, startdate, enddate, participants) VALUES (?,?,?,?,?,?)', [$skill, $title, $description, $startdate, $enddate, $participants]);
      if ($result) {
        return response()->json([
          'body' => ['message' => 'create success', 'responstatus' => '200'],
        ]);
      } else {
        return response()->json([
          'body' => ['message' => 'data cannot be processed', 'responstatus' => '422'],
        ]);
      }
    }

    public function updateActivity()
    {
      $id         = $request->input('id');
      $skill      = $request->input('skill');
      $title      = $request->input('title');
      $description= $request->input('description');
      $startdate  = $request->input('startdate');
      $enddate    = $request->input('enddate');
      $participants= $request->input('participants');
      $result     = DB::update("UPDATE activity SET skill= '$skill', title='$title', description='$description', startdate='$startdate', enddate='$enddate', participants='$participants' WHERE id='$id'");
      if ($result) {
        return response()->json([
          'body' => ['message' => 'update success', 'responstatus' => '200'],
        ]);
      } else {
        return response()->json([
          'body' => ['message' => 'data cannot be processed', 'responstatus' => '422'],
        ]);
      }
    }

    public function deleteActivity()
    {
      $id     = $request->input('id');
      $result = DB::delete("DELETE FROM company WHERE id='$id'");
      if ($result) {
        return response()->json([
          'body' => ['message' => 'delete success', 'responstatus' => '200'],
        ]);
      } else {
        return response()->json([
          'body' => ['message' => 'data cannot be processed', 'responstatus' => '422'],
        ]);
      }
    }


}
