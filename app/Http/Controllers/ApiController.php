<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Post;
use App\Team;
use App\Player;

class ApiController extends Controller
{
  
    public function teams()
    {
	  $teams = Team::all();
      return response()->json($teams);
    }
	
	public function teamGetById($id)
    {
	  $teams = Team::find($id);
      return response()->json($teams);
    }
	
	public function playerById($id)
    {
	  $teams = Team::find($id);
	  $teams->player = Player::where('team_id',$id)->get();
      return response()->json($teams);
    }
	
	 public function createTeam(Request $request)
    {
		$task = new Team;
		$task->name = $request->name;
		$task->save();
		return response()->json('successfully added');
    }
	
	public function updateTeam(Request $request,$id)
    {
		$task = Team::find($id);
		$task->name = $request->name;
		$task->save();
		return response()->json('successfully update');
    }
	
	public function teamDelete($id)
    {
      $post = Team::find($id);
      $post->delete();
      return response()->json('successfully deleted');
    }
	
	public function createPlayer(Request $request,$id)
    {
		$task = new Player;
		$task->team_id = $id;
		$task->first_name = $request->first_name;
		$task->last_name = $request->last_name;
		$task->save();
		return response()->json('successfully added');
    }
	
	public function deletePlayer($id)
    {
      $post = Player::find($id);
      $post->delete();
      return response()->json('successfully deleted');
    }
	
	public function playerByprimeId($id)
    {
	  $teams = Player::find($id);
      return response()->json($teams);
    }
	
	public function updatePlayer(Request $request,$id)
    {
		$task = Player::find($id);
		$task->first_name = $request->first_name;
		$task->last_name = $request->last_name;
		$task->save();
		$teams = Player::find($id);
		return response()->json($teams);
    }
}
