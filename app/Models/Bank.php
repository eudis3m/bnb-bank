<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Bank extends Authenticatable
{
    public static function index($customerId)
    {
        $user =  DB::select('SELECT * FROM banks WHERE customerId = "'.$customerId.'"');
        return $user;
    }

    public static function show($customerId,$customerPin)
    {
        $user =  DB::select('SELECT * FROM banks WHERE customerId = "'.$customerId.'" and customerPin = "'.$customerPin.'"');
        return $user;
    }

    public static function store($request)
    {
       $user = DB::table('banks')->insert(
            [
            'customerId' => $request['customerId'],
              'customerName' => $request['customerName'],
              'customerPin' =>  $request['customerPin'],
              'customerAccountType' => $request['customerAccountType'],
              'customerAccountNo' => $request['customerAccountNo'],
              'customerAccountBalance' =>  $request['customerAccountBalance'],
              'customerAadhar' => $request['customerAadhar'],
              'customerPan' =>  $request['customerPan'],
              'customerContac' => $request['customerContac'],
              'customerEmail' => $request['customerEmail']]);

    return $user;
       
    }

    public static  function updateUser($request)
    {
        $user =  Bank::where('customerId', $request['customerId'])->update([
            'customerId' => $request['customerId'],
              'customerName' => $request['customerName'],
              'customerPin' =>  $request['customerPin'],
              'customerAccountType' => $request['customerAccountType'],
              'customerAccountNo' => $request['customerAccountNo'],
              'customerAccountBalance' =>  $request['customerAccountBalance'],
              'customerAadhar' => $request['customerAadhar'],
              'customerPan' =>  $request['customerPan'],
              'customerContac' => $request['customerContac'],
              'customerEmail' => $request['customerEmail']]);
        return $user;
    }
   
    public static function destroy($request)
    {
        $user =  Bank::where('customerId', $request['customerId'])->delete(
            [
                'customerId' => $request['customerId']
            ]);
        return $user;
    }
}
