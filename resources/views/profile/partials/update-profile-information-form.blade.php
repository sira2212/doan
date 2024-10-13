@extends('layout')
@section('content_wrapper')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"> Tài khoản của tôi</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Tài khoản</a>
          </li>
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Thông tin chi tiết</h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img
                src="../assets/img/avatars/1.png"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar" />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Cập nhật ảnh</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input
                    type="file"
                    id="upload"
                    class="account-file-input"
                    hidden
                    accept="image/png, image/jpeg" />
                </label>
                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            <form id="formAccountSettings" method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="name" class="form-label">Tên tài khoản</label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name" />

                  <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required autofocus autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
                @endif
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
                @endif
                <a style="margin-left: 20px;" class="btn btn-secondary" href="{{ route('admin-menu') }}">Quay lại</a>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
            <h5 class="card-header">Xóa tài khoản</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading mb-1">Bạn có chắc là muốn xóa tài khoản?</h6>
                        <p class="mb-0">Khi xóa sẽ không thể phục hồi.</p>
                    </div>
                </div>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" required />
                        <label class="form-check-label" for="accountActivation">Tôi đã chắc chắn muốn xóa </label>
                    </div>

                    <button type="submit" class="btn btn-danger">Xóa tài khoản</button>
                </form>

            </div>
        </div>

      </div>
    </div>
</div>
@endsection
