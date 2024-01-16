@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="btn btn-large {{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}">البداية</a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="btn btn-large {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="btn btn-large {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}">الأخير</a>
        </li>
    </ul>
@endif