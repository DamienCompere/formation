<div class="search-container">
    <form action="/search" method="POST" role="search" > 
    {{ csrf_field() }}
      <input type="text" placeholder="rechercher.." name="q">
      <button type="submit">Va chercher !</button>
    </form>
  </div> 