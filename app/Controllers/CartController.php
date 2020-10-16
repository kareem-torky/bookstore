<?php 

namespace app\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Core\Request;
use Core\Session;
use Core\View;

class CartController 
{
    public function add($id)
    {
        $session = new Session;
        $request = new Request;
        $_SESSION['cart'][$id] = 1; 

        $request->back();
    }

    public function index()
    {
        // get cart content 
        $cart = $_SESSION['cart'];
        $book_ids = array_keys($cart);

        if(!empty($cart)) {
            $data['books'] = Book::connectTable()
                ->select("id, name, price")
                ->whereIn("id", $book_ids)
                ->get();
        } else {
            $data['books'] = [];
        }

        View::load("web/cart/index", $data);
    }

    public function store()
    {
        $session = new Session;
        $request = new Request;
        extract($_POST);
        // user id
        $user_id = $session->get("logged_user")['id'];
        // order
        $order_id = Order::connectTable()->insert([
            'user_id' => $user_id
        ])->saveAndGetId();

        // order items
        foreach ($ids as $key => $book_id) {
            OrderItem::connectTable()->insert([
                'order_id' => $order_id,
                'book_id' => $book_id,
                'quantity' => $quantities[$key]
            ])->save();
        }

        $_SESSION['cart'] = [];

        $request->redirect("");
    }

    public function empty()
    {
        $request = new Request;
        $_SESSION['cart'] = [];
        
        $request->back();
    }
}