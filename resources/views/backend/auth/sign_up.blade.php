<!DOCTYPE html>
<html lang="en">
@include('backend.partial.head')
<body>
    <style>
        .background-image {
            background-image: url('{{ asset('assets/img/login_background.jpeg') }}');
            overflow: hidden;
            background-position: center;
            background-size: cover;
        }

    </style>
    <section class="">
        <div class="container-fluid p-0" style="">
            <div class="card border-light-subtle shadow-sm m-0">
                <div class="row g-0 background-image align-items-center justify-content-center" style="">{{-- style="height: 100vh; min-height: 700px;" --}}
                    <div class="col-12 col-md-6">
                        {{-- <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{ asset('assets/img/login_background.jpeg') }}" alt="BootstrapBrain Logo"> --}}
                    </div>
                    <div class="col-12 col-md-6 h-100" style="background-color: #0000009e;">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="">
                                @include('backend.partial.message')
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-xl-9 col-md-10">
                                    <div class="mb-5 text-center">
                                        <img src="" alt="Logo" class="border border-1" width="300" height="200">
                                    </div>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <div class="mb-5">
                                        <h3 class="text-center text-white">Sign up</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="row gy-3 gy-md-4 overflow-hidden">
                                            <div class="col-12">
                                                <label for="name" class="form-label text-white">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="username" class="form-label text-white">username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="enter username" required>
                                                @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="phone" class="form-label text-white">phone <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone number" required>

                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <label for="email" class="form-label text-white">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>

                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="password" class="form-label text-white">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="Enter password" required>

                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="password_confirmation" class="form-label text-white">Confirmation Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="" placeholder="password confirmation  " required>

                                                @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                                    <label class="form-check-label text-secondary " for="remember_me">
                                                        Keep me logged in
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="btn bsb-btn-xl btn-primary" type="submit">Signup</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <hr class="mt-5 mb-4 border-primary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <p class="text-white">If Already Registered?</p>
                                        <a href="#!" class="link-primary text-decoration-none">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
