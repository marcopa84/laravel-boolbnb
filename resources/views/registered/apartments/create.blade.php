<form action="{{route('registered.apartments.store')}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('POST')

   <div class="form-group">
      <label for="title"></label>
      <input class="form-control" type="text" name="title" id="title" placeholder="Titolo">
   </div>
   <div class="form-group">
      <label for="description"></label>
      <textarea class="form-control" rows="10" name="description" id="description" placeholder="Descrizione"></textarea>
   </div>
   <div class="form-group">
      <label for="rooms_number"></label>
      <input class="form-control" type="number" name="rooms_number" id="rooms_number" placeholder="Numero stanze">
   </div>
   <div class="form-group">
      <label for="beds_number"></label>
      <input class="form-control" type="number" name="beds_number" id="beds_number" placeholder="Numero letti">
   </div>
   <div class="form-group">
      <label for="bathrooms_number"></label>
      <input class="form-control" type="number" name="bathrooms_number" id="bathrooms_number" placeholder="Numero bagni">
   </div>
   <div class="form-group">
      <label for="size"></label>
      <input class="form-control" type="number" name="size" id="size" placeholder="Metratura">
   </div>
   <div class="form-group">
      <label for="street"></label>
      <input class="form-control" type="text" name="street" id="street" placeholder="Via">
      <label for="number"></label>
      <input class="form-control" type="number" name="number" id="number" placeholder="Civico">
      <label for="city"></label>
      <input class="form-control" type="text" name="city" id="city" placeholder="Città">
      <label for="province"></label>
      <input class="form-control" type="text" name="province" id="province" placeholder="Provincia">
      <label for="zip"></label>
      <input class="form-control" type="text" name="zip" id="zip" placeholder="C.A.P.">
      <label for="country"></label>
      <input class="form-control" type="text" name="country" id="country" placeholder="Stato">
   </div>
   <div class="form-group">
      <label for="price"></label>
      <input class="form-control" type="number" name="price" id="price" placeholder="Prezzo">
   </div>
   <div class="form-group">
      <label for="featured_image"></label>
      <input class="form-control" type="file" name="featured_image" id="featured_image" accept="image/*">
   </div>
   <div class="form-group">
      <label for="nopublished">Da Pubblicare</label>
      <input type="radio" name="visible" value="false" id="nopublished">
      <label for="published">Pubblicato</label>
      <input type="radio" name="visible" value="true" id="published">
   </div>
   <input type="submit" value="Inserisci">
</form>