function topic_page_load() {
  window.location.href = 'topic_page.php';
}

document.getElementById('login').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('modal').style.display = 'block';
});
document.getElementById('create_top').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('create_modal').style.display = 'block';
});
document.getElementById('reg').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('registerModal').style.display = 'block';
});
document.getElementById('login_close').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('modal').style.display = 'none';
});
document.getElementById('reg_close').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('registerModal').style.display = 'none';
});
document.getElementById('create_close').addEventListener('click', function(event) {
  event.preventDefault();
  document.getElementById('create_modal').style.display = 'none';
});
