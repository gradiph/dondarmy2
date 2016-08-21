<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KegiatanUbahRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tgl' => 'required|date',
            'tempat' => 'required',
            'target_labu' => 'required|alpha_num',
        ];
    }
    public function messages()
    {
        return [
            'tgl.required' => 'Tanggal tidak boleh kosong.',
            'tgl.date' => 'Format tanggal salah.',
            'tempat.required' => 'Tempat tidak boleh kosong.',
            'target_labu.required' => 'Target labu tidak boleh kosong.',
            'target_labu.alpha_num' => 'Target labu harus angka',
        ];
    }
}
