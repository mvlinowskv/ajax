<?php /*Template Name: Osoby */?>
<?php get_header(); ?>
<!-- New Post Form -->
<div id="postbox">
    <div class="row">
    <div class="col-left col-4 col-s-12"> </div>
    <div class="col-center col-4 col-s-12">
<form id="new_post" name="new_post" method="post">

<!-- post name -->
<p><label for="imie">Imię</label><br />
<input type="text" id="name" name="name" placeholder="Wpisz imię osoby" pattern="[A-ZĄĘÓŁŃŚŻŹĆ][a-ząęółńśżźć]{2,15}" required/>

</p>

<p><label for="nazwisko">Nazwisko</label><br />
<input type="text" id="vorname" name="vorname" placeholder="Wpisz nazwisko osoby" pattern="[A-ZĄĘÓŁŃŚŻŹĆ][a-ząęółńśżźć]{2,}" required />
</p>

<p><label for="email">E-mail</label><br />
<input type="email" id="email" name="email" placeholder="Wpisz adres e-mail osoby" />
<span class="form_error">Wpisz poprawnie adres e-mail! </span>
</p>

<p><label for="phone">Telefon</label><br />
<input type="text" id="phone" name="phone" minlength="9" maxlength="9" placeholder="Wpisz nr telefonu osoby" required />
</p>
<input class="submit-form hoverme" type="submit" value="Dodaj osobę" tabindex="6" id="submit" name="submit" />


<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
</form>
<span id="sukces">Sukces! Udało się!</span>
</div>



<div class="col-right col-4 col-s-12">
<?php

$args = array(
   'post_type' => 'osoby'
);
 
 // The Query
 $the_query = new WP_Query( $args );
  
 // The Loop
 if ( $the_query->have_posts() ) {

     while ( $the_query->have_posts() ) {
         $the_query->the_post();
         the_title();
     }
     
 }
 /* Restore original Post Data */
 wp_reset_postdata();

 ?>
 </div>
</div>
</div>
<script>
$(function () {
   $("#phone").keydown(function (e) {
       if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
         (e.keyCode >= 35 && e.keyCode <= 40) ||
         $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
         return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
         (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
   });
});



</script>


<?php wp_footer(); ?>
<?php get_footer(); ?>

