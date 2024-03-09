<div>
  <h1>Create Order</h1>
  <form action="/order/update/{{$order->id}}" method="post">
    @csrf
    @method('patch')
    <select name="type">
      <option value="milk">Milk</option>
      <option value="buffalo">Buffalo</option>
    </select>
    <input type="text" name="qty" value="{{$order->qty}}" placeholder="Quantity in Liter">
    <input type="date" name="date" value="{{$order->date}}">
    <input type="time" name="time" value="{{$order->time}}">
    <input type="text" name="price" value="{{$order->price}}">
    <input type="submit" value="Submit Order">
  </form>
</div>