var splide = new Splide( '.splide', {
  perPage: 3,
  trimSpace: false,
  breakpoints: {
		463: {
      perPage: 1,
      padding: '1rem'
		},
  },
  type   : 'loop',
  dots : false,
  focus  : 'center',
  rewind: true,
  updateOnMove: true,
  updateOnMove: true,
  pagination:false,
} );

splide.mount();

