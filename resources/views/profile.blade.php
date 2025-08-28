<x-layout>



User info and change email/pw goes here

<form action="{{ route('profile') }}" method="PUT">
    @csrf
    <div class="mb-3">
        <label for="new-name" class="form-label">new Name</label>
        <input type="text" name="new-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('new-name') }}">
        
        <label for="new-email" class="form-label">New Email</label>
        <input type="text" name="new-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('new-email') }}">

        <label for="confirm-email" class="form-label">confirm Email</label>
        <input type="text" name="confirm-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

        <label for="new-password" class="form-label">new Password</label>
        <input type="text" name="new-password" class="form-control @error('password') is-invalid @enderror" value="{{ old('new-password') }}">
        @error('email or password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

</x-layout>