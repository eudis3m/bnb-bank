<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class CustomerTransaction extends Authenticatable
{
    public static function index($request)
    {
       
        $customer =  DB::select('SELECT * FROM customer_transactions WHERE customerId = "'.$request.'"');
        return $customer;
    }

    public static function indexDate($dateStart,$dateFinish,$customerId){
        $customer =  DB::select('SELECT * FROM customer_transactions WHERE customerId = "'.$customerId.'" AND transactionDate BETWEEN "'.$dateStart.'" AND "'.$dateFinish.'"');
        return $customer;
    }


    public static function store($request)
    {

        $customer = DB::table('customer_transactions')->insert(
               [
                    'customerId' => $request['customerId'],
                    'transactionId' =>  $request['transactionId'],
                    'transactionDate' => $request['transactionDate'],
                    'transactionAmount' => $request['transactionAmount'],
                    'transactionType' => $request['transactionType']
                ]);
            

        return $customer;
    }

   public static function updateCustomer($request)
    {
        $customer =   CustomerTransaction::where('customerId', $request['customerId'])->update([
            'customerId' => $request['customerId'],
              'transactionId' =>  $request['transactionId'],
              'transactionDate' => $request['transactionDate'],
              'transactionAmount' => $request['transactionAmount'],
              'transactionType' =>  $request['transactionType']]);
        return $customer;
    }

   
    public static function destroy($request)
    {
        $customer = DB::table('customer_transactions')->delete(
            [
                'transactionId' => $request
            ]);
        return $customer;
    }
}
