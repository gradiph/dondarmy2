<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DonorTambahRequest extends Request
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
            'no_register' => 'required|unique:donors,no_register',
            'nama' => 'required',
            'gol_darah_id' => 'required|alpha_num',
            'kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'telp' => 'required|alpha_num',
            'alamat' => '',
            'rt' => 'alpha_num',
            'rw' => 'alpha_num',
            'kelurahan' => '',
            'kecamatan' => '',
            'kode_pos' => 'alpha_num',
            'pekerjaan_id' => 'required|alpha_num',
            'penghargaan' => '',
            'total_donor' => 'number',
            'donor_terakhir' => 'date',
        ];
    }
    public function messages()
    {
        return [
            'no_register.required' => 'No. Register tidak boleh kosong.',
            'no_register.unique' => 'No. Register sudah terpakai.',
            'nama.required' => 'Nama tidak boleh kosong.',
            'gol_darah_id.required' => 'Gol. Darah tidak boleh kosong.',
            'gol_darah_id.alpha_num' => 'Gol. Darah salah.',
            'kelamin.required' => 'Jenis Kelamin tidak boleh kosong.',
            'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong.',
            'tgl_lahir.required' => 'Tanggal lahir tidak boleh kosong.',
            'tgl_lahir.date' => 'Format tanggal lahir salah.',
            'telp.required' => 'Telepon tidak boleh kosong.',
            'telp.alpha_num' => 'Telepon harus angka.',
            'rt.alpha_num' => 'RT harus angka.',
            'rw.alpha_num' => 'RW harus angka.',
            'kode_pos.alpha_num' => 'Kode pos harus angka.',
            'pekerjaan_id.required' => 'Pekerjaan tidak boleh kosong.',
            'pekerjaan_id.alpha_num' => 'Pekerjaan salah.',
            'total_donor.number' => 'Total donor harus angka.',
            'donor_terakhir.date' => 'Format donor terakhir salah.',
        ];
    }
}
