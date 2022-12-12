@if ($paginator->hasPages())
<ul class="pager">
    <div class="flex mt-4 justify-center">
        <div class="flex flex-row gap-x-4">
            @if (!$paginator->onFirstPage())
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <button class="w-10 flex items-center">
                    <svg class="fill-current text-indigo-600" viewBox="0 0 20 20"><path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </button>
                </a>
            </li>
            @endif
            <div class="flex flex-row items-center px-5 bg-indigo-500 text-white gap-x-10 rounded-3xl">
                @foreach ($elements as $element)

                @if (is_string($element))
                <li class="disabled text-indigo-100"><span>{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="text-indigo-100">{{ $page }}</li>
                @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach
            </div>
            @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><button class="w-10 flex items-center">
            <svg class="fill-current text-indigo-600" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </button></a></li>
            @endif
        </div>
    </div>
</ul>
@endif