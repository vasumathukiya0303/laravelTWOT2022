<style>
    .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Plan Data
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
            <form method="post" action="{{ route('plan.update', $plan->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Plan Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $plan->name }}"/>
                </div>
                <div class="form-group">
                    <label for="price">Price :</label>
                    <input type="text" class="form-control" name="price" value="{{ $plan->price }}"/>
                </div>
                <div class="form-group">
                    <label for="validity">Validity :</label>
                    <input type="text" class="form-control" name="validity" value="{{ $plan->validity }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Plan</button>
            </form>
        </div>
    </div>
