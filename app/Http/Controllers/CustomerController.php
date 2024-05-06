<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $user = Customertransaction::where('customerId', $request['customerId'])->get();
       // DB::table('customer_trasaction')->where('customerId', $request['customerId'])->get();
       $customerTransactions = array("customerTransactions" => $user);
        return response()->json($customerTransactions);
    }


    public function store(Request $request)
    {

           DB::table('customer_transactions')->insert(
               [
                    'customerId' => $request['customerId'],
                    'transactionId' => $request['transactionId'],
                    'transactionDate' => $request['transactionDate'],
                    'transactionAmount' => $request['transactionAmount'],
                    'transactionType' => $request['transactionType']
                ]);
            

        return response()->json(['message' => 'JSON processado e armazenado com sucesso']);
    }

    public function update(Request $request)
    {
        $user =   CustomerTransaction::where('customerId', $request['customerId'])->update([
            'customerId' => $request['customerId'],
              'transactionId' =>  $request['transactionId'],
              'transactionDate' => $request['transactionDate'],
              'transactionAmount' => $request['transactionAmount'],
              'transactionType' =>  $request['transactionType']]);
        return response()->json(['message' => 'User update successfully']);
    }

   
    public  function destroy(Request $request)
    {
        $user =  CustomerTrasanction::where('customerId', $request['customerId'])->delete(
        //DB::table('customer_transactions')->delete(
            [
                'customerId' => $request['customerId']
            ]);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
