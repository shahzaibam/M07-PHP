@include('components.layout')

<h1>Search Owner</h1>

<form action="{{ route('owner.searchByForm') }}" method="GET">
    <div>
        <label for="ownerId">Owner ID:</label>
        <input id="ownerId" type="text" name="ownerId">
    </div>
    <div>
        <input type="submit" value="Search">
    </div>
</form>
