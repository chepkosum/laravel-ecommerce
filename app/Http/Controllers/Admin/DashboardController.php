<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index(){

    $totalProducts = Product::count();
    $totalCategory = Category::count();
    $totalBrands = Brand::count();

    $totalAllUsers = User::count();
    $totalUser = User::where('role_as', '0')->count();
    $totalAdmin = User::where('role_as', '1')->count();

    $todayDate = Carbon::now()->format('d-m-Y');
    $thisMonth = Carbon::now()->format('m');
    $thisYear = Carbon::now('Y');

    $totalOrder = Order::count();
    $todayOrder = Order::whereDate('created_at', $todayDate)->count();
    $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
    $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();


    return view('admin.dashboard', compact('totalProducts','totalCategory',
     'totalBrands', 'totalAllUsers', 'totalUser', 'totalAdmin', 'todayOrder','totalOrder', 'thisMonthOrder',
    'thisYearOrder'));
   }
}
