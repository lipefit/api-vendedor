Olá <strong>{{ $name }}</strong>,

<p>{{ $body }}</p>

<table border="1" cellspacing="0" cellpadding="10px" style="width: 100%;">
    <thead>
        <tr>
            <th>Vendedor</th>
            <th>E-mail</th>
            <th>Valor da venda</th>
            <th>Comissão</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total_sale = 0;
            $total_commission = 0;
        @endphp
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->name }}</td>
                <td>{{ $sale->email }}</td>
                <td>R$ {{ number_format($sale->sale_value, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($sale->commission, 2, ',', '.') }}</td>
            </tr>
            @php
                $total_sale += $sale->sale_value;
                $total_commission += $sale->commission;
            @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right">R$ {{ number_format($total_sale, 2, ',', '.') }}</td>
            <td>R$ {{ number_format($total_commission, 2, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

<p>Att.<br /><strong>Equipe de desenvolvimento da Tray</strong></p>
