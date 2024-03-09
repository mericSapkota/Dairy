<div>
  <h1>Create Order</h1>
  <form action="/order" method="post">
    @csrf
    <select name="type">
      <option value="milk">Milk</option>
      <option value="buffalo">Buffalo</option>
    </select>
    <input type="text" name="qty" placeholder="Quantity in Liter">
    <input type="date" name="date">
    <input type="time" name="time">
    <input type="text" name="price" value="100">
    <input type="submit" value="Submit Order">
  </form>
</div>