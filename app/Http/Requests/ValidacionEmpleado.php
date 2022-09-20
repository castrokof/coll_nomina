<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class ValidacionEmpleado extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *


     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors);
        }
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->route('id')) {
            return [
                'papellido'  => 'required|max:100',
                'pnombre'  => 'required|max:100',
                'documento' => 'numeric|required|min:10000|max:999999999999',
                'tipo_documento' => 'required',
                'email' => 'required|unique:empleados,email,'.$this->route('id'),
                'ips' => 'required',
                'position' => 'required',
                'date_in' => 'required',
                'user_id' => 'required',
                'activo' => 'required'
            ];
        } else {
            return [
                'papellido'  => 'required|max:100',
                'pnombre'  => 'required|max:100',
                'documento' => 'numeric|required|min:10000|max:999999999999',
                'tipo_documento' => 'required',
                'email' => 'required|unique:empleados,email,'.$this->route('id'),
                'ips' => 'required',
                'position' => 'required',
                'date_in' => 'required',
                'user_id' => 'required',
                'activo' => 'required'
            ];
        }
    }
}
