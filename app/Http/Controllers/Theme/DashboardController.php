<?php

namespace App\Http\Controllers\Theme;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){
        
        $totalProducts =Product::count();
        $totalCategories = Category::count();
        $totalBrands = Brand::count(); 

        $totalAllUsers =User::count();
        $totalUsers = User::where('status','0')->count();
        $totalAdmin = User::where('status', '1')->count();

        $todayDate =Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder =Order::count();
        $todayOrder =Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereMonth('created_at', $thisYear)->count();
              
        return view('admin-theme.dashboard',
        compact('totalProducts', 'totalCategories', 'totalBrands','totalAllUsers','totalOrder',
        'todayDate','thisMonthOrder','thisYearOrder',
                'totalUsers'));
    }
}