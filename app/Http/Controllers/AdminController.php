<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function view_product()
    {
        return view('admin.product');
    }

    public function add_product(Request $request)
    {
        $image1 = null;
        $image2 = null;
        $image3 = null;

        // Handle the first image
        if ($request->hasFile('image1')) {
            $file1 = $request->file('image1');
            $image1 = time() . '_1.' . $file1->getClientOriginalExtension();
            $file1->move('product', $image1);
        }

        // Handle the second image
        if ($request->hasFile('image2')) {
            $file2 = $request->file('image2');
            $image2 = time() . '_2.' . $file2->getClientOriginalExtension();
            $file2->move('product', $image2);
        }

        // Handle the third image
        if ($request->hasFile('image3')) {
            $file3 = $request->file('image3');
            $image3 = time() . '_3.' . $file3->getClientOriginalExtension();
            $file3->move('product', $image3);
        }

        // Insert product data using DB::insert
        DB::insert(
            'INSERT INTO products (product_title, description, price, quantity, image1, image2, image3, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())',
            [
                $request->product_title,
                $request->description,
                $request->price,
                $request->quantity,
                $image1,
                $image2,
                $image3
            ]
        );

        return redirect()->back()->with('message', 'Product Added Successfully!');
    }

    public function show_product()
    {
        // Call the PostgreSQL function using a raw query
        $product = DB::select('SELECT * FROM get_all_products()');

        // Pass the data to the view
        return view('admin.show_product', compact('product'));
    }

    public function show_orders() 
    {
        if(Auth::id()){
            $user = Auth::user();

            $order = DB::table('order_details_view')->get();
            return view('admin.show_orders', compact('order'));
        }else{
            return redirect()->route('login')->with('error', 'Please log in to add items to the cart.');

        }
    }

    public function delivered($id)
    {
        // Fetch the order from the view
        $order = DB::table('order_details_view')->where('order_id', $id)->first();
    
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
    
        // Update the original `orders` table
        DB::table('orders')
            ->where('id', $id)
            ->update([
                'delivery_status' => 'delivered',
                'payment_status' => 'Paid'
            ]);
    
        return redirect()->back()->with('success', 'Order marked as delivered.');
    }
    
}
