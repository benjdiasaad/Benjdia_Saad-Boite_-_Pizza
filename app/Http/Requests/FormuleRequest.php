<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class FormuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'nomFormule' => 'required|min:3|max:20',
             'prix' =>'required',
             'description' => 'required',
             'imgPath' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nomFormule.required' => 'Le Nom de Formule est obligatoire',
            'nomFormule.min' => 'Le nom de formule doit contenir au minimum 3 caractères',
            'nomFormule.max' => 'Le nom de formule doit contenir au maximum 20 caractères',
            'prix.required' => 'Le prix est obligatoire',
            'description.required' => 'La description est obligatoire',
            'imgPath.required' => 'Image de formule est obligatoire'
        ];
    }
}
