<?php

namespace App\Http\Requests\User;

// Library
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

// Middleware
use Gate;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'tps_id' => [
                'nullable'
            ],
            'name' => [
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'unique:users', 'max:255'
            ],
            'password' => [
                'min:8', 'string', 'max:255', 'mixedCase'
            ],
            'foto' => [
                'nullable', 'mimes:jpeg,svg,png', 'max:10000'
            ],
        ];
    }
}
