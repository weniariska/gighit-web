<div>
    @auth
        <div id="acc" class="kontainer-menu kontainer-side-main">
            {{-- kontainer side --}}
            <div class="kontainer-side">
                <div class="acc-side-menu div-side border-20 dis-flex-col">
                    <div class="accPict"></div>
                    <div class="accNama font-20 align-center">{{ auth()->user()->fullName }}</div>
                    <div class="accSaldo align-center">Rp. {{ number_format(auth()->user()->saldo, 2, ',', '.') }}</div>
                    <button class="btn-white left-pad" onclick="tampilMain('1', '2')">Profile</button>
                    @if (Auth::user()->userType === 'customer')
                        <button class="btn-white left-pad" onclick="tampilMain('2', '2')">Transaction History</button>
                    @endif
                    <button class="btn-white left-pad" onclick="tampil('alertOut')">Sign Out</button>
                </div>
            </div>

            {{-- kontainer utama --}}
            <div class="kontainer-main">
                <div id="1" class="acc-main-profile div-main">
                    <form wire:submit.prevent="editAcc">
                        <table class="table-side-input">
                            <tr>
                                <td>Full Name</td>
                                <td>
                                    <div>
                                        <input type="text" wire:model="fullName" name="fullName" id="fullName">
                                        <span class="error">@error('fullName') {{ $message }} @enderror</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <div>
                                        <input type="email" wire:model="email" name="email" id="email">
                                        <span class="error">@error('email') {{ $message }} @enderror</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                    <div>
                                        <input type="text" wire:model="address" name="address" id="address">
                                        <span class="error">@error('address') {{ $message }} @enderror</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>
                                    <div>
                                        <input type="text" wire:model="username" name="username" id="username">
                                        <span class="error">@error('username') {{ $message }} @enderror</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <div>
                                        <input type="password" wire:model="password" name="password" id="password">
                                        <span class="error">@error('password') {{ $message }} @enderror</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="align-right">
                                <td colspan="2"><button class="btn-black border-20" type="submit">Save Changes !</button></td>
                            </tr>
                        </table>
                    </form>
                </div>

                @if (Auth::user()->userType === 'customer')
                    <div id="2" class="acc-main-transaction div-main disNone">
                        <div class="tableFixHead height-400">
                            <table class="tableStyle">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">Order Code</th>
                                        <th style="width: 35%">Name</th>
                                        <th style="width: 20%">Subtotal</th>
                                        <th style="width: 30%">Order Date</th>
                                    </tr>
                                </thead>
                                <tbody class="table-admin-transaction">
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->custName }}</td>
                                        <td>{{ $transaction->subtotal }}</td>
                                        <td>{{ $transaction->orderDate }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                
                <div onclick="tutup('alertOut')" id="alertOut" class="parentDisable hide">
                    <div class="alert border-20 abs-center">
                        <div class="alert-title font-20">Signing Out</div>
                        <div class="alert-desc">Are you sure you want to sign out?</div>
                        <button class="alert-btnKiri btn-white" onclick="tutup('alertOut')">Cancel</button>
                        <button class="alert-btnKanan btn-white" wire:click.prevent="signout">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
