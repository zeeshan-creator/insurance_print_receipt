@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ __('Admin') }} /</span> {{ __('Edit') }}
    </h4>

    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">

                <!-- User Edit -->

                <hr class="my-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $admin->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                <input class="form-control @error('first_name')  is-invalid @enderror" type="text"
                                    id="first_name" name="first_name" placeholder="{{ __('First Name') }}"
                                    value="{{ $admin->first_name }}" autofocus />
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3
                                col-md-6">
                                <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                <input class="form-control @error('last_name')  is-invalid @enderror" type="text"
                                    name="last_name" id="last_name" placeholder="{{ __('Last Name') }}"
                                    value="{{ $admin->last_name }}" />
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input class="form-control @error('email')  is-invalid @enderror" type="email"
                                    id="email" name="email" placeholder="{{ __('Email') }}"
                                    value="{{ $admin->email }}" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input class="form-control @error('password')  is-invalid @enderror" type="text"
                                    id="password" name="password" placeholder="{{ __('Password') }}"
                                    value="{{ $admin->password }}" />
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Save changes') }}</button>
                        </div>
                    </form>
                </div>
                <!-- /User Edit -->
            </div>
        </div>
    </div>
@endsection
