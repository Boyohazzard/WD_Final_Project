@if ($errors->any())
  <div style="border:1px solid #f99; padding:10px; margin:10px 0; background:#fff5f5;">
    <strong>Whoops! Something went wrong.</strong>
    <ul style="margin:6px 0 0 18px;">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
