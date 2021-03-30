<!-- New Post Form -->
<div id="postbox">
<form id="new_post" name="new_post" method="post" action="">

<!-- post name -->
<p><label for="imie">Imię</label><br />
<input type="text" id="imie" name="imie" />
</p>

<p><label for="nazwisko">Nazwisko</label><br />
<input type="text" id="imie" name="nazwisko" />
</p>

<p><label for="email">E-mail</label><br />
<input type="email" id="email" name="email" />
</p>

<p><label for="phone">Telefon</label><br />
<input type="number" id="telefon" name="telefon" />
</p>
<input type="submit" value="Publish" tabindex="6" id="submit" name="submit" />


<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
</form>
</div>

<?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['imie'])) {
        $imie =  $_POST['imie'];
    } else {
        echo 'Please enter a  title';
    }
    if (isset ($_POST['nazwisko'])) {
        $nazwisko = $_POST['nazwisko'];
    } else {
        echo 'Please enter the content';
    }

    $title = $imie+" "+$nazwisko;
    if (isset ($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        echo 'Please enter the content';
    }
    if (isset ($_POST['telefon'])) {
        $telefon = $_POST['telefon'];
    } else {
        echo 'Please enter the content';
    }
    //$tags = $_POST['post_tags'];

    // Add the content of the form to $post as an array
    $new_post = array(
        'post_title'    => $title,
        'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
        'post_type' => 'osoba',  //'post',page' or use a custom post type if you want to
        'meta_query'	=> array(
            'relation'		=> 'WHERE',
            array(
                'key'	 	=> 'email',
                'value'	  	=> $email,
                'compare' 	=> 'AND',
            ),
            array(
                'key'	 	=> 'telefon',
                'value'	  	=> $telefon,
                'compare' 	=> 'AND',
            )
    ));
    //save the new post
    $pid = wp_insert_post($new_post); 
    //insert taxonomies
}

?>