<div>
  <h1>Online Payment</h1>
  <form action="/payment" method="post" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="text" name="amount" placeholder="Please enter amount" value='{{$payment->qty * $payment->price}}'>
    <label>Please Attach Your ScreenShot here</label>
    <input type="file" name="ss" accept="image/jpg, image/jpeg, image/png">
    <input type="text" name="remarks" placeholder="Remaks">
    <input type="submit" value="submit">
  </form>
</div>