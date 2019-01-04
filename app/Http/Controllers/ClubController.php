<?php

namespace App\Http\Controllers;

use App\Club;
use DB;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
	    $club = Club::find($id);
        $clubname = $club->team_name;
        $users = DB::table('six_team_ver2')->where('team_name', $clubname)->orderBy('timestamp', 'desc')->first();                
        $pTexts = DB::table('full_data_ver2')->where('teams', $clubname)->orderBy('sentiment', 'desc')->limit(10)->pluck('clean_text');                
        $nTexts = DB::table('full_data_ver2')->where('teams', $clubname)->orderBy('sentiment', 'asc')->limit(10)->pluck('clean_text');              
      	return view('clubs.show', array('club' => $club,'user'=>$users,'pTexts'=>$pTexts,'nTexts'=>$nTexts));     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    // Update Data 
    public function updateDataFunc(){                
        $id = (int)$_POST['id'];
        $period = $_POST['timeSelector'];
        $club = DB::table('clubs')->where('id',$id)->first();
        $clubname = $club->team_name;

        if($period =='current'){            
            $users = DB::table('six_team_ver2')->where('team_name', $clubname)->orderBy('timestamp', 'desc')->first(); 
            $pTexts = DB::table('full_data_ver2')->where('teams', $clubname)->orderBy('sentiment', 'desc')->limit(10)->pluck('clean_text');                
            $nTexts = DB::table('full_data_ver2')->where('teams', $clubname)->orderBy('sentiment', 'asc')->limit(10)->pluck('clean_text');   

            $post_data = json_encode(array('average' => $users->sentiment_average,'text_positive'=>$users->text_positive,'text_negative'=>$users->text_negative,'pTexts'=>$pTexts,'nTexts'=>$nTexts));

        }else if($period =='1day'){
            $currentTime = time();
            $limitTime = $currentTime - 24*60*60; // before 1 day
            $users = DB::table('six_team_ver2')
            ->where('team_name', $clubname)
            ->where('unix_timestamp','>=',$limitTime)
            ->orderBy('sentiment','desc')
            ->limit(10)
            ->get();
            
            $pTexts = DB::table('full_data_ver2')->where('teams', $clubname)
            ->where('timestamp','>=',$limitTime)->orderBy('sentiment', 'desc')->limit(10)->pluck('clean_text');   

            $nTexts = DB::table('full_data_ver2')->where('teams', $clubname)
            ->where('timestamp','>=',$limitTime)->orderBy('sentiment', 'asc')->limit(10)->pluck('clean_text'); 

            $avg = $users->sum('sentiment_average') / $users->count('sentiment_average');
            $txtsP ='';
            $txtsN = '';
            foreach($users as $user){
                $txtsP .= $user->text_positive;
                $txtsN .= $user->text_negative;
            }            
            $post_data = json_encode(array('average' => $avg,'text_positive'=>$txtsP,'text_negative'=>$txtsN,'pTexts'=>$pTexts,'nTexts'=>$nTexts));
            
        }else if($period =='1week'){
            $currentTime = time();
            $limitTime = $currentTime - 7*24*60*60; // before 1 week

            $users = DB::table('six_team_ver2')
            ->where('team_name', $clubname)
            ->where('unix_timestamp','>=',$limitTime)
            ->orderBy('sentiment','desc')
            ->limit(10)
            ->get();
            
            $pTexts = DB::table('full_data_ver2')->where('teams', $clubname)
            ->where('timestamp','>=',$limitTime)->orderBy('sentiment', 'desc')->limit(10)->pluck('clean_text');   

            $nTexts = DB::table('full_data_ver2')->where('teams', $clubname)
            ->where('timestamp','>=',$limitTime)->orderBy('sentiment', 'asc')->limit(10)->pluck('clean_text'); 

            $avg = $users->sum('sentiment_average') / $users->count('sentiment_average');
            $txtsP ='';
            $txtsN = '';
            foreach($users as $user){
                $txtsP .= $user->text_positive;
                $txtsN .= $user->text_negative;
            }            
            $post_data = json_encode(array('average' => $avg,'text_positive'=>$txtsP,'text_negative'=>$txtsN,'pTexts'=>$pTexts,'nTexts'=>$nTexts));
        }                    
        echo $post_data;                
    }
}
