<div>
    @if (session()->has('receipt'))
        <div wire:click.prevent="removeReceipt" id="alertReceipt" class="parentDisable">
            <div class="receipt abs-center dis-flex-col">
                <div class="gigLogo">GIGHIT</div>
                <div class="gigDesc">
                    gighit.com <br>
                    Jalan Kramat Utara, Kelurahan Tengah <br>
                    DKI JAKARTA, INDONESIA
                </div>
                <div class="gigName">Name : {{ session()->get('receipt')['receiptName'] }}</div>
                <div class="sectionReceipt">
                    <div class="items">Item</div>
                    <div class="price">Price (Rp)</div>
                </div>
                <div class="items-price">
                    @foreach (session()->get('receipt')['receiptItems'] as $item)
                    <div class="dis-flex-row">
                        <div>{{ $item['qty'] }}X {{ $item['id'] }}</div>
                        <div>{{ $item['subtotal'] }}</div>
                    </div>
                    @endforeach
                </div>
                <div class="sectionReceipt">
                    <div>Total</div>
                    <div>Rp. {{ session()->get('receipt')['receiptTotal'] }}</div>
                </div>
                <div style="padding-bottom: 50px">THANK YOU FOR YOUR ORDER</div>
            </div>
        </div>
    @endif
    <div id="order" class="kontainer-menu kontainer-side-main">
        
        {{-- kontainer utama --}}
        <div class="kontainer-main div-main">
            <div class="align-right mar-btm-10">
                <button class="btn-black" onclick="tampilMain('1', '3')">Pizza</button>
                <button class="btn-black" onclick="tampilMain('2', '3')">Drinks</button>
                <button class="btn-black" onclick="tampilMain('3', '3')">Starters</button>
            </div>

            <div id="1" class="tableFixHead height-400">
                <table class="admin-order-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 30%">Price</th>
                            <th style="width: 30%">Add To Cart</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pizzas as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="addAdminCart('{{ $prod->name }}', {{ $prod->price }})">Add</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>

            <div id="2" class="tableFixHead height-400 disNone">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 30%">Price</th>
                            <th style="width: 30%">Add To Cart</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drinks as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="addAdminCart('{{ $prod->name }}', {{ $prod->price }})">Add</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>

            <div id="3" class="tableFixHead height-400 disNone">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width: 30%">Price</th>
                            <th style="width: 30%">Add To Cart</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($starters as $prod)
                        <tr>
                            <td>{{ $prod->name }}</td>
                            <td>{{ number_format($prod->price, 0, ',', '.') }}</td>
                            <td><button class="btn-black border-20" wire:click.prevent="addAdminCart('{{ $prod->name }}', {{ $prod->price }})">Add</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>            
            </div>
        </div>

        {{-- kontainer samping --}}
        <div class="kontainer-side">
            <div class="div-side border-20 pad-20">
                <table class="table-style">
                    <thead>
                        <td>Items</td>
                    </thead>
                </table>
                @if ($adminCartCount > 0)
                    <div class="tableFixHead max-height-220">
                        <table>
                            @foreach ($adminCart as $item)
                                <tr>
                                    <td class="itemAdminCart">
                                        <div class="namead">{{ $item->name }}</div>
                                        <div class="subad">{{ number_format($item->subtotal, 0, ',', '.') }}</div>
                                        <div class="qtyad">
                                            <div class="dis-flex-row">
                                                <button class="btn-min" wire:click.prevent="decreastQty('{{ $item->rowId }}')">-</button>
                                                <div class="cart-qty">{{ $item->qty }}</div>
                                                <button class="btn-plus" wire:click.prevent="increastQty('{{ $item->rowId }}')">+</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <div class="pad-center">No Item Added</div>
                @endif
                <table class="table-style mar-btm-10">
                    <thead>
                        <td>Checkout</td>
                    </thead>
                </table>
                <form wire:submit.prevent='checkout()'>
                    <table class="checkout table-side-input">
                        <tr>
                            <td>Name</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="custName" name="custName" id="custName">
                                    <span class="error">@error('custName') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="subtotal"  name="subtotal" id="subtotal" disabled>
                                    <span class="error">@error('subtotal') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                    <div class="div-btn btn-black border-20" onclick="tampil('alertCo')">Make An Order</div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    {{-- toggle --}}
                    <div onclick="tutup('alertCo')" id="alertCo" class="parentDisable hide">
                        <div class="alert border-20 abs-center">
                            <div class="alert-title font-20">Make An Order</div>
                            <div class="alert-desc">What do you wanna do with the receipt?</div>
                            <div class="div-btn alert-btnKiri btn-white" wire:click.prevent="setReceiptChoose('email')">Send</div>
                            <button class="alert-btnKanan btn-white" type="submit">Print</button>
                        </div>
                    </div>
                    <div id="alertEmail" class="parentDisable {{ ($receiptChoose === "email") ? '' : 'hide' }}">
                        <div class="alert-input border-20 abs-center">
                            <div class="alert-title font-20">Input customer email address</div>
                            <div class="alert-inputText dis-flex-col">
                                <input style="height: 30px" type="email" wire:model="email" name="email" id="email" class="width-100 @error('email') inputInvalid @enderror" value="{{ old('email') }}">
                                <span class="error">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="div-btn alert-btnKiri btn-white" wire:click.prevent="setReceiptChoose('print')">Cancel</div>
                            <button class="alert-btnKanan btn-white" type="submit">Ok</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
