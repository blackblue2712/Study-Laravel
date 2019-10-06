<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HocSinh;
class HocSinhController extends Controller
{
    //
    public function index(){
    	$hs = HocSinh::all();
    	return view('restful.list', ['hocsinh' => $hs]);
    }

    public function getCreate(){
    	return view('restful.add');
    }

    public function postCreate(Request $req){
        $this->validate($req, 
            [
                'txtHoTen' => 'required|unique:hocsinh, hoten',
                'txtToan' => 'required|max:10|min:0',
                'txtLy' => 'required|max:10|min:0',
                'txtHoa' => 'required|max:10|min:0'
            ],
            [
                'txtHoTen.required' => 'Bạn phải nhập họ tên',
                'txtToan.required' => 'Bạn phải nhập điểm toán',
                'txtToan.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtToan.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtLy.required' => 'Bạn phải nhập điểm lý',
                'txtLy.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtToanLy.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.required' => 'Bạn phải nhập điểm hoá',
                'txtHoa.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
            ]
        );
        $hs = new HocSinh;
        $hs->hoten  = $req->txtHoTen;
        $hs->toan   = $req->txtToan;
        $hs->ly     = $req->txtLy;
        $hs->hoa    = $req->txtHoa;

        $hs->save();

        return redirect()->route('hocsinh.index');
    }

    public function list(){
        return view('restful.list', ['hocsinh' => HocSinh::all()]);
    }


    /*public function store(Request $req){
        $this->validate($req, 
            [
                'txtHoTen' => 'required|unique:hocsinh, hoten',
                'txtToan' => 'required|max:10|min:0',
                'txtLy' => 'required|max:10|min:0',
                'txtHoa' => 'required|max:10|min:0'
            ],
            [
                'txtHoTen.required' => 'Bạn phải nhập họ tên',
                'txtToan.required' => 'Bạn phải nhập điểm toán',
                'txtToan.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtToan.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtLy.required' => 'Bạn phải nhập điểm lý',
                'txtLy.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtToanLy.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.required' => 'Bạn phải nhập điểm hoá',
                'txtHoa.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
            ]
        );
    	$hs = new HocSinh;
    	$hs->hoten 	= $req->txtHoTen;
    	$hs->toan 	= $req->txtToan;
    	$hs->ly 	= $req->txtLy;
    	$hs->hoa 	= $req->txtHoa;

    	$hs->save();

    	return redirect()->route('hocsinh.index');	
    }*/


    public function destroy($id){
    	HocSinh::findOrFail($id)->delete();
    	return redirect()->route('hocsinh/list');
    }

    public function getEdit($id){
        return view('restful.edit', ['hocsinh' => HocSinh::find($id)]);
    }

    public function postEdit($id, Request $req){
        $hs = HocSinh::find($id);
        $this->validate($req, 
            [
                'txtHoTen' => 'required|unique:hocsinh, hoten,'.$id,
                'txtToan' => 'required|max:10|min:0',
                'txtLy' => 'required|max:10|min:0',
                'txtHoa' => 'required|max:10|min:0'
            ],
            [
                'txtHoTen.required' => 'Bạn phải nhập họ tên',
                'txtToan.required' => 'Bạn phải nhập điểm toán',
                'txtToan.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtToan.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtLy.required' => 'Bạn phải nhập điểm lý',
                'txtLy.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtLy.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.required' => 'Bạn phải nhập điểm hoá',
                'txtHoa.min' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
                'txtHoa.max' => 'Điểm nhập vào phải có giá trị từ 0 - 10',
            ]
        );

        $hs->hoten = $req->TxtHoTen;
        $hs->toan = $req->TxtToan;
        $hs->ly = $req->TxtLy;
        $hs->hoa = $req->TxtHoa;
        $hs->save();

        return redirect()->route('hocsinh.index');
    }
}
