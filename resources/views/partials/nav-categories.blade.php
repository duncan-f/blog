@if($categories->count() > 0)
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
	  @foreach($categories as $cat)
      <a class="p-2 text-muted" href="#">{{ $cat.name }}</a>
	  @endforeach
    </nav>
  </div>
@endif
