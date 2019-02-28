// To get a new quote: 

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
      $('#author span').html(response[0].title.rendered);

      if (response[0]._qod_quote_source_url && response[0]._qod_quote_source) {
        $('#author').html(`<a target='_blank' class='author-source' 
        href=${response[0]._qod_quote_source_url} 
        >, ${response[0]._qod_quote_source}</a>`);
      }
    });
  });

  // Submit button

  $('#submit-button').on('submit', function (event) {
    event.preventDefault();

    //The variables being listed in AJAX 
    var $inputs = $('#submit-button :input');

    var values = {};
    $inputs.each(function () {
      values[this.author, this.quote, this.quotelocation, this.source] = $(this).val();

    })

    var quoteAuthor = $('#quote-author').val();
    var quoteQuote = $('#quote').val();
    var quoteLocation = $('#quote-location').val();
    var quoteSource = $('#quote-source').val();

    $.ajax({
      method: 'post',
      url: qod_vars.rest_url + 'wp/v2/posts/'
      data: {
        'title': quoteAuthor,
        'quote': quoteQuote,
        '_qod_quote_source': quoteLocation,
        '_qod_quote_source_url': quoteSource,


      },
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
      }
    }).done(function (response) {
      // $('.submit-message').html('Your quote has been submitted. Thank you!');
      // $('.submit-message').show;
    }).always(function () {
      $('.quote-submission').trigger('reset');
    }).fail(function () {
      return 'Your quote cannot be processed. Please try again.';

    });
  });

})(jQuery);