<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;

class DashboardController extends Controller
{

    public function users()
    {
        $users=User::all();
        return view('admin.users.index', compact('users'));
    }
    public function view($id)
    {
        $users=User::find($id);
        return view('admin.users.view', compact('users'));
    }
    //dashboard
    public function index()
    {
        $totalProduct=Product::count();
        $totalCategories=Category::count();

        $totalAllUsers=User::count();
        $totalUser=User::where('is_admin', null)->count();
        $totalAdmin=User::where('is_admin','1')->count();

        $totalOrder=Order::count();

        $todayDate = date('Y-m-d');
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();

        $thisMonth=SupportCarbon::now()->format('m');
        $thisMonthOrder=Order::whereMonth('created_at',$thisMonth)->count();

        $thisYear=SupportCarbon::now()->format('Y');
        $thisYearOrder=Order::whereYear('created_at',$thisYear)->count();

        $lastMonth=SupportCarbon::now()->subMonth()->format('m');
        $lastMonthOrder=Order::whereMonth('created_at',$lastMonth)->count();

        return view('admin.index',compact('totalProduct','totalCategories','totalAllUsers','totalUser','totalAdmin','totalOrder','todayOrder','thisMonthOrder','thisYearOrder','lastMonthOrder'));


    }
    public function profile($id)
    {
        $users=User::find($id);
        return view('admin.profile.index', compact('users'));
    }
    public function settings($id)
    {
        $users=User::find($id);
        return view('admin.settings.index', compact('users'));
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',

            // Add validation rules for other fields
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update the user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed

        // Save the changes
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Verify the current password
    if (!Hash::check($request->input('current_password'), $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'Incorrect current password']);
    }

    // Update the password
    $user->password = Hash::make($request->input('new_password'));
    $user->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Password updated successfully');
}
public function today()
{
    $todayDate = date('Y-m-d');
    $todayOrders = Order::whereDate('created_at', $todayDate)->get();

    return view('admin.dashboard.today.index', compact('todayOrders'));
}

public function month()  {
    $thisMonth=SupportCarbon::now()->format('m');
    $thisMonthOrder=Order::whereMonth('created_at',$thisMonth)->get();

    return view('admin.dashboard.month.index',compact('thisMonthOrder'));
}
public function lastmonth()  {
    $lastMonth=SupportCarbon::now()->subMonth()->format('m');
    $lastMonthOrder=Order::whereMonth('created_at',$lastMonth)->get();

    return view('admin.dashboard.lastmonth.index',compact('lastMonthOrder'));
}
public function admin()  {

    $admins=User::where('is_admin',1)->get();

    return view('admin.dashboard.admin.index',compact('admins'));
}




}
