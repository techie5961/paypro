@isset($null)
     <section style="margin-top:100px;" class="column align-center g10 grid-full">
            <img style="width:150px;" src="{{ asset('images/null.svg') }}" alt="Null">
            <b style="font-family:'cinzel decorative'" class="cgrey">NO Data Found</b>
        </section> 
@endisset
@isset($admins)
    @isset($paginate)
         <section style="display: {{ $last <= 1 ? 'none' : '' }}" class="paginate grid-full">
            <a class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}">&laquo;</a>
            <a>{{ $current }}</a>
            <a class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
         </section>
    @endisset
@endisset
@isset($copy)
    @isset($paginate)
         <section style="display: {{ $last <= 1 ? 'none' : '' }}" class="paginate grid-full">
            <a class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}">&laquo;</a>
            <a>{{ $current }}</a>
            <a class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
         </section>
    @endisset
@endisset