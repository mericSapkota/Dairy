<div>
  <h1>Payment Page</h1>
  <a href="/payment/pay">Make Online Payment</a>
  <h1>List of payments</h1>
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Amount</th>
      <th>TimeStamp</th>
      

    </tr>
    @foreach($payment as $p)
    <tr>
      <td>{{$p->id}}</td>
      <td>{{$p->user->name}}</td>
      <td>{{$p->amount}}</td>
      <td>{{$p->timestamps}}</td>
    </tr>
    @endforeach
  </table>


</div>