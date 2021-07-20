<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51JExDrJumxuT02mtFRDlX97lKNxYMZ9VHOO7BRTBGvza8shJvLAGVRvFO1pq6z6y28IldPvd4bNKQUF3SP0seYBi00h5lY87Oo');

        $token = $_POST['stripeToken'];

	    $charge = \Stripe\Charge::create([
	  'amount' => 999*100,
	  'currency' => 'usd',
	  'description' => 'Easy Online Store',
	  'source' => $token,
	  'metadata' => ['order_id' => uniqid()],
	]);
    dd($charge);

    }
}
