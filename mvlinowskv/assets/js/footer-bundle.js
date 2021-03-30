(function ($) {
    const loginForm = jQuery('#new_post');
    
    
    $(window).on('load', () => {
      $(document).ready(function () {
        loginForm.submit(function (e) {
          console.log('asd');
          e.preventDefault();
          const _this = $(this);
          let nameVal = $(this).find('[name="name"]').val();
          let emailVal = $(this).find('[name="email"]').val();
          let phoneVal = $(this).find('[name="phone"]').val();
          let vornameVal = $(this).find('[name="vorname"]').val();
          const data = {
            action: 'add_person',
            email: emailVal,
            name: nameVal,
            phone: phoneVal,
            vorname: vornameVal
    
          };
        //   data.push({ name: 'imie', value: $(this).data('imie') });
        //   data.push({ name: 'nazwisko', value: $(this).data('nazwisko') });
        //   data.push({ name: 'email', value: $(this).data('email') });
        //   data.push({ name: 'telefon', value: $(this).data('telefon') });
          //data.push({ name: 'action', value: 'custom_like' });
          jQuery.ajax({
            url: my_ajax_object.ajaxurl,
            type: 'post',
            data: data,
            error: function error(data) {
              console.log(data);
            },
            success: function success(data) {
            //   const svg = $(_this).find('.courses__likeIcon');
            //   const svgActive = $(_this).find('.courses__likeIcon.active');
            //   svg.addClass('active');
            //   svgActive.removeClass('active');
                $('#sukces').css("display", "block");
                $( '#new_post' ).each(function(){
                    this.reset();
              });
            },
          });
        });
      });
    });
    })(jQuery);
    