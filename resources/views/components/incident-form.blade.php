@if ($incident->exists)
    <form action="{{ route('incidents.update', $incident->id) }}" method="post">
    @method('PATCH')
@else
    <form action="{{ route('incidents.store') }}" method="post">
@endif
    @csrf
    <h2>Race:</h2>
    <select name="race_id" class="@error('race_id') is-invalid @enderror">
        @foreach ($races as $race)
            <option value="{{ $race->id }}" @if ($race->id == old('race_id', $incident->race_id))
                selected
            @endif>{{ $race->name }}</option>
        @endforeach
    </select>
    @error('race_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br/>
    <h2>Session Time:</h2>
    <input type="text" name="session_time" class="@error('session_time') is-invalid @enderror" value="{{ old('session_time', $incident->session_time) }}" />
    @error('session_time')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br/>
    <h2>Driver Involved:</h2>
    <select name="user_id" class="@error('user_id') is-invalid @enderror">
        @foreach ($drivers as $driver)
            <option value="{{ $driver->id }}"@if ($driver->id == old('user_id', $incident->user_id))
                selected
            @endif>#{{ $driver->number }} - {{ $driver->name }}</option>
        @endforeach
    </select>
    @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br/>
    <h2>Comment:</h2>
    <textarea name="comment" class="@error('comment') is-invalid @enderror">{{ old('comment', $incident->comment) }}</textarea>
    @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="submit" value="Post" />
</form>
