@if ($_page->message() and ! empty($_page->message()->value))
	{!! $_page->present()->message !!}
@endif