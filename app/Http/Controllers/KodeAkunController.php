<?php

namespace App\Http\Controllers;

use App\Http\Requests\KodeAkunRequest;
use App\Models\KodeAkunModel;
use Illuminate\Http\Request;

class KodeAkunController extends Controller
{
    public function get($id){
        $res = KodeAkunModel::find($id);
        return response()->api($res,"Berhasil mengambil kode akun");

    }
    public function fetch(){
        $res = KodeAkunModel::paginate(10);
        return response()->api($res,"Berhasil mengambil kode akun");

    }
    public function update(KodeAkunRequest $request){
        KodeAkunModel::where('id',$request->id)->update($request->all());
        $br = KodeAkunModel::find($request->id);
        return response()->api($br,'Berhasil edit Kode Akun');
    }
    public function destroy($id){
        KodeAkunModel::destroy($id);
        return response()->api([],'Berhasil hapus Kode Akun');


    }
    public function store(KodeAkunRequest $request){

            $create = KodeAkunModel::create($request->all());
            return response()->api($create,'Berhasil membuat Kode Akun');
    }
}
