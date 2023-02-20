<x-master>
    @section('part1')
        <h1>TEST</h1>
        <x-component1></x-component1>
    @endsection

    @section('part2')
    <h1>TEST 2</h1>
    <x-component2 :users="$users"></x-component2>

@endsection

</x-master>