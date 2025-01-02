@if ((Session::has('payment_details') && is_array(Session::get('payment_details')) && count(Session::get('payment_details')) > 0) ||
     (Session::has('wallet_details') && is_array(Session::get('wallet_details')) && count(Session::get('wallet_details')) > 0))
    <table class="table ml-3">
        <thead>
            <tr>
                <th>Description</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPaid = 0;
            @endphp

            @if (Session::has('payment_details') && is_array(Session::get('payment_details')) && count(Session::get('payment_details')) > 0)
                @foreach (Session::get('payment_details') as $key => $payment)
                    <tr>
                        <td>{{ $payment['note'] }}</td>
                        <td>{{ $payment['methodName'] }}</td>
                        <td>{{ $payment['amount'] }}Tk.</td>
                        <td>
                            <span class="badge bg-danger" onclick="removeBTN({{ $key }})">
                                <i class="fas fa-times"></i>
                            </span>
                        </td>
                    </tr>
                    @php
                        $totalPaid += $payment['amount'];
                    @endphp
                @endforeach
            @endif

            @if (Session::has('wallet_details') && is_array(Session::get('wallet_details')) && count(Session::get('wallet_details')) > 0)
                @foreach (Session::get('wallet_details') as $key => $wallet)
                    <tr>
                        <td>{{ $wallet['note'] }}</td>
                        <td>{{ $wallet['payment_method'] }}</td>
                        <td>{{ $wallet['amount'] }}Tk.</td>
                        <td>
                            <span class="badge bg-danger" onclick="removeBTNWallet({{ $key }})">
                                <i class="fas fa-times"></i>
                            </span>
                        </td>
                    </tr>
                    @php
                        $totalPaid += $wallet['amount'];
                    @endphp
                @endforeach
            @endif

            <tr>
                <td colspan="2"></td>
                <td class="text-end"><strong>Total Paid:</strong></td>
                <td>{{ $totalPaid }}</td>
            </tr>
        </tbody>
    </table>
@else
    <p>No payment transaction available</p>
@endif









{{-- @if (Session::has('payment_details') && count(Session::get('payment_details')) &&  Session::has('wallet_details') && count(Session::get('wallet_details'))  > 0)
    <table class="table ml-3">
        <thead>
            <tr>
                <th>Description</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPaid = 0;
            @endphp

            @foreach (Session::get('payment_details') as $key => $payment)
                <tr>
                    <td>Advance/{{ $payment['note'] }}</td>
                    <td>{{ $payment['methodName'] }}</td>
                    <td>{{ $payment['amount'] }}Tk.</td>
                    <td>
                        <span class="badge bg-danger" onclick="removeBTN({{ $key }})">
                            <i class="fas fa-times"></i>
                        </span>
                    </td>
                </tr>
                @php
                    $totalPaid += $payment['amount'];
                @endphp
            @endforeach
            <tr>
                <td colspan="2"></td>
                <td class="text-end"><strong>Total Paid:</strong></td>
                <td>{{ $totalPaid }}</td>
            </tr>
            @foreach (Session::get('wallet_details') as $key => $wallet)
                <tr>
                    <td>{{ $wallet['note'] }}</td>
                    <td>{{ $wallet['payment_method'] }}</td>
                    <td>{{ $wallet['amount'] }}Tk.</td>
                    <td>
                        <span class="badge bg-danger" onclick="removeBTN({{ $key }})">
                            <i class="fas fa-times"></i>
                        </span>
                    </td>
                </tr>
                @php
                    $totalPaid += $wallet['amount'];
                @endphp
            @endforeach

            <tr>
                <td colspan="2"></td>
                <td class="text-end"><strong>Total Paid:</strong></td>
                <td>{{ $totalPaid }}</td>
            </tr>
        </tbody>
    </table>
@else
    <p> No payment transaction available</p>
@endif --}}

{{-- @if (Session::has('payment_details') && count(Session::get('payment_details')) > 0)
    <table class="table ml-3">
        <thead>
            <tr>
                <th>Description</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPaid = 0;
                $allPayments = array_merge(Session::get('payment_details', []), Session::get('wallet_details', []));
            @endphp

            @foreach ($allPayments as $key => $payment)
                <tr>
                    <td>{{ isset($payment['note']) ?  $payment['note'] : '' }}</td>
                    <td>{{ $payment['methodName'] ?? $payment['payment_method'] }}</td>
                    <td>{{ $payment['amount'] }} Tk.</td>
                    <td>
                        <span class="badge bg-danger" onclick="removeBTN({{ $key }})">
                            <i class="fas fa-times"></i>
                        </span>
                    </td>
                </tr>
                @php
                    $totalPaid += $payment['amount'];
                @endphp
            @endforeach

            <tr>
                <td colspan="2"></td>
                <td class="text-end"><strong>Total Paid:</strong></td>
                <td>{{ $totalPaid }} Tk.</td>
            </tr>
        </tbody>
    </table>
@else
    <p>No payment transaction available</p>
@endif --}}

