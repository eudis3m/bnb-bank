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

   
        public function index(Request $request)
        {
            $customerId = $request['customerId'];
            $user =  Bank::index($customerId);
            return response()->json($user);
        }
    
        public function show(Request $request)
        {

            $customerId = $request['customerId'];
            $customerPin = $request['customerPin'];
            $user =  Bank::show($customerId,$customerPin);
            return response()->json($user);

        }
    
        public function store(Request $request)
        {
            $user =  Bank::store($request);
            if($user !== null){
            return response()->json(['message' => 'Registered user']);
            }
            return response()->json($user);

        }
    
        public function update(Request $request)
        {

             $user =  Bank::updateUser($request);
            if($user !== null){
            return response()->json(['message' => 'User update successfully']);
            }
            return response()->json($user);
        }

    
        public function destroy(Request $request)
        {
            $user =  Bank::destroy($request);
            if($user !== null){
                return response()->json(['message' => 'User deleted successfully']);
            }
            return response()->json($user);
        }
}
