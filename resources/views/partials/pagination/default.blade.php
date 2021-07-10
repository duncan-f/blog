@if ($paginator->lastPage() > 1)
<nav class="blog-pagination">
	<a class="btn btn-outline-primary {{ ($paginator->currentPage() == 1) ? ' btn-outline-secondary disabled' : '' }}" href="{{ $paginator->url(1) }}">Newer</a>
	<a class="btn btn-outline-primary {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' btn-outline-secondary disabled' : '' }}" href="{{ $paginator->url($paginator->currentPage()+1) }}" tabindex="-1">Older</a>
</nav>
@endif
