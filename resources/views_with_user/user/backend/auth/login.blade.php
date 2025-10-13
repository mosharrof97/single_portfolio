<!DOCTYPE html>
<html lang="en">
@include('user.backend.partial.head')
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
                <div class="row g-0 background-image align-items-center justify-content-center" style="height: 100vh; min-height: 700px;">
                    <div class="col-12 col-md-6">
                        {{-- <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{ asset('assets/img/login_background.jpeg') }}" alt="BootstrapBrain Logo"> --}}
                    </div>
                    <div class="col-12 col-md-6 h-100" style="background-color: #0000009e;">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="">
                                @include('user.backend.partial.message')
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-xl-9 col-md-10">
                                    <div class="mb-5 text-center">
                                        <img src="" alt="Logo" class="border border-1" width="300" height="200">
                                    </div>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <div class="mb-5">
                                        <h3 class="text-center text-white">Log in</h3>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <form action="{{ route('user.login') }}" method="post">
                                        @csrf
                                        <div class="row gy-3 gy-md-4 overflow-hidden">
                                            <div class="col-12">
                                                <label for="login" class="form-label text-white">Email or phone <span class="text-danger">*</span></label>
                                                <input type="login" class="form-control" name="login" id="login" placeholder="name@example.com/01700000000" required>

                                                @error('login')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label text-white">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" value="" placeholder="password" required>

                                                @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                                    <label class="form-check-label text-secondary" for="remember_me">
                                                        Keep me logged in
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button class="btn bsb-btn-xl btn-primary" type="submit">Log in now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-xl-9 col-md-10">
                                    <hr class="mt-5 mb-4 border-primary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                        <a href="#!" class="link-primary text-decoration-none">Create new account</a>
                                        <a href="{{ route('password.request') }}" class="link-primary text-decoration-none">Forgot your password?</a>
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
