@extends('layouts.app')
@section('title', 'Listagem')
@section('content')

    <style>
        body {
            background-color: #f9f9fa;
        }
#passaporte{
  display:none;
}
    </style>

    <div class="container mt-5">
        <h1>CADASTRE-SE</h1>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>

        @endif
        <form action="{{ route('cadastros-store') }}" method="POST">
            @csrf
            <div class="form-group" style="border:grey 1px solid; backgroud-color:#fff; padding:20px;">
                <div class="row">
                    <!-- inicio da primeira coluna -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nome"><b>Nome Completo:</b></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Digite seu nome" value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Sexo:</b></label><br>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                                    id="inlineRadio1" value="0"   {{ old('sex') == '0' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('sex') is-invalid @enderror" type="radio" name="sex"
                                    id="inlineRadio2" value="1" {{ old('sex') == '1' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Feminino</label>
                            </div>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Cep:</b></label>
                            <input type="text" id="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                                name="zip_code" placeholder="Digite seu Cep" value="{{ old('zip_code') }}">
                            @error('zip_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Complemento:</b></label>
                            <input type="text" maxlength="100"
                                class="form-control @error('complement') is-invalid @enderror" name="complement"
                                placeholder="EX: Casa, Apartamento, Bloco 1" value="{{ old('complement') }}">
                            @error('complement')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Cidade:</b></label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                placeholder="Cidade" value="{{ old('city') }}">
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Email:</b></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Digite seu e-mail" >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="nome"><b>Senha:</b></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" placeholder="Digite sua senha">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="nome"><b>Confirmar Senha:</b></label>
                                    <input type="password" class="form-control @error('passwdSame') is-invalid @enderror"
                                        name="passwdSame" placeholder="Confirme sua senha">
                                    @error('passwdSame')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Celular:</b></label>
                            <input type="text" id="cellphone" class="form-control @error('cellphone') is-invalid @enderror"
                                name="cellphone" placeholder="Digite seu celular">
                            @error('cellphone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Fim da primeira coluna -->

                    <!-- inicio da segunda coluna -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nome"><b>Data de Nascimento:</b></label>
                            <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                name="birth_date">
                            @error('birth_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Nacionalidade:</b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('nationality') is-invalid @enderror" type="radio"
                                    name="nationality" id="inlineRadio3" onclick="javascript:mostraNacionalidade();" value="0">
                                <label class="form-check-label" for="inlineRadio3">Brasileiro</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('nationality') is-invalid @enderror" type="radio"
                                    name="nationality" id="inlineRadio4" onclick="javascript:mostraNacionalidade();" value="1">
                                <label class="form-check-label" for="inlineRadio4">Estrangeiro</label>
                            </div>
                        </div>
                        @error('nationality')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <br>

                        <div class="form-group" id="cpff">
                            <label for="cpf"><b>CPF:</b></label>
                            <input type="text" id="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                placeholder="Digite seu Cpf">
                            @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="passaporte">
                            <label for="passaport"><b>Passaporte:</b></label>
                            <input type="text" id="passport"  class="form-control @error('cpf') is-invalid @enderror" name="passaporte"
                                placeholder="Digite seu Passaporte">
                            @error('passaporte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group" id="rgg">
                            <br>
                            <label for="nome"><b>RG:</b></label>
                            <input type="text" id="rg" class="form-control @error('rg') is-invalid @enderror" name="rg"
                                placeholder="Digite seu RG">
                            @error('rg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Endereço:</b></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                placeholder="Digite seu endereço">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Numero:</b></label>
                            <input type="text" class="form-control @error('number') is-invalid @enderror" name="number"
                                placeholder="Numero">
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Bairro:</b></label>
                            <input type="text" class="form-control @error('district') is-invalid @enderror" name="district"
                                placeholder="Digite bairro">
                            @error('district')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nome"><b>Estado:</b></label>
                            <select name="state" class="form-control @error('state') is-invalid @enderror" id="1">
                                <option value=""></option>
                                <option value="Alagoas">Alagoas</option>
                                <option value="Acre">Acre</option>
                                <option value="Amapá">Amapá</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Ceará">Ceará</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Espírito Santo">Espírito Santo</option>
                                <option value="Goiás">Goiás</option>
                                <option value="Maranhão">Maranhão</option>
                                <option value="Mato Grosso">Mato Grosso</option>
                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                                <option value="Pará">Pará</option>
                                <option value="Paraíba">Paraíba</option>
                                <option value="Paraná">Paraná</option>
                                <option value="Pernambuco">Pernambuco</option>
                                <option value="Piauí">Piauí</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                <option value="Rondônia">Rondônia</option>
                                <option value="Roraima">Roraima</option>
                                <option value="Santa Catarina">Santa Catarina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Sergipe">Sergipe</option>
                                <option value="Tocantins">Tocantins</option>
                            </select>
                            </select>

                            @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>

                        <br>
                        <input type="submit" name="submit" value="Cadastrar" class="btn btn-primary" style="float: right">

                    </div>
                    <!-- Fim da segunda coluna -->
                </div>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <script>
            function mostraNacionalidade() {
                if (document.getElementById('inlineRadio3').checked) {
                    document.getElementById('cpff').style.display = 'block';
                    document.getElementById('rgg').style.display = 'block';
                    document.getElementById('passaporte').style.display = 'none';
                    document.querySelector("[name='passaporte']").value = 'Brasileiro';
                } else {
                    document.getElementById('cpff').style.display = 'none';
                    document.getElementById('rgg').style.display = 'none';
                    document.getElementById('passaporte').style.display = 'block';
                    document.querySelector("[name='cpf']").value = 'Estrangeiro';
                    document.querySelector("[name='rg']").value = 'Estrangeiro';
                }
            }

            $("#zip_code").focus(function() {
                $(this).val($(this).val().replace('/', ''));
                $(this).mask("99999-999");
            });


            $("#cpf").focus(function() {
                $(this).val($(this).val().replace('/', ''));
                $(this).mask("999.999.999-99");
            });

            $("#rg").focus(function() {
                $(this).val($(this).val().replace('/', ''));
                $(this).mask("99.999.999-9");
            });

            $("#cellphone").focus(function() {
                $(this).val($(this).val().replace('/', ''));
                $(this).mask("(99) 99999-9999");
            });

            $("#passport").focus(function() {
                $(this).val($(this).val().replace('/', ''));
                $(this).mask("AA999999");
            });

        </script>
    </div>
@endsection
