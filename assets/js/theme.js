(function ($) {
  $(function () {
    const header = $('.site-header');
    if (!header.length) {
      return;
    }

    const toggleClassOnScroll = () => {
      if ($(window).scrollTop() > 80) {
        header.addClass('is-scrolled');
      } else {
        header.removeClass('is-scrolled');
      }
    };

    toggleClassOnScroll();
    $(window).on('scroll', toggleClassOnScroll);
  });
})(jQuery);
