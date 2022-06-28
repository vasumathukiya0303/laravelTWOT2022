 <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
           <h2> Add Offer Plan</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('plan.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Plan Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="text" class="form-control" name="price"/>
                </div>
                <div class="form-group">
                    <label for="validity">Validity :</label>
                    <input type="text" class="form-control" name="validity"/>
                </div>
                <button type="submit" class="btn btn-primary">Add Plan</button>
            </form>
        </div>
    </div>
