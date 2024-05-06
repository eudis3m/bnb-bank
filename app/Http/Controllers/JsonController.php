<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
   
    {

        protected function tokensMatch($request)
    {
        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');

        if ( ! $token && $header = $request->header('X-XSRF-TOKEN'))
        {
            $token = $this->encrypter->decrypt($header);
        }

        return StringUtils::equals($request->session()->token(), $token);
    }

        public function consultar($id )
        {
            $user =  Bank::where('customerId', $customerId)->get();
            return response()->json($user);
        }
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
           
                DB::table('banks')->insert(
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
    
            return response()->json(['message' => 'Registered user']);

        }
    
        public function update(Request $request)
        {
            //$user = Bank::find($request['customerId']);
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
            //$user->update($request->all());
            return response()->json(['message' => 'User update successfully']);
        }
    
        public function destroy(Request $request)
        {
            $user =  Bank::where('customerId', $request['customerId'])->delete(
                [
                    'customerId' => $request['customerId']
                ]);
            return response()->json(['message' => 'User deleted successfully']);
        }
}
