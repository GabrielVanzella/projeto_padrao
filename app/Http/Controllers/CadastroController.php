<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class CadastroController extends Controller
{

    public function index()
    {
        $cadastros = People::all();
        return view('cadastro.index', ['cadastros' => $cadastros]);
    }

    public function create()
    {
        return view('cadastro.create');
    }

    public function store(Request $request)
    {

        $resultado = $this->validaCPF($request->cpf);
        if ($resultado == false) {
            dd('cpf invalido');
        }

        $validated = $request->validate(
            [
                'name' => ['required', 'max:50'],
                'birth_date' => 'required',
                'sex' => 'required',
                'nationality' => 'required',
                'cpf' => ['required', 'unique:App\Models\People,cpf', 'min:14', 'max:14',],
                'rg' => ['required', 'unique:App\Models\People,rg'],
                'zip_code' => 'required',
                'address' => 'required',
                'number' => 'required',
                'complement' => 'required',
                'district' => 'required',
                'city' => 'required',
                'state' => 'required',
                'email' => ['required', 'unique:App\Models\People,name'],
                'password' => 'required',
                'passwdSame' => ['required', 'same:password'],
                'cellphone' => 'required',
            ],
            [
                'name.required' => __('validation.required', ['attribute' => 'nome']),
                'name.max' => __('validation.required', ['attribute' => 'nome']),

                'birth_date.required' => __('validation.required', ['attribute' => 'data de nascimento']),

                'sex.required' => __('validation.required', ['attribute' => 'sexo']),

                'nationality.required' => __('validation.required', ['attribute' => 'nacionalidade']),

                'cpf.required' => __('validation.required', ['attribute' => 'CPF']),
                'cpf.unique' => __('validation.required', ['attribute' => 'CPF']),
                'cpf.min' => __('validation.required', ['attribute' => 'CPF']),
                'cpf.max' => __('validation.required', ['attribute' => 'CPF']),

                'passwdSame.same' => 'As senhas não são iguais',
            ]
        );

        $PessoaObj = new People();
        $PessoaObj->name = $request->name;
        $PessoaObj->birth_date = $request->birth_date;
        $PessoaObj->sex = $request->sex;
        $PessoaObj->nationality = $request->nationality;
        $PessoaObj->cpf = $request->cpf;
        $PessoaObj->passaporte = $request->passaporte;
        $PessoaObj->rg = $request->rg;
        $PessoaObj->zip_code = $request->zip_code;
        $PessoaObj->address = $request->address;
        $PessoaObj->number = $request->number;
        $PessoaObj->complement = $request->complement;
        $PessoaObj->district = $request->district;
        $PessoaObj->city = $request->city;
        $PessoaObj->state = $request->state;
        $PessoaObj->email = $request->email;
        $PessoaObj->password = $request->password;
        $PessoaObj->cellphone = $request->cellphone;
        $PessoaObj->save();
        return redirect()->route('cadastros-index');
    }



    function validaCPF($cpf)
    {

        if ($cpf == 'Estrangeiro') {

            return true;
        } else {

            // Extrai somente os números
            $cpf = preg_replace('/[^0-9]/is', '', $cpf);

            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }

            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }

            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    public function edit($id)
    {
        $cadastros = People::where('id', $id)->first();
        if (!empty($cadastros)) {
            return view('cadastro.edit', ['cadastros' => $cadastros]);
        } else {
            return redirect()->route('cadastros-index');
        }
    }

    public function update(Request $request, $id)
    {

        $resultado = $this->validaCPF($request->cpf);
        if ($resultado == false) {
            dd('cpf invalido');
        }

        $validated = $request->validate([
            'name' => 'required',
            'birth_date' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'number' => 'required',
            'complement' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cellphone' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'sex' => $request->sex,
            'nationality' => $request->nationality,
            'cpf' => $request->cpf,
            'passaporte' => $request->passaporte,
            'rg' => $request->rg,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'number' => $request->number,
            'complement' => $request->complement,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
            'email' => $request->email,
            'password' => $request->password,
            'cellphone' => $request->cellphone,
        ];

        People::where('id', $id)->update($data);
        return redirect()->route('cadastros-index');
    }

    public function destroy($id)
    {
        People::where('id', $id)->delete();
        return redirect()->route('cadastros-index');
    }

    public function falar_1()
    {
        $objeto = new Teste;
        return $objeto->falar();
    }

    public function teste()
    {
        $id = 1;
        $cadastros = People::where('id', $id)->first();
        return view('cadastro.edit', ['cadastros' => $cadastros]);
    }
}
