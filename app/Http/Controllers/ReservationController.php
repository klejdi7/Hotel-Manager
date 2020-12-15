<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\NewRes;
use App\Reservation;
use App\Plans;
use App\Rooms;
use App\Users;
use Auth;
use DB;
use Redirect;
use Hash;
use DateTime;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function create()
    {   
        if (Auth::check()) {
            return view('new_res');
            }
            else{
                abort(404);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function wrongRequest(Request $request)
    {

    $res_id = $_GET['res_id'];
    $room_nr = $_GET['room_nr'];

    DB::table('reservations')->where('reservation_id', $res_id)->delete();
    $update = DB::table('rooms')
    ->where('room_id', $room_nr)
    ->update(['status' => null ]);
    return redirect('status')->with('status', 'Deleted Successfully');
    }
     public function check(Request $request)
{
    if (Auth::check()) {

    if ( !request()->is('/check') && url()->previous() !=  url('/new-res') ) {
        abort(404); //Send them somewhere else
    }
    $res_id = $_GET['res_id'];
    $res = DB::table('reservations')
    ->where('reservation_id', '=', $res_id)
    ->get();

    return view('check_new_res', ['data' => $res]);
}   
else{
    abort(404);

}
}

public function resDelete(){
    if (Auth::check()) {
    $id = $_GET['res_id'];
    DB::table('reservations')->where('reservation_id', $id)->delete();
    return redirect('status')->with('status', 'Reservation deleted successfully!');
    }
    else{
        abort(404);
    }
}

    public function store(Request $request)
    {
        if (Auth::check()) {

        $now = new DateTime();
        $fname= $request->input('fname');
        $lname = $request->input('lname');
        $nid = $request->input('nid');
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $adult = $request->input('adult');
        $children = $request->input('child');
        $room_nr = $request->input('room_nr');
        $room_plan = $request->input('room_plan');
        $res_by = $request->input('res_by');
        $res_id = rand(111111, 99999);

        $data=array('reservation_id'=>$res_id,'fname_res'=>$fname,'lname_res'=>$lname,'nid'=>$nid , 'room_nr'=>$room_nr, 'plan_type'=>$room_plan, 'adults'=>$adult, 'children'=>$children, 'check_in'=>$checkin, 'check_out'=>$checkout, 'res_by'=>$res_by, 'created_at'=>$now);
        DB::table('reservations')->insert($data);

        $update = DB::table('rooms')
        ->where('room_id', $room_nr)
        ->update(['status' => "1"]);
        return redirect()->route('check', ['res_id' => $res_id , 'room_nr' => $room_nr]);
        }
        else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
            if (Auth::check()) {

        $data = Reservation::all();
        return view('reservations', ['data' => $data]);
            }
            else{
                abort(404);
            }
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
// Client INFO ------------------
    public function getName(Request $request)
{
    if (Auth::check()) {

    $res_name = $request->input('selectedName');
    // return Redirect::to('client?res_name='. $res_name);
    return redirect()->route('client', ['res_name' => $res_name]);
    }
    else{
        abort(404);
    }
}

public function clientInfo(Request $request)
{   
    if (Auth::check()) {
    
    $res_name = $_GET['res_name'];
$res = DB::table('reservations')
->where('fname_res', '=', $res_name)
->get();
return view('client_info', ['data' => $res]);
    }
    else{
        abort(404);
    }
}

// -----------------------------

// PLAN ------------------------------------

public function storePlan(Request $request)
{
    if (Auth::check()) {
    $plan= $request->input('type_name');
    $price = $request->input('type_price');

    $data=array('plan_type'=>$plan,'plan_price'=>$price);
    DB::table('plans')->insert($data);
    return redirect()->route('plans');
    }
    else{
        abort(404);
    }
}

public function plans()
{
    if (Auth::check()) {
    $data = Plans::all();
    return view('plans', ['data' => $data]);
    }
    else{
        abort(404);
    }
}


public function planDelete(){
    if (Auth::check()) {
    $id = $_GET['plan_id'];
    DB::table('plans')->where('plan_id', $id)->delete();
    return redirect('status')->with('status', 'Plan deleted successfully!');
    }
    else{
        abort(404);
    }
}

// -------------------------------------

// ROOMS -----------------------------------------
public function storeRoom(Request $request)
{
    if (Auth::check()) {
    $nr= $request->input('room_nr');
    $type = $request->input('room_type');

    $data=array('room_id'=>$nr,'room_type'=>$type);
    DB::table('rooms')->insert($data);
    return redirect()->route('rooms');
    }
    else{
        abort(404);
    }
}


public function roomDelete(){
    if (Auth::check()) {
    $id = $_GET['room_id'];
    DB::table('rooms')->where('room_id', $id)->delete();
    return redirect('status')->with('status', 'Room deleted successfully!');
    }
    else{
        abort(404);
    }
}

public function rooms()
{
    if (Auth::check()) {

    $data = Rooms::all();
    return view('rooms', ['data' => $data]);
}
else{
    abort(404);
}
}

// --------------------------------------------


// Finished DATABASE --------------------------------
public function getFinished()
{
    if (Auth::check()) {

$data = DB::table('finished')->get();
return view('finished/finished', ['data' => $data]);
    }
    else{
        abort(404);
    }
}

public function getFinishedName(Request $request)
{
    if (Auth::check()) {

    $res_name = $request->input('selectedName');
    // return Redirect::to('client?res_name='. $res_name);
    return redirect()->route('clientf', ['res_name' => $res_name]);
    }
    else{
        abort(404);
    }
}
public function FinishedClientInfo(Request $request)
{
    if (Auth::check()) {
    $res_name = $_GET['res_name'];
$res = DB::table('finished')
->where('fname_res', '=', $res_name)
->get();
return view('client_info', ['data' => $res]);
    }
    else{
        abort(404);
    }
}

public function finished()
{
    if (Auth::check()) {

    $datas = Reservation::all();
    $today = date('Y-m-d');
    $now = new DateTime();

    foreach($datas as $data){
        $res_id = $data->reservation_id;
        $room_nr = $data->room_nr;

        if($data->check_out == $today){
            $finish=array('reservation_id'=>$data->reservation_id,'fname_res'=>$data->fname_res,'lname_res'=>$data->lname_res,'nid'=>$data->nid , 'room_nr'=>$data->room_nr, 'plan_type'=>$data->plan_type, 'adults'=>$data->adults, 'children'=>$data->children, 'check_in'=>$data->check_in, 'check_out'=>$data->check_out, 'res_by'=>$data->res_by,'price'=>$data->price, 'created_at'=>$now);
            DB::table('finished')->insert($finish);
            DB::table('reservations')->where('reservation_id', $res_id)->delete();
            $update = DB::table('rooms')
            ->where('room_id', $room_nr)
            ->update(['status' => null ]);
        }
    }
    return redirect('status')->with('status', 'Updated Successfully');
    }
    else{
        abort(404);
    }
}
// ------------------

// USERS SETTINGS ------------------
public function userView(){
    if (Auth::check()) {
    $data = Users::all();
    return view('users', ['data' => $data]);
    }
    else{
        abort(404);
    }
}

public function userDelete(){
    if (Auth::check()) {
    $id = $_GET['id'];
    DB::table('users')->where('id', $id)->delete();
    return redirect('status')->with('status', 'User deleted successfully!');
    }
    else{
        abort(404);
    }
}

public function index()
{
    if(Auth::user()->role == "Admin"){
    return view('auth/register');
    }
    else{
        abort(404);
    }
}


public function userCreate(Request $request){
    if (Auth::check()) {

        
        $now = new DateTime();
        $name= $request->input('name');
        $username = $request->input('username');
        $role = $request->input('role');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $data=array('name'=>$name,'username'=>$username,'password'=>$password ,'email'=>$email,'role'=>$role, 'created_at'=>$now);
        DB::table('users')->insert($data);


    return redirect('status')->with('status', 'User created successfully!');
    }
    else{
        abort(404);
    }
}
// ------------------------------

}