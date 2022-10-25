@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection



@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible dismiss-3" role="alert">
            {{ __($message) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif



    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ __('Admins') }} /</span> {{ __('All') }}
    </h4>

    <div class="card">
        <div class="">
            <h5 class="card-header float-start">{{ __('Admin') }}</h5>
            <a href="{{ route('admin.create') }}" class="btn btn-secondary m-3 text-white float-end">{{ __('Add') }}</a>
        </div>


        <div class="table-responsive text-nowrap">
            <table class="table tablenewdesign DataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('First Name') }}</th>
                        <th>{{ __('Last Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Password') }}</th>
                        <th>{{ __('Created Date') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php($i = 0)
                    @foreach ($users as $user)
                        @php($i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $user->id) }}" method="Post">
                                    <a href="{{ route('admin.edit', $user->id) }}" class="text-light">
                                        <i class='bx bx-edit'></i>
                                    </a> &nbsp;|
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-white text-light"><i
                                            class='bx bxs-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-4 pt-4 d-flex justify-content-end">

            </div>
        </div>
    </div>

    <script>
        // Remove alert after 3sec of page load 
        setTimeout(function() {
            $(".alert").slideUp(800);
        }, 3000);
    </script>
@endsection
