<x-app>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Interests</li>
                    </ol>
                </div>
                <h4 class="page-title">
                    Almost done, {{ Auth::user()->name }}!
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Choose one or more sports you are interested in...</h5>
                    <form action="{{ route('api.interests.store') }}" class="mt-3 x-submit" data-then="reload">
                        <select type="text" class="form-control" name="sport_id[]" aria-label="Sports" multiple required>
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                            @endforeach
                        </select>

                        <div class="mt-3">
                            <button class="btn btn-success rounded-3" type="submit">Submit Interests</button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</x-app>
