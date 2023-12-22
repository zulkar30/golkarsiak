<?php

namespace App\Http\Requests\Kegiatan;

use Illuminate\Foundation\Http\FormRequest;

// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

// Middleware
use Gate;

class StoreKegiatan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('kegiatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'nama_kegiatan' => [
                'required', 'string', 'max:255'
            ],
            'tanggal' => [
                'required', 'string'
            ],
            'waktu' => [
                'required', 'string'
            ],
            'lokasi' => [
                'required', 'string'
            ],
            'keterangan1' => [
                'nullable', 'string'
            ],
            'keterangan2' => [
                'nullable', 'string'
            ],
            'status' => [
                'nullable', 'string'
            ],
        ];
    }
}
