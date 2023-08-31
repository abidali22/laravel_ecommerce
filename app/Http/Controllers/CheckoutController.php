<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class CheckoutController extends Controller
{
    protected $merchantApi;
    protected $merchantSignature;
    protected $merchantEmail;
    protected $currency;
    protected $commonUrl;

    public function __construct()
    {
        $this->merchantApi = 'Ou1b5TKVgsTjStjf94MnSCwmyW4l5pgX4rxv5YNr';
        $this->merchantSignature = 'hXC0bgfI5JtpeU0T1bRjmEeEh';
        $this->merchantEmail = Auth::user()->email;
        $this->currency = 'USD';
        $this->commonUrl = 'https://sandbox.quikipay.com/';
    }

    public function cardCheckout($amount)
    {
        $response = Http::post('https://test.quikipay.com/api/v1.1/payment/checkout', [
            'merchant' => $this->merchantApi,
            'customer_email' => $this->merchantEmail,
            'currency' => $this->currency,
            'order_id' => '15df568r8dvsdfsdfrg6',
            'amount' => $amount,
            'success_url' => $this->commonUrl.'success',
            'cancel_url' => $this->commonUrl.'cancel',
            'callback_url' => $this->commonUrl.'callback',
            'products_data' => 'null',
            'country_code' => 'CL',
            'signature' => $this->signature,
        ]);
        return $response->body();
    }

    public function cryptoCheckout($amount)
    {
        $response = Http::withHeaders([
            'Api-Key' => $this->merchantApi,
            'x-locale' => 'en'
        ])->post('https://test.quikipay.com/api/v1.1/pay', [
            'customer_name' => Auth::user()->name,
            'customer_email' => Auth::user()->email,
            'currency_code' => 'USD',
            'amount' => $amount,
            'order_id' => '15df568r8sdfsdfrg6',
            'success_url' => $this->commonUrl,
            'cancel_url' => $this->commonUrl,
            'callback_url' => $this->commonUrl,
            'end_user_ip' => '106.243.245.255',
            'signature' => $this->signature,
            'payment_method_code' => 'C-01',
            'crypto_code' => 'BTC', // TUSDT, USDT, USDC, BTC, ETH, LTC, XRP
        ]);
        return $response->body();
    }

}

// Cash Payment SPC-03                       ---> detail
// https://test.quikipay.com/api/v1.1/pay
//   "customer_name"       :   "John Doe",
//     "customer_email"      :   "Johndoe@gmail.com",
//     "currency_code"       :   "BRL",
//     "success_url"         :   "https://sandbox.quikipay.com/",
//     "cancel_url"          :   "https://sandbox.quikipay.com/",
//     "callback_url"        :   "https://sandbox.quikipay.com/",
//     "end_user_ip"         :   "106.243.245.255",
//     "order_id"            :   "15df568r8sdfsdfrg6",
//     "amount"              :   "50.025",
    
//     "payment_method_code" :   "SPC-03",
//     "bank_id"             :   "8224",
//     "phone_country_code"  :   "123",
//     "phone_number         :   "123412341234",
//     "address"             :   "Avenida Doutor S.Azevedo 142",
//     "postal_code"         :   "86730970",
//     "city                 :   "Astorga",
//     "signature"             :   "d506668e384120cfed82076196a98"

// CryptoCurrency (All Countries) (C-01)
// https://test.quikipay.com/api/v1.1/pay
// {
//     "customer_name"       :   "John Doe",
//     "customer_email"      :   "Johndoe@gmail.com",
//     "currency_code"       :   "USD",
//     "success_url"         :   "https://sandbox.quikipay.com/",
//     "cancel_url"          :   "https://sandbox.quikipay.com/",
//     "callback_url"        :   "https://sandbox.quikipay.com/",
//     "end_user_ip"         :   "106.243.245.255",
//     "order_id"            :   "15df568r8sdfsdfrg6",
//     "amount"              :   "50.025",
    
//     "payment_method_code" :  "C-01",
//     "crypto_code"         :  "BTC",
//     "signature"           :   "7b2432f49cfa24490203fb731"
// }

// Credit/Debit Card Payment (XCP-09) ----> acceptin Master Card and Visa Card
// POST https://test.quikipay.com/api/v1.1/pay
// {
//     "customer_name"       :   "John Doe",
//     "customer_email"      :   "Johndoe@gmail.com",
//     "currency_code"       :   "USD",
//     "success_url"         :   "https://sandbox.quikipay.com/",
//     "cancel_url"          :   "https://sandbox.quikipay.com/",
//     "callback_url"        :   "https://sandbox.quikipay.com/",
//     "end_user_ip"         :   "106.243.245.255",
//     "order_id"            :   "15df568r8sdfsdfrg6",
//     "amount"              :   "50.025",
    
//     "payment_method_code" :   "XCP-09",
//     "card_number"         :   "55555561111114321",
//     "cvv"                 :   "586",
//     "card_holder_name"    :   "abc",
//     "document_type"       :   "NATIONAL_ID",
//     "document_no"         :   "12548769",
//     "expiration_year"     :   "23",
//     "expiration_month"    :   "08",
//     "signature"           :   "d506668e384120ccc81fed82076196a98"
// }

// Bank Funds Transfer (BT-01) 
// POST https://test.quikipay.com/api/v1.1/pay
// {
//     "customer_name"       :   "John Doe",
//     "customer_email"      :   "Johndoe@gmail.com",
//     "currency_code"       :   "CLP",
//     "success_url"         :   "https://sandbox.quikipay.com/",
//     "cancel_url"          :   "https://sandbox.quikipay.com/",
//     "callback_url"        :   "https://sandbox.quikipay.com/",
//     "end_user_ip"         :   "106.243.245.255",
//     "order_id"            :   "15df568r8sdfsdfrg6",
//     "amount"              :   "50.025",
    
                                
    
//     "payment_method_code" :   "BT-01",
//     "country_code" :   "cl",
//     "signature"           :   "7b2432f49cfa24490203fb731"
// }

// Upload Receipt Data
// POST https://test.quikipay.com/api/document-re-upload
// {
//     "merchant_id"           :   "bp2igV9ORor9U1BgJVD8xWwF0om",
//     "receipt_upload"        :   "124585_5464.jpg",
//     "customer_id_upload"    :   "643443464.jpg",
//     "order_id"              :   "123322",
//     "customer_email"        :   "haideralimughalers@gmail.com",
// }

// Using 64base Encoded
// POST https://test.quikipay.com/api/file-stream-upload
//  {
//     "merchant_id"           :   "bp2igV9ORor9U1BgJVD8xWwF0om",
//     "receipt_upload"        :   "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAasAAAH2CAYAAADOAaNEAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADs",
//     "customer_id_upload"    :   "643443464.jpg",
//     "order_id"              :   "X-SS232d990p94",
//     "customer_email"        :   "haideralimughalers@gmail.com"
// }