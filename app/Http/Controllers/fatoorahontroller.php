<?php

namespace App\Http\Controllers;

use App\Http\services\FatoorahServices;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\InvoiceDetail;
use App\Models\InvoiceDetails;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class fatoorahontroller extends Controller
{
    private $fatoorahServices;




    public function __construct(FatoorahServices $fatoorahServices)
    {
        $this->fatoorahServices = $fatoorahServices;
    }


    public function payOrder(){
        $data = [
            'CustomerName' => 'ibrahimrezk',
            'NotificationOption' => 'Lnk',
            'InvoiceValue' => 100,
            'CustomerEmail' => 'ibrahimrezk@live.com',
            'CallBackUrl' => 'http://127.0.0.1:8000/call_back/',
            'ErrorUrl' => 'https://youtube.com/',
            'Language' =>  'en',
            'DisplayCurrencyIso' => 'KWD',
        ];
        
        $data = $this->fatoorahServices->sendPayment($data);
        if($data['IsSuccess']){
            
            $invoice = new Invoice();
            $invoice->invoice_id = $data['Data']['InvoiceId'];
            $invoice->user_id = Auth::user()->id;
            $invoice->status = 1;
            $invoice->save();

            return redirect($data['Data']['InvoiceURL']);
        }
    }

    public function paymentCallBack(Request $request)
    {
        // return $request;
        // $myfatoorah = MyFatoorah::payment($request->paymentId);
        $data = [];
        $data['Key'] = $request->paymentId;
        $data['KeyType'] = 'paymentId';

        $invoice_id = Invoice::latest()->first()->id;
        $user = User::first();
        $user->notify(new InvoicePaid($invoice_id));
				 
        return redirect()->route('invoices.index');
    }
}

