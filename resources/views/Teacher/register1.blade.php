<script>
        function enable1()
        {
            document.getElementById('class_1').disabled = true;
            document.getElementById('class_2').disabled = true;
            document.getElementById('sub_1').disabled = true;
            document.getElementById('sub_2').disabled = true;
            document.getElementById('class_1').disabled = false;
            document.getElementById('sub_1').disabled = false;
        }
        function enable2()
        {
            document.getElementById('class_1').disabled = true;
            document.getElementById('class_2').disabled = true;
            document.getElementById('sub_1').disabled = true;
            document.getElementById('sub_2').disabled = true;
            document.getElementById('class_1').disabled = false;
            document.getElementById('class_2').disabled = false;
            document.getElementById('sub_1').disabled = false;
            document.getElementById('sub_2').disabled = false;
        }
        </script>
        
        @extends('layouts.app')
        
        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-top:20px">
                        <div class="card-header">Teacher Registration</div>
        
                        <div class="card-body">
                            <form method="POST" action='/register/teacher' >
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone_no" type="text" class="form-control" name="phone_no" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="emp_id" class="col-md-4 col-form-label text-md-right">{{ __('College Id') }}</label>
                                    <div class="col-md-6">
                                        <input id="emp_id" type="text" class="form-control" name="emp_id" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="emp_id" class="col-md-4 col-form-label text-md-right">{{ __('Select No. of Class') }}</label>
            
                                        <div class="col-md-6">
                                                <input type="radio" name="gender" style="margin-right:5px" value="" onchange = "enable1()">One <br>
                                                <input type="radio" name="gender"  style="margin-right:5px" value="" onchange = "enable2()">Two 
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <div class="col-md-6">
                                            <select id="class_1" type="text" class="form-control" style="margin-bottom: 20px" name="class_1" required disabled>
                                                    <option value= "" >Class1</option>
                                                    <option value="1">D1A</option>
                                                    <option value="2">D1B</option>
                                                    <option value="3">D2A</option>
                                                    <option value="4">D2B</option>
                                                    <option value="5">D2C</option>
                                                    <option value="6">D3</option>
                                                    <option value="7">D4A</option>
                                                    <option value="8">D4B</option>
                                                    <option value="9">D5</option>
                                                    <option value="10">D6A</option>
                                                    <option value="11">D6B</option>
                                                    <option value="12">D7A</option>
                                                    <option value="13">D7B</option>
                                                    <option value="14">D7C</option>
                                                    <option value="15">D8</option>
                                                    <option value="16">D9A</option>
                                                    <option value="17">D9B</option>
                                                    <option value="18">D10</option>
                                                    <option value="19">D11A</option>
                                                    <option value="20">D11B</option>
                                                    <option value="21">D12A</option>
                                                    <option value="22">D12B</option>
                                                    <option value="23">D12C</option>
                                                    <option value="24">D13</option>
                                                    <option value="25">D14A</option>
                                                    <option value="26">D14B</option>
                                                    <option value="27">D15</option>
                                                    <option value="28">D16A</option>
                                                    <option value="29">D16B</option>
                                                    <option value="30">D17A</option>
                                                    <option value="31">D17B</option>
                                                    <option value="32">D17C</option>
                                                    <option value="33">D18</option>
                                                    <option value="34">D19A</option>
                                                    <option value="35">D19B</option>
                                                    <option value="36">D20</option>
                                            </select>
                                        </div>
                                        <!---->
                                        <div class="col-md-6">
                                            <select id="sub_1" type="text" class="form-control" name="sub_1" required disabled>
                                                    <option value = 1 >CMPN: AM4</option>
                                                    <option value = 2 >CMPN: OS</option>
                                                    <option value = 3 >CMPN: COA</option>
                                                    <option value = 4 >CMPN: AOA</option>
                                                    <option value = 5 >CMPN: ECCF</option>
                                                    <option value = 6 >CMPN: CG</option>
                                                    <option value = 7 >CMPN: DS</option>
                                                    <option value = 8 >CMPN: AM3</option>
                                                    <option value = 9 >CMPN: DLDA</option>
                                                    <option value = 10 >CMPN: DM</option>
                                                    <option value = 11 >CMPN: PHYSICS </option>
                                                    <option value = 12 >CMPN: CHEMISTRY</option>
                                            </select>
                                        </div>
                                        <!---->
        
                                        <br>
                                        <div class="col-md-6">
                                                <select id="class_2" type="text" class="form-control" name="class_2" disabled>
                                                        <option value= "" >Class2</option>
                                                        <option value="1">D1A</option>
                                                        <option value="2">D1B</option>
                                                        <option value="3">D2A</option>
                                                        <option value="4">D2B</option>
                                                        <option value="5">D2C</option>
                                                        <option value="6">D3</option>
                                                        <option value="7">D4A</option>
                                                        <option value="8">D4B</option>
                                                        <option value="9">D5</option>
                                                        <option value="10">D6A</option>
                                                        <option value="11">D6B</option>
                                                        <option value="12">D7A</option>
                                                        <option value="13">D7B</option>
                                                        <option value="14">D7C</option>
                                                        <option value="15">D8</option>
                                                        <option value="16">D9A</option>
                                                        <option value="17">D9B</option>
                                                        <option value="18">D10</option>
                                                        <option value="19">D11A</option>
                                                        <option value="20">D11B</option>
                                                        <option value="21">D12A</option>
                                                        <option value="22">D12B</option>
                                                        <option value="23">D12C</option>
                                                        <option value="24">D13</option>
                                                        <option value="25">D14A</option>
                                                        <option value="26">D14B</option>
                                                        <option value="27">D15</option>
                                                        <option value="28">D16A</option>
                                                        <option value="29">D16B</option>
                                                        <option value="30">D17A</option>
                                                        <option value="31">D17B</option>
                                                        <option value="32">D17C</option>
                                                        <option value="33">D18</option>
                                                        <option value="34">D19A</option>
                                                        <option value="35">D19B</option>
                                                        <option value="36">D20</option>
                                                </select>
                                        </div>
                                        <!---->
                                        <div class="col-md-6">
                                            <select id="sub_2" type="text" class="form-control" name="sub_2" required disabled>
                                                    <option value = 1 >CMPN: AM4</option>
                                                    <option value = 2 >CMPN: OS</option>
                                                    <option value = 3 >CMPN: COA</option>
                                                    <option value = 4 >CMPN: AOA</option>
                                                    <option value = 5 >CMPN: ECCF</option>
                                                    <option value = 6 >CMPN: CG</option>
                                                    <option value = 7 >CMPN: DS</option>
                                                    <option value = 8 >CMPN: AM3</option>
                                                    <option value = 9 >CMPN: DLDA</option>
                                                    <option value = 10 >CMPN: DM</option>
                                                    <option value = 11 >CMPN: PHYSICS </option>
                                                    <option value = 12 >CMPN: CHEMISTRY</option>
                                            </select>
                                        </div>
                                        <!---->
                                    </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="margin-left:65px">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @if ($errors->any())    
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        
        