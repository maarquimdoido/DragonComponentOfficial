<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    	{
            $users = User::all();
            $orders = Order::orderBy('id', 'desc')->take(5)->get();
            $categories = Category::all();
            $subcategories = Subcategory::all();

            $lucro = $this->calcularLucro();
            $pagamentos = $this->pagamentosEmEuro(); //total de euros de pagamento
            $compras = $this->todosOrders(); //total de pedidos
            $totalUsuarios = $this->todosUsuarios();

            return view('admin.dashboard', compact('users', 'orders', 'categories', 'subcategories', 'lucro', 'pagamentos', 'compras' ,'totalUsuarios'));
        }

        public function calcularLucro(){
            $tudo = $this->pagamentosEmEuro();
            $gastos = 0.30;
            $lucro = $tudo - ($tudo * $gastos);

            return $lucro;

        }
        public function pagamentosEmEuro(){
            $totalOrderPriceSum = Order::sum('total_price');
            return  $totalOrderPriceSum;
        }
        public function todosOrders(){
            $totalOrdersCount = Order::count();
            return $totalOrdersCount;
        }
        public function todosUsuarios(){
            $totalUsersCount = User::count();
            return $totalUsersCount;
        }

    
}
