<x-layout>
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

        <label for="confirm-email" class="form-label">confirm Email</label>
        <input type="text" name="confirm-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
        @error('email or password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

</x-layout>