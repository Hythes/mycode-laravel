<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;

class KodeAkunRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(isset(request()->id)){
            return  [
                'id'=>'required',
                'kode' => 'required',
                'uraian' => 'required',
                'jenis' => 'required|in:DEBIT,KREDIT'
            ];            
        }
        return  [
            'kode' => 'required|unique:kode_akun',
            'uraian' => 'required',
            'jenis' => 'required|in:DEBIT,KREDIT'
        ];
    }

    protected function failedValidation(Validator $validator){

        $response = response()->error($validator->errors(),'Terjadi kesalahan!',400);

        throw (new ValidationException($validator, $response))
        ->errorBag($this->errorBag)
        ->redirectTo($this->getRedirectUrl());

    }
}
