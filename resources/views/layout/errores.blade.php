@if (count($errors))
  <div class="form-group" style="margin-top: 5mm">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            &nbsp &nbsp &nbsp{{$error}}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif