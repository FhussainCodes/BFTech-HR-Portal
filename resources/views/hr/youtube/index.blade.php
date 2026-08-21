@extends('layouts.hr')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">YouTube Search</h3>

    {{-- Search Form --}}
    <form action="{{ route('hr.youtube.search') }}" method="GET">
        <div class="input-group mb-4">
            <input type="text" name="q" class="form-control" placeholder="Search YouTube..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    {{-- Search Results --}}
    @foreach($videos as $video)
        <div class="card mb-3">
            <div class="row g-0">
                {{-- Thumbnail --}}
                <div class="col-md-4">
                    <img src="{{ $video['snippet']['thumbnails']['medium']['url'] }}" class="img-fluid rounded-start" alt="{{ $video['snippet']['title'] }}">
                </div>

                {{-- Video Information --}}
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $video['snippet']['title'] }}</h5>
                        <p class="card-text">{{ $video['snippet']['description'] }}</p>
                        <p class="text-muted">{{ $video['snippet']['channelTitle'] }}</p>

                        @if(isset($video['id']['videoId']))
                            <a href="{{ route('hr.youtube.watch', $video['id']['videoId']) }}" class="btn btn-primary">
                                Watch Video
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection