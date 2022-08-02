<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahService;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $service;
    public function __construct(FatoorahService $service)
    {
        $this->service = $service;
    }

    public function payOrder(){
        $data =  [
            "CustomerName" => 'Mohamed',
            "NotificationOption" => "LNK",
            "InvoiceValue" => 100,
            "CustomerEmail" => 'mohamedelsofy1@gmail.com',
            "CallBackUrl" => env('fatoorah_success_url'),
            "ErrorUrl" => env('fatoorah_error_url'),
            "Language" => 'en',
        ];
      return  $this->service->sendPayment($data);
    }

    public function callBack(Request $request){
        dd($request);
        return $request->paymentId;
    }
}
