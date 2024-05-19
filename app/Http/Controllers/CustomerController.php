<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CustomerTransaction;
use Illuminate\Support\Facades\DB;

 class CustomerController extends Controller
{
    private $customerTransaction;
   // private $this_var = $this;
    public function __construct(CustomerTransaction $customerTransaction){
        $this->$customerTransaction = $customerTransaction;
    }
    
    public  function  index(Request $request)
    {
       
        $arrays = $request['customerId'];
        $user =  CustomerTransaction::index($arrays);
        $customerTransactions = array("customerTransactions" => $user);
        return response()->json($customerTransactions);
    }

    public  function  indexDate(Request $request)
    {
       
        $dateStart = $request['dateStart'];
        $dateFinish = $request['dateFinish'];
        $user =  CustomerTransaction::index($dateStart,$dateFinish);
        $customerTransactions = array("customerTransactions" => $user);
        return response()->json($customerTransactions);
    }


    public function store(Request $request)
    {
        $customer =  CustomerTransaction::store($request);
        if($customer !== null){
        return response()->json(['message' => 'JSON processado e armazenado com sucesso']);
        }
        return response()->json($customer);
    }

    public  function update(Request $request)
    {  
       $arrays = $request['customerId']; 
        $customer =  CustomerTransaction::updateCustomer($request, $arrays);
        if($customer !== null){
        return response()->json(['message' => 'User update successfully']);
        }
        return response()->json($customer);
    }

   
    public  function destroy(Request $request)
    {
        $arrays = $request['customerId'];
        $customer =  CustomerTransaction::destroy($arrays);
        if($customer !== null){
        return response()->json(['message' => 'User deleted successfully']);
        }
        return response()->json($customer);
    }
}
