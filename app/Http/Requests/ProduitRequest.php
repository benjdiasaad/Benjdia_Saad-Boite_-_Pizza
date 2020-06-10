<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'nom' => 'required|min:5|max:35',
            'prix'=> 'required',
            'remise' => 'required',
            'isPromo' => 'required',
            //'date_fin' => 'date|after:date_debut',
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
            'nom.required' => 'Le Nom de produit est obligatoire',
            'nom.min' => 'Le nom de produit doit contenir au minimum 3 caractères',
            'nom.max' => 'Le nom de prosuit doit contenir au maximum 15 caractères',
            'prix.required' => 'le prix est obligatoire',
            'remise.required' => 'remise est obligatoire',
            'isPromo.required' => 'Le champ promotion est obligatoire',
           // 'date_fin.after' => 'La date fin doit être une date supérieure à la date début',
            'imgPath.required' => 'Image de Produit est Obligatoire'
        ];
    }
}
