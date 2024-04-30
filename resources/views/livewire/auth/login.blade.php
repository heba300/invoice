<div class="login-box">

    <x-alert name="success" />
    <x-alert name="danger" />

    <div class="login-logo">
        <a href="{{ route('login') }}"><b>Invo</b>ices</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form wire:submit="login" method="post">
                <div class="input-group mb-3">
                    <input wire:model="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="input-group mb-3">
                    <input wire:model="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input wire:model.live.debounce='remember_token' value="remember" type="checkbox"
                                id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
