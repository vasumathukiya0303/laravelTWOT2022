<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<h3>Create blade</h3>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
           <h2> Add People Data</h2>
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
            <form method="post" action="{{ route('people.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">People Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div><br>
                <div class="form-group">
                    <label for="company">Sim-Card Company Name :</label>
                    <input type="text" class="form-control" name="company"/>
                </div><br>
                <div class="form-group">
                    <label for="selectplan">Select Plan: </label>
                    <script>
                        $(document).ready(function () {
                            $("#addPlan").click(function () {
                                $("#dropdowns").append(`<div class="bind"><select class="planed" name="selected[]" >
                  @foreach($people->plans as $c)
                      <option value="{{ $c->id }}">
                            <table>
                                 <tr>
                                     <td>{{$c->name}}</td>
                                     <td>{{$c->price}}</td>
                                     <td>{{$c->validity}}</td>
                                 </tr>
                            </table>
                      </option>
                  @endforeach
                                </select><i class="fa fa-times" aria-hidden="true"></i></div>`);
                            });
                            $(document).on('click','.fa-times',function (){
                                $(this).parent('.bind').remove(); //.css("background-color","blue");
                            });
                        });
                    </script>
                    <button type="button" id="addPlan">Add plan +</button>
{{--                    <a href="{{ route('plan.create')}}">create plan</a>--}}
                </div><br>
                <div id="dropdowns"></div>
                <div class="form-group">
                    <label for="phone">Phone Number :</label>
                    <input type="text" class="form-control" name="phone"/>
                </div><br>
                <button type="submit" class="btn btn-primary">Add People</button>
            </form>
        </div>
    </div>
