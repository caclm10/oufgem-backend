@props([
    'title' => '',
    'breadcrumb' => 'dashboard',
])

<div class="page-title mb-3">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $title }}</h3>
            {{-- <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p> --}}
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @foreach (config('pages.breadcrumbs.' . $breadcrumb) as $breadcrumb)
                        <li class="breadcrumb-item @if ($loop->last) active @endif"
                            @if ($loop->last) aria-current="page" @endif>
                            @if ($loop->last)
                                {{ $breadcrumb['title'] }}
                            @else
                                <a href="{{ route($breadcrumb['route']) }}">{{ $breadcrumb['title'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
