@extends('layout')
@section('title','Registration')
@section('body')
@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif
{{-- onsubmit="return validateForm()" --}}

<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<div class="container">
        <form name="registrationForm" method="post" onsubmit="return validateForm()" action="{{ route('user.store') }}"  enctype="multipart/form-data">
        @csrf
            <div class="input-field">
                <label for="full-name"> {{__('transl.fullname')}}</label> <span>  *</span><br>
                <input type="text" name="fullname" id="full-name" onblur="validateFullName()" onkeyup="validateFullName()" ><br>
                <span id="fnameErrEmpty" class="hidden">{{__('transl.fullnameErrorEmpty')}}</span>
                <span id="fnameErr" class="hidden">{{__('transl.fullnameErr')}}</span>
            </div>


            <div class="input-field">
                <label for="user-name">{{__('transl.username')}}</label> <span>  *</span><br>
                <input type="text" name="username" id="user-name"onblur="validateUserName()"onkeyup="validateUserName()"  class="@error('username') is-invalid @enderror"><br>
                <span id="unameErr" class="hidden">{{__('transl.usernameError')}}</span>
            </div>

            <div class="input-field">
                <label for="birthday"> {{__('transl.birthday')}}</label> <span>  *</span><br>
                <input type="date" name="birthday" id= "birthday" onblur="validateBirthday()" onkeyup="validateBirthday()" ><br>
                <span id="birthdayErr" class="hidden">{{__('transl.birthdayError')}}</span>
                <button id= "date-btn" type="button" onclick="getYear(),includeApiPage()">{{__('transl.getMovies')}}</button><br>
            </div>

            <div class="input-field">
                <label for="email">{{__('transl.email')}}</label> <span>  *</span><br>
                <input type="text" name="email" id="email" value="" onblur="validateEmail()" onkeyup="validateEmail()" onkeypress="validateEmail()"><br>
                <span id="emailErrEmpty" class="hidden">{{__('transl.emailError')}}</span>
                <span id="emailErr" class="hidden">{{__('transl.emailFormatErr')}}</span>
            </div>

            <div class="input-field">
                <label for="phone">{{__('transl.phone')}}</label> <span>  *</span><br>
                <input type="tel" name="phone" id="phone"onblur="validatePhone()" onkeyup="validatePhone()" onkeypress="validateEmail()" ><br>
                <span id="phoneErr" class="hidden">{{__('transl.phoneError')}}</span>
            </div>

            <div class="input-field">
                <label for="address">{{__('transl.address')}}</label>  <span>  *</span><br>
                <input type="text" name="address" id="address" onblur="validateAddress()" onkeyup="validateAddress()" onkeypress="validateEmail()"><br>
                <span id="addressErr" class="hidden">{{__('transl.addressError')}}</span>
            </div>

            <div class="input-field">
                <label for="pwd"> {{__('transl.password')}}</label> <span>  *</span><br>
                <input type="password" name="password"id="pwd"onblur="validatePassword()"onkeyup="validatePassword()"onkeypress="validateEmail()" ><br>
                <span id="passwordErrEmpty" class="hidden">{{__('transl.passError')}}</span>
                <span id="passwordErr" class="hidden">{{__('transl.passStrongErr')}}</span>
            </div>

            <div class="input-field">
                <label for="pwd-confirm">{{__('transl.confirmPass')}}</label> <span>  *</span><br>
                <input type="password" name="password-confirmation" id="pwd-confirm" onblur="validatePasswordConfirmation()" onkeyup="validatePasswordConfirmation()" onkeypress="validateEmail()"><br>
                <span id="password2ErrEmpty" class="hidden">{{__('transl.confirmPassErr')}}</span>
                <span id="password2Err" class="hidden">{{__('transl.confirmpassMatch')}}</span>
            </div>

            {{-- <div class="input-field">
                <label for="image">{{__('transl.userImage')}}</label>
                <input type="file" name="image" id="image" /><span id="imageErr">*</span><br>
            </div> --}}

            <div class="input-field">
                <label for="image">{{__('transl.userImage')}}</label> <span>  *</span><br>
                <input type="file" name="image" id="image" accept="image/*" onblur="validateImageRequired()" onkeyup="validateImageRequired()" onkeypress="validateEmail()">
                <br><span id="imageErr" class="hidden">{{__('transl.userImgErr')}}</span>
            </div>

            <br>
            <button type='submit' >{{__('transl.submit')}}</button>
        </form>
    </div>

    <div id="movie">
        <h2>{{__('transl.topMovies')}} <span id="year"></span>: </h2>
        <ul id="topMovies">
        </ul>
     </div>

<script src="{{asset('assets/js/main.js')}}"></script>
@endsection
