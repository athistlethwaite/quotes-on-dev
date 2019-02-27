// this is where you put on click (jquery)

(function ($) {
  $('#new-quote-btn').on('click', function (event) {
    console.log('clicked');
    event.preventDefault();
    $.ajax({
      method: 'GET',
      url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',

    }).done(function (response) {
      console.log(response[0]);
      $('#qod-quotes').html(response[0].content.rendered)
      $('#author').html(response[0].title.rendered)

    });
  });
})(jQuery);