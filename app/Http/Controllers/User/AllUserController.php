<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;


class AllUserController extends Controller
{
    public function MyOrders(){

        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));
    }
}
