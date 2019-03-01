(function ($) {
  //AJAX-based random post fetching.

  let lastPage = '';

  //Make back / forward nav work with history API 
  $(window).on('popstate', function () {
    window.location.replace(lastPage);
  })

  // Generate a new quote: 
  $('#new-quote-btn').on('click', function (event) {
    event.preventDefault();

    //Store the pre-AJAX request URL for back/forward nav:
    lastPage = document.URL;

    //AJAX request: 
    $.ajax({
      method: 'GET',
      url: qod_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',

    }).done(function (response) {

      //To update the URL:
      quoteSource = response[0].qod_quote_source
      const url = qod_vars.home_url + '/' + response[0].slug + '/';
      history.pushState(null, null, url);

      console.log(url);
      console.log(response[0]);

      $('#qod-quotes').html(response[0].content.rendered)
      // $('#author span').html(response[0].title.rendered);
      let title = "<span>- " + response[0].title.rendered + "</span>";
      let source = "<span>, " + response[0]._qod_quote_source + "</span>";
      let source_with_url = `<a target='_blank' class='author-source' href=${response[0]._qod_quote_source_url} > ${response[0]._qod_quote_source}</a>`;

      if (response[0]._qod_quote_source_url && response[0]._qod_quote_source) {
        $('#author').html(title + source_with_url);
      } else if (!response[0]._qod_quote_source_url && response[0]._qod_quote_source) {
        $('#author').html(title + source);
      } else {
        $('#author').html(title);
      }

    });
  });

  // Submit button

  $('#quote-submission-form').on('submit', function (event) {
    event.preventDefault();

    //The variables being listed in AJAX 
    var quoteAuthor = $('#quote-author').val();
    var quoteContent = $('#quote-content').val();
    var quoteLocation = $('#quote-location').val();
    var quoteSource = $('#quote-source').val();

    console.log(quoteAuthor);

    $.ajax({
        method: 'POST',
        url: qod_vars.rest_url + 'wp/v2/posts/',
        data: {
          'title': quoteAuthor,
          'content': quoteContent,
          '_qod_quote_source': quoteLocation,
          '_qod_quote_source_url': quoteSource,

        },
        beforeSend: function (xhr) {
          xhr.setRequestHeader('X-WP-Nonce', qod_vars.wpapi_nonce);
        }
      })

      .done(function () {
        $('.submit-message').show();
      }).always(function () {
        $('#quote-submission-form').slideUp();
      }).fail(function () {
        alert('Your submission could not be processed. Please try again.');
      })

  });

})(jQuery);