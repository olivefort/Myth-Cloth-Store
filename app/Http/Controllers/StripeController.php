<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Stripe\{ Stripe, Customer, Charge };
use App\Mail\OrderConfirmationEmail;
use App\Commande;
use App\Produit;

class StripeController extends Controller
{
    public function store(Request $request)
    {
        try {
            Stripe::setApiKey(config('stripe.secret_key'));
            $customer = Customer::create([
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ]);
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => Round(\Cart::session(auth()->user()->id)->getTotal()*100,0),
                'currency' => 'eur'
            ]);
            $error = '';
        }
        catch (Exception $e) {
            $customer = $charge = '';
            $error = $e->getMessage();
        }
        // $message['client'] = "bonjour ".$userId.", voici les détail de votre commande";
        $message['orderId'] = 'dxf422';
        $message['amount'] = $charge['amount']/100;
        $message['subject'] = "Confirmation de commande";
        $message['content'] = "merci pour votre commande chez Myth Cloth Store";
        $to = auth()->user()->email;

        \Mail::to($to)->send(new OrderConfirmationEmail($message));

        $variable = \Cart::session(auth()->user()->id)->getContent();
        
        $commande = new Commande;
                $commande->user_id = auth()->user()->id;
            foreach($variable as $key=>$value){
                $commande->article .=" ".$value->name;
            }
            foreach($variable as $key=>$value){
                $commande->quantite +=$value->quantity;
            }
                $commande->prix = \Cart::session(auth()->user()->id)->getTotal();
                $commande->save();
            
            
            return view('panier.confirmation', compact('charge', 'customer','error'));
            
    }
    
}

