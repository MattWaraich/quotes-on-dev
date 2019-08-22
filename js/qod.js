(function($) {
  $(function() {
    // get request for wp/v2/posts
    $('#new-quote-button').on('click', function(event) {
      event.preventDefault();

      $.ajax({
        method: 'get',
        url:
          qod_api.rest_url +
          'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
      })
        .done(function(data) {
          console.log(data);
        })
        .fail(function(err) {
          console.log('error', err);
        });
    }); //end of button click
  }); //end of doc ready
})(jQuery);


/* POST REQUEST */ 
(function( $ ) {
  $('#new-quote-button').on('click', function(event) {
     event.preventDefault();
     $.ajax({
        method: 'post',
        url: qod_api.rest_url + 'wp/v2/posts/' + qod_api.post_id,
        data: {
           comment_status: 'closed'
        },
        beforeSend: function(xhr) {
           xhr.setRequestHeader( 'X-WP-Nonce', qod.api_nonce );
        }
     }).done( function(response) {
        alert('Success! Comments are closed for this post.');
     });
  });
})( jQuery );