<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bank;

class JsonController extends Controller
   
    {
        public function index()
        {
            $users = Bank::with('transactions')->get();
            return response()->json($users);
        }
    
        public function show($id)
        {
            $user = Bank::with('transactions')->find($id);
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
    
        public function update(Request $request, $id)
        {
            $user = Bank::find($id);
            $user->update($request->all());
            return response()->json($user);
        }
    
        public function destroy($id)
        {
            $user = Bank::find($id);
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        }
}
