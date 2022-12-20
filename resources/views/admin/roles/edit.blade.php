{{-- resources/views/admin/roles/edit.blade.php --}}
@extends('layouts.admin')

@push('styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @csrf 
            @method('PUT')
            <div class="container">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" placeholder="English" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="permissions" class="col-md-4 col-form-label text-md-end">{{ __('Permissions') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if ($role->hasPermissionTo($permission->name)) checked @endif id="checkbox_{{ $permission->id }}">
                            <label class="form-check-label" for="checkbox_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                          </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        <button class="btn btn-success float-end" type="submit">{{ __('Update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('javascripts')

@endpush
{{-- resources/views/admin/roles/edit.blade.php --}}