<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
             'nom' => 'required|min:3|max:15|alpha',
             'prenom' =>'required|min:3|max:15|alpha',
             'login' => 'required',
             'email' => 'required|unique:clients,email|email:rfc,dns',
             'adresse' => 'required',
             'password' => 'required',
             'ca' =>'required',
             //'date_inscr'=>'date|date_equals:today',
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
            'nom.required' => 'Le Nom est obligatoire',
            'nom.min' => 'Le nom doit contenir au minimum 3 caractères',
            'nom.max' => 'Le nom doit contenir au maximum 15 caractères',
            'nom.alpha' => 'Le nom ne peut contenir que des lettres ',
            'prenom.alpha' => 'Le Prénom ne peut contenir que des lettres ',
            'prenom.required' => 'le prénom est obligatoire',
            'prenom.min' => 'Le prénom doit contenir au minimum 3 caractères',
            'prenom.max' => 'Le prénom doit contenir au maximum 15 caractères',
            'login.required' => 'Login est obligatoire',
            'adresse.required' => 'adresse est obligatoire',
            'email.required' => 'Veuillez entrer votre email',
            'email.unique' => 'Email est déjà existe',
            'password.required' => 'Le mot de passe est obligatoire',
            'ca.required' => 'Le chiffre daffaire est obligatoire ',
            'imgPath.required' => 'Image est obligatoire'
           // 'date_inscr.date_equals' => 'La date de inscription doit être une date égale à la date actuelle'
        ];
    }

}
