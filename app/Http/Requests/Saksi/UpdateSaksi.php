<?php

namespace App\Http\Requests\Saksi;

use Illuminate\Foundation\Http\FormRequest;
// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

// Middleware
use Gate;

class UpdateSaksi extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('saksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'nullable'
            ],
            'kecamatan_id' => [
                'nullable'
            ],
            'desa_id' => [
                'nullable'
            ],
            'user_id' => [
                'nullable'
            ],
            'nama' => [
                'nullable', 'string', 'max:255'
            ],
            'nik' => [
                'nullable',
                Rule::unique('saksi', 'nik')->ignore($this->route('saksi'), 'id'),
            ],
            'jenis_kelamin' => [
                'nullable', 'string'
            ],
            'no_hp' => [
                'nullable', 'string'
            ],
            'umur' => [
                'nullable', 'string'
            ],
            'keterangan' => [
                'nullable', 'string'
            ],
            'status' => [
                'nullable', 'string'
            ],
            'foto' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
