<?php

namespace App\Http\Requests\Saksi;

use Illuminate\Foundation\Http\FormRequest;
// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

// Middleware
use Gate;

class StoreSaksi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('saksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'paket_id' => [
                'nullable'
            ],
            'caleg_id' => [
                'required'
            ],
            'kecamatan_id' => [
                'required'
            ],
            'desa_id' => [
                'required'
            ],
            'user_id' => [
                'required'
            ],
            'nama' => [
                'required', 'string', 'max:255'
            ],
            'nik' => [
                'required', Rule::unique('saksi', 'nik'),
            ],
            'jenis_kelamin' => [
                'required', 'string'
            ],
            'no_hp' => [
                'required', 'string'
            ],
            'umur' => [
                'required', 'string'
            ],
            'keterangan' => [
                'nullable', 'string'
            ],
            'status' => [
                'required', 'string'
            ],
            'foto' => [
                'required', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
