<div>
    <div class="kontainer-menu">
        @auth
            @if (Auth::user()->userType === 'admin')
                <div class="div-main width-100">
                    <div class="tableFixHead height-400">
                        <table class="tableStyle">
                            <thead>
                                <tr>
                                    <th style="width: 15%">T_ID</th>
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
        @endauth
    </div>
</div>
