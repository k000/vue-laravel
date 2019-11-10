<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;

class NoteController extends Controller
{
    public function create(Request $request){

        if(!$request->content){
            return null;
        }

        // 新規Noteの作成を行う
        $note = new Note();

        $note->content = $request->content;
        $note->user_id = Auth::id();

        $note->save();

        return $note->id;
    }

    public function updateNote(Request $request){

        if(!$request->content){
            return null;
        }

        $note = Note::where('id',$request->id)
            ->where('user_id',Auth::id())
            ->first();

        if($note){
            $note->content = $request->content;
            $note->update();
        }

    }


    public function deleteNote(Request $request){
        $note = Note::where('id',$request->id)
            ->where('user_id',Auth::id())
            ->first();

        if($note){
            $note->delete();
        }
    }


    public function getList(){
        // Note一覧を返却する。
        $response = Note::where('user_id',Auth::id())
                        ->orderBy('updated_at','desc')
                        ->get();
        return $response;

    }

    /**
     * 特定のノートを返却する
     */

    public function getNote(Request $reuqest){

        $response = Note::where('id',$reuqest->id)
                    ->where('user_id',Auth::id())
                    ->get();
        if($response){
            return $response;
        }

    }

    
    public function searchNote(Request $request){

      

        $response = Note::where('content','like',"%" .$request->text ."%")
                    ->where('user_id',Auth::id())
                    ->get();

        if($response){
            return $response;
        }
    }

}
