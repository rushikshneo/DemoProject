<?php 

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use  Auth;
use App\order;
use Illuminate\Support\Facades\Input;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
      
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

     public function payWithpaypal(Request $request)
      {
        $payer = new Payer();
                $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($request->get('amount')); /** unit price **/
        $item_list = new ItemList();
                $item_list->setItems(array($item_1));
        $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($request->get('amount'));
        $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(URL::route('shopping.status')) /** Specify return URL **/
                    ->setCancelUrl(URL::route('shopping.status'));
        $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                try {
        $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
        \Session::put('error', 'Connection timeout');
                        return Redirect::route('paywithpaypal');
        } else {
        \Session::put('error', 'Some error occur, sorry for inconvenient');
                        return Redirect::route('paywithpaypal');
        }
        }
        foreach ($payment->getLinks() as $link) {
        if ($link->getRel() == 'approval_url') {
        $redirect_url = $link->getHref();
                        break;
        }
    }
              Session::put('paypal_payment_id', $payment->getId());
    if (isset($redirect_url)) {
                return Redirect::away($redirect_url);
    }
           \Session::put('error', 'Unknown error occurred');
            return Redirect::route('paywithpaypal');
    }



   public function getPaymentStatus()
    {
              $payment_id = Session::get('paypal_payment_id');
              // dd($payment_id ,Input::get('token'),Input::get('PayerID'));

              Session::forget('paypal_payment_id');
      if (empty(Input::get('PayerID')) || empty(Input::get('token'))){

             // \Session::put('error', 'Payment failed');
             $message="failed";
             return view('pages.frontend.status',compact('message'));
             // return Redirect::route('shopping.paypal');
      }
      $payment = Payment::get($payment_id, $this->_api_context);
      // dd($payment);
             $execution = new PaymentExecution();
             $execution->setPayerId(Input::get('PayerID'));
             $result = $payment->execute($execution, $this->_api_context);
      if ($result->getState() == 'approved') {
            $item = \Cart::session(Auth::user()->id)->getContent(); 
             $id=Session::get('id');
             foreach ($id as  $order_id){
             foreach ($item as $key => $value) { 
               order::where('id','=',$order_id)->update(['transaction_id'=>$payment_id,'status'=>"1"]);
               \Cart::session(Auth::user()->id)->remove($key);
               \Cart::session(Auth::user()->id)->clearCartConditions();

              }
            }
           $message="success";
           return view('pages.frontend.status',compact('message'));
             // \Session::put('success', 'Payment success');
             return Redirect::route('shopping.paypal');
      }else{
             // \Session::put('error', 'Payment failed');
             return Redirect::route('shopping.paypal');
          }

      }
  }


?>