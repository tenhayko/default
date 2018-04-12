<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin', 'Perminssions']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.admin');
    }
    // quan ly admin
    public function getList(Request $request)
    {
        if($request->get('search')){
            return Admin::where('name', 'like', '%'.$request->get('search').'%')
                                                    ->where('delete',false)
                                                    ->orderBy('id', 'DESC')
                                                    ->paginate(10);
        }else{
            return Admin::orderBy('id', 'DESC')->where('delete',false)->paginate(10);
        }
    }
    public function getInfo($id)
    {
        $admin = Admin::findOrFail($id);
        return ['info'=>$admin];
    }
    public function getProfile()
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        return ['info'=>$admin];
    }
    public function uploadProfile(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:jpeg,jpg,png|max:10000',
            'user'=>'required',
        ],[
            'file.required'=>'Bạn chưa chọn hình ảnh',
            'file.mimes'=>'File bạn chọn không đúng định dạng',
            'file.max'=>'File bạn chọn quá nặng',
        ]);
        $admin = Admin::findOrFail($request->user);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension('file');
            if ($ext != 'jpg' && $ext !='png' & $ext !='jpeg') {
                abort(500);
            }else{
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                $dist = 'uploads/avatar/'.$Hinh;
                imageResizeByTmp($file->getPathName(),$dist,128,128,$ext);
                $admin->image = $dist;
                $admin->save();
                return ['info'=>$admin];
            }
        }else{
            abort(500);
        }
    }
    public function postAdd(Request $request)
    {
        $admin = new Admin();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required',
        ]);

        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->job_title = $request->job_title;
        $admin->phone = $request->phone;
        $admin->status = 1;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return $admin;
    }
    public function getEdit($id)
    {
        $admin = Admin::findOrFail($id);
        return $admin;
    }
    public function postEdit(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'phone' => 'required|string|max:255'
        ]);

        $admin->name = $request->name;
        $admin->job_title = $request->job_title;
        $admin->phone = $request->phone;
        $admin->save();
        return $admin;
    }
    public function postDelete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return 'Xóa thành công';
    }
    public function upload(Request $request)
    {
        $this->validate($request,[
            'file'=>'required|mimes:jpeg,jpg,png|max:10000',
            'user'=>'required',
        ],[
            'file.required'=>'Bạn chưa chọn hình ảnh',
            'file.mimes'=>'File bạn chọn không đúng định dạng',
            'file.max'=>'File bạn chọn quá nặng',
        ]);
        $admin = Admin::findOrFail($request->user);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension('file');
            if ($ext != 'jpg' && $ext !='png' & $ext !='jpeg') {
                abort(500);
            }else{
                $name = $file->getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                $dist = 'uploads/avatar/'.$Hinh;
                imageResizeByTmp($file->getPathName(),$dist,128,128,$ext);
                $admin->image = $dist;
                $admin->save();
                return ['info'=>$admin];
            }
        }else{
            abort(500);
        }
    }
}
