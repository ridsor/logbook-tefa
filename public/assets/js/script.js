// slider destinasi
const destinasiWrapper = document.querySelector('.slider-wrapper');
const sliderDestinasi = document.querySelector('.slider');
const btnPrevSlide = document.querySelector('.button-prev-slider');
const btnNextSlide = document.querySelector('.button-next-slider');

destinasiWrapper.onmouseover = () => {
  if(sliderDestinasi.scrollLeft > 0) {
    btnPrevSlide.style.opacity = '1';
    btnPrevSlide.style.pointerEvents = 'auto';
  }

  if(sliderDestinasi.scrollLeft < sliderDestinasi.scrollWidth - sliderDestinasi.clientWidth) {
    btnNextSlide.style.opacity = '1';
    btnNextSlide.style.pointerEvents = 'auto';
  }
}
destinasiWrapper.onmouseout = () => {
  btnPrevSlide.style.opacity = '0';
  btnPrevSlide.style.pointerEvents = 'none';
  btnNextSlide.style.opacity = '0';
  btnNextSlide.style.pointerEvents = 'none';
}

sliderDestinasi.onscroll = () => {
  if(sliderDestinasi.scrollLeft >= sliderDestinasi.scrollWidth - sliderDestinasi.clientWidth) {
    btnNextSlide.style.opacity = '0';
    btnNextSlide.style.pointerEvents = 'none';
  }

  if(sliderDestinasi.scrollLeft > 0) {
    btnPrevSlide.style.opacity = '1';
    btnPrevSlide.style.pointerEvents = 'auto';
  }

  if(sliderDestinasi.scrollLeft <= 0) {
    btnPrevSlide.style.opacity = '0';
    btnPrevSlide.style.pointerEvents = 'none';
  }

  if(sliderDestinasi.scrollLeft < sliderDestinasi.scrollWidth - sliderDestinasi.clientWidth) {
    btnNextSlide.style.opacity = '1';
    btnNextSlide.style.pointerEvents = 'auto';
  }
}

btnNextSlide.onclick = () => {
  let scroll = sliderDestinasi.scrollLeft + sliderDestinasi.clientWidth;
  sliderDestinasi.scrollLeft = scroll;
}

btnPrevSlide.onclick = () => {
  let scroll = sliderDestinasi.scrollLeft - sliderDestinasi.clientWidth
  sliderDestinasi.scrollLeft = scroll;
}

// time ago
function timeAgo(time) {
  const dateFromMySQL = new Date(time.replace(' ', 'T') + 'Z');

  const now = new Date();

  const timeDiff = now - dateFromMySQL;

  const seconds = Math.floor(timeDiff / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);
  const months = Math.floor(days / 30);
  const years = Math.floor(months / 12);

  if (years > 0) {
      return years + ' tahun lalu';
  } else if (months > 0) {
      return months + ' bulan lalu';
  } else if (days > 0) {
      return days + ' hari lalu';
  } else if (hours > 0) {
      return hours + ' jam lalu';
  } else if (minutes > 0) {
      return minutes + ' menit lalu';
  } else {
      return seconds + ' detik lalu';
  }
}