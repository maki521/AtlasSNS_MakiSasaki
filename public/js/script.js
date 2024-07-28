document.getElementById('dropdownMenuButton').addEventListener('click', function () {
  const menu = document.getElementById('menu');
  const arrow = document.getElementById('arrow');
  menu.classList.toggle('hidden');
  arrow.classList.toggle('rotate');
});
