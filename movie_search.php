<div class="container-front">
 <div class="container-login">
   <form action="" method="post">
       <div class="col offset-6">
         <span class="register-letter">Movie</span>
         <select class="input-normal"  name="movieId" id="movies">
           <option type="text" value="1">Aladdin</option>
           <option type="text" value="2">Titanic</option>
           <option type="text" value="3">Avatar</option>
           <option type="text" value="4">Shawshank Redemtion</option>
           <option type="text" value="5">The Godfather</option>
         </select>
         <span class="register-letter">Date</span>
         <input class="input-normal" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" >
         <span class="register-letter">Time</span>
         <select class="input-normal"  name="time" id="times">
           <option type="time" value="01:00">01:00</option>
           <option type="time" value="03:00">03:00</option>
           <option type="time" value="06:00">06:00</option>
         </select>
         <input class="input-normal" type="submit" name="search-submit" value="Search">
       </div>
   </form>
 </div>
</div>
