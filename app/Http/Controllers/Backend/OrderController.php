<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;


class OrderController extends Controller
{
    // Pending Orders 
    public function PendingOrders(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));

    } // end mehtod 

    // pending order details
    public function PendingOrdersDetails($order_id){

$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

return view('backend.orders.pending_orders_details',compact('order','orderItem'));

    } // end method



       public function ConfirmedOrders(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));

    } // end mehtod 


       public function ProcessingOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));

    } // end mehtod 



       public function pickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));

    } // end mehtod 

      public function ShippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));

    } // end mehtod 


      public function DeliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));

    } // end mehtod 

     public function CancelOrders(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders'));

    } // end mehtod 

    public function PendingToConfirm($order_id){
        Order::findOrFail($order_id)->update([ 'status'=>'confirm']);

        $notification = array(
        'message' =>'Order confirmed Successfuly',
        'alert-type' =>'success'
        );

        return redirect()->route('manage-orders')->with($notification);

    }




    public function ConfirmToProcessing($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'processing']);

      $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('confirmed-orders')->with($notification);


    } // end method



    public function ProcessingToPicked($order_id){
   
      Order::findOrFail($order_id)->update(['status' => 'picked']);

      $notification = array(
            'message' => 'Order picked Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('processing-orders')->with($notification);


    } // end method


     public function PickedToShipped($order_id){

      Order::findOrFail($order_id)->update(['status' => 'shipped']);

      $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('picked-orders')->with($notification);


    } // end method


     public function ShippedToDelivered($order_id){    

      Order::findOrFail($order_id)->update(['status' => 'delivered']);

      $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shipped-orders')->with($notification);


    } // end method
       
}
