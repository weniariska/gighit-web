<div class="sign">
    <div class="div-white border-20">
        <div class="text-title">Sign In</div>
        <form wire:submit.prevent="signin">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" wire:model="username" name="username" id="username" class="@error('username') inputInvalid @enderror" value="{{ old('username') }}" required>
                <span class="error">@error('username') {{ $message }} @enderror</span>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" wire:model="password" name="password" id="password" class="@error('username') inputInvalid @enderror" required>
                <span class="error">@error('password') {{ $message }} @enderror</span>
            </div>
            <div>
                <button class="btn-black border-20 align-center" type="submit">Sign In</button>
            </div>
        </form>
        <div class="align-center">do not have an account? <a href="/signup">Sign Up</a></div>
    </div>
</div>
