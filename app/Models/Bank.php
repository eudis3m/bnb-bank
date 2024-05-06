<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Bank extends Authenticatable
{
    public function index(Request $request)
    {
        $user =  Bank::where('customerId', $request['customerId'])->get();
        return response()->json($user);
    }

    public function show(Request $request)
    {
        $user =  Bank::where('customerId', $request['customerId'])->where('customerPin', $request['customerPin'])->get();
            return response()->json($user);
    }

    public function store(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['users'] as $userData) {
            $user = Bank::create([
                'customer_id' => $userData['customerId'],
                // Adicione outras colunas conforme necessário
            ]);

            foreach ($userData['customerTransactions'] as $transactionData) {
                $user->transactions()->create([
                    'transaction_date' => $transactionData['transactionDate'],
                    'transaction_amount' => $transactionData['transactionAmount'],
                    'transaction_type' => $transactionData['transactionType']
                ]);
            }
        }

        return response()->json(['message' => 'JSON processado e armazenado com sucesso']);
    }

   /* public  function update(Request $request, $id)
    {
        $user = UserTransaction::find($id);
        $user->update($request->all());
        return response()->json($user);
    }*/
   
    public static function destroy($id)
    {
        $user = BankTransaction::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
