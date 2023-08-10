<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = [
            [
                "name" => "	Nguyễn Văn A",
                "phone" => "01234567890",
                "email" => "email.test@mail.com	"
            ],
            ["name" => "	Nguyễn Văn B	",
                "phone" => "01234567890",
                "email" => "email.test@mail.com		"
            ],
            [
                "name" => "	Nguyễn Văn A",
                "phone" => "01234567890",
                "email" => "email.test@mail.com	"
            ],
        ];
        return view('baihoc2.customer.index',compact('customers'));
    }  

    public function create()
    {
       return view('baihoc2.customer.create');
    }
    public function show(Request $request )
    {
        $id = $request->id;
        $name = $request['name'];
        $phone = $request['phone'];
        $email = $request['email'];
        $data = [
            "id"=> $id,
            "name"=> $name,
            "phone"=> $phone,
            "email"=> $email,
        ];
        return view('baihoc2.customer.show' , compact('data'));
    }

    public function edit($id)
    {
        $customers = [
            [
                "id" => 1,
                "name" => "Nguyễn Văn A",
                "phone" => "01234567890",
                "email" => "email.test@mail.com"
            ],
            [
                "id" => 2,
                "name" => "Nguyễn Văn B",
                "phone" => "01234567890",
                "email" => "email.test@mail.com"
            ],
            [
                "id" => 3,
                "name" => "Nguyễn Văn C",
                "phone" => "01234567890",
                "email" => "email.test@mail.com"
            ]
        ];
    
        // Tìm kiếm khách hàng trong mảng dựa trên ID
        $customer = collect($customers)->firstWhere('id', $id);
    
        // Kiểm tra xem khách hàng có tồn tại không
        if (!$customer) {
            return redirect()->back()->with('error', 'Không tìm thấy khách hàng');
        }
    
        // Trả về view "edit" và truyền dữ liệu khách hàng
        return view('baihoc2.customer.edit', compact('customer'));
    }
    
    public function store(Request $request)
    {
        return view('baihoc2.customer.index');
    }

}
