<div>
    @auth
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
                        <div class="item">Item</div>
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
                    <div>Order Code : {{ session()->get('receipt')['orderId'] }}</div>
                    <div style="padding-bottom: 50px">THANK YOU FOR YOUR ORDER</div>
                </div>
            </div>
        @endif
        @if ($cartCount > 0)
            <div id="cart" class="kontainer-menu kontainer-side-main">
                {{-- kontainer utama --}}
                <div class="kontainer-main cart-main div-main">
                    <table>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td class="border-20">
                                    <div class="cart-image"><img src="{{ asset('storage//images//'.$item->name) }}" alt="product-image"></div>
                                    <div class="cart-name font-20">{{ $item->id }} </div>
                                    <div class="cart-price">@ Rp. {{ number_format($item->price, 2, ',', '.') }} </div>
                                    <div class="cart-total">Rp. {{ $item->subtotal(2, ',', '.') }} </div>
                                    <div class="cart-button">
                                        <button class="btn-min" wire:click.prevent="decreastQty('{{ $item->rowId }}')">-</button>
                                        <div class="cart-qty">{{ $item->qty }}</div>
                                        <button class="btn-plus" wire:click.prevent="increastQty('{{ $item->rowId }}')">+</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                {{-- kontainer samping --}}
                <div class="kontainer-side">
                    <div class="div-side border-20 pad-20">
                        <table class="table-style">
                            <thead>
                                <td>Checkout</td>
                            </thead>
                        </table>
                        <form wire:submit.prevent='checkout()'>
                            <table class="checkout">
                                <tr>
                                    <td>Name</td>
                                    <td class="align-right"><input type="text" wire:model="custName" name="fullName" id="fullName" disabled></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="align-right"><input type="text" wire:model="subtotal" value="Rp. {{ $subtotal }}" disabled></td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td class="align-center"><div class="div-btn btn-black border-20 pad-20" onclick="tampil('alertEmail')">Make An Order</div></td>
                                    <div id="alertEmail" class="parentDisable hide">
                                        <div class="alert border-20 abs-center">
                                            <div class="alert-title font-20">{{ auth()->user()->email }}</div>
                                            <div class="alert-desc">The receipt will send to your email</div>
                                            <div class="div-btn alert-btnKiri btn-white" onclick="tutup('alertEmail')">Cancel</div>
                                            <button class="alert-btnKanan btn-white" type="submit">Ok</button>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="relKontainer">
                <div class="div-white border-20 align-center">
                    <div class="text-title">Cart is empty</div>
                </div>
            </div>
        @endif
    @endauth
</div>
