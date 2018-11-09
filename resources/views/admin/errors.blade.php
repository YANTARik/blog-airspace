

@if ($errors->any())
    <div class="container">
        <div class="row">
            <div clas="col-md-10 col-md-ofset-1">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif