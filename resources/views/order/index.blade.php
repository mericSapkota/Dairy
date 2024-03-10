<div>
  <h1>Index of Order</h1>
  <a href="/order/create">Create Order</a>
  <h1>List of order</h1>
  <table border="1">
    <tr>
      <th>Type</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Amount</th>
      <th>Location</th>
      <th>Date</th>
      <th>Time</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>PayNow</th>
    </tr>
    @foreach($order as $o)
    <tr>
      <td>{{$o->type}}</td>
      <td>{{$o->qty}}</td>
      <td>{{$o->price}}</td>
      <td>{{$o->price * $o->qty}}</td>
      @foreach($location as $l)
      <td>{{$l->address}}</td>
      @endforeach
      <td>{{$o->date}}</td>
      <td>{{$o->time}}</td>
      <td><a href="/order/edit/{{$o->id}}"><button>Edit</button></a></td>
      <td class="bg-red-300 flex justify-center items-center">
        <form action="/order/delete/{{$o->id}}" method="post">
          @csrf
          @method('delete')
          <input class="mt-10" type="submit" value="delete">
        </form>
      </td>
      <td><a href="/payment/pay/{{$o->id}}"><button>Pay Online</button></a> </td>
    </tr>
    @endforeach
  </table>
  <p>Note: You can pay with cash in office</p>

</div>