<div class="sign relKontainer">
    {{-- <button wire:click="increment">CLCIK MEE</button>
    <h1>{{ $count }}</h1> --}}
    <div class="div-white border-20">
        <div class="text-title">Sign Up</div>
        <form wire:submit.prevent="signup">
            @csrf
            <div>
                <label for="fullName">Full Name</label>
                <input type="text" wire:model="fullName" name="fullName" id="fullName" class="@error('fullName') inputInvalid @enderror" value="{{ old('fullName') }}">
                <span class="error">@error('fullName') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" wire:model="email" name="email" id="email" class="@error('email') inputInvalid @enderror" value="{{ old('email') }}">
                <span class="error">@error('email') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" wire:model="address" name="address" id="address" class="@error('address') inputInvalid @enderror" value="{{ old('address') }}">
                <span class="error">@error('address') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" wire:model="username" name="username" id="username" class="@error('username') inputInvalid @enderror" value="{{ old('username') }}">
                <span class="error">@error('username') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" wire:model="password" name="password" id="password" class="@error('password') inputInvalid @enderror">
                <span class="error">@error('password') {{ $message }} @enderror</span>
            </div>
            <div>
                <button class="btn-black border-20 align-center" type="submit">Sign Up</button>
            </div>
        </form>
        <div class="align-center">have an account? <a href="/signin">Sign In</a></div>
    </div>
</div>