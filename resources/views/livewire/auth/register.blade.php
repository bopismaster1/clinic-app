<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="index.html">
                                        <img src="assets/images/logo.png" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Shreyu</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Create your account</h6>
                                <p class="text-muted mt-0 mb-4">Create a free account and start using Shreyu</p>

                                <form wire:submit.prevent='register' class="authentication-form">
                                    <div class="form-group">
                                        <label class="form-control-label">Name</label>
                                        <div wire:ignore class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="user"></i>
                                                </span>
                                            </div>
                                            <input wire:model.lazy='name' type="text" class="form-control"
                                                id="name" placeholder="Your full name">
                                        </div>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Address</label>
                                        <div wire:ignore class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="user"></i>
                                                </span>
                                            </div>
                                            <input wire:model.lazy='address' type="text" class="form-control"
                                                id="address" placeholder="Your full Address">
                                        </div>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Date of Birth</label>
                                        <div wire:ignore class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="user"></i>
                                                </span>
                                            </div>
                                            <input wire:model.lazy='address' type="text" class="form-control"
                                                id="address" placeholder="Your full Address">
                                        </div>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Email Address</label>
                                        <div class="input-group input-group-merge">
                                            <div wire:ignore class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input wire:model.lazy='email' type="email" class="form-control"
                                                id="email" placeholder="hello@coderthemes.com">
                                        </div>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <label class="form-control-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <div wire:ignore class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input wire:model.lazy='password' type="password" class="form-control"
                                                id="password" placeholder="Enter your password">
                                        </div>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signup"
                                                checked>
                                            <label class="custom-control-label" for="checkbox-signup">
                                                I accept <a href="javascript: void(0);">Terms and Conditions</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                        <p class="lead">"It's a elegent templete. I love it very much!"
                                        </p>
                                        <p>- Admin User</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="{{ route('login') }}"
                                class="text-primary font-weight-bold ml-1">Login</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
