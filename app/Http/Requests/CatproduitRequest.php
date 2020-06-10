<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CatproduitRequest extends FormRequest
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
            'nomCat' => 'required|min:3|max:15|unique:catproduits,nomCat'
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
            'nomCat.required' => 'Le nom de catégorie est obligatoire !',
            'nomCat.min' => 'Le nom de catégorie doit contenir au minimum 3 caractères',
            'nomCat.max' => 'Le nom de catégorie doit contenir au maximum 15 caractères',
            'nomCat.unique' => 'Le nom de catégorie est déjà existe'
        ];
    }
}
