<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class HomeController extends Controller
{
    // Show all products from the view
    public function index()
    {
        // Query the view to get all products
        $products = DB::select('SELECT * FROM product_details_view');
    
        // Pass the products to the view
        return view('customer.home', compact('products'));
    }
    public function viewshoes()
    {
        // Query the view to get all products
        $products = DB::select('SELECT * FROM product_details_view');
    
        // Pass the products to the home view
        return view('customer.home', compact('products'));
    }

    // Method to show a single product's details
    public function showProductDetails($id)
    {
        // Fetch the product details from the product_details_view using the provided id
        $product = DB::table('product_details_view')->where('id', $id)->first();

        // Check if the product is found, if not redirect with a message
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found');
        }

        // Return the product details view and pass the product data
        return view('customer.product_details', ['product' => $product]);
    }

    // Redirect based on user role
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
    
        if ($usertype == '1') {
            return view('admin.adminDashboard');
        } else {
            // Redirect to the homepage (index)
            return $this->index();  
        }
    }


    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
    
            // Check if product exists
            $product = Product::find($id);
            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }
    
            $cart = new Cart;
    
            // User information
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
    
            // Product information
            $cart->product_title = $product->product_title;
            $cart->price = $product->price;
            $cart->image1 = $request->selected_image; // Selected image from form
            $cart->product_id = $product->id;
    
            // Additional fields
            $cart->quantity = $request->quantity;
            $cart->size = $request->size;
    
            $cart->save();
    
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            return redirect()->route('login')->with('error', 'Please log in to add items to the cart.');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $cart = Cart::where('user_id', $user_id)->get();
    
            return view('customer.showcart', compact('cart')); // Passing $cart directly
        } else {
            return redirect()->route('login')->with('error', 'Please log in to view your cart.');
        }
    }
 
    public function remove_cart($id){
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

}
