<h1>Plan</h1>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <button><a href="{{ route('plan.create')}}" class="btn btn-primary">Add New Plan</a></button>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Validity</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($plan as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->validity}}</td>
                <td><button><a href="{{ route('plan.edit', $p->id)}}" class="btn btn-primary">Edit</a></button></td>
                <td>
                    <form style="margin: 0" action="{{ route('plan.destroy', $p->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
