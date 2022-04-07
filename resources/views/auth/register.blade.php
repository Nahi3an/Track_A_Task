@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="row mb-3">

                                <label for="first_name"
                                    class="col-md-2 col-form-label text-md-end">{{ __('First Name') }}</label>
                                <div class="col-md-4">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="last_name"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <div class="col-md-4">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Origin') }}</label>

                                <div class="col-md-6">
                                    <select id="country" type="text"
                                        class="form-control @error('country') is-invalid @enderror" name="country"
                                        value="{{ old('country') }}" required autocomplete="country" autofocus">
                                        <option value="not_selected">Not Selected</option>

                                        @foreach ($countries as $country)
                                            @if (old('country') == $country->id)
                                                <option value="{{ $country->id }}" selected>{{ $country->name }}
                                                </option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <select id="company_id" type="text"
                                        class="form-control @error('company_id') is-invalid @enderror" name="company_id"
                                        value="{{ old('company_id') }}" required autocomplete="company_id" autofocus>

                                        <option value="not_selected">Not Selected</option>

                                        @foreach ($companies as $company)
                                            @if (old('company_id') == $company->id)
                                                <option value="{{ $company->id }}" selected>{{ $company->name }}
                                                </option>
                                            @else
                                                <option value="{{ $company->id }}">{{ $company->name }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('company_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" type="text" class="form-control @error('role') is-invalid @enderror"
                                        name="role" value="{{ old('role') }}" required autocomplete="role" autofocus">

                                        <option value="not_selected">Not Selected</option>

                                        @foreach ($roles as $role)
                                            @if (old('role') == $role->id)
                                                <option value="{{ $role->id }}" selected>{{ $role->name }}
                                                </option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                </option>
                                            @endif
                                        @endforeach

                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Company Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="personal_email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Personal Email') }}</label>

                                <div class="col-md-6">
                                    <input id="personal_email" type="email"
                                        class="form-control @error('personal_email') is-invalid @enderror"
                                        name="personal_email" value="{{ old('personal_email') }}" required
                                        autocomplete="personal_email">

                                    @error('personal_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="contact_number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                                <div class="col-md-6">
                                    <input id="contact_number" type="text"
                                        class="form-control @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ old('contact_number') }}" required
                                        autocomplete="contact_number">

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Personal Address') }}</label>

                                <div class="col-md-6">
                                    <textarea id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required
                                        autocomplete="address">{{ old('address') }} </textarea>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
