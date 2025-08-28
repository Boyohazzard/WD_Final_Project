<x-layout>
<form action="{{ route('login') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('name') }}">
        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('price') }}">
        @error('email or password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
</form>

<div class="wrapper">
    <div class="title">
        Login form
    </div>
    <form action="POST">
        <div class="field">
            <input type="text" required>
            <label>Email Address</label>
        </div>
        <div class="field">
        <input type="text" required>
        <label>Password</label>
        </div>
        <div class="field">
            <input type="submit" value="Login">
        </div>
        <div class="register-link">
            Not already registered? <a href="{{ route("register")}}">Register here</a>
        </div>
    </form>
</div>

</x-layout>