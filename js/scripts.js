// this is where you put on click (jquery)

(function ($) {
  $('#new-quote-btn').on('click', function (event) {
    console.log('clicked');
    event.preventDefault();
    $.ajax({
      method: 'GET',
      url: red_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      data: {
        comment_status: 'closed'
      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    }).done(function (response) {
      //alert('Success! Comments are closed for this post.');
      console.log(response[0].content.rendered);
    });
  });
})(jQuery);