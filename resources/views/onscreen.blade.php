<div class="container">

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Movie Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="theatre_id">Theatre</label>
            <select name="theatre_id" id="theatre_id" class="form-control" required>
                @foreach ($theatres as $theatre)
                    <option value="{{ $theatre->id }}">{{ $theatre->name }} - {{ $theatre->location }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="screening-time">
            <label for="screening_time">Screening Time</label>
            <input type="datetime-local" class="form-control" id="screening_time" name="screening_time[]" required>
        </div>
        <button type="button" class="btn btn-primary" id="add-timing">Add Timing</button>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
