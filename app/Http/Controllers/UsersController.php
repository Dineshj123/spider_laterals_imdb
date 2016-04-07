<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,User::$create_validation_rules);
        $data=$request->only('name','email','password');
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        if($user){
            \Auth::login($user);
            return redirect()->route('home');
        }
        else{
            return "This is the error";
        }
        return back()->withInput();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function home(){
        $movies=DB::table('movietable')->get();
        $movienames=DB::table('movietable')->select('name')->get();
        $moviedescription=DB::table('movietable')->select('description')->get();
        $movieyearofrelease=DB::table('movietable')->select('yearofrelease')->get();
        //return $movies['name'];
       // $movieavg=[];
        //var_dump($movie);
        foreach($movienames as $movie)
        {
            //$moviename=$movie['name'];
            //return $mo.viename;
             $movieavg[$movie->name]=DB::table('movierating')->where('movie','=',$movie->name)->avg('rating');
             if($movieavg[$movie->name]==0)
             {
                 $movieavg[$movie->name]="Unrated Average";
             }
            //echo $movieavg[$movie->name];
        }
        return view('users.home',compact('movies','movieavg','moviedescription','movieyearofrelease'));
    }
    public function lists($moviename){
        $name=\Auth::user()->name;
        //return $name;
        $moviecount= DB::table('movierating')->where('movie','=',$moviename)->count();
        $movieavg=DB::table('movierating')->where('movie','=',$moviename)->avg('rating');
        if($movieavg==0){
            $movieavg='Unrated average';
        }
        $user_rating=DB::table('movierating')->where('movie',$moviename)
                                             ->where('user',$name)
                                             ->pluck('rating');
        //return $user_rating;    
        if ($user_rating==0)
        {
            $user_rating="Unrated";
        }
        return view('movies.display',compact('moviename','moviecount','movieavg','user_rating'));   
    }

    public function review(Request $request){
        $name=\Auth::user()->name;
        $moviename=$request->moviename;
        $rating=$request->rating;
        $users=DB::table('movierating')->where([
            ['user','=',$name],
            ['movie','=',$moviename],
            ])->get();
        if($users){
            DB::table('movierating')
            ->where([
                ['user','=',$name],
                ['movie','=',$moviename],
                ])
            ->update(['rating'=>$rating]);
        }
        else{
            DB::table('movierating')->insert(
                ['user'=>$name,'movie'=>$moviename,'rating'=>$rating]
                );
        }
        $moviecount= DB::table('movierating')->where('movie','=',$moviename)->count();
        $movieavg=DB::table('movierating')->where('movie','=',$moviename)->avg('rating');
        if($movieavg==0){
            $movieavg='Unrated average';
        }
        $user_rating=DB::table('movierating')->where('movie',$moviename)
                                             ->where('user',$name)
                                             ->pluck('rating');
        if ($user_rating==0)
        {
            $user_rating="Unrated";
        }
        //return $user_rating;
         return view('movies.display',compact('moviename','moviecount','movieavg','user_rating'));
    }
}
