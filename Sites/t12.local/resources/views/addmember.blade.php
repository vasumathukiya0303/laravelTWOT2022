<h2>Add Member</h2>
<form action="add" method="post">
    @csrf
    <input type="number" name="id" placeholder="Enter id"> <br> <br>
    <input type="text" name="role" placeholder="Enter role"> <br> <br>
    <input type="date" name="date" placeholder="Enter date"> <br> <br>
    <input type="name" name="name" placeholder="Enter name"> <br> <br>
    <button type="submit">Add Member</button>
</form>
