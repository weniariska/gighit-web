<div class="relKontainer">
    <div class="div-white border-20">
        <div class="text-title">Tup Up GIGpay</div>
        <div class="gigpay-main dis-flex">
            <div style="width: 80%">
                <form wire:submit.prevent="isiSaldo">
                    <table class="table-side-input">
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
                            <td>Total Top Up</td>
                            <td>
                                <div>
                                    <input type="text" wire:model="totalTopup"  name="totalTopup" id="totalTopup">
                                    <span class="error">@error('totalTopup') {{ $message }} @enderror</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="btn-black border-20 width-100">Top Up</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
