<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function index()
    {
        $users = UserTransaction::with('transactions')->get();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = UserTransaction::with('transactions')->find($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $jsonData = $request->json()->all();

        foreach ($jsonData['users'] as $userData) {
            $user = UserTransaction::create([
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
        $user = UserTransaction::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
