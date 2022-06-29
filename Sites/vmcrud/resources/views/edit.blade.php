<h2>edit blade</h2>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit People Data
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
            <form method="post" action="{{ route('people.update', $people->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">People Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $people->name }}"/>
                </div><br>
                <div class="form-group">
                    <label for="company">Sim-Card Company Name :</label>
                    <input type="text" class="form-control" name="company" value="{{ $people->company }}"/>
                </div><br>
                <div class="form-group">
                    <label for="selectplan">Select Plan: </label>
                    <div class="bind">
                        @foreach($people->plans as $assign)
                        <select class="planed" name="selected[]" >
                            @foreach($people->plans as $c)
                                <option @if($assign['id'] == $c->id) {{ 'selected' }} @endif value="{{ $c->id }}">
                                    <table>
                                        <tr>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->price}}</td>
                                            <td>{{$c->validity}}</td>
                                        </tr>
                                    </table>
                                </option>
                            @endforeach
                        </select>
                        @endforeach
                        <i class="fa fa-times" aria-hidden="true"></i></div>
                    <script>
                        $(document).ready(function () {
                            $(document).on('click','.fa-times',function (){
                                $(this).parent('.bind').remove(); //.css("background-color","blue");
                            });
                        });
                    </script>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number :</label>
                    <input type="text" class="form-control" name="phone" value="{{ $people->phone }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
