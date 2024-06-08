// menu header
const btnMenu = document.getElementById('btnMenu')
const menu = document.getElementById('menu')
btnMenu.onclick = () => {
  menu.classList.toggle('active')
}