<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomerTransaction extends Authenticatable
{
    public function index(Request $request)
    {
        $user =  CustomerTrasanction::where('customerId', $request['customerId'])->get();
        return response()->json($user);
    }


    public function store(Request $request)
    {

           DB::table('customer_trasaction')->insert(
               [
                    'customer_id' => $request['customerId'],
                    'transaction_date' => $request['transactionDate'],
                    'transaction_amount' => $request['transactionAmount'],
                    'transaction_type' => $request['transactionType']
                ]);
            

        return response()->json(['message' => 'JSON processado e armazenado com sucesso']);
    }

   /* public function update(Request $request)
    {
        $user =   CustomerTransaction::where('customerId', $request['customerId'])->update([
            'customerId' => $request['customerId'],
              'transactionId' =>  $request['transactionId'],
              'transactionDate' => $request['transactionDate'],
              'transactionAmount' => $request['transactionAmount'],
              'transactionType' =>  $request['transactionType']]);
        return response()->json($user);
    }*/

   
    public static function destroy($id)
    {
        $user = CustomerTransaction::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
