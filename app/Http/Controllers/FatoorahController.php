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
      // you must had table transaction , save invoiceId and user id from auth
    }

    public function callBack(Request $request){
        $payment_id = $request->paymentId;
        $data = [];
        $data['Key'] = $payment_id;
        $data['KeyType'] = 'paymentId';
        return $response =$this->service->getPaymentstatus($data);
        // you can get data an update table transaction from $response->data->invoiceId where = invoiceId
        // in transaction table
    }
}
